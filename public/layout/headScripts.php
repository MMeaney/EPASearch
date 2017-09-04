

<!-----------------------------------------------------------------------------------------------------------
--- *** SCRIPTS *** 
------------------------------------------------------------------------------------------------------------>

<!-- Search Box Autocomplete (powered by Mediawiki) -->

<script type="text/javascript">
 $("#inputSearchString").autocomplete({ 
	source: function(request, response) { 
		$.ajax({ 
			url: "http://maurice-vm.epa.ie/mediawiki/api.php", 
			//url: "http://en.wikipedia.org/w/api.php", 
			dataType: "jsonp",
			data: { 
				'action': "opensearch", 
				'format': "json", 
				'search': request.term  
			}, 

			success: function(data) { 
				response(data[1]); 
			} 
		}); 
	} 
}); 
</script>	


<!-- Clear search box -->

<script type="text/javascript">
$('.has-clear input[type="text"]').on('input propertychange', function() {
  var $this = $(this);
  var visible = Boolean($this.val());
  $this.siblings('.form-control-clear').toggleClass('hidden', !visible);
}).trigger('propertychange');

$('.form-control-clear').click(function() {
  $(this).siblings('input[type="text"]').val('')
    .trigger('propertychange').focus();
});
</script>


<!-- IE - search box - prevent cursor jumping to beginning of text -->

<script type="text/javascript">
var el = $("#inputSearchString");
el[0].onfocus = el[0].onblur = null;
$(el).on("focus blur", function(e) {
    this.value = $.trim(this.value);    
    if ((e.type === "focus") && this.createTextRange) {
        var r = this.createTextRange();
        r.moveStart("character", this.value.length);
        r.select();
    }
});
</script>


<!-- Expand results for detailed content (toggle show/hide switches) -->

<script type="text/javascript">
$(document).ready(function(){
    $("#hide").hide();
    $("#expand_delimiter").hide();
    $("#hide").click(function(){
        $(".contentfull").hide();
        $("#hide").hide();
        $("#show").show();
        $(".expand_hide").hide();
        $(".expand_show").show();
        $("#expand_delimiter").hide();
    });
    $("#show").click(function(){
        $(".contentfull").show();
        $("#hide").show();
        $("#show").hide();
        $(".expand_hide").show();
        $(".expand_show").hide();
        $("#expand_delimiter").hide();
    });
});
</script>


<!-- Don't submit empty inputs to GET-query -->

<script type="text/javascript">
$('body').submit(function(e){
    var emptyinputs = $(this).find('input').filter(function(){
        return !$.trim(this.value).length;  // get all empty fields
    }).prop('disabled',true);    
});

</script>


  
<script type="text/javascript">
jQuery(function($){
	$("#inputDateFileCreateFrom").mask("9999-99-99",{placeholder:"yyyy-mm-dd"});
	$("#inputDateFileCreateTo").mask("9999-99-99",{placeholder:"yyyy-mm-dd"});
});
</script>

	
<script type="text/javascript">
$(document).ready(function(){
    $("#formSearchDataCatalogue").on("change", "input:checkbox", function(){
        $("#formSearchDataCatalogue").submit();
    });
});
</script>













<script type="text/javascript">


/*
 * *******************************************************************************
 * *** Applies to: searchMain.php
 * *******************************************************************************
 */


<!--

//-->
/** 
 * Expand Refine divs to show more filters (toggle show/hide switches)
 *  
 */

/* Show-Hide-Expand Refine by AUTHOR */

var numResultsForDivHeight = 6;



$(document).ready(function(){
    if (aggAuthorCountJS < numResultsForDivHeight){
        $("#divRefineFileshareAuthor").css('height','auto');
    	$("#divRefineFileshareAuthor").css('overflow-y','hidden'); 
        $("#btnRefineFileshareAuthorMore").css('display','none'); 
    }
    else {
    	$("#divRefineFileshareAuthor").height(122);
    }
    	
    $('#btnRefineFileshareAuthorLess').css('display','none'); 
    $('#btnRefineFileshareAuthorShow').css('display','none'); 
});


