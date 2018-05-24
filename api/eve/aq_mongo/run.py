import eve
import bcrypt
from eve import Eve

#### Added for Swagger
from eve_swagger import swagger, add_documentation

#### Added for Basic Autorisation (Username/password)
from eve.auth import BasicAuth

#### Waitress WSGI Server
from waitress import serve

#import datetime
#from datetime import date

#### Disable meta fields, e.g. '_etag', '_created', '_updated'
def on_fetched_resource(resource, response):
    for document in response['_items']:
        del(document['_etag'])
        del(document['_created'])
        del(document['_updated'])
        del(document['_links'])
        #document['year'] = document['raw_reading_measurement_time'].strftime("%Y")
        #document['month'] = document['raw_reading_measurement_time'].strftime("%m")
        #document['day'] = document['raw_reading_measurement_time'].strftime("%d")

#### Restrict API access - require username and password
class MyBasicAuth(BasicAuth):
    def check_auth(self, username, password, allowed_roles, resource, method):
        return username == 'EPA_AQUser' and password == 'EPA_AQPass1!11'

app = Eve()
#app = Eve(auth=MyBasicAuth)

#### Disable meta fields, e.g. '_etag', '_created', '_updated'
app.on_fetched_resource += on_fetched_resource

#app.register_blueprint(swagger, url_prefix='/docs')
app.register_blueprint(swagger)

# required. See http://swagger.io/specification/#infoObject for details.
app.config['SWAGGER_INFO'] = {
    'title': 'Air Quality Open Data API',
    'version': '1.0',
    'description': 'Air Quality Open Data API',
    'termsOfService': "terms.html",
    'contact': {
      'url': 'http://www.epa.ie',
      'name': 'EPA'
    },
    'license': {
      'url': "https://creativecommons.org/licenses/by/4.0/",
      'name': "Creative Commons Attribution 4.0 International License (CC BY 4.0)"
    }
}

@app.route('/api/v1/aq_measurements/hello')
def hello_world():
    return 'Hello World!'


if __name__ == '__main__':
    #app.run(host='0.0.0.0', port=5016)
    serve(app, host='0.0.0.0', port=5016)















"""

import eve
import bcrypt
from eve import Eve
#from eve_elastic import Elastic

#### Added for Swagger
from eve_swagger import swagger, add_documentation

#### Added for Basic Autorisation (Username/password)
from eve.auth import BasicAuth

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
        del(document['_links'])

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


        ###
        For the purpose of this example the implementation is as simple as
        possible. A 'real' token should probably contain a hash of the
        username/password combo, which sould then validated against the account
        data stored on the DB.
        ###
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


#### Disable meta fields, e.g. '_etag', '_created', '_updated'
app.on_fetched_resource += on_fetched_resource



#### Added for Swagger
app.register_blueprint(swagger)

# required. See http://swagger.io/specification/#infoObject for details.
app.config['SWAGGER_INFO'] = {
    'title': 'Air Quality Open Data API',
    'version': '1.0',
    'description': 'Air Quality Open Data API',
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


#app.run(host='0.0.0.0', port=5016)

#from eve import Eve
#app = Eve()

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5016)



"""