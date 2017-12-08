<?php
///*
error_reporting(0);

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
//*/

require __DIR__ . '/../vendor/autoload.php';
//use Search\Constants;

// Get search results from Elasticsearch if the user searched for something
$results = [];

if (!empty($_REQUEST['submitted'])) {

	include __DIR__ . "/defineClient.php";
	include __DIR__ . "/defineIndex.php";
	include __DIR__ . "/defineQuery.php";
	include __DIR__ . "/definePagination.php";

}

$searchText = $_REQUEST['q'];

$paramSize = $param['size'];
$paramFrom = $param['from'];
$paramLimit = $paramFrom * $pageNum;

include("layout/head.php");
include("layout/headFonts.php");
//include("layout/headAUIMin.php");
//include("layout/headAUIExperimental.php");
include("layout/headDataTables.php");
//include("layout/headScripts.php");  // Moved to End of Page
?>

<title>EPA Data Catalogue Search <?php echo $searchText; ?></title>
</head>

<body>
<div class="wrapper">

<?php
include __DIR__ . "/searchNavSearchBar.php";
?>

<div class="container">
<nav class="navbar navbar-default" role="navigation">
<ul class="nav nav-pills" role="tablist">

<!--
<li class="active"><a data-toggle="tab" href="#searchMain"
All
<span class="badge">

<?php /*echo $resultsCountMainTest;*/ ?></span></a>
</li>
 -->


<li><a data-toggle="pill" href="#searchMainTest">
Main
<?php if($resultscount > 0){ ?>
<span class="badge"><?php echo $resultscount; ?></span>
<?php } ?>
</a>
</li>

<li><a data-toggle="pill" href="#searchFileshare">
Network Files
<?php if($resultscountfileshare > 0){ ?>
<span class="badge"><?php echo $resultscountfileshare; ?></span>
<?php } ?>
</a>
</li>

<li><a data-toggle="pill" href="#searchEPAWeb">
EPA.ie
<?php if($resultsCountEPAWeb > 0){ ?>
<span class="badge"><?php echo $resultsCountEPAWeb; ?></span>
<?php } ?>
</a>
</li>

<li><a data-toggle="pill" href="#searchPeople">
People
<?php if($resultsCountPeople > 0){ ?>
<span class="badge"><?php echo $resultsCountPeople; ?></span>
<?php } ?>
</a>
</li>

<li><a data-toggle="pill" href="#searchOpenData">
Open Data
<?php if($resultscountopendata > 0){ ?>
<span class="badge"><?php echo $resultscountopendata; ?></span>
<?php } ?>
</a>
</li>

<!--
<li><a data-toggle="pill" href="#searchDataDictionary">
Data Dictionaries
<?php /* if($resultscountdatadictionary > 0){ ?>
<span class="badge"><?php echo $resultscountdatadictionary; ?></span>
<?php } */?>
</a>
</li>
 -->

<li><a data-toggle="pill" href="#CRMDataDictionary">
CRM Data Dict
<?php if($resultsCRMDataDictionary > 0){ ?>
<span class="badge"><?php echo $resultsCountCRMDataDictionary; ?></span>
<?php } ?>
</a>
</li>


<!--

<li><a data-toggle="pill" href="#LEAP">
LEAP
<?php /* if($resultsLEAPLicence > 0){ ?>
<span class="badge"><?php echo $resultsCountLEAPLicence; ?></span>
<?php } */?>
</a>
</li>
 -->

<!--
<li><a data-toggle="pill" href="#searchResearch">
Research
<?php /*if($resultsCountResearch>0){ ?>
<span class="badge">
<?php echo $resultsCountResearch; */?></span>
<?php /*} */?>
</a>
</li>

<!--
<li><a href="/searchTest.php"><i class="fa fa-inbox"></i>&nbsp;Test</a></li>
 -->
</ul>
</nav><!-- ./nav-pills -->


<!-----------------------------------------------------------------------------------------------------------
--- *** NAVIGATION TABS ***
------------------------------------------------------------------------------------------------------------>

<div class="tab-content">

<!------------------------------- *** MAIN SEARCH Tab *** ------------------------------->
<!--
<div id="searchMain" class="tab-pane active">

<!-- ************************************************************************************************* -->
<!-- Display MAIN Results PHP File -->
<!-- ************************************************************************************************* -->

<?php
/*
if (isset($_REQUEST['submitted'])) {
  include __DIR__ . "/resultsMainTest.php";
}

*/
?>
<!--
<h4>Query JSON</h4>
<pre><code class="language-json">
<?php
//$json_query_main_print = json_decode($param['body']);
//echo json_encode($json_query_main_print, JSON_PRETTY_PRINT);
/*
echo json_encode($paramMainTest['body'], JSON_PRETTY_PRINT);
*/
?>
</code></pre>
 -->
 <!--
</div>
 -->
<!-- /.searchMainTest -->



<!------------------------------- *** MAIN SEARCH TEST Tab *** -------------------------->

<!-- <div id="searchMainTest" class="tab-pane"> -->
<div id="searchMainTest" class="tab-pane active">

<!-- ************************************************************************************************* -->
<!-- Display MAIN TEST Results PHP File -->
<!-- ************************************************************************************************* -->


<div class="divFlexLeftRight">

<div class="divLeftFlex">

<?php

if (isset($_REQUEST['submitted'])) {
  include __DIR__ . "/resultsMain.php";
}

