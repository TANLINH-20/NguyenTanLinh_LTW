<?php

use App\Models\Order;
use App\Libraries\MyClass;
if(isset($_POST['THEM'])){
    $order=new Order();    $order->name = $_POST['name'];
    $order->slug = (strlen($_POST['slug'])>0)?$_POST['slug']:MyClass::str_slug($_POST['name']);  
    $order->description = $_POST['description'];
    $order->status = $_POST['status'];
    
    $order->created_at = date('Y-m-d H:i:s');
    $order->created_by = (isset($_SESSION['user_id']) ? $_SESSION['user_id']:1);

    $order->save();
    MyClass::set_flash('message',['msg'=>'Thêm thành công','type'=>'success']);
    header("Location:index.php?option=order");
}
if(isset($_POST['CAPNHAT'])){
    $id = $_POST['id'];
    $order= Order::find($id);
    if($order == null){
        MyClass::set_flash('message',['msg'=>'Lỗi trang','type'=>'danger']);
        header('Location:index.php?option=order');
    }
    $order->name = $_POST['name'];
    $order->slug = (strlen($_POST['slug'])>0)?$_POST['slug']:"ERORR";  
    $order->description = $_POST['description'];
    $order->status = $_POST['status'];
    
    $order->image = $_FILES['image']['name'];
    $order->updated_at = date('Y-m-d H:i:s');
    $order->updated_by = (isset($_SESSION['user_id']) ? $_SESSION['user_id']:1);
    $order->save();
    MyClass::set_flash('message',['msg'=>'Cập nhật thành công','type'=>'success']);
    header("Location:index.php?option=order");
}