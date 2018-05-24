# Let's just use the local mongod instance. Edit as needed.

# Please note that MONGO_HOST and MONGO_PORT could very well be left
# out as they already default to a bare bones local 'mongod' instance.
MONGO_HOST = 'localhost'
MONGO_PORT = 9214 #27017

# Skip these if your db has no auth. But it really should.
#MONGO_USERNAME = 'developeruser'
#MONGO_PASSWORD = 'MMEPATest1!'

MONGO_DBNAME = 'bw'


# Enable reads (GET), inserts (POST) and DELETE for resources/collections
# (if you omit this line, the API will default to ['GET'] and provide
# read-only access to the endpoint).
#RESOURCE_METHODS = ['GET', 'POST', 'DELETE']
RESOURCE_METHODS = ['GET']

# Enable reads (GET), edits (PATCH), replacements (PUT) and deletes of
# individual items  (defaults to read-only item access).
#ITEM_METHODS = ['GET', 'PATCH', 'PUT', 'DELETE']
ITEM_METHODS = ['GET']

#####ITEMS = 'results'
#####ITEMS = 'records'


description = 'Description of the user resource',

schema = {
    # Schema definition, based on Cerberus grammar. Check the Cerberus project
    # (https://github.com/pyeve/cerberus) for details.

    ##'datasource':
    ##{
    ##    'backend': 'elastic',
    ##    'facets': {'raw_reading_measurement_time': {'date_histogram': {'field': 'raw_reading_measurement_time', 'interval': 'hour'}}}
    ##},

    # User accounts for Authorisation
    'username': {
        'type': 'string',
        'required': True,
        'unique': True,
        },
    'password': {
        'type': 'string',
        'required': True,
    },

    #'rawreadingid': {'type': 'int64'},
    #'raw_reading_measurement_time': {'type': 'datetime'},
    #'rawdatavalue': {'type': 'double'},
    #'pollutantname': {'type': 'string'},
    #'samplingpoint': {'type': 'string'}


    ### Bathing Water (BW) Measurements ###

    #'monitoringresultid': {'type': 'int64'},
    #'locationid': {
    #    'type': 'int64',
    #    'data_relation': {
    #        'resource': 'bw_locations',
    #        'field': 'locationid',
    #        'embeddable': True
    #    }
    #},
    #'samplecode': {'type': 'string'},
    #'resultdate': {'type': 'datetime'},
    #'ecoliresult': {'type': 'string'},
    #'enterococciresult': {'type': 'string'},
    #'status': {'type': 'string'},




    ### Bathing Water (BW) Locations ###

    #'locationid': {'type': 'int64'},
    'location_code': {'type': 'string'},
    'location_name': {'type': 'string'},
    'hashtag': {'type': 'string'},
    'county_name': {'type': 'string'},
    'organisation_name': {'type': 'string'},
    'organisation_code': {'type': 'string'},
    'edenmonitoredstationcode': {'type': 'int64'},
    'easting': {'type': 'double'},
    'northing': {'type': 'double'},
    'etrsx': {'type': 'double'},
    'etrsy': {'type': 'double'},
    'information': {'type': 'string'},
    #'assessment': {'type': 'string'},
    #'nextmonitoringdate': {'type': ''},
    #'mainphotourl': {'type': ''},
    #'mainphotodescription': {'type': ''},
    #'mainphotothumbnailurl': {'type': ''},
    #'profileurl': {'type': ''},
    #'profileurldescription': {'type': ''},
    #'profilelastupdatedon': {'type': ''},
    #'waterqualityname': {'type': ''},
    #'annualclassificationid': {'type': ''},
    #'annualclassificationname': {'type': ''},
    #'annualclassificationyear': {'type': ''},
    #'annualclassificationyear1name': {'type': ''},
    #'annualclassificationyear1year': {'type': ''},
    #'annualclassificationyear2name': {'type': ''},
    #'annualclassificationyear2year': {'type': ''},
    #'annualclassificationyear3name': {'type': ''},
    #'annualclassificationyear3year': {'type': ''},
    #'closedtypename': {'type': ''},
    #'statustypename': {'type': ''},
    #'restrictiontypename': {'type': ''},
    #'hasrestrictioninplace': {'type': ''},
    #'closedreason': {'type': ''},
    #'stprisk': {'type': ''},
    #'stpcloseddays': {'type': ''},
    'isblueflag': {'type': 'boolean'},
    #'isgreencoast': {'type': ''},
    #'istoiletsavailable': {'type': ''},
    #'toiletsavailabledetails': {'type': ''},
    #'isdogsallowedonlead': {'type': ''},
    #'dogsallowedonleaddetails': {'type': ''},
    #'isdisabilityaccessible': {'type': ''},
    #'disabilityaccessibledetails': {'type': ''},
    #'isparkingavailable': {'type': ''},
    #'parkingavailabledetails': {'type': ''},
    #'isnaturalsensitivearea': {'type': ''},
    #'naturalsensitiveareadetails': {'type': ''},
    #'isfirstaid': {'type': ''},
    #'firstaiddetails': {'type': ''},
    #'islifebuoyavailable': {'type': ''},
    #'lifebuoyavailabledetails': {'type': ''},
    #'isbeachwheelchairavailable': {'type': ''},
    #'beachwheelchairavailabledetails': {'type': ''},
    #'islifeguardavailable': {'type': ''},
    #'lifeguardavailabledetails': {'type': ''},
    #'ispublictransportavailable': {'type': ''},
    #'publictransportavailabledetails': {'type': ''},
    #'iscarsnotallowedonbeach': {'type': ''},
    #'carsnotallowedonbeachdetails': {'type': ''},
    #'iscarsallowedonbeach': {'type': ''},
    #'carsallowedonbeachdetails': {'type': ''},
    #'iscarfreezone': {'type': ''},
    #'carfreezonedetails': {'type': ''},
    #'isdogsnotallowed': {'type': ''},
    #'dogsnotalloweddetails': {'type': ''},
    #'isbeachactivityzonesavailable': {'type': ''},
    #'beachactivityzonesavailabledetails': {'type': ''},
    #'isbeachinformationboardavailable': {'type': ''},
    #'beachinformationboardavailabledetails': {'type': ''},
    #'islitterbinavailable': {'type': ''},
    #'litterbinavailabledetails': {'type': ''},
    #'isrecyclingfacilityavailable': {'type': ''},
    #'recyclingfacilityavailabledetails': {'type': ''},
    'lastupdatedon': {'type': 'datetime'}





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

accounts = {
    # the standard account entry point is defined as
    # '/accounts/<ObjectId>'. We define  an additional read-only entry
    # point accessible at '/accounts/<username>'.
    'additional_lookup': {
        'url': 'regex("[\w]+")',
        'field': 'username',
    },

    # We also disable endpoint caching as we don't want client apps to
    # cache account data.
    'cache_control': '',
    'cache_expires': 0,

    # Finally, let's add the schema definition for this endpoint.
    'schema': schema,
}

#bw_measurements = {
#    'item_title': 'bw_measurements',
#    'additional_lookup': {'url': 'regex("[\w]+")','field': 'monitoringresultid'},
#    'resource_methods': ['GET'],
#    'schema': schema
#}


bw_locations = {
    # 'title' tag used in item links. Defaults to the resource title minus
    # the final, plural 's' (works fine in most cases but not for 'people')
    'item_title': 'bw_locations',

    # by default the standard item entry point is defined as
    # '/people/<ObjectId>'. We leave it untouched, and we also enable an
    # additional read-only entry point. This way consumers can also perform
    # GET requests at '/people/<lastname>'.

    #'additional_lookup': {'url': 'regex("[\w]+")','field': 'samplingpoint'},
    'additional_lookup': {'url': 'regex("[\w]+")','field': 'location_code'},
    #'additional_lookup': {'url': 'regex("[\w]+")', 'field': '_id'},
    #'additional_lookup': {'url': 'regex("[\w]+")', 'field': 'raw_reading_measurement_time'},


    #'datasource': {
    #    'filter': {'rawreadingid': {'$exists': True}}
    #},


    #'datasource': {
    #    #'source': 'aq_measurements',
    #    #'filter': {'rawreadingid'},
    #    'projection': {
    #        'rawreadingid': 1,
    #        'pollutantname': 1,
    #        'rawdatavalue': 1,
    #        'measurementunit': 1,
    #        'measurementtype': 1,
    #        'raw_reading_measurement_time': 1,
    #        'samplingpoint': 1
    #    }
    #},

    # We choose to override global cache-control directives for this resource.
    'cache_control': 'max-age=10,must-revalidate',
    'cache_expires': 10,

    # most global settings can be overridden at resource level
    #'resource_methods': ['GET', 'POST'],
    'resource_methods': ['GET'],

    'schema': schema
}

#SERVER_NAME = '0.0.0.0:5014'
#SERVER_NAME = "http://maurice-vm.epa.ie:5014"
#URL_PREFIX = 'a'
#QUERY_MAX_RESULTS = 'num'
#RESOURCE_TITLE = 'http://maurice-vm.epa.ie:5016/api/aq_measurements'
#ID_FIELD = 'rawreadingid'
#VERSIONING = True
#SERVER_NAME = 'http://maurice-vm.epa.ie:5017/api'
#HATEOAS = False
FLASK_DEBUG = False
STATUS_OK = 'OK'
URL_PREFIX = 'api'
API_VERSION = 'v1'
XML = False
PAGINATION = True
PAGINATION_LIMIT = 999999999
PAGINATION_DEFAULT = 25
EMBEDDING = True
DOMAIN = {
    'bw_measurements': {
        'item_title': 'bw_measurements',
        'additional_lookup': {'url': 'regex("[\w]+")','field': 'monitoringresultid'},
        'resource_methods': ['GET'],
        'id_field': 'monitoringresultid',
        'schema': {
            'monitoringresultid': {'type': 'int64'},
            'locationid': {
                'type': 'int64',
                'data_relation': {
                    'resource': 'bw_locations',
                    'field': 'locationid',
                    'embeddable': True
                }
            },
            'samplecode': {'type': 'string'},
            'resultdate': {'type': 'datetime'},
            'ecoliresult': {'type': 'string'},
            'enterococciresult': {'type': 'string'},
            'status': {'type': 'string'},
        }
    },
    #'bw_measurements': bw_measurements,
    'bw_locations': bw_locations,
    'accounts': accounts,
}
