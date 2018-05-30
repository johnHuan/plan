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

        text-indent: 30px;
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
        text-indent: 30px;
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
        <h1>《<?php echo ($result["CName"]); ?>》实验教学大纲</h1>
        <h2>Experiment Syllabus of <i><?php echo ($result["EName"]); ?></i></h2>
        <p>课程代码： <?php echo ($result["CCode"]); ?></p>
        <p>学时数： <?php echo ($result["TNum"]); ?> 学时</p>
        <p>实验要求： <?php echo ($result["shiYanYaoQiu"]); ?></p>
        <p>适用专业： <?php echo ($result["SMajor"]); ?></p>
        <p>课程性质： <?php echo ($result["KeChengXingZhi"]); ?></p>
        <p>课程负责人：<?php echo ($result["CMaster"]); ?></p>
        <p>审核人：<?php echo ($result["CConductor"]); ?></p>
        <p>批准人：<?php echo ($result["Allowed"]); ?></p>
        <h3>一、实验目的与基本要求</h3>
        <h4>1. 实验目的</h4>
        <p class="text"><?php echo ($result["destination"]); ?></p>

    <!--</section>-->
</div>
<section class="section">
    <h4>2.基本要求</h4>
    <p class="text"><?php echo ($result["BasicRequire"]); ?></p>
    <h3>二、实验方式与要求</h3>
    <p class="text"><?php echo ($result["StyleRequire"]); ?></p>
    <h3>三、实验项目及教学安排</h3>
    <table class="table table-bordered">
        <tr>
            <th>序号</th>
            <th>实验名称</th>
            <th>基本内容</th>
            <th>实验学时</th>
            <th>每组人数</th>
            <th>实验要求</th>
            <th>实验类型</th>
        </tr>
    <?php if(is_array($data)): foreach($data as $key=>$vo): ?><tr>
            <td><?php echo ($vo["TestNum"]); ?></td>
            <td><?php echo ($vo["TestName"]); ?></td>
            <td><?php echo ($vo["TestBasicContent"]); ?></td>
            <td><?php echo ($vo["TestXueShi"]); ?></td>
            <td><?php echo ($vo["TestPerTeam"]); ?></td>
            <td><?php echo ($vo["TestRequire"]); ?></td>
            <td><?php echo ($vo["TestStyle"]); ?></td>
        </tr><?php endforeach; endif; ?>
    </table>
    <h3>四、场地与设备</h3>
    <p>场地：<?php echo ($result["TAddress"]); ?></p>
    <p>主要仪器设备：<?php echo ($result["TInstrument"]); ?></p>
    <h3>五、考核方式与成绩评定办法</h3>
    <p><?php echo ($result["TEvaluate"]); ?></p>
    <h3>六、实验教材及参考书</h3>
    <p><?php echo ($result["TBook"]); ?></p>

</section>
    <div class="menu form-group">
        <a href="/plan/index.php/Home/Shiyan/edit?id=<?php echo ($result["id"]); ?>&ccode=<?php echo ($result["CCode"]); ?>" class="btn btn-primary pull-left">返回修改</a>　　　　　　　　　　　　
        <a href="/plan/index.php/Home/Shiyan/confirm?id=<?php echo ($result["id"]); ?>&CCode=<?php echo ($result["CCode"]); ?>&flag=1" class="btn btn-primary pull-right">确认提交</a>
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
</body>
</html>