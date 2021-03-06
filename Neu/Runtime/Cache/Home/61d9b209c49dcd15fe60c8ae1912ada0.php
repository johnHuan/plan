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
        <a class="navbar-brand logo" href="#">教学管理系统</a>
        <button  class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse">
        <ul class="nav navbar-nav">
            <li>
               <a href="#" data-toggle="dropdown">培养计划
                   <span class="caret"></span></a>
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
                    <li><a href="/plan/index.php/Home/kecheng/info">浏览</a></li>
                    <li><a href="/plan/index.php/Home/kecheng/downloadinfo?v=b">下载B版</a></li>
                    <li><a href="/plan/index.php/Home/kecheng/downloadinfo?v=c">下载C版</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">课程大纲 <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="/plan/index.php/Home/kecheng/shedual">按计划批次查看</a></li>
                    <li><a href="/plan/index.php/Home/kecheng/overlook">浏览</a></li>
                    <li><a href="/plan/index.php/Home/kecheng/download">下载word版本</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">实验大纲 <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="/plan/index.php/Home/shiyan/detail"> <span class="glyphicon glyphicon-new-window"></span> 实验课程明细</a></li>
                    <li><a href="/plan/index.php/Home/shiyan/overlook"> <span class="glyphicon glyphicon-eye-open"></span> 浏览</a></li>
                </ul>
            </li>
            <li><a href="/plan/index.php/Home/shiyan/guideBook">实验指导书 </a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">实践大纲 <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li class="disabled"><a href="#">添加</a></li>
                    <li><a href="/plan/index.php/Home/shijian/overlook">浏览</a></li>
                </ul>
            </li>
            <li><a href="/plan/index.php/Home/shijian/guideBook">实践指导书 </a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">矩阵表 <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="/plan/index.php/Home/Metrix/biyeyaoqiu" target="_blank">毕业要求对培养目标的支撑</a></li>
                    <li><a href="/plan/index.php/Home/Metrix/peiyahngjihua" target="_blank">课程计划与毕业要求对应关系矩阵</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">教学任务书 <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="/plan/index.php/Home/Task/showTaskInfo?v=782">2017-2018学年第二学期</a></li>
                    <li><a href="/plan/index.php/Home/Task/showTaskInfo?v=781">2017-2018学年第一学期</a></li>
                    <li><a href="/plan/index.php/Home/Task/showTaskInfo?v=672">2016-2017学年第二学期</a></li>
                </ul>
            </li>
        </ul>
        <ul class="nav navbar-nav pull-right" style="width: 200px;">
            <li><a><span class="text-info"><?php echo (session('teacher_name')); ?></span> 您好!</a></li>　　
            <li><a href="/plan/index.php/Home/Kecheng/logout">退出</a></li>
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
         textarea::-webkit-input-placeholder {
             color: #A94442 !important; /* WebKit browsers */
             text-indent: 20px;
             letter-spacing: 2px;
         }
         textarea:-moz-placeholder {
             color: #A94442 !important; /* Mozilla Firefox 4 to 18 */
             text-indent: 20px;
             letter-spacing: 2px;
         }
         textarea::-moz-placeholder {
             color: #A94442 !important; /* Mozilla Firefox 19+ */
             text-indent: 20px;
             letter-spacing: 2px;
         }
         textarea:-ms-input-placeholder {
             color: #A94442 !important; /* Internet Explorer 10+ */
             text-indent: 20px;
             letter-spacing: 2px;
         }
         input[type="text"]::-webkit-input-placeholder {
             color: #A94442 !important; /* WebKit browsers */
             /*text-indent: 20px;*/
             /*letter-spacing: 2px;*/
         }
         input[type="text"]:-moz-placeholder {
             color: #A94442 !important; /* Mozilla Firefox 4 to 18 */
             /*text-indent: 20px;*/
             /*letter-spacing: 2px;*/
         }
         input[type="text"]::-moz-placeholder {
             color: #A94442 !important; /* Mozilla Firefox 19+ */
             /*text-indent: 20px;*/
             /*letter-spacing: 2px;*/
         }
         input[type="text"]:-ms-input-placeholder {
             color: #A94442 !important; /* Internet Explorer 10+ */
             /*text-indent: 20px;*/
             /*letter-spacing: 2px;*/
         }

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

    <form action="/plan/index.php/Home/Kecheng/indexDo" method="post" data-toggle="validator" id="myForm" role="form">
        <input type="hidden" value="<?php echo ($flag); ?>" name="flag">
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped">
            <caption>
               添加课程教学大纲：<i style="color: #ff6600">内容参考资源经济学（仅供参考，具体按实际情况填写）</i>
            </caption>
            <tbody>
                <tr>
                    <td colspan="2" class="text-center wxs">课程编号</td>
                    <td colspan="3"><input readonly value="<?php echo ($data["课程编号"]); ?>" name="CCode" type="text" class="inline-input medw" required></td>
                    <td colspan="2" class="text-center wxs">课程名称</td>
                    <td colspan="3"><input readonly value="<?php echo ($data["课程名称"]); ?>" name="CName" type="text" class="inline-input medw" required></td>
                </tr>
                <tr>
                    <td colspan="1" class="text-center wlg">课程英文名称</td>
                    <td colspan="9"><input value="<?php echo ($EName); ?>" name="EName" type="text" class="inline-input" required></td>
                </tr>
                <tr>
                    <td class="text-center">总学时数</td>
                    <td><input readonly value="<?php echo ($data["学期学时"]); ?>" name="totalSNum" type="text" class="inline-input minw" required></td>
                    <td rowspan="2" class="text-center wmd">理论<br>学时</td>
                    <td rowspan="2">
                        <textarea readonly name="theroyNum" cols="15" rows="3" required data-require="true" aria-required="true"><?php echo ($data["理论学时"]); ?></textarea>
                    </td>
                    <td rowspan="2" class="text-center wmd">实验<br>学时</td>
                    <td rowspan="2">
                        <textarea readonly name="practiseNum" cols="10" rows="3" required data-require="true" aria-required="true"><?php echo ($data["实验学时"]); ?></textarea>
                    </td>
                    <td rowspan="2" class="text-center wmd">上机学时</td>
                    <td rowspan="2">
                        <textarea readonly name="PCNum" cols="10" rows="3" required data-require="true" aria-required="true"><?php echo ($data["上机学时"]); ?></textarea>
                    </td>
                    <td rowspan="2">本课程负责人</td>
                    <td rowspan="2">
                        <textarea placeholder="填写 课程负责人" name="CMaster" cols="15" rows="3" required data-require="true" aria-required="true"></textarea>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">学分</td>
                    <td><input readonly value="<?php echo ($data["学期学分"]); ?>" name="TScore" type="text" class="inline-input" required></td>
                </tr>
                <tr>
                    <td class="text-center" colspan="1">开课单位</td>
                    <td colspan="4"><input placeholder="填写 开课单位 eg:采矿工程系" name="Thosted" type="text" class="inline-input" required></td>
                    <td colspan="1" class="text-center">适用专业</td>
                    <td colspan="4"><input placeholder="填写 适用专业 eg:采矿工程及相关专业" name="SMajor" type="text" class="inline-input" required></td>
                </tr>
                <tr>
                    <td colspan="1" class="text-center">考核方式</td>
                    <td colspan="9"><input value="<?php echo ($data["考核方式"]); ?>" name="Tassess" type="text" class="inline-input" required></td>
                </tr>
                <tr>
                    <td colspan="1" class="text-center">先修课程</td>
                    <td colspan="9"><input placeholder="填写 先修课程 eg:采矿概论、经济学原理" name="TBefore" type="text" class="inline-input" required></td>
                </tr>
                <tr>
                    <td colspan="1" class="text-center">课程类型</td>
                    <td colspan="9"><input placeholder="填写 课程类型 eg:学位必修课 " name="CStyle" type="text" class="inline-input" required></td>
                </tr>
                <tr>
                    <td colspan="1" class="text-center">选用教材</td>
                    <td colspan="9">
                        <textarea name="TBook" placeholder="eg:自编" required  cols="30" rows="4"></textarea>
                        <!--<button class="btn btn-xs btn-circle">保存</button>-->
                    </td>
                </tr>
                <tr>
                    <td colspan="1" class="text-center">主要教学参考书</td>
                    <td colspan="9">
                        <textarea placeholder="eg:《采矿学》（第2版）王青，顾晓薇主编，冶金工业出版社，2011年4月；" name="TreferBook" cols="30" rows="5" required></textarea>
                        <!--<button class="btn btn-xs btn-circle">保存</button>-->
                    </td>
                </tr>
                <tr>
                    <td colspan="1" class="text-center">课程简介（300~500字）</td>
                    <td colspan="9">
                        <textarea placeholder="eg:《资源经济学》为采矿工程专业本科生学位必修课。课程全面系统地学习矿产资源的相关知识，了解世界矿产资源概况、我国矿产资源的基本特点、我国矿产资源开发利用存在的主要问题等；在系统学习矿产资源经济学理论基础上，联系全球经济不同发展时期对矿产品市场的冲击，以通俗易懂的方式学习矿产品供需理论、矿产品市场与价格、矿产品市场预测、矿业投资决策理论和方法、矿业投资风险分析、矿业投融资体制与模式探讨等内容，并通过大量实际案例分析相关理论；此外，课程结合矿产资源开采现状，全面系统地对矿产资源开发的外部不经济性，矿产开发的环境冲击及冲击核算，环境成本的内部化等内容进行系统深入的学习。该课程讲授过程中的大量案例和思考练习题，对于训练学生分析问题、解决问题的能力，开拓学生的创新思维具有重要的作用。通过该门课程的学习，学习者能够在设计环节中体现创新意识，能够从经济角度理解和评价复杂采矿工程问题的工程实践对环境的影响，从经济角度提出解决方案；通过学习，使学生具有一定的国际视野，培养具备采矿技术与工程经济基本知识和技能的应用型高级采矿专门人才。 " name="CIntroduction" cols="30" rows="10" required aria-required="true" data-require="true"></textarea>
                        <!--<button class="btn btn-xs btn-circle">保存</button>-->
                    </td>
                </tr>

                <tr>
                    <td colspan="1" class="text-center">课程内容及教学目标</td>
                    <td colspan="9">
                        <textarea placeholder="
