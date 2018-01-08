
/**********************************************************************************************
***********************************************************************************************/
	function controller(){
		$("body").on("change", "#singleImage", function (){
			preview(this);
		})
		$('#postSingle').on('click',postSingle);
		$(".open-file").on("click", function (){
			$("#singleImage").click();
		});
	}
/**********************************************************************************************
**********************************************************************************************/	
	
	
/****************************************************************************************************
****************************************************************************************************/	
	
	function format_float(num, pos)
    {
        var size = Math.pow(10, pos);
        return Math.round(num * size) / size;
    }
 
    function preview(input) {
 
        if (input.files && input.files[0]) {
			//$('#name').html('檔案名稱 :'+input.files[0].name);
			$('#listText').html('');
			$('#listText').prepend(`
			<div id="name" >檔案名稱</div><input type="text" name="name" value="${input.files[0].name}" ><br/>
			<div id="introduce" >介紹</div><textarea type="text" style="style="width:300px;height:100px;" name="introduce"/><br/>
			`);
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.preview').attr('src', e.target.result);
                var KB = format_float(e.total / 1024, 2);
                $('.size').text("檔案大小：" + KB + " KB");
            }
 
            reader.readAsDataURL(input.files[0]);
        }
    }
	
	function postSingle(){
		var files = $('#singleImage').prop('files');
		var data = new FormData();
		data.append('file[]', files[0]);
		console.log(files);
		$.ajax({
			type: 'POST',
			url: 'http://localhost/add/upload.php',
			data: data,
			cache: false,
			processData: false,
			contentType: false,
			success: function(data){
			  alert(data);
			  $('#Modalogin').modal('hide');
		  },
		  error: function(e,xhr,options){
			  $('#Modalogin').modal('hide');
			  console.log(e.status);
			  if(e.status==401)
				  alert('你被拒絕囉');
			  else if(e.status==404)
				  alert('找不到此網頁');
		  },
		});
		
	}
 
    function multiPost(files){
		var data = new FormData();
		for(i=0;i<files.length;i++)
			data.append('file[]', files[i]);
		console.log(files);
		$.ajax({
			type: 'POST',
			url: 'http://localhost/add/upload.php',
			data: data,
			cache: false,
			processData: false,
			contentType: false,
			success: function(data){
			  alert(data);
			  $('#Modalogin').modal('hide');
		  },
		  error: function(e,xhr,options){
			  $('#Modalmulti').modal('hide');
			  console.log(e.status);
			  if(e.status==401)
				  alert('你被拒絕囉');
			  else if(e.status==404)
				  alert('找不到此網頁');
		  },
		});
	}
	function init() {
		$('#message').html('OUR SITE IS NOT READY YET...');
		controller();
	}
	
	function dragHandler(event){
		console.log('yes');
		event.target.style.border = "4px dotted blue";
		event.stopPropagation();
		event.preventDefault(); //防止瀏覽器執行預設動作
	}
    function dragLeave(event) {
		event.target.style.border = "none";
	}
	function drop_image(event){
		event.preventDefault(); //防止瀏覽器執行預設動作
		event.target.style.border = "none";
		var files  = event.dataTransfer.files; //擷取拖曳的檔案
		//把擷取到的檔案用POST送到後端去 
		$('#postMulti').on('click',multiPost(files));
	}
	
