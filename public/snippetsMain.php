<!-- 
<div class="loading">
    <img src=".\img\Loading_icon.gif" class="ajax-loader">
    <div>Loading</div>
</div>
 -->

<div id="divSnippetLoad">

<!-- ---------------------- Div For "SNIPPETS - jQuery Wiki API" ----------------- -->

<div class="panel panel-default" id="divPanelSnippet">
<div class="panel-heading" id="divPanelSnippetHeadingWiki">
	<div class="pull-right" id="divPanelSnippetHeadingPullRightWiki"></div><!-- ./pull-right -->
</div><!-- ./panel-heading -->	

<div class="panel-body" id="divPanelSnippetBodyWiki">
	<span id="spanPanelSnippetBodyTextWiki"></span>
</div><!-- ./panel-body (#divPanelSnippetBodyWiki) -->

<div class="panel-footer" id="divPanelSnippetFooterWiki">
</div><!-- ./panel-footer -->

</div><!-- ./panel divPanelSnippetWiki -->




<div id="divSnippetMoreResultsWikiTitle">
	<button type="button" id="btnSnippetMoreResultsWikiShow" class="btn btn-info btn-xs">+ Show more results for&nbsp;<i><b><?php echo $_REQUEST['q']; ?></b></i></button>
	<button type="button" id="btnSnippetMoreResultsWikiHide" class="btn btn-warn btn-xs">- Hide more results for&nbsp;<i><b><?php echo $_REQUEST['q']; ?></b></i></button>
	<br />
</div>


<div id="divSnippetMoreResultsWiki"></div>
<div id="divSnippetMoreImagesWiki"></div>


<!-- ------------------- ./ Div For "SNIPPETS - jQuery Wikipedia API" ----------------- -->


<!-- ********************************************************************************************************** -->




<div id="divPanelSnippetHardCoded">

<!--<hr style="margin-bottom:7px !important; margin-top:7px !important; " />-->

<br />


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

</div><!-- ./divPanelSnippetHardCoded -->

<!-- ********************************************************************************************************** -->
<br />
<div id="result1"></div>

<br />
<div id="result2"></div>

<!-- Wikipedia API jQuery -->

<script type="text/javascript">// <![CDATA[     



var q = "<?php echo $_REQUEST['q']; ?>";
var q2 = "<?php echo $_REQUEST['q']; ?>".toUpperCase();

var url="http://maurice-vm.epa.ie/mediawiki/api.php?action=parse&format=json&page=" + q + "&redirects=1&prop=text&callback=?";
$.getJSON(url,function(data){
  wikiHTML = data.parse.text["*"];
  $wikiDOM = $("<document>"+wikiHTML+"</document>");
  //$("#result1").append($wikiDOM.find('.infobox').html());
  $("#divPanelSnippetFooterWiki").append($wikiDOM.find('.infobox').html());
  $("#divPanelSnippetFooterWiki").append($wikiDOM.find('.image').html());
  $("#divPanelSnippetFooterWiki").append($wikiDOM.find('.email').html());
});



var url="http://maurice-vm.epa.ie/mediawiki/api.php?action=parse&format=json&page=" + q2 + "&redirects=1&prop=text&callback=?";
$.getJSON(url,function(data){
  wikiHTML = data.parse.text["*"];
  $wikiDOM = $("<document>"+wikiHTML+"</document>");
  //$("#result1").append($wikiDOM.find('.infobox').html());
  $("#divPanelSnippetFooterWiki").append($wikiDOM.find('.infobox').html());
  $("#divPanelSnippetFooterWiki").append($wikiDOM.find('.image').html());
  $("#divPanelSnippetFooterWiki").append($wikiDOM.find('.email').html());
});

/*
//var searchTerm="toyota";
var url="http://en.wikipedia.org/w/api.php?action=parse&format=json&page=" + q + "&redirects&prop=text&callback=?";
$.getJSON(url,function(data){
  wikiHTML = data.parse.text["*"];
  $wikiDOM = $("<document>"+wikiHTML+"</document>");
  $("#result2").append($wikiDOM.find('.image').html());
  $("#result2").append($wikiDOM.find('.email').html());
  $("#result2").append($wikiDOM.find('.website').html());
  $("#result2").append($wikiDOM.find('.url').html());
  $("#result2").append($wikiDOM.find('.infobox').html());
});

//*/




$.getJSON("http://maurice-vm.epa.ie/mediawiki/api.php?action=query&format=json&callback=?", {
    titles: q,
    prop: "images",
    //prop: "pageimages",
    pithumbsize: 150
  },
  function(data) {
    var source = "";
    var imageUrl = GetAttributeValue(data.query.pages);
    if (imageUrl == "") {
		//$("#divPanelSnippetFooterWiki").append("<div>No image found</div>");
    	$("#divPanelSnippetFooterWiki").append("");
    } else {
      var img = "<img src=\"" + imageUrl + "\">"
      $("#divPanelSnippetFooterWiki").append('Image: <br /><div id="divSpacer"></div>' + img);
    }
  }
);

 function GetAttributeValue(data) {
  var urli = "";
  for (var key in data) {
    if (data[key].thumbnail != undefined) {
      if (data[key].thumbnail.source != undefined) {
        urli = data[key].thumbnail.source;
        break;
      }
    }
  }
  return urli;
}


/* -- Commented out to hide 'More results' from MediaWiki
$.getJSON("http://maurice-vm.epa.ie/mediawiki/api.php?callback=?",
{
	srsearch: q,
	action: "query",
	list: "search",
	format: "json"
},
	function(data) {
	$("#divSnippetMoreResultsWiki").empty();
	//$("#divSnippetMoreResultsWikiTitle").append("<br /><i>More results for <b>" + q + "</b></i>:  ");
	$.each(data.query.search, function(i,item)
	{
		$("#divSnippetMoreResultsWiki").append('<br /><div id="divSnippetMoreResultsWikiItem"><a target= "_blank" href="http://maurice-vm.epa.ie/mediawiki/index.php/' + encodeURIComponent(item.title) + '">' + item.title + '</a><br />' + item.snippet + '</div><!-- ./divSnippetMoreResultsWikiItem -->');
	});
});
//*/


/*
$.getJSON("http://en.wikipedia.org/w/api.php?callback=?",
{
	srsearch: q,
	action: "query",
	list: "search",
	format: "json"
},
	function(data) {
	$("#divPanelSnippetHeadingWiki").empty();
	$.each(data.query.search, function(i,item)
	{
		$("#divPanelSnippetHeadingWiki").append("<div><a href='http://en.wikipedia.org/wiki/" + encodeURIComponent(item.title) + "'>" + item.title + "</a>");
		$("#divPanelSnippetBodyWiki").append("<br />" + item.extract + "<br />");
	});
});
//*/

//var searchTerm = "Phytoplankton"
var searchResults = []

//function doTheSearch() {
$.ajax({
	url:'http://maurice-vm.epa.ie/mediawiki/api.php',
	data: {
		format: 'json',
		action: 'query',
		generator: 'search',
		gsrnamespace: 0,
		gsrlimit: 1,
		prop: 'images|extracts',
		//prop: 'pageimages|extracts',
		pilimit: 'max',
		exintro: '',
		explaintext: '',
		exsentences: 5,
		exlimit: 'max',
		//redirects: 1,
		gsrsearch: q//searchTerm,
	},
	dataType: 'JSONP',
	success: function(res) {
		console.log(res.query.pages)
    
    	$('#divPanelSnippetHeadingWiki').empty() 
    
		for (var id in res.query.pages) {
			var article = res.query.pages[id];
			//$('#divPanelSnippetHeadingWiki').append('<a target="_blank" href="http://maurice-vm.epa.ie/mediawiki/?curid=' + article.pageid + '">' + article.title + '</a>');
			$('#divPanelSnippetHeadingWiki').append('<a target="_blank" href="http://maurice-vm.epa.ie/mediawiki/index.php/' + article.title + '">' + article.title + '</a>');
			$('#spanPanelSnippetBodyTextWiki').append( article.extract );
			//$('#spanPanelSnippetBodyTextWiki').append( article.images );
			//$("#divPanelSnippetFooterWiki").append('<div id="divSpacer"></div>' + article.images);

			var url2="http://maurice-vm.epa.ie/mediawiki/api.php?action=parse&format=json&page=" + article.title  + "&redirects=1&prop=text&callback=?";
			$.getJSON(url2,function(data){
			  wikiHTM2L = data.parse.text["*"];
			  $wikiDO2M = $("<document>"+wikiHTML2+"</document>");
			  //$("#result1").append($wikiDOM.find('.infobox').html());
			  $("#divPanelSnippetFooterWiki").append($wikiDOM2.find('.infobox').html());
			  $("#divPanelSnippetFooterWiki").append($wikiDOM2.find('.image').html());
			  $("#divPanelSnippetFooterWiki").append($wikiDOM2.find('.email').html());
			});
						



			
		}
	}
})
//}
;


//*/


//]]>


///*

function imageWp() {
 		$.ajaxPrefilter(function (options) {
 		if (options.crossDomain && jQuery.support.cors) {
 			var https = (window.location.protocol === 'http:' ? 'http:' : 'https:');
 			options.url = https + '//cors-anywhere.herokuapp.com/' + options.url;
 		}
 	});

	$.get('http://maurice-vm.epa.ie/mediawiki/api.php?action=parse&format=json&prop=text&section=0&page=' + q + '&callback=?',
	//$.get('https://de.wikipedia.org/w/api.php?action=parse&format=json&prop=text&section=0&page=' + q + '&callback=?',
	//$.get('http://maurice-vm.epa.ie/mediawiki/api.php?action=parse&format=json&prop=images&section=0&page=' + q + '&callback=?',
 	//$.get('https://en.wikipedia.org/w/api.php?action=parse&format=json&prop=text&section=0&page=' + q + '&callback=?',
	//$.get('http://maurice-vm.epa.ie/mediawiki/api.php?action=parse&format=json&prop=text&section=0&page=' + q + '&callback=?',
	//$.get('http://maurice-vm.epa.ie/mediawiki/api.php?action=parse&format=json&prop=images&section=0&page=' + q + '&callback=?',

 	function (response) {
 		var m;
 		var urls = [];
 		//var regex = /img.*?src="(.*?)"/gmi;
 		//var regex = /<img.*?src=\\"(.*?)\\"/gmi;
 		//var regex = /<*?src=\\"(.*?)\\"/gmi;
 		
 		//while (m = regex.exec(response)) {
 	 	while (m = urls.exec(response)) {	
 			urls.push(m[1]);
 		}

 		urls.forEach(function (url) {
 			//$("#divSnippetMoreImagesWiki").append('<img src="' + window.location.protocol + url + '"><br /><br />');
 			//$("#divSnippetMoreImagesWiki").append('<img src="' + url + '"><br /><br />');
 			//$("#divPanelSnippetFooterWiki").append('<img src="' + url + '"><br /><br />');
 			$("#divPanelSnippetFooterWiki").append( url );
 			$("#divPanelSnippetFooterWiki").append('<img src="' + window.location.protocol + url + '"><br />');
 		});
 	});
 }

 imageWp();
 
 //*/


 /* Show-Hide-Expand Refine SNIPPETS */



$(document).ready(function(){
    //if (aggContentTypeCountJS < numResultsForDivHeight){
    //    $("#divRefineFileshareFileType").css('height','auto');
    	//$("#divSnippetMoreResultsWiki").css('overflow-y','hidden'); 
    	$("#divSnippetMoreResultsWiki").css('display','none'); 
    	$("#divSnippetMoreImagesWiki").css('display','none'); 
    	$("#divPanelSnippetHardCoded").css('display','none'); 
    	
    //    $("#btnRefineFileshareFileTypeMore").css('display','none'); 
    //}
    //else {
    //	$("#divSnippetMoreResultsWiki").height(122);
    //}
    //$('#btnRefineFileshareFileTypeLess').css('display','none'); 
    //$('#btnRefineFileshareFileTypeShow').css('display','none'); 



        //if (aggContentTypeCountJS < numResultsForDivHeight){
        //    $("#divRefineFileshareFileType").css('height','auto');
        //	$("#divSnippetMoreResultsWiki").css('overflow-y','hidden'); 
        //    $("#btnRefineFileshareFileTypeMore").css('display','none'); 
        //}
        //else {
        	//$("#divSnippetMoreResultsWiki").height(50);
        //}
        //$('#btnRefineFileshareFileTypeLess').css('display','none'); 
        //$('#btnRefineFileshareFileTypeShow').css('display','none'); 
        	$('#btnSnippetMoreResultsWikiShow').css('display','inline-flex');  
        	$('#btnSnippetMoreResultsWikiHide').css('display','none'); 
});




$(document).ready(function(){
    $("#btnSnippetMoreResultsWikiHide").click(function(){
        $("#divSnippetMoreResultsWiki").css('display','none'); 
        $("#divSnippetMoreImagesWiki").css('display','none'); 
        $("#divPanelSnippetHardCoded").css('display','none');         
        
        $(this).css('display','none');
        $("#btnSnippetMoreResultsWikiShow").css('display','inline-flex'); 
    });
});

$(document).ready(function(){
    $("#btnSnippetMoreResultsWikiShow").click(function(){
        $("#divSnippetMoreResultsWiki").css('display','inline'); 
        $("#divSnippetMoreImagesWiki").css('display','inline'); 
        $("#divPanelSnippetHardCoded").css('display','inline'); 
        
        $(this).css('display','none'); 
        $("#btnSnippetMoreResultsWikiHide").css('display','inline-flex'); 
    });
});

 
</script>


</div><!-- ./divSnippetLoad -->

