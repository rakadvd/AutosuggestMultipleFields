<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Multiple Rows Auto Suggest</title>
<style>
.input_container ul {
    width: 65%;
    border: 0px solid #eaeaea;
    position: absolute;
    z-index: 9;
    background: #f3f3f3;
    list-style: none;
}
.input_container ul li {
    padding: 2px;
    font-size: 22px;
    border-bottom: 1px solid #CCC;
    padding-left: 15px;
    cursor: pointer;
    font-weight: 400;
}
.input_container ul {
    width: 65%;
    border: 0px solid #eaeaea;
    position: absolute;
    z-index: 9;
    background: #f3f3f3;
    list-style: none;
}
</style>
</head>
<body>
<label>REGISTRERINGSNUMMER</label>
<div class="input_container">
  <div id="addinput">
    <table width="100%" border="0">
      <tr>
        <td width="70%"><input type="text" name="reg_num[]" id="reg_num" style="text-transform:uppercase;padding: 20px 15px;vertical-align: bottom; width:95%" placeholder="REGISTRERINGSNUMMER" maxlength="10" onKeyUp="openSearchBox(this)"/>
          <ul id="reg_num_list_id">
          </ul></td>
        <td style="vertical-align: middle; text-align:center" width="10%"><a href="javascript:;" class="btn2 btn btn-animate" id="addNew"><img src="http://depaapp.se/login/station/assets/images/plus-sign.jpg" style="margin-left:20px;"></a></td>
      </tr>
    </table>
  </div>
</div>
<div id="result"></div>
</body>
<script type="text/javascript" src="jquery1.6.1.min.js"></script>
<script>
function openSearchBox(inputfield)
{
	check_registration_nums(inputfield.value,inputfield.id);
}
</script>
<script>
var input_field_ids = "";
var min_length = 1;
function check_registration_nums(keyword,input_id) {
input_field_ids=input_id.substring(7, input_id.length);
if (keyword.length >= min_length) {
 $.ajax( {
	    url:'autosuggest.php',
	    type: 'POST',
		data: {keyword : keyword},
	    success:function(data) {
		$('#reg_num_list_id' +  input_field_ids).show();
		$('#reg_num_list_id' +  input_field_ids).html(data);
	}
});	
}
else {
		$('#reg_num_list_id' +  input_field_ids).hide();
	}	
}
function set_items(item) {
	$('#reg_num' +  input_field_ids).val(item);
	$('#reg_num_list_id' +  input_field_ids).hide();
	$('#addNew').click();
	$(function(){
	   setTimeout(function(){
		  $('#reg_num' +  input_field_ids).change()
		},1000);
	});
}
</script>

<script type="text/javascript">
$(document).ready(function() {
	var count = 0;
	var counts = 1;
	$("#addNew").click(function(){
		count += 1;
		
		var rem_num=5;
		if(counts>0 && counts<rem_num)
		{
		counts += 1;
		$('#addinput').append(
				'<div class="addinput_sub"><table width="100%" border="0" class="records"><tr>'
				 + '<td width="70%"><input type="text" class="" name="reg_num[]" id="reg_num' + count + '" style="text-transform:uppercase;padding: 20px 15px;vertical-align: bottom; width:95%" placeholder="REGISTRERINGSNUMMER" maxlength="10" onKeyUp="openSearchBox(this)"/><ul id="reg_num_list_id' + count + '"></ul></td>'
				 + '<td style="vertical-align: middle; text-align:center" width="10%"><a class="remove_item" href="javascript:;" class="btn2 btn " ><img src="http://depaapp.se/login/station/assets/images/minus-sign.jpg" style="margin-left:20px; "></a>'
				 + '<input id="rows_' + count + '" name="rows[]" value="'+ count +'" type="hidden"></td>'
				 +'</tr></table></div>'
			);
			}
		});

		$(".remove_item").live('click', function (ev) {
		if (ev.type == 'click') {
		counts -= 1;
		$(this).parents(".records").fadeOut();
		$(this).parents(".records").remove();
	}
	});
});
</script>
</html>
