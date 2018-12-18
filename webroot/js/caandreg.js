// JavaScript Document
function getSubs(exm)
{
	var optionText = exm.split('_');
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
					$a=0;
					$.each(JSON.parse(data), function (i, item) {
						if($a%3==0)dump+='<div class="row"><div class="col-md-4">';
						else dump+='</div><div class="col-md-4">';
						//$('#myTable > tbody:last-child').append('<tr>...</tr><tr>...</tr>');
				dump+='<label class="container">'+item.text+'<input type="checkbox" name="chksub[]" value="'+item.value+'"><span class="checkmark"></span></label>';
					//	dump+='<input type="checkbox" name="chksub[]" value="'+item.value+'">&nbsp;'+item.text+'<br>';
						if($a%3==2)dump+='</div></div>';
						//else dump+='</div>';
						$a++;
					});
					$a--;
					if($a%3!=2)dump+='</div></div>';
					//alert(dump);
					$('#subs').html(dump);
				});
		  }
		//subs
}
function removesub(idx)
{
	$('span').remove('#'+idx);
	$('#insubs').val($('#insubs').val().replace(';'+idx,''));
}

function removedis(idx)
{
	$('span').remove('#d'+idx);
	$('#indisbs').val($('#indisbs').val().replace(';'+idx,''));
}


$(document).ready(function(){
	$('#datepicker').datepicker({
      autoclose: true
    })
	
	$('.cls_exams').click(function(){
		var exam = $(this).html();
		if(exam != 'No Exams')
		{
			var cents = $('#centexm').html().split(' ');
			$('#exam').prop('value',exam); //
			$('#centexm').html(cents[0]+ ' ' +exam);
			$('#hd_exam').html(exam);
		}
	});
	
	$('#ssub').change(function(){
		var value = $("#ssub option:selected").val();
		var txt = $("#ssub option:selected").text();
		//
		var vals = $('#insubs').val();
		if(vals.search(value)<0)
		{
			var excess = (vals.match(/;/g) || []).length;
			if(excess<11)
			{
			var add = '<span id = "'+value+'" class="button button-info">'+txt+'&nbsp;&nbsp;<a title="remove" href="#" onclick="removesub(\''+value+'\')"><span class="glyphicon glyphicon-remove-sign delsub"></span></a></span>';
			$('#setsub').append(add);
			$('#insubs').val($('#insubs').val()+';'+value);
			}
		}
		//subs
	});
	
	$('#sdis').change(function(){
		var value = $("#sdis option:selected").val();
		var txt = $("#sdis option:selected").text();
		//
		var vals = $('#indisbs').val();
		if(vals.search(value)<0)
		{
				var add = '<span id = "d'+value+'" class="button button-info">'+txt+'&nbsp;&nbsp;<a title="remove" href="#" onclick="removedis('+value+')"><span class="glyphicon glyphicon-remove-sign delsub"></span></a></span>';
				$('#setdis').append(add);
				$('#indisbs').val($('#indisbs').val()+';'+value);
		}
		//disabs
	});
	
	
	$('.ca_exams').click(function(){
		var exam = $(this).html();
		//alert('Here Today');
		var exmid = $(this).prop('id');
		if(exam != 'No Exams')
		{
			var cents = $('#centexm').html().split(' ');
			$('#exam').prop('value',exmid); //
			$('#centexm').html(cents[0]+ ' ' +exam);
			$('#hd_exam').html(exam);
			
			getSubs(exmid);
		}
	});
	
	
});
