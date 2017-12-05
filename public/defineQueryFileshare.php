<?php

/////////////////////////////////////////////////
// Define NETWORK FILES query only
/*
$paramfileshare['body'] = [
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

*/

/*
$paramfileshare['body'] = [
  'query' => [
    'multi_match' => [
      'query' => $_REQUEST['q'],
      'from' =>  0,
      'type' => 'cross_fields', // Possible values 'best_fields', 'most_fields', 'phrase', 'prase_prefix', 'cross_fields'
      'fields' => ['file.filename^9', 'meta.author^8', 'file.url^7', 'content^6', 'file.content_type^5', 'meta.raw.Application-Name^4'],
      'operator' => 'or'
        //, 'fuzziness' => '1'
        //, 'prefix_length' => 2
    ]
  ]
];
*/

// First, setup full text search bits

/*


  'from' => 10,
  'size' => 10,

 */

$fullTextClauses = [];
//$fullTextClauses = [];
$fullTextClauses[] =
[
  'query' => [
    'query_string' => [
      'query' => $_REQUEST['q'],
      'default_operator' => 'AND',
      'fields' => [
        'file.filename^99'
        , 'file.url^50'
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
  ]
  //,
  //'highlight' => [
  //  'fields' => [
  //        '*' => new \stdClass()
  //  ]
  //]
];



/*
 [
 'bool' => [
 'should' => [
 'match' => [
 '_all' => [
 'query' => $_REQUEST['q']
 //, 'fuzziness' => '1'
 //, 'prefix_length' =>  1
 ]
 ]
 ]
 ]

 ];
 //*/



/*
  ['multi_match' => [
    'query' => $_REQUEST['q'],
    'type' => 'cross_fields', // Possible values 'best_fields', 'most_fields', 'phrase', 'prase_prefix', 'cross_fields'
    'fields' => [ 'file.filename^2'
          , 'meta.author'
          , 'file.url'
          , 'content'
          , 'path.real'
          , 'file.content_type'
          , 'meta.raw.Application-Name'

    ],
    //'fuzziness' => '1',
    //'prefix_length' => 2,
    'operator' => 'or'
        //, 'fuzziness' => '1'
        //, 'prefix_length' => 2
    ]
  ];

*/

/*
    if ($_REQUEST['title']) {
      $fullTextClauses[] = [ 'match' => [ 'title' => $_REQUEST['title'] ] ];
    }

    if ($_REQUEST['description']) {
      $fullTextClauses[] = [ 'match' => [ 'description' => $_REQUEST['description'] ] ];
    }

    if ($_REQUEST['ingredients']) {
      $fullTextClauses[] = [ 'match' => [ 'ingredients' => $_REQUEST['ingredients'] ] ];
    }

    if ($_REQUEST['directions']) {
      $fullTextClauses[] = [ 'match' => [ 'directions' => $_REQUEST['directions'] ] ];
    }

    if ($_REQUEST['tags']) {
      $tags = Util::recipeTagsToArray($_REQUEST['tags']);
      $fullTextClauses[] = [ 'terms' => [
        'tags' => $tags,
        'minimum_should_match' => count($tags)
      ] ];
    }
*/

    if (count($fullTextClauses) > 0) {
      $query = [ 'bool' => [ 'must' => $fullTextClauses ] ];
      //$query = [ 'query' => $fullTextClauses ];
    } else {
      $query = [ 'match_all' => (object) [] ];
    }

    // Then setup exact match bits
    $filterClauses = [];
/*
    if ($_REQUEST['prep_time_min_low'] || $_REQUEST['prep_time_min_high']) {
      $rangeFilter = [];
      if ($_REQUEST['prep_time_min_low']) {
        $rangeFilter['gte'] = (int) $_REQUEST['prep_time_min_low'];
      }
      if ($_REQUEST['prep_time_min_high']) {
        $rangeFilter['lte'] = (int) $_REQUEST['prep_time_min_high'];
      }
      $filterClauses[] = [ 'range' => [ 'prep_time_min' => $rangeFilter ] ];
    }
*/
    if ($_REQUEST['FileSizeLow'] || $_REQUEST['FileSizeHigh']) {
      $rangeFilter = [];
      if ($_REQUEST['FileSizeLow']) {
        $rangeFilter['gte'] = (int) $_REQUEST['FileSizeLow'];
      }
      if ($_REQUEST['FileSizeHigh']) {
        $rangeFilter['lte'] = (int) $_REQUEST['FileSizeHigh'];
      }
      $filterClauses[] = [ 'range' => [ 'file.filesize' => $rangeFilter ] ];
    }

    if ($_REQUEST['FileCreateFrom'] || $_REQUEST['FileCreateTo']) {
      $rangeFilter = [];
      if ($_REQUEST['FileCreateFrom']) {
        $rangeFilter['gte'] = $_REQUEST['FileCreateFrom'];
      }
      if ($_REQUEST['FileCreateTo']) {
        $rangeFilter['lte'] = $_REQUEST['FileCreateTo'];
      }
      $filterClauses[] = [ 'range' => [ 'meta.raw.meta:creation-date' => $rangeFilter ] ];
    }

    /*
    //if ($_REQUEST['Relevant']) {
    //$filterClauses[] = [ 'term' => [ 'meta.author.raw' => $_REQUEST['Author'] ] ];
    //}
    if(!empty($_REQUEST['inputRelevantDocument'])) {
      foreach($_REQUEST['inputRelevantDocument'] as $mltRelevantDocument) {
        $filterClauses[] = [
          'more_like_this' => [
            'fields' => [
              'content',
              'meta.author',
              'file.content_type'
            ]
          ],
          'like' => [
            '_id' => $mltRelevantDocument
          ]
        ];
        //echo $check; //echoes the value set in the HTML form for each checked checkbox.
        //so, if I were to check 1, 3, and 5 it would echo value 1, value 3, value 5.
        //in your case, it would echo whatever $row['Report ID'] is equivalent to.
      }
    }
//*/
    if ($_REQUEST['From']) {
    $fromPagination = [ 'From' => $_REQUEST['From'] ];
    }

    if ($_REQUEST['Author']) {
      $filterClauses[] = [ 'term' => [ 'meta.author.raw' => $_REQUEST['Author'] ] ];
    }

    if ($_REQUEST['Application']) {
      $filterClauses[] = [ 'term' => [ 'meta.raw.Application-Name.raw' => $_REQUEST['Application'] ] ];
    }

    if ($_REQUEST['FileType']) {
      //$filterClauses[] = [ 'term' => [ 'file.filename' => $_REQUEST['FileType'] ] ];
      $filterClauses[] = [ 'term' => [ 'file.content_type.raw' => $_REQUEST['FileType'] ] ];
    }

    if (count($filterClauses) > 0) {
      $filter = [ 'bool' => [ 'must' => $filterClauses ] ];
    }

    // Build complete search request body
    if (count($filterClauses) > 0) {
      $paramfileshare['body'] =
      [ 'query' =>
        [ 'filtered' =>
        //[ 'bool' => [ 'must' =>
          [ 'query' => $query, 'filter' => $filter ]
        ]
        //]
      ];
    } else {
      $paramfileshare['body'] = [ 'query' => $query ];
    }




/*
$json_query_fileshare = '
{
  "query": {
    "multi_match": {
      "query": "'.$_REQUEST['q'].'",
      "fields": ["file.filename", "file.url"],
      "type": "best_fields"
    }
  },

  "aggs": {
    "agg_author": {
      "terms": {
        "field": "meta.author",
        "size": 0
      }
    }
  },
  "highlight": {
    "fields": {
      "_all": {}
    }
  }
}';
//*/


////get the search query
////$query = $_REQUEST['q'];

////get filter of agg/facet
$aggFilterValue = $_GET['agg'];
$aggFilterField = $_GET['agg_field'];


////$paramfileshare['body']['query']['filtered']['query']['match']['title'] = $query;

if ($aggFilterValue) {
  $paramfileshare['body']['query']['filtered']['filter']['term'][$aggFilterField] = $aggFilterValue;
}



$paramfileshare['body']['aggregations']['aggAuthor']['terms']['field'] = "meta.author.raw";
$paramfileshare['body']['aggregations']['aggAuthor']['terms']['size'] = 0;
$paramfileshare['body']['aggregations']['aggAuthor']['terms']['missing'] = "(Blank)";
//$paramfileshare['body']['aggregations']['aggAuthor']['terms']['order']['_term'] = "asc";
//$paramfileshare['body']['aggregations']['aggAuthor']['terms']['min_doc_count'] = 0;


$paramfileshare['body']['aggregations']['aggApplication']['terms']['field'] = "meta.raw.Application-Name.raw";
$paramfileshare['body']['aggregations']['aggApplication']['terms']['size'] = 0;
$paramfileshare['body']['aggregations']['aggApplication']['terms']['missing'] = "(Blank)";
//$paramfileshare['body']['aggregations']['aggApplication']['terms']['order']['_term'] = "asc";


/*
//$paramfileshare['body']['aggregations']['aggFileType']['terms']['field'] = "file.filename";
$paramfileshare['body']['aggregations']['aggFileType']['terms']['script'] = "doc['file.filename'].getValue().substring(0,3)";
$paramfileshare['body']['aggregations']['aggFileType']['terms']['size'] = 0;
//$paramfileshare['body']['aggregations']['aggFileType']['terms']['order']['_count'] = "asc";
//$paramfileshare['body']['aggregations']['aggFileType']['terms']['script'] = "doc['file.filename'].getValue().substring(0, lastIndexOf('.'))";
*/

//"script": "doc['my_field'].getValue().substring(0,6)",
//$filetype = substr($filetypestring, strrpos($filetypestring, ".") + 1);
//names.substring(0, lastIndexOf('.'))


$paramfileshare['body']['aggregations']['aggContentType']['terms']['field'] = "file.content_type.raw";
$paramfileshare['body']['aggregations']['aggContentType']['terms']['size'] = 0;
$paramfileshare['body']['aggregations']['aggContentType']['terms']['missing'] = "";
//$paramfileshare['body']['aggregations']['aggContentType']['terms']['order']['_term'] = "asc";



$resultfileshare = $client->search($paramfileshare);
$resultsfileshare = $resultfileshare['hits']['hits'];
$resultscountfileshare = $resultfileshare['hits']['total'];
$aggsfileshareauthor = $resultfileshare['aggs']['aggAuthor'];
$aggsFileShareFileType = $resultfileshare['aggs']['aggFileType'];
$aggsFileShareContentType = $resultfileshare['aggs']['aggContentType'];

////get filter of agg/facet
$aggFilterValue = $_GET['agg'];
$aggFilterField = $_GET['agg_field'];

$aggAuthor    = $resultfileshare['aggregations']['aggAuthor']['buckets'];
$aggFileType  = $resultfileshare['aggregations']['aggFileType']['buckets'];
$aggContentType = $resultfileshare['aggregations']['aggContentType']['buckets'];
$aggApplication = $resultfileshare['aggregations']['aggApplication']['buckets'];


$aggAuthorCount    = count($aggAuthor);
$aggFileTypeCount    = count($aggFileType);
$aggContentTypeCount = count($aggContentType);
$aggApplicationCount = count($aggApplication);

//$numresultsfileshare = (count($resultsfileshare));

?>