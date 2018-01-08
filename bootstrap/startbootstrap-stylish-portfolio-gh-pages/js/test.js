function list_Photo(){
  console.log('good');
		$.ajax({
		  type: 'GET',
<<<<<<< HEAD
      //dataType: "binary",
      url: "http://localhost/frog-master/add/show.php?act=frog",
      success : function(data){
      console.log(data.length);
      $('#showtable').html('');
      for(i=0;i<data.length;i=i+1){
      $('#showtable').prepend(
      `"<div class="col-md-7">
      <a data.id="${i}" herf="#" class="JM"><h2><img src="data[0].filepic"></h2></a>
      </div>"`
    )}
=======
      url: "http://localhost/frog-master/add/show.php?act=frog",
      success : function(data){
      console.log(data);
      $('#about').prepend(
        `"<div class="col-md-7">
        <h2><img src="data[0].filepic"/></h2>
        </div>"`
      )
>>>>>>> f6dda5813574423118c9030fbe421b4a3c60ee36
    },error : function(err){
      console.log(err.status);
    },
  });
}
<<<<<<< HEAD
$('#showtable').on("click",'.JM',function(){
	var src = $(this).html();
	$('#modalshow').html(src);
	console.log("安安");
	var id = $(this).prop("id");
  QQ(id);
});
=======
>>>>>>> f6dda5813574423118c9030fbe421b4a3c60ee36
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
