<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:24:"special/special_add.html";i:1512291206;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>型号管理添加</title>
</head>
<body>

<!--下拉框-->
<select id="brand_id">
    <?php if(is_array($brandList) || $brandList instanceof \think\Collection || $brandList instanceof \think\Paginator): $i = 0; $__LIST__ = $brandList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <option  value ="<?php echo $vo['brand_id']; ?>"><?php echo $vo['brand_name']; ?></option>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</select>

    <input id="special_name" name="special_name" value="text">
    <button id="save" type="button">Change Content</button>
</body>
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.js"></script>
<script>

    $(document).ready(function(){
        $("#save").click(function(){
            $.ajax({
                url:"/special_save",
                type:"post",
                data:{"brand_id":$("#brand_id").val(),"special_name":$("#special_name").val()},
                dataType:"json",
                success:function(html){
                    console.log(html);
                }
            });
        });
    });
</script>
</html>