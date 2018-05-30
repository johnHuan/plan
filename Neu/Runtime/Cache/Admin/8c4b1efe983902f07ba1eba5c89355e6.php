<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>实验教学大纲</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<link rel="stylesheet" media="screen" type="text/css" href="/plan/Public/css/index.css">
<link rel="stylesheet" media="screen" type="text/css" href="/plan/Public/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" media="screen" type="text/css" href="/plan/Public/bootstrap/css/bootstrap-responsive.css">
<link rel="stylesheet" media="screen" type="text/css" href="/plan/Public/bootstrap/css/bootstrap-overrides.css">
<link rel="stylesheet" media="screen" type="text/css" href="/plan/Public/bootstrap/css/bootstrap-select.css">
<style>
    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu .dropdown-menu {
        top: 0;
        left: 100%;
        margin-top: -1px;
    }
</style>
<script type="text/javascript" src="/plan/Public/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="/plan/Public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/plan/Public/js/bootstrap-select.js"></script>
<script type="text/javascript" src="/plan/Public/js/jquery.form.js"></script>
<script>
    $(document).ready(function(){
        $('.dropdown-submenu a.test').on("click", function(e){
            $(this).next('ul').toggle();
            e.stopPropagation();
            e.preventDefault();
        });
    });
</script>

