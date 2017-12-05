<?php

$indexDocs = ['docs', 'owl_oea_central_files_docs_doc'];
$typeDocs = 'doc';
//$param['index'] = ['owl_oea_central_files_docs_doc'];
//$param['index'] = ['docs'];
//$param['type']  = ['doc'];

/////////////////////////////////////////////////
// Define DOCS query only

$param = [
	'index' => $indexDocs,
	'type' => $typeDocs
];

$jsonDocQuery = '
{
    "query": {
        "query_string": {
            "query": "'.$_REQUEST['q'].'",
            "default_operator": "AND",
            "fields": [
                "file.filename^99",
                "content",
                "meta.author",
                "_all"
            ]
        }
    },
    "highlight": {
        "fields": {
            "*": {}
        }
    }
}
';

$param['body'] = $jsonDocQuery;

//$param['body']['highlight']['fields']['file.url'] = (object) [];
//$param['body']['highlight']['fields']['file.filename'] = (object) [];

//$param = $_REQUEST['q']; // what to search for

// Send search query to Elasticsearch and get results
$result = $client->search($param);
//$result = $client->search($param)['size'] = 10;
$results = $result['hits']['hits'];
$resultscount = $result['hits']['total'];
//$results = $client->search($param);
//$numresults = (count($results));


/*

$param['body'] = [
	'index' => 'docs',
	'type' => 'doc',
	'query' => [
		'query_string' => [
			'query' => $_REQUEST['q'],
			'default_operator' => 'AND',
			'fields' => [
				'file.filename^99'
				//, 'file.url^50'
        , "content"
				, 'meta.author'
				, '_all'
				//'file.filename.raw^99'
				//, 'file.url.raw^50'
				//, 'meta.author.raw'
			//, 'fuzziness' => '1'
			//, 'prefix_length' =>  2

			]
		]
	],
	'highlight' => [
		'fields' => [
	        '*' => new \stdClass()
		]
	]
	/*
	'query' => [
		'bool' => [
			'should' => [
				'match' => [
					'_all' => $_REQUEST['q']
				],
				'match' => [
					'_all' => [
						'query' => $_REQUEST['q'],
						'fuzziness' => '1',
						'prefix_length' =>  2
					]
				]
			]
		]
	]

];
//*/


?>