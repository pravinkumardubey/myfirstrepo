function fun() {
	/*$.ajax({
		url:"/store",
		type:'post',
		data:new FormData(this),
		contentType:false,
		processData:false,
		success:function(data){
			console.log(data);
		}
	});*/

	

}

$("#myForm").on("submit",function(e){
    e.preventDefault();

	$.ajax({
        url: '/store',
        method:"POST",
       data: new FormData(this),
       dataType:'json',
        contentType: false,
        cache: false,
        processData: false,
        success:function (response) {
            console.log(response);

           
            $("form#myForm").each(function(i,l){
            	this.reset();
            	$(":eq(i)").css("color","blue");
            });

             getAllData();
           
        },
        error: function(errorData) {
         	
        }
    });
    
});

function getAllData(){

	var htmlData = '';
	var _token = $("#_token").val();
	$.post("/getData",{_token:_token},function(response){
		var string = JSON.stringify(response);
		//console.log(string);
		console.log(response.data);

		for (var i = 0; i < response.data.length; i++) {
			var name = response.data[i].name;
			var dob = response.data[i].dob;
			var email  = response.data[i].email;
			var contact  = response.data[i].contact;
			var file  = response.data[i].file;

			htmlData += '<tr>'+
				'<th>'+(i+1)+'</th>'+
				'<th>'+name+'</th>'+
				'<th>'+dob+'</th>'+
				'<th>'+email+'</th>'+
				'<th><img src="uploads/'+file+'"/></th>'+
				'<th>'+contact+'</th>'+
				'<th onclick="delet(this,'+response.data[i].id+')">delete</th>'+
			'</tr>';
	    }
	    $("#myData").html(htmlData);

	});

}
function delet(arg,id){
	$.ajax({
		url:'delete/'+id,
		type:'get',
		data:{
			_token:'{{ csrf_token() }}'
		},
		success:function(data){
			getAllData();
		}
	});
}
