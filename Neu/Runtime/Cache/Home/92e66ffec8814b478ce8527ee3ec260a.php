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
            <li><a href="/plan/index.php/Home/Shiyan/logout">退出</a></li>
        </ul>
    </div>
</nav>

<br><br>


    <div class="container-fluid">
        <div class="header">
            <h1 class="text-center">资土学院 实验教学大纲</h1>
        </div>
        <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
        <form action="/plan/index.php/Home/Shiyan/edit?id=61&ccode=C1014040010" method="post">
            <table class="table table-condensed table-bordered table-striped table-hover">
                <thead>当前状态：
                <span class="text-danger">信息不全!! 请及时修改</span>
                </thead>
                <tbody>
                <input type="hidden" name="id" value="<?php echo ($data["id"]); ?>">
                <tr>
                    <td>《
                        <input readonly value="<?php echo ($data["CName"]); ?>" name="CName" required type="text" class="inline-input" style="width: 20%;" placeholder="教学大纲名称">
                        》实验教学大纲
                    </td>
                </tr>
                <tr>
                    <td>Experiment Syllabus of
                        <input  value="<?php echo ($data["EName"]); ?>" name="EName" required type="text" class="inline-input" style="width: 85%; text-indent: 6px;" placeholder="XXXXXX">
                    </td>
                </tr>
                <tr>
                    <td>课程代码：
                        <input readonly value="<?php echo ($data["CCode"]); ?>" name="CCode" required type="text" class="inline-input" placeholder="字母C开头的课程编号">
                    </td>
                </tr>
                <tr>
                    <td>学时数：
                        <input readonly value="<?php echo ($data["TNum"]); ?>" name="TNum" required type="text" class="inline-input" placeholder="填写数字">学时
                    </td>
                </tr>
                <tr>
                    <td class="checkbox checkbox-info checkbox-circle">
                        实验要求：
                        <?php if($data["shiYanYaoQiu"] == '必修'): ?><label><input required type="radio" name="shiYanYaoQiu" checked value="必修"> 必修</label>
                            <label><input  required type="radio" name="shiYanYaoQiu" value="选修"> 选修</label>
                        <?php else: ?>
                            <label>必修</label><input required type="radio" name="shiYanYaoQiu"  value="必修">
                            <label>选修</label><input required type="radio" name="shiYanYaoQiu" checked value="选修"><?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>适用专业：
                        <select required name="SMajor" data-placeholder="==请选择适用专业==" class="selectpicker chosen-select " multiple data-done-button="true">
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
                    <td class="checkbox checkbox-info checkbox-circle">课程性质：　　　
                        <?php if($data["KeChengXingZhi"] == '独立设课'): ?><label><input checked required type="radio" name="KeChengXingZhi" value="独立设课"> 独立设课</label>
                            <label><input required type="radio" name="KeChengXingZhi" value="非独立设课"> 非独立设课</label>
                        <?php else: ?>
                            <label><input required type="radio" name="KeChengXingZhi" value="独立设课"> 独立设课</label>
                            <label><input checked required type="radio" name="KeChengXingZhi" value="非独立设课"> 非独立设课</label><?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>课程负责人：
                        <input value="<?php echo ($data["CMaster"]); ?>" name="CMaster" required type="text" class="inline-input" style="width: 20%;;" placeholder="XXX">
                    </td>
                </tr>
                <tr>
                    <td>审核人：
                        <input value="<?php echo ($data["CConductor"]); ?>" name="CConductor" required type="text" class="inline-input" placeholder="XXX">
                    </td>
                </tr>
                <tr>
                    <td>批准人：
                        <input value="<?php echo ($data["Allowed"]); ?>" name="Allowed" type="text" required class="inline-input" placeholder="XXX">
                    </td>
                </tr>
                </tbody>
            </table>
            <table class="table table-condensed table-bordered table-striped table-hover">
                <thead>
                <h4>一、课程目的与基本要求：</h4>
                </thead>
                <tbody>
                <tr>
                    <td>
                        1.实验目的
                    </td>
                </tr>
                <tr>
                    <td>
                        <textarea required name="destination" class="form-control" placeholder="编号直接用数字即可;eg:1.xxx; 2.xxx;"><?php echo ($data["destination"]); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>2. 基本要求</td>
                </tr>
                <tr>
                    <td>
                        <textarea required name="BasicRequire" class="form-control" placeholder="编号直接用数字;eg: 1.xxx; 2.xxx"><?php echo ($data["BasicRequire"]); ?></textarea>
                    </td>
                </tr>
                </tbody>
            </table>
            <table class="table table-condensed table-bordered table-striped table-hover">
                <thead>
                <h4>二、实验方式与要求</h4>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <textarea required name="StyleRequire" class="form-control" placeholder="编号直接用数字;eg: 1.xxx; 2.xxx"><?php echo ($data["StyleRequire"]); ?></textarea>
                    </td>
                </tr>
                </tbody>
            </table>
            <table class="table table-condensed table-bordered table-striped table-hover">
                <thead>
                <h4>三、实验项目及教学安排　　
                    <!--<a href="javascript:countIndex();" class="addRow small"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>不够写了？再添加一行吧:)</a>-->
                    <!--<button type="button" class="btn btn-defalut btn-small pull-right disabled" data-toggle="modal" data-target="#uploadExcel">上传Excel文件</button>-->
                </h4>

                </thead>
                <tbody class="addRowBody">
                <tr>
                    <td>序号：</td>
                    <td>实验名称</td>
                    <td>基本内容</td>
                    <td>实验学时</td>
                    <td>每组人数</td>
                    <td>实验要求</td>
                    <td>实验类型</td>
                    <!--<td>操作</td>-->
                </tr>
                <?php if(is_array($dataTable)): foreach($dataTable as $key=>$vo): ?><tr>
                        <td style="width: 70px"><input required name="TestNum[]" type="text" class="inline-input" style="width: 100%" value="<?php echo ($vo["TestNum"]); ?>">
                        <td><input required name="TestName[]" type="text" class="inline-input" style="width: 100%" value="<?php echo ($vo["TestName"]); ?>"></td>
                        <td><input required name="TestBasicContent[]" type="text" class="inline-input" style="width: 100%" value="<?php echo ($vo["TestBasicContent"]); ?>"></td>
                        <td style="width: 70px"><input required name="TestXueShi[]" type="text" class="inline-input" style="width: 100%" value="<?php echo ($vo["TestXueShi"]); ?>"></td>
                        <td style="width: 70px"><input required name="TestPerTeam[]" type="text" class="inline-input" style="width: 100%;" value="<?php echo ($vo["TestPerTeam"]); ?>"></td>
                        <td style="width: 115px;">
                            <?php if($vo["TestRequire"] == '必修'): ?><label><input type="radio" checked required name="TestRequire[<?php echo ($vo["TestNum"]); ?>]" value="必修">必修</label>
                                <label><input type="radio" required name="TestRequire[<?php echo ($vo["TestNum"]); ?>]" value="选修">选修</label>
                            <?php else: ?>
                                <label><input type="radio" required name="TestRequire[<?php echo ($vo["TestNum"]); ?>]" value="必修">必修</label>
                                <label><input type="radio" checked required name="TestRequire[<?php echo ($vo["TestNum"]); ?>]" value="选修">选修</label><?php endif; ?>
                        </td>
                        <td nowrap="true">
                            <?php if($vo["TestStyle"] == '综合型'): ?><label><input checked required type="radio" name="TestStyle[<?php echo ($vo["TestNum"]); ?>]" value="综合型">综合型</label>
                                <label><input required type="radio" name="TestStyle[<?php echo ($vo["TestNum"]); ?>]" value="设计型">设计型</label>
                                <label><input required type="radio" name="TestStyle[<?php echo ($vo["TestNum"]); ?>]" value="演示型">演示型</label>
                                <label><input required type="radio" name="TestStyle[<?php echo ($vo["TestNum"]); ?>]" value="验证型">验证型</label>
                            <?php elseif($vo["TestStyle"] == '设计型'): ?>
                                <label><input required type="radio" name="TestStyle[<?php echo ($vo["TestNum"]); ?>]" value="综合型">综合型</label>
                                <label><input checked required type="radio" name="TestStyle[<?php echo ($vo["TestNum"]); ?>]" value="设计型">设计型</label>
                                <label><input required type="radio" name="TestStyle[<?php echo ($vo["TestNum"]); ?>]" value="演示型">演示型</label>
                                <label><input required type="radio" name="TestStyle[<?php echo ($vo["TestNum"]); ?>]" value="验证型">验证型</label>
                            <?php elseif($vo["TestStyle"] == '演示型'): ?>
                                <label><input checked required type="radio" name="TestStyle[<?php echo ($vo["TestNum"]); ?>]" value="综合型">综合型</label>
                                <label><input required type="radio" name="TestStyle[<?php echo ($vo["TestNum"]); ?>]" value="设计型">设计型</label>
                                <label><input checked required type="radio" name="TestStyle[<?php echo ($vo["TestNum"]); ?>]" value="演示型">演示型</label>
                                <label><input required type="radio" name="TestStyle[<?php echo ($vo["TestNum"]); ?>]" value="验证型">验证型</label>
                            <?php elseif($vo["TestStyle"] == '验证型'): ?>
                                <label><input required type="radio" name="TestStyle[<?php echo ($vo["TestNum"]); ?>]" value="综合型">综合型</label>
                                <label><input required type="radio" name="TestStyle[<?php echo ($vo["TestNum"]); ?>]" value="设计型">设计型</label>
                                <label><input required type="radio" name="TestStyle[<?php echo ($vo["TestNum"]); ?>]" value="演示型">演示型</label>
                                <label><input checked required type="radio" name="TestStyle[<?php echo ($vo["TestNum"]); ?>]" value="验证型">验证型</label><?php endif; ?>

                        </td>
                        <!--<td style="width: 45px;"><a href="javascript:void(0);" onclick="clearRow(this)">删除</a></td></td>-->
                    </tr><?php endforeach; endif; ?>
                </tbody>

            </table>
            <table class="table table-condensed table-bordered table-striped table-hover">
                <thead>
                <h4>四、场地设备</h4>
                </thead>
                <tbody>
                <tr>
                    <td>场地：<input value="<?php echo ($data["TAddress"]); ?>" required name="TAddress" type="text" class="inline-input" placeholder="XXX"></td>
                </tr>
                <tr>
                    <td>主要仪器设备：<input value="<?php echo ($data["TInstrument"]); ?>" required name="TInstrument" style="width: 90%;" type="text" class="inline-input" placeholder="XXX"></td>
                </tr>
                </tbody>
            </table>
            <table class="table table-condensed table-bordered table-striped table-hover">
                <thead>
                <h4>五、考核方式与成绩评定办法</h4>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <textarea required name="TEvaluate" class="form-control"><?php echo ($data["TEvaluate"]); ?></textarea>
                    </td>
                </tr>
                </tbody>
            </table>
            <table class="table table-condensed table-bordered table-striped table-hover">
                <thead>
                <h4>六、实验教材及参考书</h4>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <textarea required name="TBook" class="form-control" placeholder="eg:[1] 崔坚主编.SIMATIC S7-1500与TIA博途软件使用指南.北京:工业出版社.2016"><?php echo ($data["TBook"]); ?></textarea>
                    </td>
                </tr>
                </tbody>
            </table>
            <!--
            <div class="form-group col-md-4">
                <button class="form-control btn btn-primary" >预览</button>
            </div>
            -->
            <div class="form-group col-md-4">
                <input class="form-control btn btn-primary" value="确认提交" type="submit" >
            </div>
        </form>
    </div>

    <script type="text/javascript">
        // 只能用定义全局变量的方式来记录点击生成表格的行数了
        var i = 0;
        function countIndex() {
            i++;
        }
        $(function (){
            $('.addRow').on('click', function (index) {
                var flag = index.timeStamp.toString().substr(0, 4);
                var newRow = document.createElement("tr");
                var ibody = $('.addRowBody')[0];

                var td1 = document.createElement("td");
                td1.innerHTML="<input name=\"TestNum[]\" required type=\"text\" class=\"inline-input\" style=\"width: 100%\">";
                newRow.appendChild(td1);

                var td2 = document.createElement("td");
                td2.innerHTML="<input name=\"TestName[]\" required type=\"text\" class=\"inline-input\" style=\"width: 100%\">";
                newRow.appendChild(td2);

                var td3 = document.createElement("td");
                td3.innerHTML="<input name=\"TestBasicContent[]\" required type=\"text\" class=\"inline-input\" style=\"width: 100%\">";
                newRow.appendChild(td3);

                var td4 = document.createElement("td");
                td4.innerHTML="<input name=\"TestXueShi[]\" required type=\"text\" class=\"inline-input\" style=\"width: 100%\">";
                newRow.appendChild(td4);

                var td5 = document.createElement("td");
                td5.innerHTML="<input name=\"TestPerTeam[]\" required type=\"text\" class=\"inline-input\" style=\"width: 100%\">";
                newRow.appendChild(td5);

                var td6 = document.createElement("td");
                td6.setAttribute('style', 'width:115px');
                td6.innerHTML="<label><input type=\"radio\" required name=\"TestRequire["+i+"]\" value=\"必修\">必修 </label> <label><input type=\"radio\" name=\"TestRequire["+i+"]\" value=\"选修\">选修</label>";
//            td6.innerHTML="<input name=\"TestRequire[]\" type=\"text\" class=\"inline-input\" style=\"width: 100%\" placeholder='填：必修或选修' required>";
                newRow.appendChild(td6);

                var td7 = document.createElement("td");
                td7.setAttribute('nowrap', 'true');
//            td7.innerHTML="<input name=\"TestStyle[]\" type=\"text\" class=\"inline-input\" style=\"width: 100%\" placeholder='从上一行的单选按钮中选一个填写'>";
                td7.innerHTML="<label><input type=\"radio\" required name=\"TestStyle["+i+"]\" value=\"综合型\">综合型</label> <label><input type=\"radio\" name=\"TestStyle["+i+"]\" value=\"设计型\">设计型</label> <label><input type=\"radio\" name=\"TestStyle["+i+"]\" value=\"演示型\">演示型</label> <label><input type=\"radio\" name=\"TestStyle["+i+"]\" value=\"验证型\">验证型</label>";
                newRow.appendChild(td7);

                var td8=document.createElement("td");
                td8.innerHTML="<a href=\"javascript:;\" onclick=\"clearRow(this)\">删除</a>";
                td8.setAttribute('style', 'width:45px;');
                newRow.appendChild(td8);
                ibody.appendChild(newRow);

            });

            $('input[name="CCode"]').on('blur', function () {
                $('input[name="hiddenCCode"]').val(this.value);
                var val = parseInt(this.value.substr(1, 4));
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

                // 将课程代码通过ajax发送到服务器上去
                if(this.value.trim().length == 11){
                    $.ajax({
                        type: 'post',
                        url: '/plan/index.php/Home/Shiyan/dealExcel',
                        data: this.value,
                        success: function (response) {
                            console.log(response);
                        }
                    });
                }
            });

            /*
             $('#upload').on('click', function (e) {
             e.preventDefault();
             //            console.log($('#formExcel'));
             var formData = new FormData($('#formExcel'));
             //            console.log(formData);

             $.ajax({
             url: '/plan/index.php/Home/Shiyan/dealExcel',
             type: 'post',
             data: formData,
             beforeSend: function () {
             $('.btn-upload').addClass('disabled').html('数据交互中请稍后...');
             },
             success: function (response) {
             console.log(response);
             },
             error: function (e) {
             console.log('ajax上传出错！'+e.error);
             },
             complete: function () {
             $('.btn-upload').removeClass('disabled').html('上传');
             }
             })

             });

             */

        });

        // 创建表格删除函数
        function clearRow(obj) {
            var ibody = $('.addRowBody')[0].lastChild;
            var c = obj.parentNode.parentNode;
            c.parentNode.removeChild(c);

        }

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