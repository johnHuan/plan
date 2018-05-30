<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Author: 张桓
 * QQ: 248404941
 * Email: yz30.com@aliyun.com
 * Date: 2017/5/23
 * Time: 17:19
 */

namespace Admin\Common;

use Think\Controller;

class FilterController extends Controller {

    /**
     * 处理空操作方法
     */
    public function _empty(){
//        $this->error("您访问的页面失联了, 操作方法不存在。。。");
        $this->display("Index/404");
    }


    /**
     * 初始化都要执行的方法，类似于构造方法
     * 判断用户是否登录，如果没有登录就直接打回登录
     */
    public function _initialize(){
        if (!session('admin_id')) {
            $this->error('抱歉！！没有登录之前不要乱溜达，请登录...', u('Index/Index'));
        }
    }

    /**
     * 退出  现在父类中
     */
    public function logout(){
        session('admin_id', null);
        session('admin_name', null);
        session('admin_level', null);
        $this->success('退出成功', U('admin/Index/Index'));
    }


}