eg: 主要教学内容
    第一章 资源与矿产资源概述
    1.1 资源与自然资源
    1.1.1 资源的概念与分类
    1.1.2 自然资源的概念与类型
    1.1.3自然资源的稀缺与冲突
    1.1.4资源、环境与经济之间的关系
    1.1.5从极限之争到可持续
    1.2 矿产资源
    1.2.1矿产资源的概念、特点及分类
    1.2.2 国、内外矿产资源特点
    1.2.3 矿产资源的重要性
    1.2.4我国矿产资源开发利用存在的主要问题（政策）
    1.2.5矿物与经济
    第二章 矿产资源经济学概述
    2.1矿产资源经济学的产生及特性
    2.2矿产资源经济学研究的内容
    2.3矿产资源经济学的研究方法
    2.4矿产资源经济学的研究现状
    2.5矿产资源经济学的发展趋势
    　。。。
教学目标：
    本门课程为专业必修课。学生需系统掌握教师课堂讲授全部知识。教师教学过程中，在学习矿产资源经济学理论基础上，联系全球经济不同发展时期对矿产品市场的冲击，以通俗易懂的方式学习矿产品供需理论、矿产品市场与价格、矿产品市场预测、矿业投资决策理论和方法、矿业投资风险分析、矿业投融资体制与模式探讨等内容，并通过大量实际案例分析相关理论；此外，课程结合矿产资源开采现状，全面系统地学习矿产资源开发的外部不经济性，矿产开发的环境冲击及冲击核算，环境成本的内部化等内容。通过该门课程的学习，学习者能够在设计环节中体现创新意识，能够从经济角度理解和评价复杂采矿工程问题的工程实践对环境的影响。该课程讲授过程中的大量案例和思考练习题，对于训练学生分析问题、解决问题的能力，开拓学生的创新思维具有重要的作用。
