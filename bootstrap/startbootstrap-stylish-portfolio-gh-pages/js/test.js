function list_Photo(){
  console.log('good');
		$.ajax({
		  type: 'GET',
<<<<<<< HEAD
      url: "http://localhost/add/show.php?act=frog",
=======
      dataType: "binary",
      url: "http://localhost/frog-master/add/show.php?act=frog",
>>>>>>> bb9227f2492bbd4fc12e6d912c7b3b35e80e0411
      success : function(data){
      console.log(data[0]);
      $('#showtable').prepend(
        `"<div class="col-md-7">
<<<<<<< HEAD
        <h2><img src="${data[0].filepic}"/></h2>
        </div>"`
=======
      for(i=0;i<data.length;i++){
      <a id="${data.id}" herf="#" class="JM"><h2><img src="data:image/jpeg;base64,{data[0].filepic}"/></h2></a>
      }</div>"`
>>>>>>> bb9227f2492bbd4fc12e6d912c7b3b35e80e0411
      )
    },error : function(err){
      console.log('err');
    },
  });
}
$('#showtable').on("click",'.JM',function(){
	var src = $(this).html();
	$('#modalshow').html(src);
	console.log("安安");
	var id = $(this).prop("id");
	QQ(id);
});
$('#frogbutton').on("click",function(){
    console.log("success!");
    list_Photo();
});
function List(){
  $('#about').html(
    '"<img src="img class src="img/butterfly.jpg"">"'
  )
};
$('#frogicon').on("click",function(){
  $('#showtable').html('');
  for(i=0;i<50;i=i+1){
  $('#showtable').prepend(
    `<a id="${i}" href="#" class="QQugly"><img src="img/butterfly.jpg" width="150px" height="100px">&nbsp &nbsp
	</a>`
    );
  }
});
$('#showtable').on("click",function(){
  //console.log("nice");
});
$('#showtable').on("click",'.QQugly',function(){
	var src = $(this).html();
	$('#modalshow').html(src);
	console.log("安安");
	var id = $(this).prop("id");
	QQ(id);
});
function QQ(id){
    //var i = id;
	var i =1;
	$('#editPhotos').on("click",function(){
		$.ajax({
            url: "http://localhost/add/edit.php?act=edit",
            type:"POST",
            data:{
				filename : $('#filename').val(),
				textName : $('#textName').val(),
				textIntroduce : $('#textIntroduce').val(),
			},
            success:function(data){
                alert(data);
            },
			error:function(err){
				alert("失敗惹"+\n+"可能是你太醜了吧");
			},
        });
	});
	$('#deletPhotos').on("click",function(){
		$.ajax({
            url: "http://localhost/add/edit.php?act=delete",
            type:"POST",
            data:{
				id : i,
			},
            success:function(data){
                alert(data);
            },
			error:function(err){
				alert("失敗惹"+\n+"可能是你太醜了吧");
			},
        });
	});
}
