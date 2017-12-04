<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:24:"special/special_add.html";i:1512401850;}*/ ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>型号管理添加</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="">

        <!-- Bootstrap core CSS -->
        <link href="/static/css/bootstrap.min.css" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="/static/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]>
        <script src="/static/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="/static/js/ie-emulation-modes-warning.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!-- Static navbar -->
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Project name</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="brand_list">品牌维护</a></li>
                        <li class="active"><a href="special_list">型号维护</a></li>
                        <li><a href="#number">数量维护</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
        <!--下拉框-->
        <div class="container">
            <div class="row">
                <div class="form-group">
                    <label for="brand_id">品牌：</label>
                    <select class="form-control" id="brand_id">
                        <?php if(is_array($brandList) || $brandList instanceof \think\Collection || $brandList instanceof \think\Paginator): $i = 0; $__LIST__ = $brandList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option  value ="<?php echo $vo['brand_id']; ?>"><?php echo $vo['brand_name']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="special_name">型号名称：</label>
                    <input class="form-control" id="special_name" name="special_name">
                </div>
                <div class="form-group">
                    <button class="btn btn-success" id="save" type="button">添加型号</button>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="/static/js/jquery.min.js"><\/script>')</script>
        <script src="/static/js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="/static/js/ie10-viewport-bug-workaround.js"></script>

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
    </body>

</html>