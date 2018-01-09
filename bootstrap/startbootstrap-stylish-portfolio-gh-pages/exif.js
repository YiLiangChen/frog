<script>
function changepic(id){
    $('edit').on('click',function(){
        ajax({
            url: "edit.php?act='edit'",
            type:"POST",
            data:{
            filename:$('#filename').val();,
            textName:$('#textName').val();,
            textIntroduce:$('#textIntroduce').val();,
            id:id
            },
            success:function(data){
                alert("ok");
            },
            error:function(error){
                alert("QQ");
            }
        });
    });
    $('delete').on('click',function(){
        ajax({
            url: "edit.php?act='delete'",
            type:"POST",
            data:{
            id:id
            },
            success:function(data){
                alert("ok");
            },
            error:function(error){
                alert("QQ");
            }
        });
    });
};
</script>