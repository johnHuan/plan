<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>教学任务</title>
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
            <li><a href="/plan/index.php/Admin/Task/logout">退出</a></li>
        </ul>
    </div>
</nav>

<br><br>

    <!--<script src="/plan/Public/bootstrap/js/validator.min.js"></script>-->
    <style>
        input[type="reset"] {
            background: #337ab7;
            text-decoration: none;
        }

        .button {
            position: relative;
            overflow: hidden;
            margin-right: 4px;
            display: inline-block;
            *display: inline;
            padding: 4px 10px 4px;
            font-size: 14px;
            line-height: 18px;
            *line-height: 20px;
            color: #fff;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
            background: #5bb75b;
            border: 1px solid #cccccc;
            border-color: #e6e6e6 #e6e6e6 #bfbfbf;
            border-bottom-color: #b3b3b3;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
        }

        .button input {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            border: solid transparent;
            opacity: 0;
            filter: alpha(opacity=0);
            cursor: pointer;
        }

        .progress {
            position: relative;
            margin-left: 100px;
            margin-top: -24px;
            width: 200px;
            padding: 1px;
            border-radius: 3px;
            display: none
        }

        .bar {
            background-color: green;
            display: block;
            width: 0%;
            height: 20px;
            border-radius: 3px;
        }

        .percent {
            position: absolute;
            height: 20px;
            display: inline-block;
            top: 3px;
            left: 2%;
            color: #fff
        }

        .files {
            height: 22px;
            line-height: 22px;
            margin: 10px 0
        }

        .delimg {
            margin-left: 20px;
            color: #090;
            cursor: pointer
        }

        input[type="text"] {
            width: 100%;
        }

        textarea {
            width: 100%;
        }

        .wxs {
            width: 50px;
        }

        .wmd {
            width: 100px;
        }

        .wlg {
            width: 150px;
        }

        .minw {
            min-width: 100px
        }

        .medw {
            min-width: 200px;
        }

        /*returnTop开始*/
        div#back-to-top {
            z-index: 99999;
            position: fixed;
            display: block;
            bottom: 80px;
            right: 30px;
        }

        div#back-to-top a {
            text-align: center;
            text-decoration: none;
            display: block;
            width: 38px;
            /*使用CSS3中的transition属性给跳转链接中的文字添加渐变效果*/
            -moz-transition: color 1s;
            -webkit-transition: color 1s;
            -o-transition: color 1s;
        }

        div#back-to-top a:hover {
            color: #979797;
        }

        div#back-to-top a span {
            background: transparent url('/plan/Public/img/top.png') no-repeat;
            background-size: contain;
            border-radius: 6px;
            display: block;
            height: 38px;
            width: 38px;
            margin-bottom: 5px;
            /*使用CSS3中的transition属性给<span>标签背景颜色添加渐变效果*/
            -moz-transition: background 1s;
            -webkit-transition: background 1s;
            -o-transition: background 1s;
        }

        div#back-to-top a:hover span {
            background: transparent url('/plan/Public/img/top.png') no-repeat;
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
            <h1 class="text-center">东北大学201<?php echo (substr($version,0,1)); ?>-201<?php echo (substr($version,1,1)); ?>学年第
                <?php if(substr($version, 2, 1) == 1): ?>一
                    <?php else: ?>
                    二<?php endif; ?>
                学期教学任务书
            </h1>
        </div>
        <br>
        <form action="/plan/index.php/Admin/Task/editDo" method="post" data-toggle="validator" id="myForm" role="form">
            <table class="table table-hover">
                <tr>
                    <td>课程编号: <input readonly="readonly" type="text" class="inline-input" value="<?php echo ($课程编号); ?>" name="课程编号"/></td>
                    <td>课程名称: <input readonly="readonly" type="text" class="inline-input" value="<?php echo ($课程名称); ?>" name="课程名称"/></td>
                    <td>任课教师: <input type="text" class="inline-input" value="<?php echo ($任课教师); ?>" name="任课教师"/></td>
                </tr>
                <tr>
                    <td>主讲教师学时分配<input type="text" class="inline-input" value="<?php echo ($学时分配); ?>" name="学时分配"/></td>
                    <td>学期学时: <input readonly="readonly" type="text" class="inline-input" value="<?php echo ($学期学时); ?>" name="学期学时"/></td>
                    <td>理论学时: <input readonly="readonly" type="text" class="inline-input" value="<?php echo ($理论学时); ?>" name="理论学时"/></td>
                </tr>
                <tr>
                    <td>助课: <input type="text" class="inline-input" value="<?php echo ($助课); ?>" name="助课"/></td>
                    <td>外聘: <input type="text" class="inline-input" value="<?php echo ($外聘); ?>" name="外聘" /></td>
                    <td>双语（全英语）: <input type="text" class="inline-input" value="<?php echo ($双语); ?>" name="双语"/></td>
                </tr>
                <tr>
                    <td>周学时: <input type="text" class="inline-input" value="<?php echo ($周学时); ?>" name="周学时"/></td>
                    <td>开课周: <input type="text" class="inline-input" value="<?php echo ($开课周); ?>" name="开课周"/></td>
                    <td>实验学时: <input readonly="readonly"  type="text" class="inline-input" value="<?php echo ($实验学时); ?>" name="实验学时"/></td>
                </tr>
                <tr>
                    <td>实验周: <input type="text" class="inline-input" value="<?php echo ($实验周); ?>" name="实验周"/></td>
                    <td>上课对象: <input readonly="readonly" type="text" class="inline-input" value="<?php echo ($上课对象); ?>" name="上课对象"/></td>
                    <td>学生数: <input type="text" class="inline-input" value="<?php echo ($学生数); ?>" name="学生数"/></td>
                </tr>
                <tr>
                    <td>试验场所名称（参考分专业实验课情况）:<input type="text" class="inline-input" value="<?php echo ($试验场所名称); ?>" name="试验场所名称"/></td>
                    <td>选课低于10人不开课: <input type="text" class="inline-input" value="<?php echo ($选课低于10人不开课); ?>" name="选课低于10人不开课"/></td>
                    <td>上课地点: <input type="text" class="inline-input" value="<?php echo ($上课地点); ?>" name="上课地点"/></td>

                </tr>
                <tr>
                    <td>实验任课教师: <input type="text" class="inline-input" value="<?php echo ($实验任课教师); ?>" name="实验任课教师"/></td>
                    <td>上机学时: <input  readonly="readonly" type="text" class="inline-input" value="<?php echo ($上机学时); ?>" name="上机学时"/></td>
                    <td>上机周: <input type="text" class="inline-input" value="<?php echo ($上机周); ?>" name="上机周"/></td>
                </tr>
                <tr>
                    <td>学分: <input readonly="readonly" type="text" class="inline-input" value="<?php echo ($学分); ?>" name="学分"/></td>
                    <td>课程类型: <input readonly="readonly" type="text" class="inline-input" value="<?php echo ($课程类型); ?>" name="课程类型"/></td>
                    <td class="text-success">备注: <input type="text" class="inline-input" value="<?php echo ($备注); ?>" name="备注"/></td>
                </tr>
                <tr>
                    <td>课群: <input readonly="readonly" type="text" class="inline-input" value="<?php echo ($课群); ?>" name="课群"/></td>
                    <td>参与选课: <input readonly="readonly" type="text" class="inline-input" value="<?php echo ($参与选课); ?>" name="参与选课"/></td>
                    <td>开课模式: <input readonly="readonly" type="text" class="inline-input" value="<?php echo ($开课模式); ?>" name="开课模式"/></td>
                </tr>
                <tr>
                    <td>合班数: <input readonly="readonly" type="text" class="inline-input" value="<?php echo ($合班数); ?>" name="合班数"/></td>
                    <td>参与排课: <input readonly="readonly" type="text" class="inline-input" value="<?php echo ($参与排课); ?>" name="参与排课"/></td>
                    <td>总学时: <input readonly="readonly" type="text" class="inline-input" value="<?php echo ($总学时); ?>" name="总学时"/></td>
                </tr>
                <tr>
                    <td>不生成成绩名单: <input readonly="readonly" type="text" class="inline-input" value="<?php echo ($不生成成绩名单); ?>" name="不生成成绩名单"/></td>
                    <td>指定节次: <input readonly="readonly" type="text" class="inline-input" value="<?php echo ($指定节次); ?>" name="指定节次"/></td>
                    <td>任务号: <input readonly="readonly" type="text" class="inline-input" value="<?php echo ($任务号); ?>" name="任务号"/></td>
                </tr>
                <tr>
                    <td colspan="3">上课时间（周/星期/节数/班级）: <input type="text" class="inline-input" value="<?php echo ($上课时间); ?>" name="上课时间"/></td>
                </tr>
            </table>
            <div class="form-group">
                <button class="form-control btn btn-primary" type="submit">确认提交</button>
            </div>
        </form>
    </div>


    <script type="text/javascript">

        /**
         * 回到顶部
         */
        $(function () {
            //当滚动条的位置处于距顶部100像素以下时，跳转链接出现，否则消失
            $(function () {
                $(window).scroll(function () {
                    if ($(window).scrollTop() > 100) {
                        $("#back-to-top").fadeIn(1500);
                    } else {
                        $("#back-to-top").fadeOut(1500);
                    }
                });

                //当点击跳转链接后，回到页面顶部位置
                $("#back-to-top").click(function () {
                    $('body,html').animate({scrollTop: 0}, 1000);
                    return false;
                });
            });
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
                url: '/plan/index.php/Admin/Task/saveTemp',
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
                url: '/plan/index.php/Admin/Task/reload',
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