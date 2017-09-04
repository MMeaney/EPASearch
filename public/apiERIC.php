<?php
/*
 error_reporting(0);
 
 header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
 header("Cache-Control: post-check=0, pre-check=0", false);
 header("Pragma: no-cache");
 //*/

require __DIR__ . '/../vendor/autoload.php';

//use RecipeSearch\Constants;
use Elasticsearch\Common\Exceptions\Missing404Exception;

// Connect to Elasticsearch (1-node cluster)
$esPort = getenv('APP_ES_PORT') ?: 9200;
$client = new Elasticsearch\Client([
		'hosts' => [ 'localhost:' . $esPort ]
]);

// Try to get result from Elasticsearch
try {
	$searchResult = $client->get([
			'index' => "eric",
			'type'  => "measurements",
			'_source' => "['locationcode', 'locationname']"
	]);
	$searchResult = $searchResult['_source'];
} catch (Missing404Exception $e) {
	$message = 'Requested record not found';
}
?>
<html>
<?php 
 echo $searchResult['locationcode']; 
 ?>
 </html>