<nav class="container-fluid navbar navbar-default navbar-fixed-top">
    <div class="navbar-header">
        <a class="navbar-brand" href="#">教学管理系统</a>
        <button  class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse">
        <ul class="nav navbar-nav">
            <li>
                <a href="#" data-toggle="dropdown">培养计划<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li class="dropdown-submenu">
                        <a class="test" tabindex="-1" href="#">采矿工程<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="/plan/Public/data/采矿/2013版-X081501-采矿工程.pdf" target="_blank">2013级</a></li>
                            <li><a tabindex="-1" href="/plan/Public/data/采矿/2014版-X081501-采矿工程.pdf" target="_blank">2014级</a></li>
                            <li><a tabindex="-1" href="/plan/Public/data/采矿/2015版-X081501-采矿工程.pdf" target="_blank">2015级</a></li>
                            <li><a tabindex="-1" href="/plan/Public/data/采矿/2016版-X081501c-采矿工程（创新实验班）.pdf" target="_blank">2016级采矿工程（创新实验班）</a></li>
                            <li><a tabindex="-1" href="/plan/Public/data/采矿/2016版-X081501-采矿工程.pdf" target="_blank">2016级</a></li>
                            <li><a tabindex="-1" href="/plan/Public/data/采矿/2017版-X081501c-采矿工程（创新实验班）.pdf" target="_blank">2017级采矿工程（创新实验班）</a></li>
                            <li><a tabindex="-1" href="/plan/Public/data/采矿/2017版-X081501-采矿工程.pdf" target="_blank">2017级</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a class="test" tabindex="-1" href="#">土木工程<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="/plan/Public/data/土木/2013版-X081001-土木工程.pdf" target="_blank">2013版</a></li>
                            <li><a tabindex="-1" href="/plan/Public/data/土木/2014版-X081001-土木工程.pdf" target="_blank">2014版</a></li>
                            <li><a tabindex="-1" href="/plan/Public/data/土木/2015版-X081001y-土木工程（英语）.pdf" target="_blank">2015版(英语)</a></li>
                            <li><a tabindex="-1" href="/plan/Public/data/土木/2015版-X081001-土木工程.pdf" target="_blank">2015版</a></li>
                            <li><a tabindex="-1" href="/plan/Public/data/土木/2016版-X081001-土木工程.pdf" target="_blank">2016版</a></li>
                            <li><a tabindex="-1" href="/plan/Public/data/土木/2017版-X081001-土木工程.pdf" target="_blank">2017版</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a class="test" tabindex="-1" href="#">土木工程（国防生）<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="/plan/Public/data/土木工程国防生/2013版-X081001g-土木工程（国防生）.pdf" target="_blank">2013版</a></li>
                            <li><a tabindex="-1" href="/plan/Public/data/土木工程国防生/2014版-X081001g-土木工程（国防生）.pdf" target="_blank">2014版</a></li>
                            <li><a tabindex="-1" href="/plan/Public/data/土木工程国防生/2015版-X081001g-土木工程（国防生）.pdf" target="_blank">2015版</a></li>
                            <li><a tabindex="-1" href="/plan/Public/data/土木工程国防生/2016版-X081001g-土木工程（国防生）.pdf" target="_blank">2016版</a></li>
                            <li><a tabindex="-1" href="/plan/Public/data/土木工程国防生/2017版-X081001g-土木工程（国防生）.pdf" target="_blank">2017版</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a class="test" tabindex="-1" href="#">安全工程<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="/plan/Public/data/安全/2013版-X082901-安全工程.pdf" target="_blank">2013版</a></li>
                            <li><a tabindex="-1" href="/plan/Public/data/安全/2014版-X082901-安全工程.pdf" target="_blank">2014版</a></li>
                            <li><a tabindex="-1" href="/plan/Public/data/安全/2015版-X082901-安全工程.pdf" target="_blank">2015版</a></li>
                            <li><a tabindex="-1" href="/plan/Public/data/安全/2016版-X082901-安全工程.pdf" target="_blank">2016版</a></li>
                            <li><a tabindex="-1" href="/plan/Public/data/安全/2017版-X082901-安全工程.pdf" target="_blank">2017版</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a class="test" tabindex="-1" href="#">测绘工程<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="/plan/Public/data/测绘/2013版-X081201-测绘工程.pdf" target="_blank"/>2013版</a></li>
                            <li><a tabindex="-1" href="/plan/Public/data/测绘/2014版-X081201-测绘工程.pdf" target="_blank"/>2014版</a></li>
                            <li><a tabindex="-1" href="/plan/Public/data/测绘/2015版-X081201-测绘工程.pdf" target="_blank"/>2015版</a></li>
                            <li><a tabindex="-1" href="/plan/Public/data/测绘/2016版-X081201-测绘工程.pdf" target="_blank"/>2016版</a></li>
                            <li><a tabindex="-1" href="/plan/Public/data/测绘/2017版-X081201-测绘工程.pdf" target="_blank"/>2017版</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a class="test" tabindex="-1" href="#">环境工程<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="/plan/Public/data/环境/2013版-X082502-环境工程.pdf" target="_blank">2013版</a></li>
                            <li><a tabindex="-1" href="/plan/Public/data/环境/2014版-X082502-环境工程.pdf" target="_blank">2014版</a></li>
                            <li><a tabindex="-1" href="/plan/Public/data/环境/2015版-X082502-环境工程.pdf" target="_blank">2015版</a></li>
                            <li><a tabindex="-1" href="/plan/Public/data/环境/2016版-X082502-环境工程.pdf" target="_blank">2016版</a></li>
                            <li><a tabindex="-1" href="/plan/Public/data/环境/2017版-X082502-环境工程.pdf" target="_blank">2017版</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a class="test" tabindex="-1" href="#">资源勘查工程<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="/plan/Public/data/资源勘查/2013版-X081403-资源勘查工程.pdf" target="_blank">2013版</a></li>
                            <li><a tabindex="-1" href="/plan/Public/data/资源勘查/2014版-X081403-资源勘查工程.pdf" target="_blank">2014版</a></li>
                            <li><a tabindex="-1" href="/plan/Public/data/资源勘查/2015版-X081403-资源勘查工程.pdf" target="_blank">2015版</a></li>
                            <li><a tabindex="-1" href="/plan/Public/data/资源勘查/2016版-X081403-资源勘查工程.pdf" target="_blank">2016版</a></li>
                            <li><a tabindex="-1" href="/plan/Public/data/资源勘查/2017版-X081403-资源勘查工程.pdf" target="_blank">2017版</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a class="test" tabindex="-1" href="#">矿物加工工程<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="/plan/Public/data/矿物加工/2013版-X081503-矿物加工工程.pdf" target="_blank">2013版</a></li>
                            <li><a tabindex="-1" href="/plan/Public/data/矿物加工/2014版-X081503-矿物加工工程.pdf" target="_blank">2014版</a></li>
                            <li><a tabindex="-1" href="/plan/Public/data/矿物加工/2015版-X081503-矿物加工工程.pdf" target="_blank">2015版</a></li>
                            <li><a tabindex="-1" href="/plan/Public/data/矿物加工/2016版-X081503-矿物加工工程.pdf" target="_blank">2016版</a></li>
                            <li><a tabindex="-1" href="/plan/Public/data/矿物加工/2017版-X081503-矿物加工工程.pdf" target="_blank">2017版</a></li>
                        </ul>
                    </li>

                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">课程简介<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="/plan/index.php/Admin/kecheng/info">浏览</a></li>
                    <li><a href="/plan/index.php/Admin/kecheng/downloadinfo?v=b">下载B版</a></li>
                    <li><a href="/plan/index.php/Admin/kecheng/downloadinfo?v=c">下载C版</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">课程大纲<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="/plan/index.php/Admin/kecheng/shedual">按计划批次查看</a></li>
                    <li><a href="/plan/index.php/Admin/kecheng/overlook">浏览</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="/plan/index.php/Admin/kecheng/generateWordB"> <span class="glyphicon glyphicon-save"></span> 生成word文档并下载(B版)</a></li>
                    <li><a href="/plan/index.php/Admin/kecheng/generateExcel?v=B"> <span class="glyphicon glyphicon-save"></span> 生成Excel目录并下载(B版)</a></li>
                    <li><a href="/plan/index.php/Admin/kecheng/generateWordC"> <span class="glyphicon glyphicon-save"></span> 生成word文档并下载(C版)</a></li>
                    <li><a href="/plan/index.php/Admin/kecheng/generateExcel?v=C"> <span class="glyphicon glyphicon-save"></span> 生成Excel目录并下载(C版)</a></li>
                    <li><a href="/plan/index.php/Admin/kecheng/generateWord"> <span class="glyphicon glyphicon-save"></span> 生成word文档并下载(B+C)</a></li>
                    <li><a href="/plan/index.php/Admin/kecheng/generateExcel?v=A"> <span class="glyphicon glyphicon-save"></span> 生成Excel目录并下载(B+C版)</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="/plan/index.php/Admin/kecheng/downloadown">下载自己填的大纲（word版本）</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="/plan/index.php/Admin/kecheng/download?type=c&style=abscent">C版缺大纲</a> </li>
                    <li><a href="/plan/index.php/Admin/kecheng/download?type=c&style=conf">C版待确认</a></li>
                    <li><a href="/plan/index.php/Admin/kecheng/download?type=c&style=check">C版待审核</a></li>
                    <li><a href="/plan/index.php/Admin/kecheng/download?type=c&style=pass">C版已通过</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="/plan/index.php/Admin/kecheng/download?type=b&style=abscent">B版缺大纲</a></li>
                    <li><a href="/plan/index.php/Admin/kecheng/download?type=b&style=conf">B版待确认</a></li>
                    <li><a href="/plan/index.php/Admin/kecheng/download?type=b&style=check">B版待审核</a></li>
                    <li><a href="/plan/index.php/Admin/kecheng/download?type=b&style=pass">B版已通过</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">实验大纲 <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="/plan/index.php/Admin/shiyan/detail"> <span class="glyphicon glyphicon-new-window"></span> 实验课程明细</a></li>
                    <li><a href="/plan/index.php/Admin/shiyan/overlook"> <span class="glyphicon glyphicon-eye-open"></span> 浏览</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="/plan/index.php/Admin/shiyan/generateWordB"><span class="glyphicon glyphicon-save"></span> 生成word文档并下载(B)</a></li>
                    <li><a href="/plan/index.php/Admin/shiyan/generateWordC"><span class="glyphicon glyphicon-save"></span> 生成word文档并下载(C)</a></li>
                    <li><a href="/plan/index.php/Admin/shiyan/generateWord"><span class="glyphicon glyphicon-save"></span> 生成word文档并下载(B+C)</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="/plan/index.php/Admin/shiyan/generateExcel?v=C">C版实验大纲目录</a> </li>
                    <li><a href="/plan/index.php/Admin/shiyan/generateExcel?v=B">B版实验大纲目录</a> </li>
                    <li role="separator" class="divider"></li>
                    <li><a href="/plan/index.php/Admin/shiyan/download?type=c&style=abscent">C版缺大纲</a> </li>
                    <li><a href="/plan/index.php/Admin/shiyan/download?type=c&style=conf">C版待确认</a></li>
                    <li><a href="/plan/index.php/Admin/shiyan/download?type=c&style=check">C版待审核</a></li>
                    <li><a href="/plan/index.php/Admin/shiyan/download?type=c&style=pass">C版已通过</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="/plan/index.php/Admin/shiyan/download?type=b&style=abscent">B版缺大纲</a></li>
                    <li><a href="/plan/index.php/Admin/shiyan/download?type=b&style=conf">B版待确认</a></li>
                    <li><a href="/plan/index.php/Admin/shiyan/download?type=b&style=check">B版待审核</a></li>
                    <li><a href="/plan/index.php/Admin/shiyan/download?type=b&style=pass">B版已通过</a></li>
                </ul>
            </li>
            <li><a href="/plan/index.php/Admin/shiyan/guideBook">实验指导书</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">实践大纲 <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li class="disabled"><a href="#">添加</a></li>
                    <li><a href="/plan/index.php/Admin/shijian/overlook">浏览</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="/plan/index.php/Admin/shijian/generateWordB"> <span class="glyphicon glyphicon-save"></span> 生成word文档并下载（B版）</a></li>
                    <li><a href="/plan/index.php/Admin/shijian/generateWordC"> <span class="glyphicon glyphicon-save"></span> 生成word文档并下载（C版）</a></li>
                    <li><a href="/plan/index.php/Admin/shijian/generateWord"> <span class="glyphicon glyphicon-save"></span> 生成word文档并下载（B+C）</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="/plan/index.php/Admin/shijian/download?type=c&style=abscent">C版缺大纲</a> </li>
                    <li><a href="/plan/index.php/Admin/shijian/download?type=c&style=conf">C版待确认</a></li>
                    <li><a href="/plan/index.php/Admin/shijian/download?type=c&style=check">C版待审核</a></li>
                    <li><a href="/plan/index.php/Admin/shijian/download?type=c&style=pass">C版已通过</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="/plan/index.php/Admin/shijian/download?type=b&style=abscent">B版缺大纲</a></li>
                    <li><a href="/plan/index.php/Admin/shijian/download?type=b&style=conf">B版待确认</a></li>
                    <li><a href="/plan/index.php/Admin/shijian/download?type=b&style=check">B版待审核</a></li>
                    <li><a href="/plan/index.php/Admin/shijian/download?type=b&style=pass">B版已通过</a></li>
                </ul>
            </li>
            <li><a href="/plan/index.php/Admin/shijian/guideBook">实践指导书</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">矩阵表 <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="/plan/index.php/Admin/Metrix/biyeyaoqiu" target="_blank">毕业要求对培养目标的支撑</a></li>
                    <li><a href="/plan/index.php/Admin/Metrix/peiyahngjihua" target="_blank">课程计划与毕业要求对应关系矩阵</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">教学任务书 <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="/plan/index.php/Admin/Task/showTaskInfo?v=782">2017-2018学年第二学期</a></li>
                    <li><a href="/plan/index.php/Admin/Task/showTaskInfo?v=781">2017-2018学年第一学期</a></li>
                    <li><a href="/plan/index.php/Admin/Task/showTaskInfo?v=672">2016-2017学年第二学期</a></li>
                </ul>
            </li>
        </ul>
        <ul class="nav navbar-nav pull-right" style="width: 200px;">
            <li><a><span class="text-info"><?php echo (session('admin_name')); ?></span>您好!</a></li>　　
            <li><a href="/plan/index.php/Admin/Shiyan/logout">退出</a></li>
        </ul>
    </div>
