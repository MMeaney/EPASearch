import eve
from eve_elastic import Elastic

#### Added for Swagger
from eve_swagger import swagger, add_documentation
#### End

app = eve.Eve(data=Elastic)


#### Added for Swagger
app.register_blueprint(swagger)

# required. See http://swagger.io/specification/#infoObject for details.
app.config['SWAGGER_INFO'] = {
    'title': 'Air Quality Open Data API (Ozone)',
    'version': '1.0',
    'description': 'Air Quality Open Data API (Ozone)',
    'termsOfService': "terms.html",
    'contact': {
      "url": 'http://www.epa.ie',
      "name": 'EPA'
    },
    'license': {
      'url': "https://creativecommons.org/licenses/by/4.0/",
      'name': "Creative Commons Attribution 4.0 International License (CC BY 4.0)"
    }
    #'host': "maurice-vm.epa.ie",
    'schemes': [
    "http"
  ],
    #,
    #'schemes': ['http', 'https'],
}

#### End


app.run(host='0.0.0.0', port=5014)

#from eve import Eve
#app = Eve()

#if __name__ == '__main__':
#    app.run()
