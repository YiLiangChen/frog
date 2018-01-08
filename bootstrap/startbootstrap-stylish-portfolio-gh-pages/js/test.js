function list_Photo(){
  console.log('good');
		$.ajax({
		  type: 'GET',
      url: "http://localhost/frog-master/add/show.php?act=frog",
      success : function(data){
      console.log(data);
      $('#about').prepend(
        `"<div class="col-md-7">
        <h2><img src="data[0].filepic"/></h2>
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
