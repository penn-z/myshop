<?php
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends CheckLoginController {
    
    public function showList(){
        $list = M('goods');
        $act = I('get.act');    //获取页面行为

        if( $act == 'del' ){
            $id = I('get.id');
            $_delete = $list->where("id='{$id}'")->delete();

            $errno = null;
            if( $_delete == true ){
                $errno = array( 'style'=>'success','str'=>'删除成功！'  );
            }else{
                $errno = array( 'style'=>'error','str'=>'删除失败！'  );
            }
            $this->assign('errno',$errno);
        }
        
        $count      = $list->where('1=1')->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(5)
        $Page->rollPage = 5;    //显示的页码数
        unset($Page->parameter['act']);     //删除act动作，这样删除成功一次后就不会就带参数传递了
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $result = $list->where('1=1')->order('addtime')->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign('page',$show);
        $this->assign('list',$result);
        $this->display('list');
    }

    /**
     * 商品添加
     */
    public function add(){
        $act = I('post.act');
        if($act == 'add'){
            //接受数据
            foreach( I('post.') as $key => $value ){
                $data[$key] = $value;
            }
            /*echo "<pre>";
            print_r($data);*/
            $Form =  D('goods');
            if($Form->create()){ 
                $goods_description = $Form->goods_description = htmlspecialchars_decode($Form->goods_description);   //反转义商品内容,并用变量储存
                
                // $Form->goods_package = serialize($data['goods_package']);   //把包装类型序列化
                // $Form->goods_type = serialize($data['goods_type']); 
                
                $Form->goods_type = $data['type1'];     //规格1名称
                $Form->goods_type2 = $data['type2'];    //规格2名称

                $goods_id =   $Form->add();   //返回新建商品的ID

                for( $i=0;$i<count($data['goods_sn']);$i++ ){
                    //数据插入attr表
                    $attr['goods_id'] = $goods_id;
                    $attr['goods_sn'] = $data['goods_sn'][$i];
                    $attr['picture_description'] = $goods_description;
                    $attr_ret = M('attr')->add($attr);  //成功添加后返回新创的id

                    //数据插入specify表
                    $specify['goods_id'] = $goods_id;
                    $specify['goods_sn'] = $data['goods_sn'][$i];
                    $specify['goods_type'] = $data['goods_type'][$i];
                    $specify['goods_price'] = $data['goods_price'][$i];
                    $specify['goods_discount'] = $data['goods_discount'][$i];
                    $specify['goods_num'] = $data['goods_num'][$i];
                    $spe_ret = M('goods_specify')->add($specify);   //成功添加后返回新创的id

                    //数据插入type2表
                    $type2['goods_id'] = $goods_id;
                    $type2['type2_name'] = $data['type2_name'][$i];
                    $type2_ret = M("goods_type2")->add($type2);  //成功添加后返回新创的id
                }

                $errno = null;
                if( $attr_ret != false && $spe_ret != false && $type2_ret != false) $errno = array('style'=>'success','str'=>'商品添加成功！');
                else $errno = array('style'=>'error','str'=>'商品添加失败！');
                $this->assign('errno',$errno);
            }else{
                $this->error($Form->getError());
            }
        }

        $data_category = M('goods_category')->select(); //取出所有的分类范畴

        $cat = array();
        // 得到分类范畴的数组，索引值从1开始
        foreach( $data_category as $val ){
            $cat["{$val['id']}"] = $val['category'];
        }
        $this->assign('cat',$cat);
        $this->display('add');
    }

    /**
     * 商品编辑
     */
    public function edit(){
        $act = I('param.act');  //act可能是post，也可能是get，故用param自动判断
        $id = I('param.id');    //同act，可能post或者get
        $goods_sn = I('get.sn');
        //展示要编辑的商品内容
        if( $act == 'edit' ){
            $model = M('goods');
            $data = $model->find($id);  //商品信息
            $data1 = M("goods_specify")->where("goods_id={$id}")->select(); //规格1
            $data2 = M("goods_type2")->where("goods_id={$id}")->select();   //规格2
            $this->assign("data1",$data1);
            $this->assign("data2",$data2);
            
            $this->assign('data',$data);
            // $goods_description = M('attr')->where("goods_sn={$goods_sn}")->getField("picture_description");
            $this->assign('goods_description',$goods_description);
        }

        //编辑商品内容
        if( $act == 'update' ){
            foreach( I('post.') as $key => $value ){
                $_data[$key] = $value;
            }
            /*echo "<pre>";
            print_r($_data);*/
            /*for($i=0;$i<count($_data['goods_sn']);$i++){
                var_dump($_data['old_sn'][$i]);
            }*/
            /*$_data['goods_type'] = serialize($_data['goods_type']);
            $_data['goods_package'] = serialize($_data['goods_package']);*/
            $model = M('goods');
            $result = $model->where("goods_id={$id}")->save($_data);    //更新goods表数据
            // $des_ret = M('attr')->where("goods_id={$id}")->setField("picture_description",htmlspecialchars_decode($_data['goods_description']));    //更新attr数据
            //对specify表进行处理
            for($i=0;$i<count($_data['goods_sn']);$i++){
                $specify['goods_sn'] = $_data['goods_sn'][$i];
                $specify['goods_type'] = $_data['type1_name'][$i];
                $specify['goods_price'] = $_data['goods_price'][$i];
                $specify['goods_discount']= $_data['goods_discount'][$i];
                $specify['goods_num'] = $_data['goods_num'][$i];
                $specify['goods_id'] = $id;

                //先寻找是否存在该sn货号的商品
                //存在该sn时，或者改动原来sn
                if( $_data['old_sn'][$i] != null ){
                    $specify_ret = M('goods_specify')->where("goods_id={$id} AND goods_sn={$_data['old_sn'][$i]}")->save($specify);    //直接更新
                }else{  //不存在该sn时,直接新添数据
                    $specify_ret = M('goods_specify')->where("1=1")->add($specify);   //增加一条specify
                }
                // var_dump($specify_ret);
            }


            //对goods_type2表进行处理
            for($i=0;$i<count($_data['type2_name']);$i++){
                $type2['type2_name'] = $_data['type2_name'][$i];
                $type2['goods_id'] = $id;
                //然后寻找该商品的type2是否存在
                
                if( $_data['old_type2'][$i] != null ){  
                    $type2_ret = M('goods_type2')->where("goods_id={$id} AND type2_name='".$_data['old_type2'][$i]."'")->save($type2);
                }else{  //不存在该type2时，直接新添数据
                    $type2_ret = M('goods_type2')->where("1=1")->add($type2);
                }
                // var_dump($type2_ret);
            }

            $errno = null;
            if( $result != false &&  $specify_ret != false && $type2_ret != false ){
                $errno = array('style'=>'success','str'=>'商品编辑成功！');
            }else{
                $errno = array('style'=>'error','str'=>'商品编辑失败！');
            }
            $this->assign('errno',$errno);
        }

        $data_category = M('goods_category')->select();

        $cat = array();
        // 得到分类范畴的数组，索引值从1开始
        foreach( $data_category as $val )
        {
            $cat["{$val['id']}"] = $val['category'];
        }
        $this->assign('cat',$cat);
        $this->display('edit');
    }
}