</nav>

<br><br>


    <style>

        /*returnTop开始*/
        div#back-to-top{
            z-index: 99999;
            position:fixed;
            display:none;
            bottom:80px;
            right:30px;
        }
        div#back-to-top a{
            text-align:center;
            text-decoration:none;
            display:block;
            width:38px;
            /*使用CSS3中的transition属性给跳转链接中的文字添加渐变效果*/
            -moz-transition:color 1s;
            -webkit-transition:color 1s;
            -o-transition:color 1s;
        }
        div#back-to-top a:hover{
            color:#979797;
        }
        div#back-to-top a span{
            background: transparent url('/plan/Public/img/top.png') no-repeat ;
            background-size: contain;
            border-radius:6px;
            display:block;
            height:38px;
            width:38px;
            margin-bottom:5px;
            /*使用CSS3中的transition属性给<span>标签背景颜色添加渐变效果*/
            -moz-transition:background 1s;
            -webkit-transition:background 1s;
            -o-transition:background 1s;
        }
        div#back-to-top a:hover span{
            background: transparent url('/plan/Public/img/top.png') no-repeat ;
            background-size: contain;
        }
        /*returnTop结束*/
        input[type="reset"]{background: #337ab7; text-decoration: none;}
        .button{position: relative;overflow: hidden;margin-right: 4px;display:inline-block;
            *display:inline;padding:4px 10px 4px;font-size:14px;line-height:18px;
            *line-height:20px;color:#fff;
            text-align:center;vertical-align:middle;cursor:pointer;background:#5bb75b;
            border:1px solid #cccccc;border-color:#e6e6e6 #e6e6e6 #bfbfbf;
            border-bottom-color:#b3b3b3;-webkit-border-radius:4px;
            -moz-border-radius:4px;border-radius:4px;}
        .button input{position: absolute;top: 0; right: 0;margin: 0;border:solid transparent;
            opacity: 0;filter:alpha(opacity=0); cursor: pointer;}
        .progress{position:relative; margin-left:100px; margin-top:-24px;
            width:200px;padding: 1px; border-radius:3px; display:none}
        .bar {background-color: green; display:block; width:0%; height:20px;
            border-radius:3px; }
        .percent{position:absolute; height:20px; display:inline-block;
            top:3px; left:2%; color:#fff }
        .files{height:22px; line-height:22px; margin:10px 0}
        .delimg{margin-left:20px; color:#090; cursor:pointer}
    </style>
    <div class="container-fluid" data-spy="scroll" data-target="#myscrollspy">
        <div class="header">
            <h1 class="text-center">资土学院 实验教学大纲</h1>
        </div>
    </div>

    <!--返回顶部-->
    <div id="top"></div>
    <div id="back-to-top"><a href="#top"><span></span></a></div>


    <div class="container-fluid table-responsive">
        <table class="table table-bordered table-hover">
            <caption>
                <form class="navbar-form" action="/plan/index.php/Admin/shiyan/overlook" method="post">
                    <p>菜单项：
                        <a href="/plan/index.php/Admin/Shiyan/showc" class="btn btn-xs btn-primary">C版课程库</a> |
                        <a href="/plan/index.php/Admin/Shiyan/showb" class="btn btn-xs btn-primary">B版课程库</a>

                    </p>
                    筛选条件：
                    <div data-toggle="buttons" class="btn-group">
                        <label class="btn btn-default"><input name="version" type="radio" value="B">B版</label>　
                        <label class="btn btn-default"><input name="version" type="radio" value="C">C版</label>　
                    </div>
                    <div data-toggle="buttons" class="btn-group">
                        <label class="btn btn-default"><input name="status" type="radio" value="0">待确认</label>　
                        <label class="btn btn-default"><input name="status" type="radio" value="1">待审核</label>　
                        <label class="btn btn-default"><input name="status" type="radio" value="2">已通过</label>　
                    </div>
                    <div class="form-group">
                        <select name="SMajor" class="selectpicker form-control">
                            <option value="">--选择专业--</option>
                            <option value="测绘工程">测绘工程</option>
                            <option value="采矿工程">采矿工程</option>
                            <option value="土木工程">土木工程</option>
                            <option value="安全工程">安全工程</option>
                            <option value="环境工程">环境工程</option>
                            <option value="矿物加工工程">矿物加工工程</option>
                            <option value="资源勘探工程">资源勘探工程</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input name="keywords" type="text" class="form-control" placeholder="键入关键字 模糊检索">
                        <button type="submit" class="btn btn-info">检索</button>
                    </div>
                </form>
            </caption>
                <tr>
                    <th>序号</th>
                    <th>课程编号</th>
                    <th>课程名称</th>
                    <th>适用专业</th>
                    <th>试验学时数</th>
                    <th>课程负责人</th>
                    <th>审核人</th>
                    <th>操作</th>
                    <th>状态</th>
                    <!--<th><input type="checkbox" id="all"></th>-->
                </tr>

                <?php if($list == ''): ?><tr>
                        <td colspan="9" class="bg-danger">
                            <span class="text-warning">没有任何数据</span>
                        </td>
                    </tr>
                <?php else: ?>
                    <?php if(is_array($list)): foreach($list as $k=>$vo): ?><tr>
                            <td><?php echo ($k+1); ?></td>
                            <td><?php echo ($vo["CCode"]); ?></td>
                            <td><?php echo ($vo["CName"]); ?></td>
                            <td><?php echo ($vo["SMajor"]); ?></td>
                            <td><?php echo ($vo["TNum"]); ?></td>
                            <td><?php echo ($vo["CMaster"]); ?></td>
                            <td><?php echo ($vo["CConductor"]); ?></td>
                            <td class="text-center">
                                <?php if($vo["status"] == 2): ?><a class="btn btn-xs btn-success" href="/plan/index.php/Admin/Shiyan/auth?ccode=<?php echo ($vo["CCode"]); ?>" title="授权使其有修改的权限">授权</a>
                                    <?php else: ?>
                                    <a href="/plan/index.php/Admin/Shiyan/edit?id=<?php echo ($vo["id"]); ?>&ccode=<?php echo ($vo["CCode"]); ?>" title="编辑"><span class="glyphicon glyphicon-edit"></span></a><?php endif; ?>
                            </td>
                            <td>
                                <?php if($vo["status"] == 0): ?><a href="/plan/index.php/Admin/Shiyan/confirm?id=<?php echo ($vo["id"]); ?>&CCode=<?php echo ($vo["CCode"]); ?>" class="btn btn-xs btn-primary">待确认</a>
                                <?php elseif($vo["status"] == 1): ?>
                                    <a href="/plan/index.php/Admin/Shiyan/check?id=<?php echo ($vo["id"]); ?>&CCode=<?php echo ($vo["CCode"]); ?>" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-bell"></span> 待审核</a>
                                <?php else: ?>
                                    <span class="disabled glyphicon glyphicon-ok">已通过</span><?php endif; ?>
                            </td>
                        </tr><?php endforeach; endif; endif; ?>
            </table>
    </div>


    <script>
        /*
         * 回到顶部
         * */
        $(function(){
            //当滚动条的位置处于距顶部100像素以下时，跳转链接出现，否则消失
            $(function () {
                $(window).scroll(function(){
                    if ($(window).scrollTop()>100){
                        $("#back-to-top").fadeIn(1500);
                    } else {
                        $("#back-to-top").fadeOut(1500);
                    }
                });

                //当点击跳转链接后，回到页面顶部位置
                $("#back-to-top").click(function(){
                    $('body,html').animate({scrollTop:0},1000);
                    return false;
                });
            });
        });




    </script>

<!--footer-->
<footer class="footer footer-fixed-bottom">


<div class="container-fluid">

    <div class="footer">
        &copy;2016-2017 Northeastern University 资源与土木工程学院. <br />
        <a target="_blank" href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=WyEzOjU8My46NXUzKy4bPTQjNjoyN3U4NDY" style="text-decoration:none;"><img src="http://rescdn.qqmail.com/zh_CN/htmledition/images/function/qm_open/ico_mailme_02.png"/></a>
        author：<strong class="text-info">张桓</strong>；  All rights reserved.<br />
        技术咨询：john；   248404941（QQ）；yz30.com@aliyun.com（email）；
		<p>感谢 车德福院长、林萱老师的宝贵意见和大力支持， 感谢赵强、贾庆仁以及其他老师和同学们的帮助</p>
    </div>
</div>
</footer>
<!-- End container-->
</body>
</html>