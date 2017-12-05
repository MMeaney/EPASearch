<?php
if (count($resultsSnippetMain) > 0) {
?>


<!-- -------------------- Div Panel For "SNIPPETS" ------------------- -->



<?php
foreach ($resultsSnippetMain as $result) {
	$searchResult = $result['_source'];
	?>

<div class="panel panel-default" id="divPanelSnippet">
<div class="panel-heading" id="divPanelSnippetHeading">


<div class="pull-right" >
<?php
	if (!empty($searchResult['attachment'])) { ?>

	<img class= "imgSnippetLogoTopRight" alt="Embedded Image" src="data:image/png;base64,<?php echo $searchResult['attachment'] ?>" />

	<?php
	} // END check if empty
?>

<?php
	if ($searchResult['meta']['raw']['description'] == "Phytoplankton") { ?>

	<img class= "imgSnippetLogoTopRight" alt="Embedded Image" src="http://oceanservice.noaa.gov/facts/phytoplankton.jpg" />

	<?php
	} // END check if empty
?>

<?php
	if ($searchResult['meta']['raw']['description'] == "WFD Module") { ?>

	<img class= "imgSnippetLogoTopRight" alt="Embedded Image" src="https://wfd.edenireland.ie/Content/css/images/eden-logo-local.png" />

	<?php
	} // END check if empty
?>


</div><!-- ./pull-right -->


<?php
	if (!empty($searchResult['meta']['raw']['description'])) { ?>
	<span id="spanSnippetTitle">
	<?php echo $searchResult['meta']['raw']['description'];	?>
	</span><br />
	<?php
	} // END check if empty
?>

<?php
	if (!empty($searchResult['meta']['raw']['Copyright'])) { ?>
	<span id="spanSnippetSubDescription">
	<?php echo $searchResult['meta']['raw']['Copyright']; ?></span>
	<?php
	} // END check if empty
?>

</div><!-- ./panel-heading -->

<div class="panel-body" id="divPanelSnippetBody">


<?php
	if (!empty($searchResult['meta']['raw']['User Comment'])) { ?>
	<span id="spanSnippetBodyText">
	<?php
	echo $searchResult['meta']['raw']['User Comment'];
	?></span><br /><br />
	<?php
	} // END check if empty
?>

<table>
<tbody>

<?php
	if (!empty($searchResult['meta']['raw']['Model'])) { ?>
		<tr><td><span id="spanSnippetBodyTitle">Link: </span></td>
		<td id="tdTableSnippet"><span id="spanSnippetBodyText">
		<a href="<?php echo $searchResult['meta']['raw']['Model']; ?>" target="_blank"><?php echo $searchResult['meta']['raw']['Model']; ?></a>
		</span></td></tr>
	<?php
	} // END check if empty
?>

<?php
	if (!empty($searchResult['meta']['raw']['Make'])) { ?>
		<tr><td><span id="spanSnippetBodyTitle">Test: </span></td>
		<td id="tdTableSnippet"><span id="spanSnippetBodyText">
		<a href="<?php echo $searchResult['meta']['raw']['Model']; ?>" target="_blank"><?php echo $searchResult['meta']['raw']['Make']; ?></a>
		</span></td></tr>
	<?php
	} // END check if empty
?>

<?php
	if (!empty($searchResult['meta']['raw']['Artist'])) { ?>
		<tr><td><span id="spanSnippetBodyTitle">Staging: </span></td>
		<td id="tdTableSnippet"><span id="spanSnippetBodyText">
		<a href="<?php echo $searchResult['meta']['raw']['Model']; ?>" target="_blank"><?php echo $searchResult['meta']['raw']['Artist']; ?></a>
		</span></td></tr>
	<?php
	} // END check if empty
?>

</tbody>
</table>

</div><!-- ./panel-body (#divPanelSnippetBody) -->


<!--<hr style="margin-bottom:7px !important; margin-top:7px !important; " />-->

<div class="panel-footer" id="divPanelSnippetFooter">

<table>
<tbody>

<?php
	if (!empty($searchResult['meta']['raw']['Object Name'])) { ?>
		<tr><td><span id="spanSnippetBodyTitle">Contact: </span></td>
		<td id="tdTableSnippet"><span id="spanSnippetBodyText">
		<a href="<?php echo $searchResult['meta']['raw']['Object Name']; ?>" target="_blank"><?php echo $searchResult['meta']['raw']['Object Name']; ?></a>
		</span></td></tr>
	<?php
	} // END check if empty
?>

<?php
	if (!empty($searchResult['meta']['raw']['Source'])) { ?>
		<tr><td><span id="spanSnippetBodyTitle">Help: </span></td>
		<td id="tdTableSnippet"><span id="spanSnippetBodyText">
		<a href="<?php echo $searchResult['meta']['raw']['Headline']; ?>" target="_blank"><?php echo $searchResult['meta']['raw']['Source']; ?></a>
		</span></td></tr>
	<?php
	} // END check if empty
?>

<?php
	if (!empty($searchResult['meta']['raw']['Headline'])) { ?>
		<tr><td><span id="spanSnippetBodyTitle">Email: </span></td>
		<td id="tdTableSnippet"><span id="spanSnippetBodyText">
		<a href="mailto:<?php echo $searchResult['meta']['raw']['Headline']; ?>" target="_blank"><?php echo $searchResult['meta']['raw']['Headline']; ?></a>
		</span></td></tr>
	<?php
	} // END check if empty
?>


</tbody>
</table>


</div><!-- ./panel-footer -->


</div><!-- ./panel divPanelSnippet -->

<!-- -------------------- ./Div Panel For "SNIPPETS" ----------------- -->


<?php
	} // END foreach loop over results
?>

<?php
} // END if there are search results
?>
