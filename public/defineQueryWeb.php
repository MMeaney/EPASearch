<?php

/////////////////////////////////////////////////
// Define WEB SEARCH query only

$paramEPAWeb = [
		'index' => 'epaweb',
		'type' => 'pages',
		'body' => [
				'query' => [
						'query_string' => [
								'query' => $_REQUEST['q'],
								'default_operator' => 'AND',
								'fields' => [
										'_all'

								]
						]
				]
		]



		//, 'sort' => [['epa_dateofoccurance' => ['order' => 'desc']]]
];

$paramEPAWeb['size'] = 10000;

$resultEPAWeb = $client->search($paramEPAWeb);
$resultsEPAWeb = $resultEPAWeb['hits']['hits'];
$resultsCountEPAWeb = $resultEPAWeb['hits']['total'];


$aggsEPAWeb = $resultEPAWeb['aggs']['aggEPAWeb'];

////get filter of agg/facet
$aggFilterValueEPAWeb = $_GET['agg'];
$aggFilterFieldEPAWeb = $_GET['agg_field'];

$aggEPAWebBuckets	= $resultEPAWeb['aggregations']['aggEPAWeb']['buckets'];

$aggEPAWebCount	= count($aggEPAWeb);

?>