课程的具体教学目标：通过本课程的理论教学和实验训练，使学生具备以下知识和能力：
目标1：系统学习资源、自然资源、矿产资源的概念、分类、性质，自然资源的稀缺与冲突，资源、环境与经济之间的关系资源、环境与经济相互协调是社会可持续发展的特征；了解世界矿产资源概况、我国矿产资源的基本特点、我国矿产资源开发利用存在的主要问题等。
..."
                                  name="TContent" cols="30" rows="10" required aria-required="true" data-require="true"></textarea>
                        <!--<button class="btn btn-xs btn-circle">保存</button>-->
                    </td>
                </tr>
                <tr>
                    <td colspan="1" class="text-center">课程目标与毕业要求之间的关系<br>
                        <i class="text-danger">备注：<br>H-高度支撑；<br>M-中度支撑；<br>L-一般支撑。</i>
                    </td>
                    <td colspan="9">
                        <textarea placeholder="eg: 目标1、掌握文献检索、资料查询的基本方法，能够运用现代信息技术收集、筛选、综合和评价文献资料；（M）&#13;&#10;目标2、具有良好的人文社会科学素养、社会责任感，能够在采矿工程实践中理解并遵守工程职业道德和规范，履行责任； （H）&#13;&#10;目标3、能够基于科学原理并采用科学方法对矿业领域复杂工程问题进行研究；（L）" name="TRelation" cols="30" rows="10" required data-require="true" aria-required="true"></textarea>
                        <!--<button class="btn btn-xs btn-circle">保存</button>-->
                    </td>
                </tr>
                <tr>
                    <td colspan="1" rowspan="5" class="text-center"><br>教学方法及学时分配<br><br><br><br><br><br><i onclick="countIndex()" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-plus-sign"></span>给右侧添加一行 <span class="glyphicon glyphicon-hand-right"></span></i></td>
                    <td colspan="4" rowspan="2" class="text-center"><br>教学内容</td>
                    <td colspan="3" class="text-center">学时</td>
                    <td colspan="2" rowspan="2" class="text-center"><br>教学方法</td>
                </tr>
                <tr>
                    <td class="text-center">授课</td>
                    <td class="text-center">上机</td>
                    <td class="text-center">实验</td>
                </tr>
                <tr>
                    <td colspan="4"><input placeholder="eg:第一章 资源与矿产资源概述" name="CContent[]" type="text" class="inline-input" required></td>
                    <td><input placeholder="eg:3" name="TNumTalk[]" type="text" class="inline-input" required></td>
                    <td><input placeholder="eg:0" name="TNumPC[]" type="text" class="inline-input" required></td>
                    <td><input placeholder="eg:0" name="TNumPractise[]" type="text" class="inline-input" required></td>
                    <td colspan="2"><input placeholder="eg:阐述基本概念..." name="TMethods[]" type="text" class="inline-input" required></td>
                </tr>
                <tr>
                    <td colspan="4"><input placeholder="eg:第二章　矿产资源经济学概述" name="CContent[]" type="text" class="inline-input" required></td>
                    <td><input placeholder="eg:1" name="TNumTalk[]" type="text" class="inline-input" required></td>
                    <td><input placeholder="eg:0" name="TNumPC[]" type="text" class="inline-input" required></td>
                    <td><input placeholder="eg:0" name="TNumPractise[]" type="text" class="inline-input" required></td>
                    <td colspan="2"><input placeholder="eg:课堂讲授注意采用启发式教学，激励学生思考；" name="TMethods[]" type="text" class="inline-input" required></td>
                </tr>
                <tr>
                    <td colspan="4"><input placeholder="eg:第三章　经济学基础知识" name="CContent[]" type="text" class="inline-input" required></td>
                    <td><input placeholder="eg:6" name="TNumTalk[]" type="text" class="inline-input" required></td>
                    <td><input placeholder="eg:2" name="TNumPC[]" type="text" class="inline-input" required></td>
                    <td><input placeholder="eg:0" name="TNumPractise[]" type="text" class="inline-input" required></td>
                    <td colspan="2"><input placeholder="eg:在教学时尽量采用讨论，分析与总结的方法" name="TMethods[]" type="text" class="inline-input" required></td>
                </tr>
                <tr class="appendBefore">
                    <td colspan="1" class="text-center">课程的评价与持续改进机制</td>
                    <td colspan="9">
                        <textarea placeholder="eg:本门课程是一门学位课，以考试为主评定成绩。成绩按百分制评定，考试按平时成绩30%，期中成绩20%，期末成绩50%分配。平时成绩以出勤率及随堂考试成绩作为给分依据；期中成绩以期中考试卷面成绩作为给分依据；期末成绩以期末考试卷面成绩作为给分依据。期中及期末试卷，注重考查学生独立分析、解决复杂工程问题的能力，对课程讲授内容真正消化、理解情况，每道试题均有严格得分标准，确保分数准确性。每年课程结束，任课老师对课程进行课程考试试卷分析，对本学期课程教学效果进行评价，发现问题并进一步总结整理存在的问题，作为下次课持续改进的依据。同时，校及院督导组及院系领导每学年会进行听课及试卷、教学大纲等相关教学文档的检查和监查，发现课程存在的问题，并及时总结、反馈；校教务部门及学院教学办定期组织修订教学大纲；系及研究所课程组定期组织课程教研，这些课程评价与持续改进机制的设立，使得课程得以持续改进，不断完善！同时，为进一步改进教学效果，在课程教学过程中，改进了教学方法，更多地采用案例讨论的方式，由教师按照教学内容提出问题，学生组成小组进行查阅资料，并与教师一起讨论，有效地活跃课堂气氛，提高了教学质量，不断完善 “以学生为中心、教师为主导”的教学理念。 " name="TEvaluate" cols="30" rows="10" required aria-required="true" data-require="true"></textarea>
                        <!--<button class="btn btn-xs btn-circle">保存</button>-->
                    </td>
               </tr>
            </tbody>
        </table>
        </div>
        <i class="text-info">填完所有表单项后才可以提交</i>
        <div class="form-group col-md-4">
            <button class="sub form-control btn btn-primary" type="submit" >确认提交</button>
        </div>
    </form>
