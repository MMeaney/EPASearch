<?php 

$leapIndex = 'leap3';

/////////////////////////////////////////////////
// Define LEAP SITE query only

/*$paramLEAP['body'] = [
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
 ];*/

/*
$paramLEAPSite = [
	'index' => $leapIndex,
	'type' => 'leap_site',
	'body' => [
		'query' => [
			'match' => [
				'_all' => $_REQUEST['q']
			]
		]
	]
		//, 'sort' => [['epa_regno' => ['order' => 'asc']]],
];



$resultLEAPSite = $client->search($paramLEAPSite);
$resultsLEAPSite = $resultLEAPSite['hits']['hits'];
$resultsCountLEAPSite = $resultLEAPSite['hits']['total'];


$aggsLEAPSite = $resultLEAPSite['aggs']['aggLEAPSite'];
//$aggsfileshareauthor = $resultfileshare['aggs']['aggAuthor'];
//$aggsFileShareFileType = $resultfileshare['aggs']['aggFileType'];
//$aggsFileShareContentType = $resultfileshare['aggs']['aggContentType'];

////get filter of agg/facet
$aggFilterValueLEAPSite = $_GET['agg'];
$aggFilterFieldLEAPSite = $_GET['agg_field'];

$aggLEAPSiteBuckets 	= $resultLEAPSite['aggregations']['aggLEAPSite']['buckets'];
//$aggFileType 	= $resultfileshare['aggregations']['aggFileType']['buckets'];
//$aggContentType	= $resultfileshare['aggregations']['aggContentType']['buckets'];
//$aggApplication = $resultfileshare['aggregations']['aggApplication']['buckets'];


$aggLEAPSiteCount  	 = count($aggLEAPSite);
//$aggFileTypeCount 	 = count($aggFileType);
//$aggContentTypeCount = count($aggContentType);
//$aggApplicationCount = count($aggApplication);

//*/

/////////////////////////////////////////////////
// Define LEAP LICENCE query only

$paramLEAPLicence = [
	'index' => $leapIndex,
	'type' => 'leap_licence',
	'from' => 0,
	'size' => 14,
	//'body' => [
	//	'query' => [
	//		'query_string' => [
	//			'query' => $_REQUEST['q'],
	//			'default_operator' => 'AND'
	//		]
	//	]
	//]
];

$jsonLEAPLicence = '
{
    "query": {
		"query_string": {
			"query": "'.$_REQUEST['q'].'",
			"default_operator": "AND"
		}
    }
}
';


$jsonLEAPLicence2 = '
{
  "query": {
	  "has_child": {
		  "type": "leap_complaint",
      		"score_mode" : "min",
      		"ignore_unmapped": true,
		  	"query": {
        		"term": {
          			"epa_casenumber.keyword": "'.$_REQUEST['q'].'"
        		}
			}
		}
  	}
}
';


$paramLEAPLicence['body'] = $jsonLEAPLicence;

//$paramLEAPLicence['size'] = 100;

$resultLEAPLicence = $client->search($paramLEAPLicence);
$resultsLEAPLicence = $resultLEAPLicence['hits']['hits'];
$resultsCountLEAPLicence = $resultLEAPLicence['hits']['total'];


$aggsLEAPLicence = $resultLEAPLicence['aggs']['aggLEAPLicence'];

////get filter of agg/facet
$aggFilterValueLEAPLicence = $_GET['agg'];
$aggFilterFieldLEAPLicence = $_GET['agg_field'];

$aggLEAPLicenceBuckets	= $resultLEAPLicence['aggregations']['aggLEAPLicence']['buckets'];

$aggLEAPLicenceCount	= count($aggLEAPLicence);

/////////////////////////////////////////////////
// Define LEAP COMPLAINT query only

