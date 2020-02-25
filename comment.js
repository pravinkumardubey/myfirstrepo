/*
*view comment code
*/
function comment(arg,id) {
	$('label').hide();
	$('.viewcomment').hide();
	$('.com').show();
	$(arg).hide();
	$(arg).next().show();
}


/*
*create comment code
*/
function post(arg,id){
	var text=$(arg).prev().val();
	var _token = $("#_token").val();
	if (text=='') {
		$(arg).prev().css("border","2px solid red");
		$(arg).prev().focus();
	}else{
		$.ajax({
			url:'/saveComment',
			type:'post',
			data:{ 
                    _token:_token,
                    commentMessage:text,
                    postId:id
            },
            success:function(data){
            	$('label').hide();
            	$('.com').show();
            	$(arg).parent().prev().prev().html(data);
            }
		});
	}
}


/*
	*like code
*/

function like(arg,id,status) {
	$.ajax({
		url:'postlike/'+id+'/'+status,
		type:'get',
		data:{
			_token:'{{ csrf_token() }}'
		},
		success:function(data){ 
			$('#'+data.postId).text(data.likeCount);
			$('.'+data.postId).text(data.disLikeCount);
			$(arg).attr('class','btn-danger')
		}
	});
}


/*
*view comment code
*/





function viewcomment(arg,id) {
	$('.viewcomment').hide();
	$('label').hide();
	$('.com').show();
	$(arg).parent().parent().next().show(1000);
	$.ajax({
		url:'displaycomment/'+id,
		type:'get',
		data:{
			_token:'{{csrf_token()}}'
		},
		success:function(response){
			var commentsData = '';
            for (var i=0; i<response.comments.length; i++) {
                var commentItem = response.comments[i];
                commentsData +=
                `<div class="row"><div style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;" class="col-sm-6 comment" id="a`+commentItem.id+`">`
                +commentItem.comment+
                `</div>
                <div class="col-sm-3 comment" 
                onclick="editComment(this,`+commentItem.id+`)" style="color:blue;cursor:pointer;">edit</div>
                <div class="col-sm-3 comment"
                onclick="deleteComment(this,`+commentItem.id+`)" style="color:cyan;cursor:pointer;">delete</div>
                </div>\n
                <input type='text' style='display:none;width:160px;' class='msg' value='`+commentItem.comment+`'><input class='btn1' type='button' value='Update' style='display:none;' onclick='updateComment(this,`+commentItem.id+`)'>
                `;
            }
            $(arg).parent().parent().next().html(commentsData);
		}
	});
}

function deleteComment(arg,id){
	$.ajax({
		url:'deletecomment/'+id,
		type:'get',
		data:{
			_token:'{{csrf_token()}}'
		},
		success:function(data){
			$(arg).parent().remove();
		}
	});
}



function editComment(arg,id){
	$('.msg').hide();
	$('.btn1').hide();
	$(arg).parent().next().show();
	$(arg).parent().next().next().show();
}

/*
*update comment code
*/
function updateComment(arg,id){
	var _token = $("#_token").val();
	var text=$(arg).prev().val();
	$.ajax({
		url:'/updatecomment',
		type:'post',
		data:{_token:_token,
                    updateMsg:text,
                    id:id},
		success:function(data){
			// console.log(data);
			$('#a'+id).text(text);
			$('.msg').hide();
			$('.btn1').hide();
		}
	});
}

setInterval(function(){
	$('.btn-danger').attr('class','btn-primary');
},2000);