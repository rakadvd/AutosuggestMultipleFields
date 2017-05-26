<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>jquery Auto Suggest / Auto Complete</title>
<script type="text/javascript" src="jquery-1.11.2.min.js"></script>
<script type="text/javascript"> 
    function lookup(inputString) { 
        if(inputString.length == 0) { 
            // Hide the suggestion box. 
            $('#suggestions').hide(); 
        } else { 
            $.post("data.php", {queryString: ""+inputString+""}, function(data){ 
                if(data.length >0) { 
                    $('#suggestions').show(); 
                    $('#autoSuggestionsList').html(data); 
                } 
            }); 
        } 
    } // lookup 
    function fill(thisValue) { 
        $('#inputString').val(thisValue); 
        setTimeout("$('#suggestions').hide();", 200); 
    } 
</script>
<style type="text/css">
body {
	font-family: Tahoma, Arial, sans-serif;
	font-size: 11px;
	color: #000;
}
.suggestionsBox {
	position: relative;
	margin: 10px 0px 0px 0px;
	width: 220px;
	background-color: #212427;
	-moz-border-radius: 7px;
	-webkit-border-radius: 7px;
	border: 2px solid #000;
	color: #fff;
}
.suggestionList {
	margin: 0px;
	padding: 0px;
}
.suggestionList li {
	list-style-type:none;
	margin: 0px 0px 0px 0px;
	padding: 3px;
	cursor: pointer;
}
.suggestionList li:hover {
	background-color: #659CD8;
}
</style>
</head>
<body>
<center>
  <div>
    <form>
      <div>
        <input type="text" size="30" value="" id="inputString" onkeyup="lookup(this.value);" onblur="fill();" />
      </div>
      <div class="suggestionsBox" id="suggestions" style="display: none;">
        <div class="suggestionList" id="autoSuggestionsList"> &nbsp; </div>
      </div>
    </form>
  </div>
</center>
</body>
</html>
