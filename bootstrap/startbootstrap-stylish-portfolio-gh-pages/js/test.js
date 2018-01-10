function list_Photo(){
	$.ajax({
	  type: 'GET',
      dataType :'json',
      url: "http://localhost/add/show.php?act=frog",
      success : function(data){
		show_Photo(data);
	  },error : function(err){
			console.log('err');
	  },
    });
}
function show_Photo(data){
	$('#showtable').html('');
	for(i=0;i<data.length;i=i+1){
		$('#showtable').prepend(`
        <a data.id=${data[i].id} herf="#" name="${data[i].filename}" class="JM"><img width="300px" height="200px" src="data:image/jpeg;base64,${data[i].filepic}"></a>
        `);
    }
}
function Post_id(name){
  $.ajax({
   type: 'POST',
   url: "http://localhost/add/showexif.php",
   data:{ filename : name  },
   dataType:'json',
   success: function(data){
        $('#modalshow').append(
        `<div>textName = <input type="text" id="textName" placeholder="${data[1].textName}" ></div><br/>
        <div>textIntroduce = <input type="text" id="textIntroduce" placeholder="${data[1].textIntroduce}" > </div><br/>
        <div>resolution = <input type="text" id="resolution" placeholder="${data[0].resolution}" > </div><br/>
        <div>camera = <input type="text" id="camera" placeholder="${data[0].camera}" > </div><br/>
        <div>aperture = <input type="text" id="aperture" placeholder="${data[0].aperture}" > </div><br/>
        <div>exposure = <input type="text" id="exposure" placeholder="${data[0].exposure}" > </div><br/>
        <div>isoSpeed = <input type="text" id="isoSpeed" placeholder="${data[0].isoSpeed}" > </div><br/>
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
	$('#modalshow').html('');
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
function changepic(id,filename){
    $('#edit').unbind('click').on('click',function(){
		console.log('change');
        $.ajax({
            url: "http://localhost/add/edit.php",
            type:"POST",
            data:{
            textName:$('#textName').val(),
            textIntroduce:$('#textIntroduce').val(),
            resolution:$('#resolution').val(),
            camera:$('#camera').val(),
            aperture:$('#aperture').val(),
            exposure:$('#exposure').val(),
            isoSpeed:$('#isoSpeed').val(),
            focalLength:$('#focalLength').val(),
            saturation:$('#saturation').val(),
            whiteBalance:$('#whiteBalance').val(),
            photoTime:$('#photoTime').val(),
            filename:filename,
            },
            success:function(data){
				alert('修改成功!');
            },
            error:function(error){
                alert("QQ");
            }
        });
    });
    $('#delet').on('click',function(){
        $.ajax({
            url: "http://localhost/add/delete.php?act=delete",
            type:"POST",
            data:{filename:filename},
            success:function(data){
                alert("ok");
				show_Photo(data);
            },
            error:function(error){
                alert("QQ");
            }
        });
    });
};
