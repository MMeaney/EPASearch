<?php /*
if (count($resultsLEAPLicence) > 0) { //*/
?>

<div class="loading">
    <img src=".\img\Loading_icon.gif" class="ajax-loader">
    <!-- <div>Loading</div> -->
</div>

<!-- <nav class="collapse navbar-collapse navbarCollapse" role="navigation"> -->
<nav class="navbar navbar-default" role="navigation" id="navUL">
<ul class="nav nav-pills" role="tablist">

<!--
<li class="active" style="width:0px; "><a data-toggle="tab" href="#Dummy"></a>
</li>
 -->

<li class="active">
	<a href="#LEAPLicence"
		data-toggle="pill"
		data-tab-history="true"
		data-tab-history-changer="push"
		data-tab-history-update-url="true"
		>
Licences
<?php if($resultsLEAPLicence > 0){ ?>
<span class="badge"><?php echo $resultsCountLEAPLicence; ?></span>
<?php } ?>
</a>
</li>

<li>
	<a href="#LEAPComplaint"
		data-toggle="pill"
		data-tab-history="true"
		data-tab-history-changer="push"
		data-tab-history-update-url="true"
		>
Complaints
<?php if($resultsLEAPComplaint > 0){ ?>
<span class="badge"><?php echo $resultsCountLEAPComplaint; ?></span>
<?php } ?>
</a>
</li>

<li>
	<a href="#LEAPNonCompliance"
		data-toggle="pill"
		data-tab-history="true"
		data-tab-history-changer="push"
		data-tab-history-update-url="true"
		>
Non-Compliance
<?php if($resultsLEAPNonCompliance > 0){ ?>
<span class="badge"><?php echo $resultsCountLEAPNonCompliance; ?></span>
<?php } ?>
</a>
</li>

<li>
	<a href="#LEAPComplianceInvestigation"
		data-toggle="pill"
		data-tab-history="true"
		data-tab-history-changer="push"
		data-tab-history-update-url="true"
		>
Compliance Investigation
<?php if($resultsLEAPComplianceInvestigation > 0){ ?>
<span class="badge"><?php echo $resultsCountLEAPComplianceInvestigation; ?></span>
<?php } ?>
</a>
</li>

<li>
	<a href="#LEAPDocuments"
		data-toggle="pill"
		data-tab-history="true"
		data-tab-history-changer="push"
		data-tab-history-update-url="true"
		>
SharePoint
<?php if($resultsLEAPSharepointDocuments > 0){ ?>
<span class="badge"><?php echo $resultsCountLEAPSharepointDocuments; ?></span>
<?php } ?>
</a>
</li>


<li>
	<a href="#PRTRMeasurements"
		data-toggle="pill"
		data-tab-history="true"
		data-tab-history-changer="push"
		data-tab-history-update-url="true"
		>

PRTR Meas
<?php if($resultsPRTRMeasurements > 0){ ?>
<span class="badge"><?php echo $resultsCountPRTRMeasurements; ?></span>
<?php } ?>
</a>
</li>


<!--
<li><a data-toggle="pill" href="#searchFileshare">
Network Files
<?php /* if($resultscountfileshare > 0){ ?>
<span class="badge"><?php echo $resultscountfileshare; ?></span>
<?php } */ ?>
</a>
</li>
 -->

</ul>
</nav><!-- ./nav-pills -->
<?php
/*
} // END elsif there are no search results
//*/
?>

<div class="tab-content">

<!-- ************************************************************************************************* -->
<!-- LEAP LICENCE -->
<!-- ************************************************************************************************* -->

<!--
<div id="Dummy" class="tab-pane active">
</div><!-- ./LEAPLicence -->
<!--
<div id="LEAPLicence" class="tab-pane">
 -->

<div id="LEAPLicence" class="tab-pane active">

<?php

if (isset($_REQUEST['submitted'])) {
  include __DIR__ . "/leapLicence.php";
}

?>
</div><!-- ./LEAPLicence -->

<!-- ************************************************************************************************* -->
<!-- LEAP COMPLAINT -->
<!-- ************************************************************************************************* -->

<div id="LEAPComplaint" class="tab-pane">

<?php

if (isset($_REQUEST['submitted'])) {
  include __DIR__ . "/leapComplaint.php";
}

?>
</div><!-- ./LEAPComplaint -->

<!-- ************************************************************************************************* -->
<!-- LEAP NON-COMPLIANCE -->
<!-- ************************************************************************************************* -->

<div id="LEAPNonCompliance" class="tab-pane">

<?php

if (isset($_REQUEST['submitted'])) {
  include __DIR__ . "/leapNonCompliance.php";
}

?>
</div><!-- ./LEAPNonCompliance -->

<!-- ************************************************************************************************* -->
<!-- LEAP COMPLIANCE INVESTIGATION -->
<!-- ************************************************************************************************* -->

<div id="LEAPComplianceInvestigation" class="tab-pane">

<?php

if (isset($_REQUEST['submitted'])) {
  include __DIR__ . "/leapComplianceInvestigation.php";
}

?>
</div><!-- ./LEAPComplianceInvestigation -->

<!-- ************************************************************************************************* -->
<!-- LEAP SHAREPOINT DOCUMENTS -->
<!-- ************************************************************************************************* -->

<div id="LEAPDocuments" class="tab-pane">

<?php

if (isset($_REQUEST['submitted'])) {
  include __DIR__ . "/leapSharepointDocuments.php";
}

?>
</div><!-- ./LEAPDocuments -->

<!-- ************************************************************************************************* -->
<!-- PRTR MEASURMENTS DOCUMENTS -->
<!-- ************************************************************************************************* -->

<div id="PRTRMeasurements" class="tab-pane">

<?php

if (isset($_REQUEST['submitted'])) {
  include __DIR__ . "/prtrMeasurements.php";
}

?>
</div><!-- ./PRTRMeasurements -->



<!------------------------------- *** NETWORK FILE SHARE Tab *** ------------------------>

<!--
<div id="searchFileshare" class="tab-pane">

<div id="wrapper">

<div class="divcontainleftright">

<div id="sidebar-wrapper">

<?php
/*
if (isset($_REQUEST['submitted'])) {
  include __DIR__ . "/refineFileshare.php";
} */
?>

</div>
-->

<!-- /#sidebar-wrapper -->

<!-- ************************************************************************************************* -->
<!-- Display FILESHARE Results PHP File -->
<!-- ************************************************************************************************* -->
<!--
<div id="page-content-wrapper">

<?php
/*
if (isset($_REQUEST['submitted'])) {
  include __DIR__ . "/resultsFileshare.php";
}
*/
?>

</div>
 -->
<!-- /#page-content-wrapper -->
<!--
</div><!-- ./divcontainleftright -->
<!--
</div><!-- /#wrapper -->

<!-- Menu Toggle Script -->
<script>
//$("#menu-toggle").click(function(e) {
//	e.preventDefault();
//	$("#wrapper").toggleClass("toggled");
//});
</script>
<!--
</div><!-- /.searchFileshare -->

</div><!-- ./tab-content -->

