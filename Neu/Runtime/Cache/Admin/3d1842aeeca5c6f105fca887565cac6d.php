<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>东北大学 资源于土木工程学院 </title>
	<link rel="stylesheet" media="screen" type="text/css" href="/plan/Public/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" media="screen" type="text/css" href="/plan/Public/css/index.css">
</head>
<body>
	<div class="container-fluid">
		<div class="wrapper">
			<div class="header">
				<h3 class="text-center hidden-xs">东北大学 资源于土木工程学院 </h3>
			</div>
			<!--main-->
			<div class="content">
				<!--login start-->
				<div class="row">
					<h2 class="text-center hidden-xs"><b>领导登录</b></h2>
					<div class="col-lg-12 col-sm-12">
						<form id="login" action="/plan/index.php/Admin/Index/Index.html" class="form-horizontal" method="post">
							<div class="form-group">
								<label class="col-sm-4 control-label hidden-xs" for="teacher_num">工资号:</label>
								<div class="col-sm-5">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="glyphicon glyphicon-user"></i>
										</div>
										<input type="text" name="teacher_num" id="teacher_num" placeholder="请输入您的工资号" class="form-control">
									</div>
								</div>
								<label id="teacher_num_tip" class="col-sm-3  text-danger"></label>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label hidden-xs" for="teacher_name">姓名:</label>
								<div class="col-sm-5">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="glyphicon glyphicon-asterisk"></i>
										</div>
										<input type="text" name="teacher_name" id="teacher_name" placeholder="请输入您的姓名" class="form-control">
									</div>
								</div>
								<label id="teacher_name_tip" class="col-sm-3  text-danger"></label>

							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label hidden-xs" for="captcha">验证码:</label>
								<div class="col-sm-5">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="glyphicon glyphicon-ok-circle "></i>
										</div>
										<input type="text" name="captcha" id="captcha" placeholder="请输入下方的验证码" class="form-control">
									</div>
								</div>
								<label id="captcha_tip" class="col-sm-3  text-danger"></label>

							</div>
							<div class="form-group">
								<label class="col-sm-5 control-label hidden-xs"></label>
								<div class="col-sm-5">
									<img src="/plan/index.php/Admin/Index/verifyImg" alt="验证码" onclick="javascript:this.src='/plan/index.php/Admin/Index/verifyImg?tm='+Math.random();" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label hidden-xs"></label>
								<div class="col-sm-5">
									<input type="submit" class="btn btn-primary form-control hwLayer-ok" name="submit" id="submit" value="登　录" />
								</div>
							</div>
						</form>
					</div>
				</div>
				<!--login end-->

			</div>
		</div>
	</div>
	<!-- End container-->
	<br><br>
	<div class="container-fluid">
		<div class="footer">
			&copy;2016-2017 Northeastern University 资源与土木工程学院. <br />
			<a target="_blank" href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=WyEzOjU8My46NXUzKy4bPTQjNjoyN3U4NDY" style="text-decoration:none;"><img src="http://rescdn.qqmail.com/zh_CN/htmledition/images/function/qm_open/ico_mailme_02.png"/></a>
			author： <strong class="text-info">张桓</strong>；  All rights reserved.<br />
			技术咨询：john；   248404941（QQ）；yz30.com@aliyun.com（email）；
			<p>感谢 车德福院长、林萱老师的宝贵意见和大力支持， 感谢赵强、贾庆仁以及其他老师和同学们的帮助</p>
		</div>
	</div>

	<script src="/plan/Public/js/jquery.js"></script>
	<script src="/plan/Public/js/bootstrap.min.js"></script>
	<script>
		//学生登录  校验数据并发送数据
		$(function(){
			//校验数据
			$('#teacher_num').on('click', function () {
				$('#teacher_num_tip').removeClass('text-danger').text('');
				$('#teacher_num').css('border', '1px solid #CCCCCC');
				$('#submit').removeClass('disabled');
				$('#submit').css('cursor', 'pointer');

			});
			$('#teacher_name').on('click', function () {
				$('#teacher_name_tip').removeClass('text-danger').text('');
				$('#teacher_name').css('border', '1px solid #CCCCCC');
				$('#submit').removeClass('disabled');
				$('#submit').css('cursor', 'pointer');

			});
			$('#captcha').on('click', function () {
				$('#captcha_tip').removeClass('text-danger').text('');
				$('#captcha').css('border', '1px solid #CCCCCC');
				$('#submit').removeClass('disabled');
				$('#submit').css('cursor', 'pointer');

			});
			$('#submit').on('click', function(event){
				event.preventDefault();
				//取得数据
				var teacher_num = $('#teacher_num').val();
				var teacher_name = $('#teacher_name').val();
				var captcha = $('#captcha').val();
				if (teacher_num.length != 5) {
					$('#teacher_num').focus();
					$('#teacher_num_tip').addClass('text-danger').text('*工资号位数不对!');
					$('#teacher_num').css('border', '1px solid #A94442');
					return false;
				}



				if (teacher_name.length == '') {
					$('#teacher_name').focus();
					$('#teacher_name_tip').addClass('text-danger').text('姓名不得为空!');
					$('#teacher_name').css('border', '1px solid #A94442');
					return false;
				}
				if (captcha.length < 5) {
					$('#captcha').focus();
					$('#captcha_tip').addClass('text-danger').text('验证码不得小于5位!');
					$('#captcha').css('border', '1px solid #A94442');
					return false;
				}

				//发送数据
				$.ajax({
					type: 'POST',
					data: {
						teacher_num: teacher_num  ,
						teacher_name  : teacher_name   ,
						captcha : captcha  ,
					},
					url: '/plan/index.php/Admin/Index/Index.html',
					beforeSend: function(){
						$('#submit').addClass('disabled').val('登录中，请稍后。。。');
						$('#submit').css('cursor', 'not-allowed');
					},
					success: function (res) {
						if (res == 1){
							//验证码出错
							$('#captcha').focus();
							$('#captcha_tip').addClass('text-danger').text('验证码错误！');
							$('#captcha').css('border', '1px solid #A94442');
						} else if(res == 2){
							//学号不存在
							$('#teacher_num').focus();
							$('#teacher_num_tip').addClass('text-danger').text('工资号不存在！');
							$('#teacher_num').css('border', '1px solid #A94442');
						} else if(res == 3){
							//错误密码
							$('#teacher_name').focus();
							$('#teacher_name_tip').addClass('text-danger').text('姓名与工资号不符！');
							$('#teacher_name').css('border', '1px solid #A94442');
						} else if (res == 4){
							location.href = "/plan/index.php/Admin/shiyan/overlook";
//							location.href = "/plan/index.php/Admin/Task/showTaskInfo";
						}
					},
					complete: function(){
						$('#submit').removeClass('disabled').val('登　录');
						$('#submit').css('cursor', 'pointer');
					}
				});
			});
		});
	</script>
</body>
</html>