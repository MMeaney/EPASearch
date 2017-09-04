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
    'title': 'My Supercool API',
    'version': '1.0',
    'description': 'an API description',
    'termsOfService': 'my terms of service',
    'contact': {
        'name': 'nicola',
        'url': 'http://nicolaiarocci.com'
    },
    'license': {
        'name': 'BSD',
        'url': 'https://github.com/pyeve/eve-swagger/blob/master/LICENSE',
    },
    'schemes': ['http', 'https'],
}

#### End


app.run(host='0.0.0.0', port=5014)

#from eve import Eve
#app = Eve()

#if __name__ == '__main__':
#    app.run()
