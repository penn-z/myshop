<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$this->display('home2');
    }

    public function introduction(){
    	$this->display('/Introduction/introduction');
    }
}