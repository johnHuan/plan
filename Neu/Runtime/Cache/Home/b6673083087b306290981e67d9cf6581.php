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

    </style>
    <div class="container-fluid" data-spy="scroll" data-target="#myscrollspy">
        <div class="header">
            <h1 class="text-center">资土学院 实验教学大纲(C版课程库)</h1>
        </div>
    </div>

    <!--返回顶部-->
    <div id="top"></div>
    <div id="back-to-top"><a href="#top"><span></span></a></div>

    <div class="container-fluid table-responsive">
        <table class="table table-bordered">
            <caption>
                <p>
                菜单项：
                    <a href="javascript:void(0);" class="active btn btn-next">C版课程库</a> |
                    <a href="/plan/index.php/Home/Shiyan/showb" class="btn btn-xs btn-primary">B版课程库</a>
                </p>
                <form class="navbar-form" action="/plan/index.php/Home/Shiyan/showc" method="post">
                    筛选条件：
                    <div class="form-group">
                        <select name="SMajor" class="selectpicker form-control">
                            <option value="">--选择专业--</option>
                            <option value="测绘工程">测绘工程</option>
                            <option value="采矿工程">采矿工程</option>
                            <option value="土木工程">土木工程</option>
                            <option value="安全工程">安全工程</option>
                            <option value="环境工程">环境工程</option>
                            <option value="矿物加工工程">矿物加工工程</option>
                            <option value="资源勘查工程">资源勘查工程</option>
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
                    <!--<th>计划批次</th>-->
                    <th>适用专业</th>
                    <th>实验学时</th>
                    <th>上机学时</th>
                    <th>操作</th>
                </tr>
                <?php if(is_array($data)): foreach($data as $k=>$vo): ?><tr>
                            <td><?php echo ($k+1); ?></td>
                            <td><?php echo ($vo["课程编号"]); ?></td>

                            <?php if($vo["status"] == 0): ?><td class="bg-danger">
                                    <span class="glyphicon glyphicon-wrench"></span> 　
                                    <a class="text-success" href="/plan/index.php/Home/Shiyan/add?id=<?php echo ($vo["id"]); ?>&ccode=<?php echo ($vo["课程编号"]); ?>&flag=0" title="填写与完善"><?php echo ($vo["课程名称"]); ?></a>
                                </td>
                            <?php else: ?>
                                <td class="bg-success text-success">
                                    <span class="text-success  alert-success glyphicon glyphicon-ok-circle"></span> 　<?php echo ($vo["课程名称"]); ?>
                                </td><?php endif; ?>


                            <!--<td><?php echo ($vo["计划批次"]); ?></td>-->
                            <td><?php echo ($vo["专业名称"]); ?></td>
                            <td><?php echo ($vo["实验学时"]); ?></td>
                            <td><?php echo ($vo["上机学时"]); ?></td>
                            <td class="text-center">
                                <?php if($vo["status"] == 0): ?><a href="/plan/index.php/Home/Shiyan/add?id=<?php echo ($vo["id"]); ?>&ccode=<?php echo ($vo["课程编号"]); ?>&flag=0" title="填写与完善"><span class="glyphicon glyphicon-plus-sign"></span></a>

                                    <?php else: ?>
                                    <span class="text-success  alert-success glyphicon glyphicon-ok-circle"></span><?php endif; ?>
                            </td>
                        </tr><?php endforeach; endif; ?>

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
/*
        function allchk(){
            var chknum = $("input[type='checkbox']").size();//选项总个数
            var chk = 0;
            $("input[type='checkbox']").each(function () {
                if($(this).prop("checked")==true){
                    chk++;
                }
            });
            if(chknum===chk){
                //全选
                $("#all").prop("checked",true);
            } else {
//                不全选
                $("#all").prop("checked",false);
            }
        }
        $(function () {

            //全选或全不选
            $("#all").click(function(){
                if(this.checked){
                    $("input[type='checkbox']").prop("checked", true);
                }else{
                    $("input[type='checkbox']").prop("checked", false);
                }
            });

////            //设置全选复选框
            $("input[type='checkbox']").click(function(){
                allchk();
            });

        });

*/


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