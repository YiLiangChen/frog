function list_Photo(){
  console.log('good');
		$.ajax({
		  type: 'GET',
      //dataType: "binary",
      url: "http://localhost/frog-master/add/show.php?act=frog",
      success : function(data){
      var count = Object.keys(data);
      console.log(count);
      $('#showtable').html('');
      for(i=0;i<count;i=i+1){
      $('#showtable').prepend(
      `"<div class="col-md-7">
      <a data.id="${i}" herf="#" class="JM"><h2><img src="data[0].filepic"></h2></a>
      </div>"`
    )}
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
  //console.log("good");
  $('#showtable').html('');
  for(i=0;i<50;i=i+1){
  $('#showtable').prepend(
    `<img src="img/butterfly.jpg" width="150px" height="100px">&nbsp &nbsp`
    );
  }
});
$('#showtable').on("click",function(){
  console.log("nice");
  ;
});
function QQ(id){
	console.log(id);
}