$(document).ready(function(){
    $("#btnRefineFileshareAuthorHide").click(function(){    	
        $("#divRefineFileshareAuthorHideShow").css('display','none'); 
        $("#divRefineFileshareAuthor").height(0);
        $(this).css('display','none');
        $("#btnRefineFileshareAuthorShow").css('display','inline-flex'); 
        $("#btnRefineFileshareAuthorLess").css('display','none'); 
        $("#btnRefineFileshareAuthorMore").css('display','none'); 
    });
});

$(document).ready(function(){
    $("#btnRefineFileshareAuthorShow").click(function(){
        if (aggAuthorCountJS < numResultsForDivHeight){
	        $("#divRefineFileshareAuthorHideShow").css('display','inline'); 
	        $("#divRefineFileshareAuthor").css('height','auto');
	        $("#divRefineFileshareAuthor").css('overflow-y','hidden'); 
	        $(this).css('display','none'); 
	        $("#btnRefineFileshareAuthorHide").css('display','inline-flex'); 
	        $("#btnRefineFileshareAuthorMore").css('display','none');
	    }
        else{
	        $("#divRefineFileshareAuthorHideShow").css('display','inline'); 
	        $("#divRefineFileshareAuthor").height(122);
	        $("#divRefineFileshareAuthor").css('overflow-y','scroll'); 
	        $(this).css('display','none'); 
	        $("#btnRefineFileshareAuthorHide").css('display','inline-flex'); 
	        $("#btnRefineFileshareAuthorMore").css('display','inline-flex');        	
        }   	
    })
});

$(document).ready(function(){
    $("#btnRefineFileshareAuthorMore").click(function(){
        $("#divRefineFileshareAuthor").css('height','auto'); 
        $("#divRefineFileshareAuthor").css('overflow-y','hidden'); 
        $(this).css('display','none');
        $("#btnRefineFileshareAuthorHide").css('display','inline-flex'); 
        $("#btnRefineFileshareAuthorLess").css('display','inline-flex'); 
    });
});

$(document).ready(function(){
    $("#btnRefineFileshareAuthorLess").click(function(){
        $("#divRefineFileshareAuthor").height(122);
        $("#divRefineFileshareAuthor").css('overflow-y','scroll'); 
        $(this).css('display','none'); 
        $("#btnRefineFileshareAuthorHide").css('display','inline-flex'); 
        $("#btnRefineFileshareAuthorMore").css('display','inline-flex'); 
    });
});


/* Show-Hide-Expand Refine by APPLICATION */

$(document).ready(function(){
    if (aggApplicationCountJS < numResultsForDivHeight){
        $("#divRefineFileshareApplication").css('height','auto');
    	$("#divRefineFileshareApplication").css('overflow-y','hidden'); 
        $("#btnRefineFileshareApplicationMore").css('display','none'); 
    }
    else {
    	$("#divRefineFileshareApplication").height(122);
    }
    $('#btnRefineFileshareApplicationLess').css('display','none'); 
    $('#btnRefineFileshareApplicationShow').css('display','none'); 
});

$(document).ready(function(){
    $("#btnRefineFileshareApplicationHide").click(function(){    	
        $("#divRefineFileshareApplicationHideShow").css('display','none'); 
        $("#divRefineFileshareApplication").height(0);
        $(this).css('display','none');
        $("#btnRefineFileshareApplicationShow").css('display','inline-flex'); 
        $("#btnRefineFileshareApplicationLess").css('display','none'); 
        $("#btnRefineFileshareApplicationMore").css('display','none'); 
    });
});





