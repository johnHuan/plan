<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>确认</title>
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
        width: 940px;
        margin: 0 auto;
        /*padding: 100px 100px 0 100px;*/
        padding: 100px;
        /*height: auto;*/
        background: #fff;
    }
    div.body h1 {
        font-family: "仿宋";
        font-weight: bold;
        font-size: 28px;
        text-align: center;
    }
    div.menu{
        width: 940px;
        height: 100px;
        margin: 0 auto;
        background: #fff;
        padding: 100px;

    }
    table{
        border: 2px #333 solid !important;
    }
    .wid75{
        width: 75px;
    }
    .left-align{
        text-align: left;
        /*text-indent: 20px;*/
    }

</style>
<div class="body">
    <!--<section>-->
    <h1>东北大学本科生课程大纲</h1>
    <table class="table table-bordered">
        <tr>
            <td colspan="2" class="text-center">课程编号</td>
            <td colspan="3" class="text-center"><?php echo ($data["CCode"]); ?></td>
            <td colspan="2" class="text-center">课程名称</td>
            <td colspan="3" class="text-center"><?php echo ($data["CName"]); ?></td>
        </tr>
        <tr>
            <td class="text-center" colspan="2">课程英文名称</td>
            <td class="text-center" colspan="8"><?php echo ($data["EName"]); ?></td>
        </tr>
        <tr>
            <td class="text-center wid75">总学时数</td>
            <td><?php echo ($data["totalSNum"]); ?></td>
            <td rowspan="2" class="text-center wid75">理论<br>学时</td>
            <td rowspan="2" class="wid75"><?php echo ($data["theroyNum"]); ?>
            </td>
            <td rowspan="2" class="text-center wid75">实验<br>学时</td>
            <td rowspan="2" class="wid75">
                <?php echo ($data["practiseNum"]); ?>
            </td>
            <td rowspan="2" class="text-center wid75">上机学时</td>
            <td rowspan="2" class="wid75">
               <?php echo ($data["PCNum"]); ?>
            </td>
            <td rowspan="2" class="wid75">本课程负责人</td>
            <td rowspan="2" class="wid75">
               <?php echo ($data["CMaster"]); ?>
            </td>
        </tr>
        <tr>
            <td class="text-center wid75">学分</td>
            <td><?php echo ($data["TScore"]); ?></td>
        </tr>
        <tr>
            <td colspan="2" class="text-center">开课单位</td>
            <td colspan="3" class="text-center"><?php echo ($data["Thosted"]); ?></td>
            <td colspan="2" class="text-center">适用专业</td>
            <td colspan="3" class="text-center"><?php echo ($data["SMajor"]); ?></td>
        </tr>
        <tr>
            <td class="text-center" colspan="2">考核方式</td>
            <td class="text-center" colspan="8"><?php echo ($data["Tassess"]); ?></td>
        </tr>
        <tr>
            <td class="text-center" colspan="2">先修课程</td>
            <td class="text-center" colspan="8"><?php echo ($data["TBefore"]); ?></td>
        </tr>
        <tr>
            <td class="text-center" colspan="2">课程类型</td>
            <td class="text-center" colspan="8"><?php echo ($data["CStyle"]); ?></td>
        </tr>
        <tr>
            <td class="text-center" colspan="2">选用教材</td>
            <td class="text-center" colspan="8"><?php echo ($data["TBook"]); ?></td>
        </tr>
        <tr>
            <td class="text-center" colspan="2">主要参考书</td>
            <td colspan="8"><?php echo ($data["TreferBook"]); ?></td>
        </tr>
        <tr>
            <td class="text-center" colspan="2">课程简介</td>
            <td class="left-align" colspan="8"><?php echo ($data["CIntroduction"]); ?></td>
        </tr>
        <tr>
            <td class="text-center" colspan="2">课程内容及教学目标</td>
            <td colspan="8"><?php echo ($data["TContent"]); ?></td>
        </tr>
        <tr>
            <td class="text-center" colspan="2">课程目标与毕业要求之间的关系</td>
            <td colspan="8"><?php echo ($data["TRelation"]); ?></td>
        </tr>
        <tr>
            <td colspan="2" rowspan="<?php echo ($cnt+2); ?>" class="text-center"><br>教学方法及学时分配</td>
            <td colspan="3" rowspan="2" class="text-center"><br>教学内容</td>
            <td colspan="3" class="text-center">学时</td>
            <td colspan="2" rowspan="2" class="text-center"><br>教学方法</td>
        </tr>
        <tr>
            <td class="text-center">授课</td>
            <td class="text-center">上机</td>
            <td class="text-center">实验</td>
        </tr>
        <?php if(is_array($dataTable)): foreach($dataTable as $key=>$vo): ?><tr>
                <td colspan="3"><?php echo ($vo["CContent"]); ?></td>
                <td><?php echo ($vo["TNumTalk"]); ?></td>
                <td><?php echo ($vo["TNumPC"]); ?></td>
                <td><?php echo ($vo["TNumPractise"]); ?></td>
                <td colspan="2"><?php echo ($vo["TMethods"]); ?></td>
            </tr><?php endforeach; endif; ?>
        <tr>
            <td colspan="2" class="text-center">课程的评价与持续改进机制</td>
            <td colspan="8"><?php echo ($data["TEvaluate"]); ?></td>
        </tr>


    </table>

</div>

    <div class="menu form-group">
        <a href="/plan/index.php/Home/Kecheng/edit?ccode=<?php echo ($data["CCode"]); ?>" class="btn btn-primary pull-left">返回修改</a>
        <a href="/plan/index.php/Home/Kecheng/confirm?ccode=<?php echo ($data["CCode"]); ?>&flag=1" class="btn btn-primary pull-right">确认提交</a>
    </div>
<script type="text/javascript">


</script>
</body>
</html>