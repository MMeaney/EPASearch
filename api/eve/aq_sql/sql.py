from eve import Eve
from eve_sqlalchemy import SQL
from eve_sqlalchemy.config import DomainConfig, ResourceConfig
from eve_sqlalchemy.validation import ValidatorSQL
from sqlalchemy import Column, DateTime, ForeignKey, BigInteger, Integer, Float, String, func
from sqlalchemy.ext.declarative import declarative_base
from sqlalchemy.orm import column_property

#### Added for Swagger
from eve_swagger import swagger, add_documentation

#### Added for Basic Autorisation (Username/password)
from eve.auth import BasicAuth

#### Waitress WSGI Server
from waitress import serve

Base = declarative_base()

class aq_measurements(Base):
    __tablename__ = 'aq_measurements'
    rawreadingid = Column(BigInteger, primary_key=True)
    samplingpoint = Column(String(50))
    pollutantname = Column(String(10))
    rawdatavalue = Column(Float)
    raw_reading_measurement_time = Column(DateTime)
    measurementunit = Column(String(20))
    measurementtype = Column(String(10))


SETTINGS = {
    'DEBUG': False,
    'FLASK_DEBUG': False,
    #'SQLALCHEMY_DATABASE_URI': 'mssql+pyodbc://heaintsqlwfd1.edenireland.ie/aq?driver=SQL+Server+Native+Client+11.0',
    'SQLALCHEMY_DATABASE_URI': 'mssql+pyodbc://MauriceVM-Test/aq?driver=SQL+Server+Native+Client+11.0',
    'SQLALCHEMY_TRACK_MODIFICATIONS': False,
    'TCP_PORT': 5116,
    'URL_PREFIX': 'api',
    'API_VERSION': 'v1',
    'XML': False,
    'PAGINATION': True,
    'PAGINATION_LIMIT': 50,
    'PAGINATION_DEFAULT': 25,
    'EMBEDDING': True,
    'RESOURCE_METHODS': ['GET'],
    'ITEM_METHODS': ['GET'],
    'DOMAIN': DomainConfig({
        'aq_measurements': ResourceConfig(aq_measurements)
    }).render()
}


##BUFFER_SIZE = 20

#### Disable meta fields, e.g. '_etag', '_created', '_updated'
def on_fetched_resource(resource, response):
    for document in response['_items']:
        del(document['_etag'])
        del(document['_created'])
        del(document['_updated'])
        del(document['_links'])

#### Restrict API access - require username and password
#class MyBasicAuth(BasicAuth):
#    def check_auth(self, username, password, allowed_roles, resource, method):
#        return username == 'EPA_AQUser' and password == 'EPA_AQPass1!11'


app = Eve(auth=None, settings=SETTINGS, validator=ValidatorSQL, data=SQL)
#pp = Eve()
#app = Eve(auth=MyBasicAuth)

app.on_fetched_resource += on_fetched_resource

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

# bind SQLAlchemy
db = app.data.driver
Base.metadata.bind = db.engine
db.Model = Base
db.create_all()

if __name__ == '__main__':
    ### Non-Waitress run
    #app.run(host='0.0.0.0', port=5012, debug=False, use_reloader=False)
    app.run(host='0.0.0.0', port=5012, threaded=True)

    ### Waitress run
    #serve(app, host='0.0.0.0', port=5012)