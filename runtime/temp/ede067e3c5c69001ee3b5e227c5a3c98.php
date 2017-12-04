<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:20:"brand/brand_add.html";i:1512399265;}*/ ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="">

        <title>品牌管理添加</title>

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
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div style="height: 20px;"></div>
                    <div class="form-inline">
                        <div class="form-group">
                            <label for="brand_name">品牌名称：</label>
                            <input class="form-control" id="brand_name" name="brand_name">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" id="save" type="button">Change Content</button>
                        </div>
                    </div>
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
    </body>
</html>