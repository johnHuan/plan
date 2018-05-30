<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>预览</title>
    <link rel="stylesheet" media="screen" type="text/css" href="/plan/Public/css/index.css">
    <link rel="stylesheet" media="screen" type="text/css" href="/plan/Public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" media="screen" type="text/css" href="/plan/Public/bootstrap/css/bootstrap-responsive.css">
    <link rel="stylesheet" media="screen" type="text/css" href="/plan/Public/bootstrap/css/bootstrap-overrides.css">
    <link rel="stylesheet" media="screen" type="text/css" href="/plan/Public/bootstrap/css/bootstrap-select.css">
    <script type="text/javascript" src="/plan/Public/js/jquery.min.js"></script>
    <script type="text/javascript" src="/plan/Public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/plan/Public/js/bootstrap-select.js"></script>
    <script type="text/javascript" src="/plan/Public/js/jquery.form.js"></script>
</head>
<body>
<style>
    body {
        background: #CCCCCC;.
        font-family: "宋体";
    }
    div.body {
        width: 800px;
        margin: 0 auto;
        /*padding: 100px 100px 0 100px;*/
        padding: 100px;
        /*height: auto;*/
        background: #fff;
    }
    div.body h1 {
        font-weight: normal;
        font-size: 32px;
        text-align: center;
    }
    div.body h2 {
        font-family: "Times New Roman";
        font-weight: normal;
        font-size: 28px;
        text-align: center;
    }
    h3{
        font-size: 20px;
        font-weight: 700;
    }
    div.body h4 {
        clear: both;
        height: 25px;
        line-height: 25px;
    }
    div.body p {
        text-indent: 20px;
        height: 30px;
        line-height: 30px;
    }
    div.body p.text{

        /*text-indent: 30px;*/
        text-align: justify;
        /*height: 30px;*/
        /*line-height: 30px;*/
        height: inherit;
        /*background: #360;*/

    }
    /**/
    section {
        width: 800px;
        margin: -100px auto;
        /*padding: 100px 100px 0 100px;*/
        padding: 0 100px 100px 100px;
        /*height: auto;*/
        /*background: red;*/
        background: #fff;

    }
    section p{
        /*text-indent: 30px;*/
        text-align: justify;
        /*height: 30px;*/
        line-height: 30px;
    }

    div.menu {
        width: 800px;
        margin: -50px auto;
        /*padding: 100px 100px 0 100px;*/
        padding: 0 100px 100px 100px;
        /*height: auto;*/
        background: #fff;
    }
</style>
<div class="body">
    <!--<section>-->
    <h1><?php echo ($result["CName"]); ?></h1>
    <h2><i><?php echo ($result["EName"]); ?></i></h2>
    <p>课程代码： <?php echo ($result["CCode"]); ?></p>
    <p>学时数： <?php echo ($result["TNum"]); ?> 学时</p>
    <p>学分数： <?php echo ($result["TScore"]); ?></p>
    <p>适用专业： <?php echo ($result["SMajor"]); ?></p>
    <p>课程性质： <?php echo ($result["KeChengXingZhi"]); ?></p>
    <p>实践要求： <?php echo ($result["shijianYaoQiu"]); ?></p>
    <p>执笔人： <?php echo ($result["TzhiBiRen"]); ?></p>
    <p>讨论参加人： <?php echo ($result["TTaoLunCanJia"]); ?></p>
    <p>审核人：<?php echo ($result["CConductor"]); ?></p>
    <p>批准人：<?php echo ($result["Allowed"]); ?></p>
    <h4><b>一、目的与任务</b></h4>
    <p class="text"><?php echo ($result["destination"]); ?></p>

    <!--</section>-->
</div>
<section class="section">
    <h4><b>二、内容与要求</b></h4>
    <p class="text"><?php echo ($result["ContentRequire"]); ?></p>
    <h4><b>三.组织方式与进度安排</b></h4>
    <p class="text"><?php echo ($result["progress"]); ?></p>
    <h4><b>四.场地与设备</b></h4>
    <p><?php echo ($result["Instrument"]); ?></p>
    <h4><b>五.配套教材或指导书</b></h4>
    <p><?php echo ($result["TBook"]); ?></p>
    <h4><b>六.考核方式与成绩评定办法</b></h4>
    <p><?php echo ($result["TEvaluate"]); ?></p>
    <h4><b>七.其他</b></h4>
    <p><?php echo ($result["TOthers"]); ?></p>

</section>
    <div class="menu form-group">
        <a href="/plan/index.php/Home/Shijian/edit?id=<?php echo ($result["id"]); ?>&ccode=<?php echo ($result["CCode"]); ?>" class="btn btn-primary pull-left">返回修改</a>
        <a href="/plan/index.php/Home/Shijian/confirm?id=<?php echo ($result["id"]); ?>&CCode=<?php echo ($result["CCode"]); ?>&flag=1" class="btn btn-primary pull-right">确认提交</a>
    </div>
<script type="text/javascript">


</script>
</body>
</html>