$(document).ready(function(){
    $("#btnRefineFileshareApplicationShow").click(function(){
        if (aggApplicationCountJS < numResultsForDivHeight){
	        $("#divRefineFileshareApplicationHideShow").css('display','inline'); 
	        $("#divRefineFileshareApplication").css('height','auto');
	        $("#divRefineFileshareApplication").css('overflow-y','hidden'); 
	        $(this).css('display','none'); 
	        $("#btnRefineFileshareApplicationHide").css('display','inline-flex'); 
	        $("#btnRefineFileshareApplicationMore").css('display','none');
	    }
        else{
	        $("#divRefineFileshareApplicationHideShow").css('display','inline'); 
	        $("#divRefineFileshareApplication").height(122);
	        $("#divRefineFileshareApplication").css('overflow-y','scroll'); 
	        $(this).css('display','none'); 
	        $("#btnRefineFileshareApplicationHide").css('display','inline-flex'); 
	        $("#btnRefineFileshareApplicationMore").css('display','inline-flex');        	
        }   	
    })
});


$(document).ready(function(){
    $("#btnRefineFileshareApplicationMore").click(function(){
        $("#divRefineFileshareApplication").css('height','auto'); 
        $("#divRefineFileshareApplication").css('overflow-y','hidden'); 
        $(this).css('display','none');
        $("#btnRefineFileshareApplicationHide").css('display','inline-flex'); 
        $("#btnRefineFileshareApplicationLess").css('display','inline-flex'); 
    });
});

$(document).ready(function(){
    $("#btnRefineFileshareApplicationLess").click(function(){
        $("#divRefineFileshareApplication").height(122);
        $("#divRefineFileshareApplication").css('overflow-y','scroll'); 
        $(this).css('display','none'); 
        $("#btnRefineFileshareApplicationHide").css('display','inline-flex'); 
        $("#btnRefineFileshareApplicationMore").css('display','inline-flex'); 
    });
});

/* Show-Hide-Expand Refine by FILETYPE */



$(document).ready(function(){
    if (aggContentTypeCountJS < numResultsForDivHeight){
        $("#divRefineFileshareFileType").css('height','auto');
    	$("#divRefineFileshareFileType").css('overflow-y','hidden'); 
        $("#btnRefineFileshareFileTypeMore").css('display','none'); 
    }
    else {
    	$("#divRefineFileshareFileType").height(122);
    }
    $('#btnRefineFileshareFileTypeLess').css('display','none'); 
    $('#btnRefineFileshareFileTypeShow').css('display','none'); 
});




$(document).ready(function(){
    $("#btnRefineFileshareFileTypeHide").click(function(){
        $("#divRefineFileshareFileTypeHideShow").css('display','none'); 
        $("#divRefineFileshareFileType").height(0);
        $(this).css('display','none');
        $("#btnRefineFileshareFileTypeShow").css('display','inline-flex'); 
        $("#btnRefineFileshareFileTypeLess").css('display','none'); 
        $("#btnRefineFileshareFileTypeMore").css('display','none'); 
    });
});

$(document).ready(function(){
    $("#btnRefineFileshareFileTypeShow").click(function(){
        $("#divRefineFileshareFileTypeHideShow").css('display','inline'); 
        $("#divRefineFileshareFileType").height(110);
        $("#divRefineFileshareFileType").css('overflow-y','scroll'); 
        $(this).css('display','none'); 
        $("#btnRefineFileshareFileTypeHide").css('display','inline-flex'); 
        $("#btnRefineFileshareFileTypeMore").css('display','inline-flex'); 
    });
});

$(document).ready(function(){
    $("#btnRefineFileshareFileTypeMore").click(function(){
        $("#divRefineFileshareFileType").css('height','auto'); 
        $("#divRefineFileshareFileType").css('overflow-y','hidden'); 
        $(this).css('display','none');
        $("#btnRefineFileshareFileTypeHide").css('display','inline-flex'); 
        $("#btnRefineFileshareFileTypeLess").css('display','inline-flex'); 
    });
});

