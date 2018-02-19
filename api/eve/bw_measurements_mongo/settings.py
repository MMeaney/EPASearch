MONGO_HOST = 'localhost'
MONGO_PORT = 27017
MONGO_DBNAME = 'bw'
RESOURCE_METHODS = ['GET']
ITEM_METHODS = ['GET']
DESCRIPTION = 'Description of the user resource'
URL_PREFIX = 'api'
XML = True
PAGINATION = True
PAGINATION_DEFAULT = 25
EMBEDDING = True
DOMAIN = {
    'bw_measurements': {
        'additional_lookup': {'url': 'regex("[\w]+")','field': 'monitoringresultid'},
        'resource_methods': ['GET'],
        'schema': {
            'monitoringresultid': {'type': 'int64'},
            'locationid': {'type': 'int64',
                'data_relation': {
                    'resource': 'bw_locations',
                    'field': '_id',
                    'embeddable': True }},
            'samplecode': {'type': 'string'},
            'resultdate': {'type': 'datetime'},
            'ecoliresult': {'type': 'string'},
            'enterococciresult': {'type': 'string'},
            'status': {'type': 'string'},
        }
    }
}
