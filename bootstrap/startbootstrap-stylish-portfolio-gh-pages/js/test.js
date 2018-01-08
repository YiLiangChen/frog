function list_Photo(){
  console.log('good');
		$.ajax({
		  type: 'GET',
      dataType: "binary",
      url: "http://localhost/frog-master/add/show.php?act=frog",
      success : function(data){
      console.log(data[0]);
      $('#showtable').prepend(
        `"<div class="col-md-7">
      for(i=0;i<data.length;i++){
      <a id="${data.id}" herf="#" class="JM"><h2><img src="data:image/jpeg;base64,{data[0].filepic}"/></h2></a>
      }</div>"`
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
