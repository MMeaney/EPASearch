<div id="divPanelSnippetWordpress">Wordpress
<br />

<!-- Wordpress API Query -->


<script type="text/javascript">
/**
 * Javascript Wordpress API
 * Maurice Meaney
 * 2017-11-28
 */

var q = "<?php echo $_REQUEST['q']; ?>";

var wpPagesContainer = document.getElementById("divPanelSnippetWordpress");

var wpRequest = new XMLHttpRequest();
wpRequest.open('GET', 'http://maurice-vm.epa.ie/wordpress/wp-json/wp/v2/search/' + q + '?per_page=1');
wpRequest.onload = function() {
  if (wpRequest.status >= 200 && wpRequest.status < 400) {
    var data = JSON.parse(wpRequest.responseText);
        createHTML(data);
        console.log(data);
  }
  else {
        console.log("Connection to server succeeded, but it returned an error.");
  }
};

wpRequest.onerror = function() {
  console.log("Connection error");
};

wpRequest.send();

function createHTML(postsData) {
  var wpHTMLString = '';
  for (i = 0; i < postsData.length; i++) {
    wpHTMLString += '<h2>' + postsData[i].title.rendered + '</h2>';
    wpHTMLString += postsData[i].excerpt.rendered;// + '<br />';
    //wpHTMLString += postsData[i].featured_image + '<br />';
    //wpHTMLString += postsData[i].better_featured_image.id + '<br />';
    //wpHTMLString += '<img src="' + postsData[i].better_featured_image.source_url + '">';
    if (postsData[i].featured_image > 0) {
      wpHTMLString += postsData[i].better_featured_image.id + '<br />';
      wpHTMLString += '<img src="' + postsData[i].better_featured_image.source_url + '">';
    }
    else {
      console.log("No image");
    }

    wpHTMLString += '<a href="' + postsData[i].link + '" target="_blank">' + postsData[i].link + '</a><br /><br />';
    //wpHTMLString += postsData[i].content.rendered;
  }
  wpPagesContainer.innerHTML = wpHTMLString;
}
</script>

</div>