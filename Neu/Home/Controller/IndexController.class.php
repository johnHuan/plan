<?php
namespace Home\Controller;
use Home\Common\FilterController;
use Home\Model\teacherModel;
use Think\Controller;
use Think\Verify;

class IndexController extends Controller {

    /**
     * 屏蔽空操作方法
     */
    public function _empty(){
        $this->display('error');
    }


    //登录页
    public function index(){
        if (IS_POST){
            $verify = new Verify();
            if ($verify->check($_POST['captcha'])){
                $teacher = new teacherModel();
                $info = $teacher->getData(trim($_POST['teacher_num']), trim($_POST['teacher_name']));
                //$this->ajaxReturn($info);
                if($info == 0){
                    $this->ajaxReturn(2);
                } else if($info == -1){
                    $this->ajaxReturn(3);
                } else {
                    //登录成功，session持久化教师信息，页面跳转到个人信息页面
                    session('tid', $info['tid']);
                    session('teacher_name', $info['t_name']);
                    session('teacher_level', $info['t_level']);
                    session('teacher_age', $info['t_age']);
                    $this->ajaxReturn(4);
                }
            } else {
                $this->ajaxReturn(1);
            }

        } else {
            $this->display();
        }


    }

    //验证码
    public function verifyImg(){
        $cfg = array(
            'imageH' => 45,
            'imageW' => 200,
            'length' => 5,
            'useCurve'  =>  false,            // 是否画混淆曲线
            'useNoise'  =>  true,            // 是否添加杂点
            'bg'        =>  array(253, 251, 254),  // 背景颜色
            'fontSize' => 20,
//            'useCurve'  =>  true,            // 是否画混淆曲线
            'fontttf'   =>  '4.ttf',              // 验证码字体，不设置随机获取

        ) ;
        $vry = new Verify($cfg);
        $vry->entry();
    }


}
