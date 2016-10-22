<?php
namespace Api\Controller;
use Think\Controller;
class AddressDefaultController extends Controller {
    public function index(){
        $id = I('post.id');
        $user_id = session('id');
        $table = M('address');
        $data['is_default'] = 0;
        $update = $table->where("user_id='{$user_id}'")->save($data);
        // echo $table->getLastSql();
        $data['is_default'] = 1;
        $update = $table->where("id={$id}")->save($data);
    }
}