/*
*Registration code
*/

function register() {
	$.ajax({
		url:'user',
		type:'post',
		data:$('#myform').serialize(),
		success:function(data){
			$('#myform').hide();
			$('#error').hide();
			$('h1').text("Registration Success");
 			},error:function(data){
 				$('#error').show();
 				$('#error').text("Fill in the blanks");
 				console.log(data);
 			}
 		});
}
//end reg code
/*
*Edit Code
*/
function editData(arg,id) {
	alert(argument)
}
function deleteCategory(arg,id) {
	$.ajax({
		url:"deletecategory/"+id,
		type:"get",
		data:{ 
                    _token:'{{ csrf_token() }}'
                },
		success:function(data){
			$(arg).parent().remove();
		}
	});
}



function deleteBlob(arg,id) {
	$.ajax({
		url:"deleteblob/"+id,
		type:"get",
		data:{ 
                    _token:'{{ csrf_token() }}'
                },
		success:function(data){
			$(arg).parent().remove();
		}
	});
}



















function selectType(arg){
		$('#select').html('');
	$.ajax({
		url:'selecttype/'+arg.value,
		type:'get',
		data:{
			_token:'{{ csrf_token() }}'
		},
		success:function(data){
			//$.each(data);
			$.each(data, function(i, item) {
			    $('#select').append(`<option>`+data[i].name+`</option>`);
			});
		}
	});
}