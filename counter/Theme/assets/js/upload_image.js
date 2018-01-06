function drop_image(e)
{
    e.preventDefault() ;
    var upload_image     = document.getElementById('drop_image') ;
    var elProgress       = document.getElementById('upload_progress') ;
    var images_container = document.getElementById('images_container') ;
    var objXhr           = new XMLHttpRequest() ;
    var files            = e.dataTransfer.files ;
    var objForm          = new FormData() ;
    var sucess_count     = 0 ;
    
    objXhr.upload.onprogress = function(e)
    {
        if (e.lengthComputable)
        {
            var intComplete = (e.loaded / e.total) * 100 | 0 ;
            
            elProgress.innerHTML   = intComplete + '%' ;
            elProgress.style.width = intComplete + '%' ;
            
            elProgress.setAttribute('aria-valuenow', intComplete) ;
        }
    }
    
    objXhr.onload = function(e)
    {
        upload_image.className = upload_image.className.replace(' dragover', '') ;
        elProgress.className   = elProgress.className.replace(' active', '') ;
        
        var arrData = JSON.parse(objXhr.responseText) ;
        
        for (var i=0; i<arrData.length; i++)
        {
            if (arrData[i].message == 'Success')
            {
                var img = new Image() ;
                img.src = arrData[i].url ;
                img.className = 'image' ;
                images_container.appendChild(img) ;
            }
        }
    }
    
    objXhr.open('POST', 'php/upload.php?name=images') ;
    for (var i=0; i<files.length; i++)
    {
        if (!files[i].type.match('image'))
        {
            var name = files[i].name ;
            alert(name+'無法上傳！請拖曳圖片檔案！') ;
            continue ;
        }
        objForm.append('images[]', files[i]) ;
    }
    
    objXhr.send(objForm) ;
}

function dragHandler(e)
{
    var upload_image = document.getElementById('drop_image') ;
    var elProgress = document.getElementById('upload_progress') ;
    e.preventDefault() ;
    if (!upload_image.className.match('dragover'))
    {
        upload_image.className = upload_image.className + ' dragover' ;
    }
    
    if (upload_progress.style.width != '0%')
    {
        upload_progress.style.width = '0%' ;
    }
}
