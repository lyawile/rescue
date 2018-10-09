// JavaScript Document
$(document).ready(function(){
	$('#nana').click(function(){alert("9999999");});
	$('.chk').click(function(){
		if($(this).is(':checked'))
		{
			var candid=$(this).prop('value');
			if($('#put').prop('value')=='')
			{
				$('#put').prop('value',candid);
			}
			else
			{
				var cidar=$('#put').prop('value').split(',');
				var indi=false;
				$.each(cidar , function(index, val) {
				   if(val==candid)indi=true;
				});
				
				if(!indi)$('#put').prop('value',cidar+','+candid);
			}
		}
		else
		{
			var candid=$(this).prop('value');
			if($('#put').prop('value')==candid)
			{
				$('#put').prop('value','');
			}
			else
			{
				var cidar=$('#put').prop('value').replace(candid,'');
				$('#put').prop('value',cidar);
			}
		}
	});
	
	
});
