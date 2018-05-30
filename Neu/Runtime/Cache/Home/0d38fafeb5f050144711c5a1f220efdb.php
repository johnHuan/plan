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
            <li><a href="/plan/index.php/Home/Task/logout">退出</a></li>
        </ul>
    </div>
</nav>

<br><br>


    <style>

        /*returnTop开始*/
        div#back-to-top {
            z-index: 99999;
            position: fixed;
            display: none;
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
        .datagrid-btable .datagrid-cell{padding:4px 2px;}
        td{
            /*text-overflow: clip;*/
            /*overflow: scroll;*/
            /*overflow: auto;*/
        }

        /*returnTop结束*/
    </style>
    <link rel="stylesheet" type="text/css" href="/plan/Public/jquery-easyui-1.5.3/themes/bootstrap/easyui.css">
    <link rel="stylesheet" type="text/css" href="/plan/Public/jquery-easyui-1.5.3/themes/icon.css">
    <script type="text/javascript" src="/plan/Public/jquery-easyui-1.5.3/jquery.easyui.min.js"></script>
    <!--body start-->
    <div class="container-fluid">
        <div class="header">
            <h1 class="text-center">东北大学201<?php echo (substr($version,0,1)); ?>-201<?php echo (substr($version,1,1)); ?>学年第
                <?php if(substr($version, 2, 1) == 1): ?>一
                    <?php else: ?>
                    二<?php endif; ?>
                学期教学任务书
            </h1>
        </div>

        <!--返回顶部-->
        <div id="top"></div>
        <div id="back-to-top"><a href="#top"><span></span></a></div>

        <form class="navbar-form" action="/plan/index.php/Home/Task/showTaskInfo?v=782" method="post">
            筛选条件：
            <div class="form-group">
                <select name="上课对象" class="selectpicker form-control">
                    <option value="">--选择专业--</option>
                    <option value="测绘">测绘</option>
                    <option value="采矿">采矿</option>
                    <option value="土木">土木</option>
                    <option value="安全">安全</option>
                    <option value="环境">环境</option>
                    <option value="矿物">矿物</option>
                    <option value="资源">资源</option>
                </select>
            </div>
            <div data-toggle="buttons" class="btn-group">
                <label class="btn btn-default"><input name="status" type="radio" value="1">已有</label>　
                <label class="btn btn-default"><input name="status" type="radio" value="0">待填</label>　
            </div>
            <div class="form-group">
                <input name="keywords" type="text" class="form-control" style="width: 400px;"
                       placeholder="课程名称 \ 课程编号 \ 任课教师">
                <button type="submit" class="btn btn-info ">检索</button>
            </div>
        </form>
        <table class="suitHeight easyui-datagrid" data-options="rownumbers:true,singleSelect:true">
            <thead data-options="frozen:true">
            <tr>
                <th data-options="field:'状态',width:35">状态</th>
                <th data-options="field:'编号',width:30">序号</th>
                <th data-options="field:'课程编号',width:90">课程编号</th>
                <th data-options="field:'课程名称',width:150">课程名称</th>
            </tr>
            </thead>
            <thead>
            <tr>
                <th data-options="field:'任课教师', width:100, align:'left'">任课教师</th>
                <th data-options="field:'学时分配', width:100, align:'left'">主讲老师学时分配</th>
                <th data-options="field:'职称', width:100, align:'left'">职称</th>
                <th data-options="field:'年龄', width:100, align:'left'">年龄</th>
                <th data-options="field:'助课', width:100, align:'left'">助课</th>
                <th data-options="field:'外聘', width:100, align:'left'">外聘</th>
                <th data-options="field:'双语', width:100, align:'left'">双语（全英语）</th>
                <th data-options="field:'选课低于10人不开课', width:100, align:'left'">选课低于10人不开课</th>
                <th data-options="field:'学期学时', width:100, align:'left'">学期学时</th>
                <th data-options="field:'理论学时', width:100, align:'left'">理论学时</th>
                <th data-options="field:'周学时', width:100, align:'left'">周学时</th>
                <th data-options="field:'开课周', width:100, align:'left'">开课周</th>
                <th data-options="field:'实验学时', width:100, align:'left'">实验学时</th>
                <th data-options="field:'实验周', width:100, align:'left'">实验周</th>
                <th data-options="field:'上课对象', width:100, align:'left'">上课对象</th>
                <th data-options="field:'学生数', width:100, align:'left'">学生数</th>
                <th data-options="field:'试验场所名称', width:200, align:'left'">试验场所名称（参考分专业实验课情况</th>
                <th data-options="field:'上课地点', width:100, align:'left'">上课地点</th>
                <th data-options="field:'实验任课教师', width:100, align:'left'">实验任课教师</th>
                <th data-options="field:'上机学时', width:100, align:'left'">上机学时</th>
                <th data-options="field:'上机周', width:100, align:'left'">上机周</th>
                <th data-options="field:'学分', width:100, align:'left'">学分</th>
                <th data-options="field:'课程类型', width:100, align:'left'">课程类型</th>
                <th data-options="field:'备注', width:100, align:'left'">备注</th>
                <th data-options="field:'课群', width:100, align:'left'">课群</th>
                <th data-options="field:'参与选课', width:100, align:'left'">参与选课</th>
                <th data-options="field:'考核方式', width:100, align:'left'">考核方式</th>
                <th data-options="field:'开课模式', width:100, align:'left'">开课模式</th>
                <th data-options="field:'合班数', width:100, align:'left'">合班数</th>
                <th data-options="field:'参与排课', width:100, align:'left'">参与排课</th>
                <th data-options="field:'总学时', width:100, align:'left'">总学时</th>
                <th data-options="field:'不生成成绩名单', width:100, align:'left'">不生成成绩名单</th>
                <th data-options="field:'指定节次', width:100, align:'left'">指定节次</th>
                <th data-options="field:'上课时间', width:200, align:'left'">上课时间（周/星期/节数/班级）</th>
            </tr>
            </thead>
            <tbody>
            <?php if($data == ''): ?><tr>
                    <td colspan="9" class="bg-danger">
                        <span class="text-warning">没有任何数据</span>
                    </td>
                </tr>
                <?php else: ?>
                <?php if(is_array($data)): foreach($data as $k=>$vo): ?><tr>
                        <td>
                            <?php if($vo["status"] == 0): ?><a href="/plan/index.php/Home/Task/edit?num=<?php echo ($vo["任务号"]); ?>" class="btn btn-xs btn-primary"
                                   title="待编辑， 点击编辑">
                                    <span class="glyphicon glyphicon-question-sign"></span>
                                </a>
                                <?php else: ?>
                                <span class="glyphicon glyphicon-off" title="已完成"></span><?php endif; ?>
                        </td>
                        <td><?php echo ($k+1); ?></td>
                        <?php if(strlen($vo['选课低于10人不开课']) < 1 ): ?><td><span class="text-success"><?php echo ($vo["课程编号"]); ?></span></td>
                            <?php else: ?>
                            <td><span class=" label-warning bg-danger"><?php echo ($vo["课程编号"]); ?></span></td><?php endif; ?>

                        <td>
                            <?php if($vo["status"] == 1): ?><a href="/plan/index.php/Home/Task/edit?num=<?php echo ($vo["任务号"]); ?>" title="编辑"><?php echo ($vo["课程名称"]); ?></a>
                                <?php else: ?>
                                <a href="/plan/index.php/Home/Task/edit?num=<?php echo ($vo["任务号"]); ?>" title="编辑"><?php echo ($vo["课程名称"]); ?></a><?php endif; ?>
                        </td>

                        <td><?php echo ($vo["任课教师"]); ?></td>
                        <td><?php echo ($vo["学时分配"]); ?></td>

                        <td><?php echo ($vo["职称"]); ?></td>
                        <td><?php echo ($vo["年龄"]); ?></td>

                        <td><?php echo ($vo["助课"]); ?></td>
                        <td><?php echo ($vo["外聘"]); ?></td>
                        <td><?php echo ($vo["双语"]); ?></td>
                        <td><?php echo ($vo["选课低于10人不开课"]); ?></td>
                        <td><?php echo ($vo["学期学时"]); ?></td>
                        <td><?php echo ($vo["理论学时"]); ?></td>
                        <td><?php echo ($vo["周学时"]); ?></td>
                        <td><?php echo ($vo["开课周"]); ?></td>
                        <td><?php echo ($vo["实验学时"]); ?></td>
                        <td><?php echo ($vo["实验周"]); ?></td>
                        <td><?php echo ($vo["上课对象"]); ?></td>
                        <td><?php echo ($vo["学生数"]); ?></td>
                        <td><?php echo ($vo["试验场所名称"]); ?></td>
                        <td><?php echo ($vo["上课地点"]); ?></td>
                        <td><?php echo ($vo["实验任课教师"]); ?></td>
                        <td><?php echo ($vo["上机学时"]); ?></td>
                        <td><?php echo ($vo["上机周"]); ?></td>
                        <td><?php echo ($vo["学分"]); ?></td>
                        <td><?php echo ($vo["课程类型"]); ?></td>
                        <td><?php echo ($vo["备注"]); ?></td>
                        <td><?php echo ($vo["课群"]); ?></td>
                        <td><?php echo ($vo["参与选课"]); ?></td>
                        <td><?php echo ($vo["考核方式"]); ?></td>
                        <td><?php echo ($vo["开课模式"]); ?></td>
                        <td><?php echo ($vo["合班数"]); ?></td>
                        <td><?php echo ($vo["参与排课"]); ?></td>
                        <td><?php echo ($vo["总学时"]); ?></td>
                        <td><?php echo ($vo["不生成成绩名单"]); ?></td>
                        <td><?php echo ($vo["指定节次"]); ?></td>
                        <td id="maxWidth" style="overflow: hidden;text-overflow:ellipsis;white-space: nowrap;"><?php echo ($vo["上课时间"]); ?></td>

                    </tr><?php endforeach; endif; endif; ?>
            </tbody>
        </table>

    </div>
    <script>
        /*
         * 回到顶部
         * */
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

        /**
         * 自适应中间数据项的height
         */

        let ht = window.innerHeight - 210 - 80;

        $(".suitHeight").css("maxHeight", ht).css("minHeight", 350);

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