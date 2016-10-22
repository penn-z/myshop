<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends CheckLoginController {
    
    public function index(){
    	$this->display('index');
    }

    public function left(){
    	$this->display('left');
    }

    public function right(){
    	$this->display('right');
    }

    public function top(){
    	$this->display('top');
    }

    public function foot(){
    	$this->display('foot');
    }
}