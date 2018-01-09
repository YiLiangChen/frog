function list_Photo(){
  console.log('good');
		$.ajax({
		  type: 'GET',
      dataType :'json',
      url: "http://localhost/frog-master/add/show.php?act=frog",
      success : function(data){
        //data[0].filepic = data[0].filepic.replace(/%/g, "+");
        console.log(data[0].filepic);
        //reader.readAsDataURL(data);
        $('#showtable').html('');
        for(i=0;i<data.length;i=i+1){
          $('#showtable').prepend(
            `
            <a data.id="${i}" herf="#" class="JM"><img width="300px" height="200px" src="data:image/jpeg;base64,${data[i].filepic}"></a>
            `
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
  for(i=0;i<4;i=i+1){
  $('#showtable').prepend(
    `<img src="data:image/jpeg;base64," width="150px" height="100px">&nbsp &nbsp`
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
