<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>课程教学大纲</title>
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
            <li><a href="/plan/index.php/Admin/Kecheng/logout">退出</a></li>
        </ul>
    </div>
</nav>

<br><br>

    <!--<script src="/plan/Public/bootstrap/js/validator.min.js"></script>-->
    <style>
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
        input[type="text"]{width: 100%;}
        textarea{width:100%;}
        .wxs{width:50px;}
        .wmd{width:100px;}
        .wlg{width:150px;}
        .minw{min-width: 100px}
        .medw{min-width: 200px;}

        /*returnTop开始*/
        div#back-to-top{
            z-index: 99999;
            position:fixed;
            display:block;
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
        div#sidebar-save {
            z-index: 9999;
            position: fixed;
            display: block;
            right: 20px;
            bottom: 200px;
        }
        div#sidebar-reload {
            z-index: 9999;
            position: fixed;
            display: block;
            right: 20px;
            bottom: 150px;
        }
    </style>


    <!--返回顶部-->
    <div id="top"></div>
    <div id="sidebar-save"><button class="btn btn-info btn-xs tempSave" ><span id="save" class="glyphicon glyphicon-floppy-save" title="临时保存">保存</span></button></div>
    <div id="sidebar-reload"><button class="btn btn-info btn-xs reload" ><span id="reload" class="glyphicon glyphicon-refresh">恢复</span></button></div>
    <div id="back-to-top"><a href="#top"><span></span></a></div>

    <div class="container-fluid">
        <div class="header">
            <h1 class="text-center">资土学院 课程教学大纲</h1>
        </div>
        <form action="/plan/index.php/Admin/Kecheng/editDo" method="post" data-toggle="validator" id="myForm" role="form">
            <!--<input type="text" value=" flag" name="flag">-->
            <div class="panel-body table-responsive">
                <table class="table table-bordered table-striped">
                    <caption>
                        添加课程教学大纲：
                    </caption>
                    <tbody>
                    <tr>
                        <td colspan="2" class="text-center wxs">课程编号</td>
                        <td colspan="3"><input readonly value="<?php echo ($data["CCode"]); ?>" name="CCode" type="text" class="inline-input medw" required></td>
                        <td colspan="2" class="text-center wxs">课程名称</td>
                        <td colspan="3"><input readonly value="<?php echo ($data["CName"]); ?>" name="CName" type="text" class="inline-input medw" required></td>
                    </tr>
                    <tr>
                        <td colspan="1" class="text-center wlg">课程英文名称</td>
                        <td colspan="9"><input value="<?php echo ($data["EName"]); ?>" name="EName" type="text" class="inline-input" required></td>
                    </tr>
                    <tr>
                        <td class="text-center">总学时数</td>
                        <td><input readonly value="<?php echo ($data["totalSNum"]); ?>" name="totalSNum" type="text" class="inline-input minw" required></td>
                        <td rowspan="2" class="text-center wmd">理论<br>学时</td>
                        <td rowspan="2" class="text-center wmd">
                            <textarea readonly name="theroyNum" cols="15" rows="3" required data-require="true" aria-required="true"><?php echo ($data["theroyNum"]); ?></textarea>
                        </td>
                        <td rowspan="2" class="text-center wmd">实验<br>学时</td>
                        <td rowspan="2">
                            <textarea readonly name="practiseNum" cols="10" rows="3" required data-require="true" aria-required="true"><?php echo ($data["practiseNum"]); ?></textarea>
                        </td>
                        <td rowspan="2" class="text-center wmd">上机学时</td>
                        <td rowspan="2">
                            <textarea  readonly name="PCNum" cols="10" rows="3" required data-require="true" aria-required="true"><?php echo ($data["PCNum"]); ?></textarea>
                        </td>
                        <td rowspan="2">本课程负责人</td>
                        <td rowspan="2"  class="text-center wmd">
                            <textarea name="CMaster" cols="15" rows="3" required data-require="true" aria-required="true"><?php echo ($data["CMaster"]); ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">学分</td>
                        <td><input readonly value="<?php echo ($data["TScore"]); ?>" name="TScore" type="text" class="inline-input" required></td>
                    </tr>
                    <tr>
                        <td class="text-center" colspan="1">开课单位</td>
                        <td colspan="4"><input value="<?php echo ($data["Thosted"]); ?>" name="Thosted" type="text" class="inline-input" required></td>
                        <td colspan="1" class="text-center">适用专业</td>
                        <td colspan="4"><input value="<?php echo ($data["SMajor"]); ?>" name="SMajor" type="text" class="inline-input" required></td>
                    </tr>
                    <tr>
                        <td colspan="1" class="text-center">考核方式</td>
                        <td colspan="9"><input value="<?php echo ($data["Tassess"]); ?>" name="Tassess" type="text" class="inline-input" required></td>
                    </tr>
                    <tr>
                        <td colspan="1" class="text-center">先修课程</td>
                        <td colspan="9"><input value="<?php echo ($data["TBefore"]); ?>" name="TBefore" type="text" class="inline-input" required></td>
                    </tr>
                    <tr>
                        <td colspan="1" class="text-center">课程类型</td>
                        <td colspan="9"><input value="<?php echo ($data["CStyle"]); ?>" name="CStyle" type="text" class="inline-input" required></td>
                    </tr>
                    <tr>
                        <td colspan="1" class="text-center">选用教材</td>
                        <td colspan="9">
                            <textarea name="TBook" cols="30" rows="4" required><?php echo ($data["TBook"]); ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="1" class="text-center">主要教学参考书</td>
                        <td colspan="9">
                            <textarea name="TreferBook" cols="30" rows="10" required><?php echo ($data["TreferBook"]); ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="1" class="text-center">课程简介（300~500字）</td>
                        <td colspan="9">
                            <textarea name="CIntroduction" cols="30" rows="10" required aria-required="true" data-require="true"><?php echo ($data["CIntroduction"]); ?></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="1" class="text-center">课程内容及教学目标</td>
                        <td colspan="9">
                            <textarea name="TContent" cols="30" rows="10" required aria-required="true" data-require="true"><?php echo ($data["TContent"]); ?></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="1" class="text-center">课程目标与毕业要求之间的关系<br>
                            <i class="text-danger">备注：<br>H-高度支撑；<br>M-中度支撑；<br>L-一般支撑。</i>
                        </td>
                        <td colspan="9">
                            <textarea name="TRelation" cols="30" rows="10" required data-require="true" aria-required="true"><?php echo ($data["TRelation"]); ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="1" rowspan="<?php echo ($cnt+2); ?>" class="text-center"><br>教学方法及学时分配</td>
                        <td colspan="4" rowspan="2" class="text-center"><br>教学内容</td>
                        <td colspan="3" class="text-center">学时</td>
                        <td colspan="2" rowspan="2" class="text-center"><br>教学方法</td>
                    </tr>
                    <tr>
                        <td class="text-center">授课</td>
                        <td class="text-center">上机</td>
                        <td class="text-center">实验</td>
                    </tr>
                    <?php if(is_array($dataTable)): foreach($dataTable as $k=>$vo): ?><tr>
                            <td colspan="4">
                                <input value="<?php echo ($vo["CContent"]); ?>" name="CContent[]" type="text" class="inline-input" required>
                            </td>
                            <td>
                                <input value="<?php echo ($vo["TNumTalk"]); ?>" name="TNumTalk[]" type="text" class="inline-input" required>
                            </td>
                            <td>
                                <input value="<?php echo ($vo["TNumPC"]); ?>" name="TNumPC[]" type="text" class="inline-input" required>
                            </td>
                            <td>
                                <input value="<?php echo ($vo["TNumPractise"]); ?>" name="TNumPractise[]" type="text" class="inline-input" required>
                            </td>
                            <td colspan="2">
                                <input value="<?php echo ($vo["TMethods"]); ?>" name="TMethods[]" type="text" class="inline-input" required>
                            </td>
                        </tr><?php endforeach; endif; ?>

                    <tr class="appendBefore">
                        <td colspan="1" class="text-center">课程的评价与持续改进机制</td>
                        <td colspan="9">
                            <textarea name="TEvaluate" cols="30" rows="10" required aria-required="true" data-require="true"><?php echo ($data["TEvaluate"]); ?></textarea>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="form-group col-md-4">
                <button class="sub form-control btn btn-primary" type="submit" >确认提交</button>
            </div>
        </form>
    </div>


    <script type="text/javascript">

        /**
         *  只能用定义全局变量的方式来记录点击生成表格的行数了
         */
        var i = 0;

        function countIndex() {
            ++i;
        }

        /**
         * 回到顶部
         */
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

        /**
         * 通过DOM创建表格
         */
        $(function (){

            $('i.btn').on('click', function (index) {
                this.parentNode.attributes.rowspan.nodeValue = parseInt(this.parentNode.attributes.rowspan.nodeValue) + 1;

                var tr = document.createElement("tr");

                var td4 = document.createElement("td");
                var td00 = document.createElement("td");
                var td01 = document.createElement("td");
                var td02 = document.createElement("td");
                var td2 = document.createElement("td");
                var input00 = document.createElement("input");
                var input01 = document.createElement("input");
                var input02 = document.createElement("input");
                var input03 = document.createElement("input");
                var input04 = document.createElement("input");

                td4.setAttribute("colspan", 4);
                td2.setAttribute("colspan", 2);
                input00.setAttribute('type', "text");
                input00.setAttribute("class", "inline-input");
                input00.setAttribute("name", "CContent[]");

                input01.setAttribute('type', "text");
                input01.setAttribute("class", "inline-input");
                input01.setAttribute("name", "TNumTalk[]");

                input02.setAttribute('type', "text");
                input02.setAttribute("class", "inline-input");
                input02.setAttribute("name", "TNumPC[]");

                input03.setAttribute('type', "text");
                input03.setAttribute("class", "inline-input");
                input03.setAttribute("name", "TNumPractise[]");

                input04.setAttribute('type', "text");
                input04.setAttribute("class", "inline-input");
                input04.setAttribute("name", "TMethods[]");

                td4.appendChild(input00);
                td2.appendChild(input01);
                td00.appendChild(input02);
                td01.appendChild(input03);
                td02.appendChild(input04);

                tr.appendChild(td4);
                tr.appendChild(td00);
                tr.appendChild(td01);
                tr.appendChild(td02);
                tr.appendChild(td2);

                $("tr.appendBefore").before(tr);

            });

//        $('input[name="CCode"]').val());
//        $('input[name="CCode"]').on('change', function () {
            /*
             $('input[name="hiddenCCode"]').val($('input[name="CCode"]').val());
             var val = parseInt($('input[name="CCode"]').val().substr(1, 4));
             switch (val) {
             case 1001:
             //                    console.log('caojianli');
             $('input[name="CConductor"]').val('曹建立');
             break;
             case 1003:
             $('input[name="CConductor"]').val('郑欣');
             break;
             case 1004:
             $('input[name="CConductor"]').val('高淑玲');
             break;
             case 1005:
             $('input[name="CConductor"]').val('张铭川');
             break;
             case 1007:
             $('input[name="CConductor"]').val('马保东');
             break;
             case 1009:
             $('input[name="CConductor"]').val('陈猛');
             break;
             case 1014:
             $('input[name="CConductor"]').val('陈家富');
             break;
             }
             */


        });

        $(function () {
            /**
             * 粗粒度表单验证
             * 只判断去除空格后是否为空
             */
//            $('#myForm').validator().on('submit', function (e) {
//                if(e.isDefaultPrevented()) {
//                    return false;
//                } else {
//                    return true;
//                }
//
//            });

        });

        $(".tempSave").on('click', function () {
            var CCode            = $('input[name="CCode"]').val();
            var CName            = $('input[name="CName"]').val();
            var EName            = $('input[name="EName"]').val();
            var totalSNum        = $('input[name="totalSNum"]').val();
            var theroyNum        = $('textarea[name="theroyNum"]').val();
            var practiseNum      = $('textarea[name="practiseNum"]').val();
            var PCNum            = $('textarea[name="PCNum"]').val();
            var CMaster          = $('textarea[name="CMaster"]').val();
            var TScore           = $('input[name="TScore"]').val();
            var Thosted          = $('input[name="Thosted"]').val();
            var SMajor           = $('input[name="SMajor"]').val();
            var Tassess          = $('input[name="Tassess"]').val();
            var TBefore          = $('input[name="TBefore"]').val();
            var CStyle           = $('input[name="CStyle"]').val();
            var TBook            = $('textarea[name="TBook"]').val();
            var TreferBook       = $('textarea[name="TreferBook"]').val();
            var CIntroduction    = $('textarea[name="CIntroduction"]').val();
            var TRelation        = $('textarea[name="TRelation"]').val();
            var TContent         = $('textarea[name="TContent"]').val();
            var TEvaluate        = $('textarea[name="TEvaluate"]').val();
            $.ajax({
                data: {
                    CCode:      CCode,
                    CName:      CName,
                    EName:      EName,
                    totalSNum:  totalSNum,
                    theroyNum:  theroyNum,
                    practiseNum:practiseNum,
                    PCNum:      PCNum,
                    CMaster:    CMaster,
                    TScore:     TScore,
                    Thosted:    Thosted,
                    SMajor:     SMajor,
                    Tassess:    Tassess,
                    TBefore:    TBefore,
                    CStyle:     CStyle,
                    TBook:      TBook,
                    TreferBook: TreferBook,
                    CIntroduction:CIntroduction,
                    TRelation:  TRelation,
                    TContent:   TContent,
                    TEvaluate:  TEvaluate
                },
//            dataType: 'json',
                type: 'post',
                url: '/plan/index.php/Admin/Kecheng/saveTemp',
                beforeSend: function () {
                    $("#save").html("交互中。。。");
                },
                success: function (response) {
                    console.log(response);
                },
                error: function () {
                    console.log('error');
                },
                complete: function () {
                    $("#save").html("保存");
                }
            });

        });

        $(".reload").on('click', function () {
            $.ajax({
                data: {
                    CCode: $('input[name="CCode"]').val(),
                },
                type: 'post',
                url: '/plan/index.php/Admin/Kecheng/reload',
                beforeSend: function () {
                    $("#reload").html("恢复中。。。");
                },
                success: function (response) {
                    $('textarea[name="CMaster"]').val(response["CMaster"]);
                    $('input[name="Thosted"]').val(response["Thosted"]);
                    $('input[name="SMajor"]').val(response["SMajor"]);
                    $('input[name="TBefore"]').val(response["TBefore"]);
                    $('input[name="CStyle"]').val(response["CStyle"]);
                    $('textarea[name="TBook"]').val(response["TBook"]);
                    $('textarea[name="TreferBook"]').val(response["TreferBook"]);
                    $('textarea[name="CIntroduction"]').val(response["CIntroduction"]);
                    $('textarea[name="TRelation"]').val(response["TRelation"]);
                    $('textarea[name="TContent"]').val(response["TContent"]);
                    $('textarea[name="TEvaluate"]').val(response["TEvaluate"]);
                },
                error: function () {
                    console.log('error');
                },
                complete: function () {
                    $("#reload").html("恢复");
                }

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