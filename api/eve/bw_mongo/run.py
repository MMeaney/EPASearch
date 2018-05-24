import eve
import bcrypt
from eve import Eve
import logging
#from eve_elastic import Elastic

#### Added for Swagger
from eve_swagger import swagger, add_documentation

#### Added for Basic Autorisation (Username/password)
from eve.auth import BasicAuth

#### Waitress WSGI Server
from waitress import serve

#### Added for Token Autorisation
#from eve.auth import TokenAuth
#from flask import current_app as app

#### End

#### Disable meta fields, e.g. '_etag', '_created', '_updated'
def on_fetched_resource(resource, response):
    for document in response['_items']:
        del(document['_etag'])
        del(document['_created'])
        del(document['_updated'])
        #del(document['_links'])

#def on_fetched_resource(resource, response):
#    for document in response['_item']:
#        del(document['_etag'])
#        del(document['_created'])
#        del(document['_updated'])

#### Restrict API access - require username and password
class MyBasicAuth(BasicAuth):
    def check_auth(self, username, password, allowed_roles, resource, method):
        return username == 'EPA_AQUser' and password == 'EPA_AQPass1!11'

#class BCryptAuth(BasicAuth):
#    def check_auth(self, username, password, allowed_roles, resource, method):
#        if resource == 'accounts':
#            return username == 'superuser' and password == 'password'
#        else:
#            # use Eve's own db driver; no additional connections/resources are used
#            accounts = app.data.driver.db['accounts']
#            account = accounts.find_one({'username': username})
#            return account and \
#                bcrypt.hashpw(password, account['password']) == account['password']#




#### Restrict API access - require token
#class TokenAuth(TokenAuth):
#    def check_auth(self, token, allowed_roles, resource, method):
        """For the purpose of this example the implementation is as simple as
        possible. A 'real' token should probably contain a hash of the
        username/password combo, which sould then validated against the account
        data stored on the DB.
        """
        # use Eve's own db driver; no additional connections/resources are used
#        accounts = app.data.driver.db['accounts']
#        return accounts.find_one({'token': token})
        #return token == 'token'




app = Eve() # MongoDB
#app = Eve(auth=MyBasicAuth) # MongoDB
#app = eve.Eve(data=Elastic) # Elasticsearch
#app = eve.Eve(data=Elastic, auth=MyBasicAuth)
##app = eve.Eve(data=Elastic, auth=BCryptAuth)
##app = eve.Eve(data=Elastic, auth=TokenAuth)


#### Logging
def log_every_get(resource, request, payload):
  # custom INFO-level message is sent to the log file
  app.logger.info('GET request')

app.on_post_GET += log_every_get



#### Disable meta fields, e.g. '_etag', '_created', '_updated'
app.on_fetched_resource += on_fetched_resource



#### Added for Swagger
app.register_blueprint(swagger)

# required. See http://swagger.io/specification/#infoObject for details.
app.config['SWAGGER_INFO'] = {
    'title': 'Bathing Water Open Data API',
    'version': '1.0',
    'description': 'Bathing Water Open Data API',
    'termsOfService': "terms.html",
    'contact': {
      "url": 'http://www.epa.ie',
      "name": 'EPA'
    },
    'license': {
      'url': "https://creativecommons.org/licenses/by/4.0/",
      'name': "Creative Commons Attribution 4.0 International License (CC BY 4.0)"
    }
    #,
    #'host': "maurice-vm.epa.ie",
    #,
    #'schemes': ['http', 'https'],
}

#### End


#app.run(host='0.0.0.0', port=5017)

#from eve import Eve
#app = Eve()

if __name__ == '__main__':

    # enable logging to 'app.log' file
    handler = logging.FileHandler('app.log')

    # set a custom log format, and add request
    # metadata to each log line
    handler.setFormatter(
        logging.Formatter(
            '%(asctime)s %(levelname)s: %(message)s '
            '[IN %(filename)s:%(lineno)d] -- IP: %(clientip)s, '
            'URL: %(url)s, METHOD:%(method)s'#, ERROR:%(error)s'
        )
    )

    # the default log level is set to WARNING, so
    # we have to explictly set the logging level
    # to INFO to get our custom message logged.
    app.logger.setLevel(logging.INFO)

    # append the handler to the default application logger
    app.logger.addHandler(handler)
    #app.run()

    #app.run(host='0.0.0.0', port=5017)
    serve(app, host='0.0.0.0', port=5017)