$(document).ready(function(){
    $("#btnRefineFileshareFileTypeLess").click(function(){
        $("#divRefineFileshareFileType").height(110);
        $("#divRefineFileshareFileType").css('overflow-y','scroll'); 
        $(this).css('display','none'); 
        $("#btnRefineFileshareFileTypeHide").css('display','inline-flex'); 
        $("#btnRefineFileshareFileTypeMore").css('display','inline-flex'); 
    });
});

/* Show-Hide-Expand Refine by FILE SIZE */

$(document).ready(function(){
    $('#btnRefineFileshareFileSizeShow').css('display','none'); 
});


$(document).ready(function(){
    $("#btnRefineFileshareFileSizeHide").click(function(){
        $("#divRefineFileshareFileSizeHideShow").css('display','none'); 
        $(this).css('display','none');
        $("#btnRefineFileshareFileSizeShow").css('display','inline-flex'); 
    });
});

$(document).ready(function(){
    $("#btnRefineFileshareFileSizeShow").click(function(){
        $("#divRefineFileshareFileSizeHideShow").css('display','inline'); 
        $(this).css('display','none'); 
        $("#btnRefineFileshareFileSizeHide").css('display','inline-flex'); 
    });
});

/* Show-Hide-Expand Refine by FILE CREATION DATE */

$(document).ready(function(){
    $('#btnRefineFileshareFileCreatedShow').css('display','none'); 
});


$(document).ready(function(){
    $("#btnRefineFileshareFileCreatedHide").click(function(){
        $("#divRefineFileshareFileCreatedHideShow").css('display','none'); 
        $(this).css('display','none');
        $("#btnRefineFileshareFileCreatedShow").css('display','inline-flex'); 
    });
});

$(document).ready(function(){
    $("#btnRefineFileshareFileCreatedShow").click(function(){
        $("#divRefineFileshareFileCreatedHideShow").css('display','inline'); 
        $(this).css('display','none'); 
        $("#btnRefineFileshareFileCreatedHide").css('display','inline-flex'); 
    });
});

/* Show-Hide-Expand Refine by MATCH PHRASE */

$(document).ready(function(){
    $("#divRefineFileshareMatchPhraseHideShow").css('display','none'); 
    $("#btnRefineFileshareMatchPhraseHide").css('display','none'); 
    $("#btnRefineFileshareMatchPhraseShow").css('display','inline-flex'); 
    //$('#btnRefineFileshareMatchPhraseShow').css('display','none'); 
});


$(document).ready(function(){
    $("#btnRefineFileshareMatchPhraseHide").click(function(){
        $("#divRefineFileshareMatchPhraseHideShow").css('display','none'); 
        $(this).css('display','none');
        $("#btnRefineFileshareMatchPhraseShow").css('display','inline-flex'); 
    });
});

$(document).ready(function(){
    $("#btnRefineFileshareMatchPhraseShow").click(function(){
        $("#divRefineFileshareMatchPhraseHideShow").css('display','inline'); 
        $(this).css('display','none'); 
        $("#btnRefineFileshareMatchPhraseHide").css('display','inline-flex'); 
    });
});


/* Show-Hide-Expand Collapse All */

$(document).ready(function(){
    $('#btnFileShareFiltersAllShow').css('display','none'); 
});


