// JavaScript Document
$(document).ready(function(){
	$('#etype').change(function(){
		var optionText = $("#etype option:selected").val().split('_');
		 //alert(optionText); 
		  if(optionText[0]<1)
		  {
			  $('#subs').html('Select Subjects For CA');
		  }
		  else
		  {
			  var url=$('#urlx').prop('value');
			  url=url+"candidate-cas/loadsubjects/"+optionText[0];
			 //alert(url);
			  $.get(url,
				function(data, status){
					// $('#mxg').html(data);
					$('#subs').html('');
					var dump='';
					$.each(JSON.parse(data), function (i, item) {
						//$('#myTable > tbody:last-child').append('<tr>...</tr><tr>...</tr>');
						dump+='<input type="checkbox" name="chksub[]" value="'+item.value+'">'+item.text+'<br>';
					});
					$('#subs').html(dump);
				});
		  }
		//subs
	});
	
	$('#centre').change(function(){
		 var optionText = $("#centre option:selected").val().split('_');
		 //alert(optionText);
		   if(optionText[0]<1)
		  {
			  $('#etype').find('option').remove().end();
			  $('#etype').append($('<option>', { value: '0',text : 'Select Centre' }));
		  }
		  else
		  {
			  var url=$('#urlx').prop('value');
			  url=url+"candidate-cas/loadexams/"+optionText[0];
			 //alert(url);
			  $.get(url,
				function(data, status){
					// $('#mxg').html(data);
					$('#etype').find('option').remove().end();
					$.each(JSON.parse(data), function (i, item) {
					$('#etype').append($('<option>', { value: item.value,text : item.text }));
					});
				});
		  }
		//subs
	});
	
	$('#region').change(function(){
		  var optionText = $("#region option:selected").val();
		  if(optionText<1)
		  {
			  $('#district').find('option').remove().end();
			  $('#centre').find('option').remove().end();
			  $('#etype').find('option').remove().end();
			  $('#district').append($('<option>', { value: '0',text : 'Select Region' }));
			  $('#centre').append($('<option>', { value: '0',text : 'Select District' }));
			  $('#etype').append($('<option>', { value: '0',text : 'Select Centre' }));
		  }
		  else
		  {
			  var url=$('#urlx').prop('value');
			  url=url+"candidate-cas/loaddistricts/"+optionText;
			  $.get(url,
				function(data, status){
					// $('#mxg').html(data);
					$('#district').find('option').remove().end();
					$.each(JSON.parse(data), function (i, item) {
					$('#district').append($('<option>', { value: item.value,text : item.text }));
					});
				});
		  }
		//subs
	});
	
	$('#district').change(function(){
		 var optionText = $("#district option:selected").val();
		 //alert(optionText);
		   if(optionText<1)
		  {
			  $('#centre').find('option').remove().end();
			  $('#etype').find('option').remove().end();
			  $('#centre').append($('<option>', { value: '0',text : 'Select District' }));
			  $('#etype').append($('<option>', { value: '0',text : 'Select Centre' }));
		  }
		  else
		  {
			  var url=$('#urlx').prop('value');
			  url=url+"candidate-cas/loadcentres/"+optionText;
			 // alert(url);
			  $.get(url,
				function(data, status){
					// $('#mxg').html(data);
					$('#centre').find('option').remove().end();
					$.each(JSON.parse(data), function (i, item) {
					$('#centre').append($('<option>', { value: item.value,text : item.text }));
					});
				});
		  }
		//subs
	});
	
	
	
});
