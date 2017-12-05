<?php

/////////////////////////////////////////////////
// Define SNIPPETS query only


$paramSnippetMain['index'] = "epasystems";
$paramSnippetMain['type']  = "doc";


$paramSnippetMain['body'] = [
    'query' => [
        'match' => [
            '_all' => $_REQUEST['q']
            //, 'fuzziness' => '1'
            //, 'prefix_length' =>  1
        ]
    ],
    'highlight' => [
        'fields' => [
            '_all' => new \stdClass()
        ]
    ]
];

$resultSnippetMain = $client->search($paramSnippetMain);
$resultsSnippetMain = $resultSnippetMain['hits']['hits'];
$resultsCountSnippetMain = $resultSnippetMain['hits']['total'];


?>