</div>

<script type="text/javascript">
    /*
     * 回到顶部
     * */
    $(function(){
        //当滚动条的位置处于距顶部100像素以下时，跳转链接出现，否则消失
        $(function () {
            $(window).scroll(function(){
                if ($(window).scrollTop()>100){
//                    $("#back-to-top").fadeIn(1500);
                } else {
//                    $("#back-to-top").fadeOut(1500);
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
     *  只能用定义全局变量的方式来记录点击生成表格的行数了
     */
    var i = 0;
    function countIndex() {
        ++i;
    }

    /**
     * 通过DOM创建表格
     */
    $(function (){

        $('i.btn').on('click', function (index) {
//            console.log(this.parentNode.attributes.rowspan);
//            var rowLen = this.parentNode.attributes.rowspan.nodeValue +=i ;
            this.parentNode.attributes.rowspan.nodeValue = parseInt(this.parentNode.attributes.rowspan.nodeValue) + 1;

//            console.log(this.parentNode.attributes.rowspan.nodeValue);

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
            td00.appendChild(input01);
            td01.appendChild(input02);
            td02.appendChild(input03);
            td2.appendChild(input04);

            tr.appendChild(td4);
            tr.appendChild(td00);
            tr.appendChild(td01);
            tr.appendChild(td02);
            tr.appendChild(td2);

//             $("tr.appendTo").after(tr);
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
            url: '/plan/index.php/Home/Kecheng/saveTemp',
            beforeSend: function () {
                $("#save").html("交互中。。。");
            },
            success: function (response) {
                console.log("保存成功");
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
            url: '/plan/index.php/Home/Kecheng/reload',
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


//    $.validator().setDefaults({
//       submitHandler: function () {
//           alert("提交事件");
//       }
//    });

    $(function () {
        /**
         * 粗粒度表单验证
         * 只判断去除空格后是否为空
         */
//        $('#myForm').validator().on('submit', function (e) {
//            if(e.isDefaultPrevented()) {
//                return false;
//            } else {
//                return true;
//            }
//        });
    });

</script>

<!--footer-->
<footer class="footer footer-fixed-bottom">


<div class="container-fluid">

    <div class="footer">
        &copy;2016-2017 Northeastern University 资源与土木工程学院. <br />
        <a target="_blank" href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=WyEzOjU8My46NXUzKy4bPTQjNjoyN3U4NDY" style="text-decoration:none;"><img src="http://rescdn.qqmail.com/zh_CN/htmledition/images/function/qm_open/ico_mailme_02.png"/></a>
        author： <strong class="text-success">张桓</strong>；  All rights reserved.<br />
        技术咨询：john；   248404941（QQ）；yz30.com@aliyun.com（email）；
		<p>感谢 车德福院长、林萱老师的宝贵意见和大力支持， 感谢赵强、贾庆仁以及其他老师和同学们的帮助</p>
    </div>
</div>
</footer>
<!-- End container-->
</body>
</html>