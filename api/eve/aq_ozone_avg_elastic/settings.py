# Let's just use the local mongod instance. Edit as needed.

# Please note that MONGO_HOST and MONGO_PORT could very well be left
# out as they already default to a bare bones local 'mongod' instance.
#MONGO_HOST = 'localhost'
#MONGO_PORT = 27017

# Skip these if your db has no auth. But it really should.
#MONGO_USERNAME = 'developeruser'
#MONGO_PASSWORD = 'MMEPATest1!'

#MONGO_DBNAME = 'eric'

ELASTICSEARCH_URL = 'http://127.0.0.1:9214/'
ELASTICSEARCH_INDEX = 'aq'
#ELASTICSEARCH_INDEXES - (default: {}) - resource to index mapping
#ELASTICSEARCH_FORCE_REFRESH - (default: True) - force index refresh after every modification
#ELASTICSEARCH_AUTO_AGGREGATIONS - (default: True) - return aggregates on every search if configured for resource

# Enable reads (GET), inserts (POST) and DELETE for resources/collections
# (if you omit this line, the API will default to ['GET'] and provide
# read-only access to the endpoint).
#RESOURCE_METHODS = ['GET', 'POST', 'DELETE']
RESOURCE_METHODS = ['GET']

# Enable reads (GET), edits (PATCH), replacements (PUT) and deletes of
# individual items  (defaults to read-only item access).
#ITEM_METHODS = ['GET', 'PATCH', 'PUT', 'DELETE']
ITEM_METHODS = ['GET']

description = 'Description of the user resource',

schema = {
    # Schema definition, based on Cerberus grammar. Check the Cerberus project
    # (https://github.com/pyeve/cerberus) for details.
    #'measurementid': {'type': 'int32'},
    #'locationname': {'type': 'string'},
    #'latitude_dec': {'type': 'double'},
    #'longitude_dec': {'type': 'double'},
    #'accuracytypedescription': {'type': 'string'},
    #'sampletypedescription': {'type': 'string'},
    #'sampletreatmentdescription': {'type': 'string'},
    #'beginmeas': {'type': 'datetime'},
    #'endmeas': {'type': 'datetime'},
    #'instrumentdescription': {'type': 'string'},
    #'nuclidedescription': {'type': 'string'},
    #'ismda': {'type': 'boolean'},
    #'value': {'type': 'double'},
    #'valueunitdescription': {'type': 'string'},
    #'valuetypedescription': {'type': 'string'},
    #'uncertainty': {'type': 'double'},
    #'uncertaintyunitdescription': {'type': 'string'},
    #'uncertaintytypedescription': {'type': 'string'},
    #'comments': {'type': 'string'},
    #'meta_note_ismda': {'type': 'string'}
    'datesforcalculationofconc60': {'type': 'datetime'},
    'hourlyavgconcs': {'type': 'double'},
    'pollutantname': {'type': 'string'},
    'samplingpoint': {'type': 'string'}
    
    
    
    ## 'role' is a list, and can only contain values from 'allowed'.
    #'role': {
    #    'type': 'list',
    #    'allowed': ["author", "contributor", "copy"],
    #},
    ## An embedded 'strongly-typed' dictionary.
    #'location': {
    #    'type': 'dict',
    #    'schema': {
    #        'address': {'type': 'string'},
    #        'city': {'type': 'string'}
    #    },
    #},
}

aq_measurements_01ozone = {
    # 'title' tag used in item links. Defaults to the resource title minus
    # the final, plural 's' (works fine in most cases but not for 'people')
    'item_title': 'aq_measurements_01ozone',

    # by default the standard item entry point is defined as
    # '/people/<ObjectId>'. We leave it untouched, and we also enable an
    # additional read-only entry point. This way consumers can also perform
    # GET requests at '/people/<lastname>'.
    
    'additional_lookup': {
        'url': 'regex("[\w]+")',
        'field': 'samplingpoint'
    },
   # 'additional_lookup': {'url': 'regex("[\w]+")', 'field': 'measurementid'},


    # We choose to override global cache-control directives for this resource.
    'cache_control': 'max-age=10,must-revalidate',
    'cache_expires': 10,

    # most global settings can be overridden at resource level
    #'resource_methods': ['GET', 'POST'],
    'resource_methods': ['GET'],

    'schema': schema
}

#SERVER_NAME = '0.0.0.0:5014'
SERVER_NAME = None
XML = False

DOMAIN = {
    'aq_measurements_01ozone': aq_measurements_01ozone,
}
