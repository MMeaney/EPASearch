<!-- ---------------------- Div For "SNIPPETS - jQuery Wikipedia API" ----------------- -->

<div class="panel panel-default" id="divPanelSnippet">
<div class="panel-heading" id="divPanelSnippetHeadingWiki">
	<div class="pull-right" id="divPanelSnippetHeadingPullRightWiki"></div><!-- ./pull-right -->
</div><!-- ./panel-heading -->

<div class="panel-body" id="divPanelSnippetBodyWiki">
	<span id="spanPanelSnippetBodyTextWiki"></span>
</div><!-- ./panel-body (#divPanelSnippetBodyWiki) -->

<div class="panel-footer" id="divPanelSnippetFooterWiki"></div><!-- ./panel-footer -->

</div><!-- ./panel divPanelSnippetWiki -->


<div id="divSnippetMoreResultsWikiTitle">
	<button type="button" id="btnSnippetMoreResultsWikiHide" class="btn btn-info btn-xs">- Hide</button>
	<button type="button" id="btnSnippetMoreResultsWikiShow" class="btn btn-info btn-xs">+ Show</button>
	<br />
</div>

<div id="divSnippetMoreResultsWiki"></div>
<div id="divSnippetMoreImagesWiki"></div>

<!-- ------------------- ./ Div For "SNIPPETS - jQuery Wikipedia API" ----------------- -->


<!-- Wikipedia API jQuery -->

<script type="text/javascript">// <![CDATA[

var q = "<?php echo $_REQUEST['q']; ?>";



$.getJSON("http://en.wikipedia.org/w/api.php?action=query&format=json&callback=?", {
    titles: q,
    prop: "pageimages",
    pithumbsize: 150
  },
  function(data) {
    var source = "";
    var imageUrl = GetAttributeValue(data.query.pages);
    if (imageUrl == "") {
      $("#divPanelSnippetFooterWiki").append("<div>No image found</div>");
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



$.getJSON("http://en.wikipedia.org/w/api.php?callback=?",
{
	srsearch: q,
	action: "query",
	list: "search",
	format: "json"
},
	function(data) {
	$("#divSnippetMoreResultsWiki").empty();
	$("#divSnippetMoreResultsWikiTitle").append("<br /><i>More Wikipedia results for <b>" + q + "</b></i>:  ");
	$.each(data.query.search, function(i,item)
	{
		$("#divSnippetMoreResultsWiki").append('<br /><div id="divSnippetMoreResultsWikiItem"><a target= "_blank" href="http://en.wikipedia.org/wiki/' + encodeURIComponent(item.title) + '">' + item.title + '</a><br />' + item.snippet + '</div><!-- ./divSnippetMoreResultsWikiItem -->');
	});
});



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
	url:'https://en.wikipedia.org/w/api.php',
	data: {
		format: 'json',
		action: 'query',
		generator: 'search',
		gsrnamespace: 0,
		gsrlimit: 1,
		prop: 'pageimages|extracts',
		pilimit: 'max',
		exintro: '',
		explaintext: '',
		exsentences: 5,
		exlimit: 'max',
		gsrsearch: q//searchTerm,
	},
	dataType: 'JSONP',
	success: function(res) {
		console.log(res.query.pages)

    	$('#divPanelSnippetHeadingWiki').empty()

		for (var id in res.query.pages) {
		var article = res.query.pages[id];
			$('#divPanelSnippetHeadingWiki').append('<a target="_blank" href="http://en.wikipedia.org/?curid=' + article.pageid + '">' + article.title + '</a>');
			$("#spanPanelSnippetBodyTextWiki").append( article.extract );
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

 	$.get('https://en.wikipedia.org/w/api.php?action=parse&format=json&prop=text&section=0&page=' + q + '&callback=?',

 	function (response) {
 		var m;
 		var urls = [];
 		var regex = /<img.*?src=\\"(.*?)\\"/gmi;

 		while (m = regex.exec(response)) {
 			urls.push(m[1]);
 		}

 		urls.forEach(function (url) {
 			$("#divSnippetMoreImagesWiki").append('<img src="' + window.location.protocol + url + '"><br /><br />');
 		});
 	});
 }

 imageWp();

 //*/


 /* Show-Hide-Expand Refine by FILETYPE */



$(document).ready(function(){
    //if (aggContentTypeCountJS < numResultsForDivHeight){
    //    $("#divRefineFileshareFileType").css('height','auto');
    	//$("#divSnippetMoreResultsWiki").css('overflow-y','hidden');
    	$("#divSnippetMoreResultsWiki").css('display','none');
    	$("#divSnippetMoreImagesWiki").css('display','none');

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

        $(this).css('display','none');
        $("#btnSnippetMoreResultsWikiShow").css('display','inline-flex');
    });
});

$(document).ready(function(){
    $("#btnSnippetMoreResultsWikiShow").click(function(){
        $("#divSnippetMoreResultsWiki").css('display','inline');
        $("#divSnippetMoreImagesWiki").css('display','inline');
        $(this).css('display','none');
        $("#btnSnippetMoreResultsWikiHide").css('display','inline-flex');
    });
});




</script>




