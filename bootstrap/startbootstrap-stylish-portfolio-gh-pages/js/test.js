function list_Photo(){
		$.ajax({
		  type: 'GET',
      dataType :'json',
      url: "http://localhost/add/show.php?act=frog",
      success : function(data){
        //data[0].filepic = data[0].filepic.replace(/%/g, "+");
        //reader.readAsDataURL(data);
        $('#showtable').html('');
        for(i=0;i<data.length;i=i+1){
          $('#showtable').prepend(`
            <a data.id=${data[i].id} herf="#" name="${data[i].filename}" class="JM"><img width="300px" height="200px" src="data:image/jpeg;base64,${data[i].filepic}"></a>
            `)
        }
    },error : function(err){
      console.log('err');
    },
  });
}
function Post_id(name){
  $.ajax({
   type: 'POST',
   url: "http://localhost/add/showexif.php",
   data:{ filename : name  },
   dataType:'json',
   success: function(data){
        $('#modalshow').append(
        `<div>textName = <input type="text" id="textName" placeholder="${data[0].textName}" ></div><br/>
        <div>textIntroduce = <input type="text" id="textIntroduce" placeholder="${data[0].textIntroduce}" > </div><br/>
        <div>resolution = <input type="text" id="resolution" placeholder="${data[0].resolution}" > </div><br/>
        <div>camera = <input type="text" id="camera" placeholder="${data[0].camera}" > </div><br/>
        <div>aperture = <input type="text" id="aperture" placeholder="${data[0].aperture}" > </div><br/>
        <div>exposure = <input type="text" id="exposure" placeholder="${data[0].exposure}" > </div><br/>
        <div>IsoSpeed = <input type="text" id="IsoSpeed" placeholder="${data[0].isoSpeed}" > </div><br/>
        <div>focalLength = <input type="text" id="focalLength" placeholder="${data[0].focalLength}" > </div><br/>
        <div>saturation = <input type="text" id="saturation" placeholder="${data[0].saturation}" > </div><br/>
        <div>whiteBalance = <input type="text" id="whiteBalance" placeholder="${data[0].whiteBalance}" > </div><br/>
        <div>photoTime = <input type="text" id="photoTime" placeholder="${data[0].photoTime}" > </div> `
      );
    },
  });
}
$('#showtable').on("click",'.JM',function(){
	var src = $(this).html();
	$('#modalshow').append(src);
	var id = $(this).prop("id");
  var filename = $(this).prop("name");
  Post_id(filename);
  changepic(id,filename);
});
$('#frogbutton').on("click",function(){
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
function changepic(id,filename){
  console.log('change');
    $('#edit').on('click',function(){
        ajax({
            url: "http://localhost/add/edit.php?act=edit",
            type:"POST",
            data:{
            textName:$('#textName').val(),
            textIntroduce:$('#textIntroduce').val(),
            resolution:$('#resolution').val(),
            camera:$('#camera').val(),
            aperture:$('#aperture').val(),
            exposure:$('#exposure').val(),
            IsoSpeed:$('#IsoSpeed').val(),
            focalLengh:$('#focalLength').val(),
            saturation:$('#saturation').val(),
            whiteBalance:$('#whiteBalance').val(),
            photoTime:$('#photoTime').val(),
            id:id,
            },
            success:function(data){
                QQ(data);
            },
            error:function(error){
                alert("QQ");
            }
        });
    });
    $('delete').on('click',function(){
        ajax({
            url: "http://localhost/add/edit.php?act=delete",
            type:"POST",
            data:{id:id},
            success:function(data){
                alert("ok");
            },
            error:function(error){
                alert("QQ");
            }
        });
    });
};
