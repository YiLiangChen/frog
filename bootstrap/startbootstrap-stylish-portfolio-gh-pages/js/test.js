function list_Photo(){
  console.log('good');
		$.ajax({
		  type: 'GET',
      url: "http://localhost/add/show.php?act=frog",
      success : function(data){
      console.log(data);
      $('#about').prepend(
        `"<div class="col-md-7">
        <h2><img src="${data[0].filepic}"/></h2>
        </div>"`
      )
    },error : function(err){
      console.log(err.status);
    },
  });
}
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
