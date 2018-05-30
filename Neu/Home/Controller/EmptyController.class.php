<?php
/**
 * Created by zend studio.
 * User: 张桓
 * develop Administrator
 * Date: 2016年12月4日
 * Time: 下午8:53:41
 * john_3 web俱乐部
 * supporter: yun
 * author:Administrator
 * Language PHP
 * encoding UTF-8
 * ============================================================================
 * 版权所有 2016-2026 john_3网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.John_3.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 *
 */


namespace Home\Controller;
use Think\Controller;

class EmptyController extends Controller{
    /**
     * 处理空操作方法
     */
    public function _empty(){
        $this->display('Index/404');
    }
}