 <!DOCTYPE html>
 <html>
 <head>
 	<style type="text/css">
 		#success{
 			height: 40px;width: 500px;background: orange;border: 5px solid;position: absolute;left: 50.8%;top: 50%;transform: translate(-50%,-50%);text-align: center;line-height: 40px;
 			border-color: tomato yellow green cyan;color: #fff;font-size: 2em;
 			transition: 1s;display: none;
 		}
 		#left{
 			height: 100%;width: 80%;background: orange;float: left;line-height: 30px;
 		}#right{
 			height: 85%;width: 4%;float: left;border-bottom: 5px solid green;
 			border-right: 5px solid green;transform: rotate(40deg);position: relative;top: -5px;transition: 1s;
 		}#last{
 			height: 100%;width: 20%;float: left;
 		}
 	</style>
 </head>
 <body>
 	<center>
 <h1>Registration Form</h1>
 <form id="MyfirstLaravel" action="/login" method="post">
@csrf
<table align="center">
<tr>
 <th><input type="text" name="name"></th>
</tr><tr>
<th><span id="nameerror" style="color: red;font-size: 10px;"></span></th>
</tr><tr>
 <th><input type="date" name="date"></th>
</tr><tr>
<th><span id="dateerror" style="color: red;font-size: 10px;"></span></th>
</tr><tr>
 <th><input type="email" name="email"></th>
</tr><tr>
<th><span id="emailerror" style="color: red;font-size: 10px;"></span></th>
</tr><tr>
<th><input type="button" id="btn" value="Register"></th>
</tr>
 <div style="color: green;" id="res">
      <table border = "2" rules="all" bordercolor="orange">
      	<thead style="color: #a1a1a1;">
         <tr>
         	<td style="display: none;"></td>
            <td>ID</td>
            <td>Name</td>
            <td>Dob</td>
            <td>Email</td>
            <td>Delete</td>
         </tr>
     </thead>
     <tbody  id="puthere">
     	 @foreach ($users as $id=> $user)
         <tr>
         	<td style="display: none;">{{ $user->id }}</td>
            <td>{{ $id+1 }}</td>
            <td ondblclick="edit(this,'{{ $user->id }}')"><label>{{ $user->names }}</label></td>
            <td>{{ $user->dob }}</td>
            <td>{{ $user->email }}</td>
            <td style="color: blue;cursor: pointer;" onclick="fun(this,'{{ $user->id }}')">delete</td>
         </tr>
         @endforeach

     </tbody>
        
      </table>
      <div id="success">
      	<div id="left">One Row Updated</div><div id="right"></div>
      	<div id="last"></div>
      </div>
  </div>
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 	<script type="text/javascript">
 		$(document).ready(function(){
 			$('#btn').click(function(){
 					$.ajax({
 						url:'login',
 						method:'post',
 						data:$('#MyfirstLaravel').serialize(),
 						success:function(data){
						  let lasttd= ($('table').find('tbody tr td').last().prev().prev().prev().prev().text());
						  if(!lasttd){
						  	lasttd = 0;
						  }
						  	let trHtml = ` <tr>
						  	 <td style="display:none;">`+data.data.id +`</td>
				            <td>`+ (parseInt(lasttd)+1) +`</td>
				            <td>`+data.data.names +`</td>
				            <td>`+data.data.dob +`</td>
				            <td>`+data.data.email +`</td>
				            <td onclick="fun(this,'{{ $user->id }}')" style="color: blue;cursor: pointer;">`+ "<font color=blue>delete</font>" +`</td>
				         </tr>`;
 							$('#puthere').append(trHtml);
 							$('#nameerror').hide();
 							$('#dateerror').hide();
 							$('#emailerror').hide();
 						},
 						error:function(data){
 							console.log(data.responseJSON.errors);
 							if (data.responseJSON.errors.name) {
 								$('#nameerror').html(data.responseJSON.errors.name);
 							}else{
 								$('#nameerror').hide();
 							}
 							if (data.responseJSON.errors.date) {
 								$('#dateerror').html(data.responseJSON.errors.date);
 							}else{
 								$('#dateerror').hide();
 							}
 							if (data.responseJSON.errors.email) {
 								$('#emailerror').html(data.responseJSON.errors.email);
 							}else{
 								$('#emailerror').hide();
 							}
 						}
 					});
 			});
 		});
 	</script>
 	<script type="text/javascript">
 		function fun(arg,id) {
 			if (id!='') {
 				dlturl='delete'+"/"+id;
 				$.ajax({
 					url:dlturl,
 					type:'get',
 					 data:{ 
                    _token:'{{ csrf_token() }}'
                },
 					success:function(){
 						$(arg).parent().remove();
 						let count= ($('table tbody tr').length);
 						for (var i = 1; i <= count; i++) {
 							$('tbody').find('td').prev().prev().prev().prev().eq(i).text(i);
 						}
 					}
 				});
 			}
 		}
 	</script>
 	<script type="text/javascript">
 		function edit(arg,id) {
 			var txt=$(arg).text();
 			$(arg).wrap("<textarea>"+txt+"</textarea>");
 		}
 	</script>
 	<script type="text/javascript">
 		$(document).mouseup(function(e){
 			var txt=$("textarea");
 			var id=$("textarea").prev().prev().text();
 			if($("textarea").length){
 				if(!txt.is(e.target) && txt.has(e.target).length == 0){
 					var text=$("textarea").val();
        			$("textarea").wrap("<label>"+text+"</label>");
        			$('textarea').val("");
 					$("textarea").remove();
 					dlturl='editdata'+"/"+id+"/"+text;
 					$.ajax({
 						url:dlturl,
 						type:'get',
 						data:{ 
                    _token:'{{ csrf_token() }}'
                },
 						success:function(data){
 							$('#success').show(1000);
 						}
 					});
    			} 				
			}
 		});
 		setInterval(function(){
 			$('#success').hide(3000);
 		});
 	</script>
 </body>
 </html>