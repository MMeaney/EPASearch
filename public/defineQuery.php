<?php


	include __DIR__ . "/defineQueryDocs.php";
	//include __DIR__ . "/defineQueryFileshare.php";
	include __DIR__ . "/defineQueryLEAP.php";
	include __DIR__ . "/defineQueryWeb.php";
	include __DIR__ . "/defineQueryPRTR.php";

/////////////////////////////////////////////////
// Define PEOPLE query only

/*
$paramPeople['body'] = [
	'query' => [
		'match' => [
			'_all' => $_REQUEST['q']
	    ]
	],
	'highlight' => [
	    'fields' => [
	        '_all' => new \stdClass()
		]
	]
];

//*/


///*
$paramPeople['body'] = [
	'query' => [
		'query_string' => [
			'query' => $_REQUEST['q'],
			'default_operator' => 'AND',
			'fields' => [
				'_all'
				//, 'fuzziness' => '1'
				//, 'prefix_length' =>  2
			]
		]
	]
];

//*/

$resultPeople = $client->search($paramPeople);
$resultsPeople = $resultPeople['hits']['hits'];
$resultsCountPeople = $resultPeople['hits']['total'];



?>