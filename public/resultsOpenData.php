<div id="searchOpenData" class="tab-pane">
<?php
if (count($resultsopendata) > 0) {
?>
<table class="table table-hover table-striped table-responsive">
<thead>
<tr>
  <th>Title</th>
  <th>Description</th>
  <th>Format</th>
  <th>Type</th>
  <th>Date</th>
</tr>
</thead>
<?php
  foreach ($resultsopendata as $result) {
    $searchresult = $result['_source'];
?>
<tr>
  <td><a href="/viewOpenData.php?id=<?php echo $result['_id']; ?>">
    <?php echo $searchresult['title']; ?>
    <img src="<?php echo $searchresult['identificationInfo']['MD_DataIdentification']['graphicOverview']['MD_BrowseGraphic']['fileName']['CharacterString']; ?>">
    </a>
  </td>
  <td>
    <?php echo $searchresult['description']; ?>
    <?php echo $searchresult['identificationInfo']['MD_DataIdentification']['abstract']['CharacterString']; ?><br />
    <?php echo $searchresult['identificationInfo']['MD_DataIdentification']['purpose']['CharacterString']; ?>
  </td>
  <td>
    <?php echo $searchresult['format']; ?>
    <?php echo $searchresult['distributionInfo']['MD_Distribution']['distributionFormat']['MD_Format']['name']['CharacterString']; ?>
    <?php echo $searchresult['distributionInfo']['MD_Distribution']['distributionFormat']['MD_Format']['version']['CharacterString']; ?>
  </td>
  <td>
    <?php echo $searchresult['type']; ?>
    <?php echo $searchresult['metadataStandardName']['CharacterString']?>
    <?php echo $searchresult['metadataStandardVersion']['CharacterString']?>
  </td>
  <td>
    <?php echo $searchresult['Creation-Date']; ?>
    <?php echo $searchresult['dateStamp']['DateTime']; ?>
  </td>
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
} // END elseif there are no search results
?>
</div><!-- /.searchOpenData -->