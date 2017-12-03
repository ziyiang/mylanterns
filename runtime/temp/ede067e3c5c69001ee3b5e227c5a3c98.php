<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:20:"brand/brand_add.html";i:1512275490;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>品牌管理添加</title>
</head>
<body>
    <input id="brand_name" name="brand_name" value="text">
    <button id="save" type="button">Change Content</button>
</body>
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.js"></script>
<script>

    $(document).ready(function(){
        $("#save").click(function(){
            $.ajax({
                url:"/brand_save",
                type:"post",
                data:{"brand_name":$("#brand_name").val()},
                dataType:"json",
                success:function(html){
                    console.log(html);
                }
            });
        });
    });
</script>
</html>