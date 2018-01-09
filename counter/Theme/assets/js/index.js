
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
			<div>檔案名稱</div><input type="text" id="name" placeholder="名稱:例如莫氏樹蛙" ><br/>
			<div>介紹</div><textarea type="text" id="introduce"  style="style="width:300px;height:100px;" name="introduce"/><br/>
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
		var introduce = $('#introduce').val();
		var name = $('#name').val();
		var data = new FormData();
		data.append('file[]', files[0]);
		data.append('filename',name);
		data.append('introduce',introduce);
		console.log(data);
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
		$.ajax({
			type: 'POST',
			url: 'http://localhost/add/upload.php',
			data: data,
			cache: false,
			processData: false,
			contentType: false,
			xhr:function(){
				var xhr = new window.XMLHttpRequest();
                //用來處理上傳的事件
                xhr.upload.addEventListener("progress", function (evt) {
					console.log(Math.round(evt.loaded / evt.total * 100) + "%")
                    $('#statustxt').html(Math.round(evt.loaded / evt.total * 100) + "%");
                }, false);
                return xhr;
			},
			success: function(data){
			  alert(data);
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
		var swap;
		var files  = event.dataTransfer.files; //擷取拖曳的檔案
		for(i=0;i<files.length;i++){
			if (!files[i].type.match('image')){
				var name = files[i].name ;
				alert(name+'無法上傳！請拖曳圖片檔案！');
				continue ;
			}
			var reader = new FileReader(files[i]);
				reader.onload = function(e){
					$('#drop_image').append(`
						<span >
							<img src="${e.target.result}" height="100px" width="160px" style="margin-top:10px;" />
						</span>	
					`);
				}
			reader.readAsDataURL(files[i]);
		}
		$(document).on('click','#postMulti',function(){
			$('#WW').css('display','');
			$('#Modalmulti').modal('hide');
			multiPost(files);
		});
	}
	