$paramLEAPComplaint = [
	'index' => $leapIndex,
	'type' => 'leap_complaint'//,
    ////'routing' => '_id',
	//'body' => [
	//	'query' => [
	//		'query_string' => [
	//			'query' => $_REQUEST['q'],
	//			'default_operator' => 'AND'
	//		]
	//	]
	//]
		//, 'sort' => [['epa_dateofoccurance' => ['order' => 'desc']]]
];


$phpRequest = $_REQUEST['q'];
$jsonLEAPComplaint = '
{
    "query": {
        "query_string": {
            "query": "'.$_REQUEST['q'].'",
            "default_operator": "AND"
        }
    }
}
';
$paramLEAPComplaint['body'] = $jsonLEAPComplaint;

$paramLEAPComplaint['size'] = 100;

$resultLEAPComplaint = $client->search($paramLEAPComplaint);
$resultsLEAPComplaint = $resultLEAPComplaint['hits']['hits'];
$resultsCountLEAPComplaint = $resultLEAPComplaint['hits']['total'];


$aggsLEAPComplaint = $resultLEAPComplaint['aggs']['aggLEAPComplaint'];

////get filter of agg/facet
$aggFilterValueLEAPComplaint = $_GET['agg'];
$aggFilterFieldLEAPComplaint = $_GET['agg_field'];

$aggLEAPComplaintBuckets	= $resultLEAPComplaint['aggregations']['aggLEAPComplaint']['buckets'];

$aggLEAPComplaintCount	= count($aggLEAPComplaint);




/////////////////////////////////////////////////
// Define LEAP NON-COMPLIANCE query only

$paramLEAPNonCompliance = [
	'index' => $leapIndex,
	'type' => 'leap_non_compliance',
	'body' => [
		'query' => [
			//'has_parent' => [
			//	'parent_type' => ['leap_licence'],
				'query_string' => [
					'query' => $_REQUEST['q'],
					'default_operator' => 'AND'
				]
			//]
		]
	]
		//, 'sort' => [['epa_dateofoccurance' => ['order' => 'desc']]]
];

$paramLEAPNonCompliance['size'] = 100;

$resultLEAPNonCompliance = $client->search($paramLEAPNonCompliance);
$resultsLEAPNonCompliance = $resultLEAPNonCompliance['hits']['hits'];
$resultsCountLEAPNonCompliance = $resultLEAPNonCompliance['hits']['total'];


$aggsLEAPNonCompliance = $resultLEAPNonCompliance['aggs']['aggLEAPNonCompliance'];

////get filter of agg/facet
$aggFilterValueLEAPNonCompliance = $_GET['agg'];
$aggFilterFieldLEAPNonCompliance = $_GET['agg_field'];

$aggLEAPNonComplianceBuckets	= $resultLEAPNonCompliance['aggregations']['aggLEAPNonCompliance']['buckets'];

$aggLEAPNonComplianceCount	= count($aggLEAPNonCompliance);



/////////////////////////////////////////////////
// Define LEAP COMPLIANCE INVESTIGATION query only

$paramLEAPComplianceInvestigation = [
	'index' => $leapIndex,
	'type' => 'leap_compliance_investigation',
	'body' => [
		'query' => [
			'query_string' => [
				'query' => $_REQUEST['q'],
				'default_operator' => 'AND'
			]
		]
	]
		//, 'sort' => [['epa_dateofoccurance' => ['order' => 'desc']]]
];

$paramLEAPComplianceInvestigation['size'] = 100;

$resultLEAPComplianceInvestigation = $client->search($paramLEAPComplianceInvestigation);
$resultsLEAPComplianceInvestigation = $resultLEAPComplianceInvestigation['hits']['hits'];
$resultsCountLEAPComplianceInvestigation = $resultLEAPComplianceInvestigation['hits']['total'];


$aggsLEAPComplianceInvestigation = $resultLEAPComplianceInvestigation['aggs']['aggLEAPComplianceInvestigation'];

////get filter of agg/facet
$aggFilterValueLEAPComplianceInvestigation = $_GET['agg'];
$aggFilterFieldLEAPComplianceInvestigation = $_GET['agg_field'];