$(document).ready(function(){
    $("#btnFileShareFiltersAllHide").click(function(){
        $("#divRefineFileshareAuthorHideShow").css('display','none'); 
        $("#btnRefineFileshareAuthorShow").css('display','inline-flex'); 
        $("#btnRefineFileshareAuthorHide").css('display','none'); 
        $("#btnRefineFileshareAuthorMore").css('display','none'); 
        $("#btnRefineFileshareAuthorLess").css('display','none'); 
        $("#divRefineFileshareApplicationHideShow").css('display','none');
        $("#btnRefineFileshareApplicationShow").css('display','inline-flex');
        $("#btnRefineFileshareApplicationHide").css('display','none');   
        $("#btnRefineFileshareApplicationMore").css('display','none'); 
        $("#btnRefineFileshareApplicationLess").css('display','none'); 
        $("#divRefineFileshareFileTypeHideShow").css('display','none'); 
        $("#btnRefineFileshareFileTypeShow").css('display','inline-flex');
        $("#btnRefineFileshareFileTypeHide").css('display','none'); 
        $("#btnRefineFileshareFileTypeMore").css('display','none'); 
        $("#btnRefineFileshareFileTypeLess").css('display','none'); 
        $("#divRefineFileshareFileSizeHideShow").css('display','none'); 
        $("#btnRefineFileshareFileSizeShow").css('display','inline-flex');
        $("#btnRefineFileshareFileSizeHide").css('display','none'); 
        $("#btnRefineFileshareFileSizeMore").css('display','none'); 
        $("#btnRefineFileshareFileSizeLess").css('display','none'); 
        $("#divRefineFileshareFileCreatedHideShow").css('display','none');  
        $("#btnRefineFileshareFileCreatedShow").css('display','inline-flex');
        $("#btnRefineFileshareFileCreatedHide").css('display','none'); 
        $("#btnRefineFileshareFileCreatedMore").css('display','none'); 
        $("#btnRefineFileshareFileCreatedLess").css('display','none');
        $("#divRefineFileshareMatchPhraseHideShow").css('display','none');  
        $("#btnRefineFileshareMatchPhraseShow").css('display','inline-flex');
        $("#btnRefineFileshareMatchPhraseHide").css('display','none'); 
        $("#btnRefineFileshareMatchPhraseMore").css('display','none'); 
        $("#btnRefineFileshareMatchPhraseLess").css('display','none'); 
        $(this).css('display','none');
        $("#btnFileShareFiltersAllShow").css('display','inline-flex'); 
    });
});

$(document).ready(function(){
    $("#btnFileShareFiltersAllShow").click(function(){
        $("#divRefineFileshareAuthorHideShow").css('display','inline'); 
        $("#btnRefineFileshareAuthorShow").css('display','none'); 
        $("#btnRefineFileshareAuthorHide").css('display','inline-flex'); 
        $("#btnRefineFileshareAuthorMore").css('display','inline-flex'); 
        $("#divRefineFileshareApplicationHideShow").css('display','inline'); 
        $("#btnRefineFileshareApplicationShow").css('display','none'); 
        $("#btnRefineFileshareApplicationHide").css('display','inline-flex'); 
        $("#btnRefineFileshareApplicationMore").css('display','inline-flex'); 
        $("#divRefineFileshareFileTypeHideShow").css('display','inline'); 
        $("#btnRefineFileshareFileTypeShow").css('display','none'); 
        $("#btnRefineFileshareFileTypeHide").css('display','inline-flex');
        $("#btnRefineFileshareFileTypeMore").css('display','inline-flex'); 
        $("#divRefineFileshareFileSizeHideShow").css('display','inline'); 
        $("#btnRefineFileshareFileSizeShow").css('display','none');  
        $("#btnRefineFileshareFileSizeHide").css('display','inline-flex'); 
        $("#btnRefineFileshareFileSizeMore").css('display','inline-flex'); 
        $("#divRefineFileshareFileCreatedHideShow").css('display','inline'); 
        $("#btnRefineFileshareFileCreatedShow").css('display','none');  
        $("#btnRefineFileshareFileCreatedHide").css('display','inline-flex'); 
        $("#btnRefineFileshareFileCreatedMore").css('display','inline-flex'); 
        $("#divRefineFileshareMatchPhraseHideShow").css('display','inline'); 
        $("#btnRefineFileshareMatchPhraseShow").css('display','none');  
        $("#btnRefineFileshareMatchPhraseHide").css('display','inline-flex'); 
        $("#btnRefineFileshareMatchPhraseMore").css('display','inline-flex');   
        $(this).css('display','none'); 
        $("#btnFileShareFiltersAllHide").css('display','inline-flex'); 
    });
});


</script>









<!-- Google Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-80866076-2', 'auto');
  ga('require', 'linkid');
  //ga('send', 'pageview');

</script>

