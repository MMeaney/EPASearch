<?php 

$param['index'] = ['docs', 'images'];
$param['type']  = ['doc', 'people', 'image'];

$paramMainTest['index'] = ['docs', 'images'];
$paramMainTest['type']  = ['doc', 'people', 'image'];

$paramfileshare['index'] =  ['doc', 'people', 'image'];
$paramfileshare['type']  = ['doc', 'image'];

$paramopendata['index'] = "gismetadatatest";
$paramopendata['type']  = ['rivers', 'radon'];

$paramdatadictionary['index'] = "epametadatatest";
$paramdatadictionary['type']  = "datadictionary";

$paramPeople['index'] = "docs";
$paramPeople['type']  = "people";

$paramSnippetMain['index'] = "epasystems";
$paramSnippetMain['type']  = "system";

$paramResearch['index'] = "safer";
$paramResearch['type']  = "saferdata";


$paramLEAP['index'] = "leap3";
//$paramLEAP['type'] = "saferdata";

$param['size'] = 10;
$param['from'] = 0;

$paramfileshare['size'] = 10;
$paramfileshare['from'] = 0;

$paramopendata['size'] = 10;

$paramdatadictionary['size'] = 1000;

$paramPeople['size'] = 20;


$paramWeb['index'] = ['items_tst_catchments_ie', 'items_stg_catchments_ie', 'items_www_catchments_ie'];
$paramWeb['type']  = "crawlitems";
$paramWeb['size']  = 1000;

//$param['index'] = "gismetadatatest,epametadatatest,food";
//$param['index']  = "nyc_restaurants";
//$param['index']  = "docs";
//$param['type']  = Constants::ES_TYPE;
//$param['type']  = "doc";
//$param['index'] = Constants::ES_INDEX;

//$paramfileshare['index'] =  ['docs'];
//$paramfileshare['index'] =  ['nyc_restaurants'];
//$paramfileshare['type']  = "doc";
//$paramfileshare['body'] = $json_query_fileshare;
//$paramopendata['index'] = "nyc_restaurants";

//$paramdatadictionary['index'] = "nyc_restaurants";
//$paramdatadictionary['index'] = "nyc_restaurants";

////$searchParams['index'] = $index;
////$searchParams['type']  = $type;

?>