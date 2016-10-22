<?php
namespace Home\Event;
class UserEvent extends controller{
    public function login(){
        echo 'login event';
    }

    public function logout(){
        echo 'logout event';
    }
}