$aggLEAPComplianceInvestigationBuckets	= $resultLEAPComplianceInvestigation['aggregations']['aggLEAPComplianceInvestigation']['buckets'];

$aggLEAPComplianceInvestigationCount	= count($aggLEAPComplianceInvestigation);





/////////////////////////////////////////////////
// Define LEAP SHAREPOINT DOCUMENTS query only

/*
$paramLEAPSharepointDocuments = [
		'index' => 'leap2',
		'type' => 'leap_docs',
		'body' => [
				'query' => [
						'match' => [
								'_all' => $_REQUEST['q']
						]
				]
		]
		//, 'sort' => [['epa_dateofoccurance' => ['order' => 'desc']]]
];
//*/

$paramLEAPSharepointDocuments = [
	'index' => 'leap',
	'type' => 'leap_docs',
	'body' => [
		'query' => [
			'query_string' => [
				'query' => $_REQUEST['q'],
				'default_operator' => 'AND'					
			]
		]
	]
		//, 'sort' => [['epa_dateofoccurance' => ['order' => 'desc']]]
];






$paramLEAPSharepointDocuments['size'] = 10000;

$resultLEAPSharepointDocuments = $client->search($paramLEAPSharepointDocuments);
$resultsLEAPSharepointDocuments = $resultLEAPSharepointDocuments['hits']['hits'];
$resultsCountLEAPSharepointDocuments = $resultLEAPSharepointDocuments['hits']['total'];


$aggsLEAPSharepointDocuments = $resultLEAPSharepointDocuments['aggs']['aggLEAPSharepointDocuments'];

////get filter of agg/facet
$aggFilterValueLEAPSharepointDocuments = $_GET['agg'];
$aggFilterFieldLEAPSharepointDocuments = $_GET['agg_field'];

$aggLEAPSharepointDocumentsBuckets	= $resultLEAPSharepointDocuments['aggregations']['aggLEAPSharepointDocuments']['buckets'];

$aggLEAPSharepointDocumentsCount	= count($aggLEAPSharepointDocuments);





/////////////////////////////////////////////////
// Define AER/PRTR MEASURMENTS query only

$paramPRTRMeasurements = [
	'index' => 'aer',
	'type' => 'measurements',
		'body' => [
			'query' => [
				//'query_string' => [
				//	'query' => $_REQUEST['q'],
				//	'default_operator' => 'OR',
				//	'fields' => [
				//		'monitoredentitycode^9'
				//		, '_all'
				//	]	
				'match' => [
					'monitoredentitycode' => $_REQUEST['q']
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

////////////////////////////////////////////////////////////////////////////////
// Define WEB SEARCH query only - Multiple Sites - Scrapy Pipeline (2017-03-06)

$paramWeb['body'] = [
	'query' => [
		//'query_string' => [
		//	'query' => $_REQUEST['q'],
		//	'default_operator' => 'AND',
		//	'fields' => [
		//		'body.raw'
		//	]
		//]
		
		//'match' => [
		//	'_all' => [
		//		'query' => $_REQUEST['q']
		//		, 'operator' => 'and'
		//	]
		//]
		
		'match_phrase' => [
			'_all' => [
				'query' => $_REQUEST['q']
			]
		]			
	],
	'highlight' => [
		'fields' => [
			'*' => new \stdClass()
		]
	]
];

//$paramWeb['body']['highlight']['fields']['file.url'] = (object) [];
//$paramWeb['body']['highlight']['fields']['file.filename'] = (object) [];

//$paramWeb= $_REQUEST['q']; // what to search for

// Send search query to Elasticsearch and get results
$resultWeb = $client->search($paramWeb);
//$result = $client->search($paramWeb)['size'] = 10;
$resultsWeb = $resultWeb['hits']['hits'];
$resultsCountWeb= $resultWeb['hits']['total'];









?>