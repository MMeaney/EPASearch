<?php

/////////////////////////////////////////////////
// Define AER/PRTR MEASURMENTS query only

$paramPRTRMeasurements = [
	'index' => 'aer',
	'type' => 'measurements',
		'body' => [
			'query' => [
				'query_string' => [
					'query' => $_REQUEST['q'],
					'default_operator' => 'OR',
					'fields' => [
						'monitoredentitycode^9'
						, '_all'
					]

				//'match' => [
				//	'monitoredentitycode' => $_REQUEST['q']
			]
		]
	]
		//, 'sort' => [['epa_dateofoccurance' => ['order' => 'desc']]]
];

$paramPRTRMeasurements['size'] = 10000;

$resultPRTRMeasurements = $client->search($paramPRTRMeasurements);
$resultsPRTRMeasurements = $resultPRTRMeasurements['hits']['hits'];
$resultsCountPRTRMeasurements = $resultPRTRMeasurements['hits']['total'];


$aggsPRTRMeasurements = $resultPRTRMeasurements['aggs']['aggPRTRMeasurements'];

////get filter of agg/facet
$aggFilterValuePRTRMeasurements = $_GET['agg'];
$aggFilterFieldPRTRMeasurements = $_GET['agg_field'];

$aggPRTRMeasurementsBuckets	= $resultPRTRMeasurements['aggregations']['aggPRTRMeasurements']['buckets'];

$aggPRTRMeasurementsCount	= count($aggPRTRMeasurements);

?>