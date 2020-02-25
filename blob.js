function selectType(){
		$('#select').html('');
		var type = $("#type").val();
	$.ajax({
		url:'/selecttype',
		method:'POST',
		data:{
			_token:$("#_token").val(),
			type:type
		},
		success:function(data){
			//$.each(data);
			$.each(data, function(i, item) {
			    $('#select').append(`<option>`+data[i].name+`</option>`);
			});
		}
	});
}