?>
</div><!-- ./divLeftFlex -->

<div class="divRightSnippet">

<?php

if (isset($_REQUEST['submitted'])) {
	include __DIR__ . "/snippetsMain.php";
}
?>

</div><!-- ./divRightSnippet -->

</div><!-- ./divFlexLeftRight -->


<h4>Query JSON</h4>
<pre><code class="language-json">
<?php
//$json_query_main_print = json_decode($param['body']);
//echo json_encode($json_query_main_print, JSON_PRETTY_PRINT);

echo json_encode($param['body'], JSON_PRETTY_PRINT);
?>
</code></pre>

</div><!-- /.searchMain -->



<!-- ************************************************************************************************* -->
<!-- NETWORK FILES Tab -->
<!-- ************************************************************************************************* -->

<div id="searchFileshare" class="tab-pane">
	<div id="wrapper">
		<div class="divcontainleftright">
			<div id="sidebar-wrapper">

				<?php
				if (isset($_REQUEST['submitted'])) {
				  include __DIR__ . "/refineFileshare.php";
				}
				?>

			</div><!-- /#sidebar-wrapper -->

			<div id="page-content-wrapper">
				<?php
				if (isset($_REQUEST['submitted'])) {
				  include __DIR__ . "/resultsFileshare.php";
				}
				?>
			</div><!-- /#page-content-wrapper -->
		</div><!-- ./divcontainleftright -->
	</div><!-- /#wrapper -->

	<!-- Menu Toggle Script -->
	<script>
	$("#menu-toggle").click(function(e) {
		e.preventDefault();
		$("#wrapper").toggleClass("toggled", 10000);
	});
	</script>

</div><!-- ./searchFileshare -->


<!-- ************************************************************************************************* -->
<!-- EPA WEB Tab -->
<!-- ************************************************************************************************* -->

<div id="searchEPAWeb" class="tab-pane">

<?php

if (isset($_REQUEST['submitted'])) {
  include __DIR__ . "/resultsEPAWeb.php";
}

?>
</div><!-- ./searchEPAWeb -->

<!-- ************************************************************************************************* -->
<!--  PEOPLE Tab -->
<!-- ************************************************************************************************* -->

<div id="searchPeople" class="tab-pane">

<?php
if (isset($_REQUEST['submitted'])) {
  include __DIR__ . "/resultsPeople.php";
}
?>

</div><!-- ./searchPeople -->


<!-- ************************************************************************************************* -->
<!-- RESEARCH Tab -->
<!-- ************************************************************************************************* -->

<!--
<div id="searchResearch" class="tab-pane">
 -->

<?php
/*
if (isset($_REQUEST['submitted'])) {
  include __DIR__ . "/resultsResearch.php";
}
//*/
?>
<!--
</div>
 -->
<!-- ./searchResearch -->

<!-- ************************************************************************************************* -->
<!-- LEAP Tab -->
<!-- ************************************************************************************************* -->

<!--
<div id="LEAP" class="tab-pane">
 -->


<?php
/*
if (isset($_REQUEST['submitted'])) {
  include __DIR__ . "/leapMainCat.php";
}
*/
?>
<!--
</div>
-->
<!-- ./LEAP -->

<!-- ************************************************************************************************* -->
<!-- OPEN DATA Tab -->
<!-- ************************************************************************************************* -->

<?php
///*
if (isset($_REQUEST['submitted'])) {
  include __DIR__ . "/resultsOpenData.php";
}
//*/
?>

<!-- ************************************************************************************************* -->
<!-- CRM DATA DICTIONARY -->
<!-- ************************************************************************************************* -->

<?php

if (isset($_REQUEST['submitted'])) {
  include __DIR__ . "/resultsCRMDataDictionary.php";
}

?>

<!--
<div id="searchDataDictionary" class="tab-pane">

<br />
<span><a href="/advancedDataDictionary.php">Advanced Search</a></span>
<br />
<br />

<?php
/*
if (count($resultsdatadictionary) > 0) {


?>
<table class="table table-hover table-striped table-responsive">
<thead>
<tr>
	<th>Database</th>
	<th>Table</th>
	<th>Column</th>
	<th>Column Description</th>
	<th>Data Type</th>
	<th>Size</th>
	<th>System</th>
	<th>Server</th>
</tr>
</thead>
<?php
	foreach ($resultsdatadictionary as $result) {
		$searchresult = $result['_source'];
?>
<tr>
	<td><a href="/viewdatadictionary.php?id=<?php echo $result['_id']; ?>">
		<?php echo $searchresult['databasename']; ?></a></td>
	<td><?php echo $searchresult['title']; ?></td>
	<td><?php echo $searchresult['columnname']; ?></td>
	<td><?php echo $searchresult['description']; ?></td>
	<td><?php echo $searchresult['datatype']; ?></td>
	<td><?php echo $searchresult['size']; ?></td>
	<td><?php echo $searchresult['system']; ?></td>
	<td><?php echo $searchresult['servername']; ?></td>
</tr>
<?php
	} // END foreach loop over results
?>
</table>
<?php
} // END if there are search results
else {
?>
	<div class="well">Sorry, nothing found</div><!-- ./well -->
<?php
} */// END elseif there are no search results
?>
<!--</div><!-- /.searchDataDictionary -->


</div><!-- ./tab-content -->


</div><!-- ./container -->

<?php
include("layout/footer.php");
?>