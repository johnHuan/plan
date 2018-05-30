<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>实践教学大纲</title>
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
            <li><a href="/plan/index.php/Home/Shijian/logout">退出</a></li>
        </ul>
    </div>
</nav>

<br><br>


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
</style>
<div class="container-fluid">
    <div class="header">
        <h1 class="text-center">资土学院 实践教学大纲</h1>
    </div>
    <form action="/plan/index.php/Home/Shijian/edit?id=34&ccode=C1003050090&nsukey=jln%2Bjt%2F7ApEW6Y9wlcIJhDy4JPT%2Bndyih6GtAY76g%2F2AgrFPdOs42pBTYyk9UatOHkCfW4b0EUlP6E0TeMpeu507wFXGGUNzMQAowOBQE2xYSspCE145raL8%2BrZYvJVCPEhElMLXfFSeQwDE%2Bi36ksjKgKF%2Fa3uCccLpwGGO8XC%2Fs4FTZUPrKX7UtsrpkFunCCXIO9KhKWdfgbFcd4dv0A%3D%3D" method="post">
        <!--<input type="hidden" value="<?php echo ($flag); ?>" name="flag">-->
        <div class="panel-body table-responsive">
            <table class="table table-condensed table-bordered table-striped table-hover">
            <caption>
               添加实践教学大纲：
            </caption>
            <tbody>
                <tr>
                    <td>
                        实践课程名称：<input readonly value="<?php echo ($data["CName"]); ?>" name="CName" required type="text" class="inline-input" style="width: 20%;" placeholder="教学大纲名称">
                    </td>
                </tr>
                <tr>
                    <td>
                        实践课程英文名称：<input value="<?php echo ($data["EName"]); ?>" name="EName" required type="text" class="inline-input" style="width: 85%; text-decoration: " placeholder="XXXXXX">
                    </td>
                </tr>
                <tr>
                    <td>课程代码：
                        <input readonly name="CCode" required type="text" class="inline-input" placeholder="字母C开头的课程编号" value="<?php echo ($data["CCode"]); ?>">
                    </td>
                </tr>
                <tr>
                    <td>学时数：
                        <input readonly value="<?php echo ($data["TNum"]); ?>" name="TNum" required type="text" class="inline-input" placeholder="填写数字">学时
                    </td>
                </tr>
                <tr>
                    <td>学分数：
                        <input readonly value="<?php echo ($data["TScore"]); ?>" name="TScore" required type="text" class="inline-input" placeholder="填写数字" >学分
                    </td>
                </tr>
                <tr>
                    <td>适用专业:
                        <select required name="SMajor" id="done" data-placeholder="==请选择适用专业==" class="marjorSelect selectpicker chosen-select " multiple data-done-button="true">
                            <?php switch($data["SMajor"]): case "测绘工程": ?><option selected value="1007测绘工程">测绘工程  </option>
                                    <option value="1001采矿工程">采矿工程  </option>
                                    <option value="1009土木工程">土木工程  </option>
                                    <option value="1003安全工程">安全工程  </option>
                                    <option value="1005环境工程">环境工程  </option>
                                    <option value="1004矿物加工工程">矿物加工工程</option>
                                    <option value="1014资源勘查工程">资源勘查工程</option><?php break;?>
                                <?php case "采矿工程": ?><option value="1007测绘工程">测绘工程  </option>
                                    <option selected value="1001采矿工程">采矿工程  </option>
                                    <option value="1009土木工程">土木工程  </option>
                                    <option value="1003安全工程">安全工程  </option>
                                    <option value="1005环境工程">环境工程  </option>
                                    <option value="1004矿物加工工程">矿物加工工程</option>
                                    <option value="1014资源勘查工程">资源勘查工程</option><?php break;?>
                                <?php case "土木工程": ?><option value="1007测绘工程">测绘工程  </option>
                                    <option value="1001采矿工程">采矿工程  </option>
                                    <option selected value="1009土木工程">土木工程  </option>
                                    <option value="1003安全工程">安全工程  </option>
                                    <option value="1005环境工程">环境工程  </option>
                                    <option value="1004矿物加工工程">矿物加工工程</option>
                                    <option value="1014资源勘查工程">资源勘查工程</option><?php break;?>
                                <?php case "安全工程": ?><option value="1007测绘工程">测绘工程  </option>
                                    <option value="1001采矿工程">采矿工程  </option>
                                    <option value="1009土木工程">土木工程  </option>
                                    <option selected value="1003安全工程">安全工程  </option>
                                    <option value="1005环境工程">环境工程  </option>
                                    <option value="1004矿物加工工程">矿物加工工程</option>
                                    <option value="1014资源勘查工程">资源勘查工程</option><?php break;?>
                                <?php case "环境工程": ?><option value="1007测绘工程">测绘工程  </option>
                                    <option value="1001采矿工程">采矿工程  </option>
                                    <option value="1009土木工程">土木工程  </option>
                                    <option value="1003安全工程">安全工程  </option>
                                    <option selected value="1005环境工程">环境工程  </option>
                                    <option value="1004矿物加工工程">矿物加工工程</option>
                                    <option value="1014资源勘查工程">资源勘查工程</option><?php break;?>
                                <?php case "矿物加工工程": ?><option value="1007测绘工程">测绘工程  </option>
                                    <option value="1001采矿工程">采矿工程  </option>
                                    <option value="1009土木工程">土木工程  </option>
                                    <option value="1003安全工程">安全工程  </option>
                                    <option value="1005环境工程">环境工程  </option>
                                    <option selected value="1004矿物加工工程">矿物加工工程</option>
                                    <option value="1014资源勘查工程">资源勘查工程</option><?php break;?>
                                <?php case "资源勘查工程": ?><option value="1007测绘工程">测绘工程  </option>
                                    <option value="1001采矿工程">采矿工程  </option>
                                    <option value="1009土木工程">土木工程  </option>
                                    <option value="1003安全工程">安全工程  </option>
                                    <option value="1005环境工程">环境工程  </option>
                                    <option value="1004矿物加工工程">矿物加工工程</option>
                                    <option selected value="1014资源勘查工程">资源勘查工程</option><?php break;?>
                                <?php default: ?>
                                <option value="1007测绘工程">测绘工程  </option>
                                <option value="1001采矿工程">采矿工程  </option>
                                <option value="1009土木工程">土木工程  </option>
                                <option value="1003安全工程">安全工程  </option>
                                <option value="1005环境工程">环境工程  </option>
                                <option value="1004矿物加工工程">矿物加工工程</option>
                                <option value="1014资源勘查工程">资源勘查工程</option><?php endswitch;?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td  class="checkbox">课程性质：
                        <?php if($data["KeChengXingZhi"] == '独立设课'): ?><label><input checked required type="radio" name="KeChengXingZhi" value="独立设课"> 独立设课</label>
                            <label><input required type="radio" name="KeChengXingZhi" value="非独立设课"> 非独立设课</label>
                            <?php else: ?>
                            <label><input required type="radio" name="KeChengXingZhi" value="独立设课"> 独立设课</label>
                            <label><input checked required type="radio" name="KeChengXingZhi" value="非独立设课"> 非独立设课</label><?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td class="checkbox">
                        实践要求：
                        <?php if($data["shijianYaoQiu"] == '必修'): ?><label><input required type="radio" name="shijianYaoQiu" checked value="必修"> 必修</label>
                            <label><input  required type="radio" name="shijianYaoQiu" value="选修"> 选修</label>
                            <?php else: ?>
                            <label>必修</label><input required type="radio" name="shijianYaoQiu"  value="必修">
                            <label>选修</label><input required type="radio" name="shijianYaoQiu" checked value="选修"><?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>执笔人：
                        <input value="<?php echo ($data["TzhiBiRen"]); ?>" name="TzhiBiRen" required type="text" class="inline-input" placeholder="" style="width: 50%;">
                    </td>
                </tr>
                <tr>
                    <td>讨论参加人：
                        <input value="<?php echo ($data["TTaoLunCanJia"]); ?>" name="TTaoLunCanJia" required type="text" class="inline-input" placeholder="" style="width: 50%;">
                    </td>
                </tr>
                <tr>
                    <td>审核人：
                        <input value="<?php echo ($data["CConductor"]); ?>" name="CConductor" required type="text" class="inline-input" placeholder="XXX">
                    </td>
                </tr>
                <tr>
                    <td>批准人：
                        <input name="Allowed" value="车德福" type="text" required class="inline-input" placeholder="XXX">
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
        <div class="panel-body table-responsive">
            <table class="table table-condensed table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <td>
                        <b>一.目的与任务</b>
                    </td>
                </tr>
                <tr>
                    <td>
                        <textarea required rows="6" name="destination" class="form-control" placeholder="阐述本实践环节在专业人才培养中的地位、作用及教学目标，实践任务的分解应紧扣实践目的。&#13;&#10;eg:&#13;&#10;1.xxx&#13;&#10;　（1）.xxx&#13;&#10;　（2）.xxx&#13;&#10;　（3）.xxx&#13;&#10;2.xxx"><?php echo ($data["destination"]); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>二.内容与要求</b>
                    </td>
                </tr>
                <tr>
                    <td>
                        <textarea required rows="6" name="ContentRequire" class="form-control" placeholder="eg:&#13;&#10;1.xxx&#13;&#10;　（1）.xxx&#13;&#10;　（2）.xxx&#13;&#10;　（3）.xxx&#13;&#10;2.xxx"><?php echo ($data["ContentRequire"]); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>三.组织方式与进度安排</b>
                    </td>
                </tr>
                <tr>
                    <td>
                        <textarea required rows="6" name="progress" class="form-control" placeholder="明确人员组织和时间安排，集中还是分散，以及具体时间要求。&#13;&#10;eg:&#13;&#10;1.xxx&#13;&#10;　（1）.xxx&#13;&#10;　（2）.xxx&#13;&#10;　（3）.xxx&#13;&#10;2.xxx"><?php echo ($data["progress"]); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>四.场地与设备</b>
                    </td>
                </tr>
                <tr>
                    <td>
                        <textarea required rows="6" name="Instrument" class="form-control" placeholder="校内、校外具体地点名称。&#13;&#10;eg:&#13;&#10;1.xxx&#13;&#10;　（1）.xxx&#13;&#10;　（2）.xxx　&#13;&#10;2.xxx"><?php echo ($data["Instrument"]); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>五.配套教材或指导书</b>
                    </td>
                </tr>
                <tr>
                    <td>
                        <textarea required rows="3" name="TBook" class="form-control" placeholder="eg:&#13;&#10;[1].陈伯时.电力拖动自动控制系统[M].北京:机械工业出版社，2003.&#13;&#10;[2].xxx"><?php echo ($data["TBook"]); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>六.考核方式与成绩评定办法</b>
                    </td>
                </tr>
                <tr>
                    <td>
                        <textarea required rows="5" name="TEvaluate" class="form-control" placeholder="分项给出详细评分点.&#13;&#10;eg:&#13;&#10;1.xxx&#13;&#10;　（1）.xxx&#13;&#10;　（2）.xxx&#13;&#10;2.xxx"><?php echo ($data["TEvaluate"]); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>七.其他</b>
                    </td>
                </tr>
                <tr>
                    <td>
                        <textarea required rows="4" name="TOthers" class="form-control" placeholder="eg:&#13;&#10;1.xxx&#13;&#10;　（1）.xxx&#13;&#10;　（2）.xxx&#13;&#10;2.xxx"><?php echo ($data["TOthers"]); ?></textarea>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
        <div class="form-group col-md-4">
            <input class="sub form-control btn btn-primary" value="确认提交" type="submit" >
        </div>
    </form>
</div>

<script type="text/javascript">


    $(function (){
        $('input[name="hiddenCCode"]').val($('input[name="CCode"]').val());
        var val = parseInt($('input[name="CCode"]').val().substr(1, 4));
        switch (val) {
            case 1001:
                console.log('caojianli');
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