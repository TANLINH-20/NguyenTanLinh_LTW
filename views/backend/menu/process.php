<?php

use App\Models\menu;
use App\Libraries\MyClass;
if(isset($_POST['THEM'])){
    $menu=new menu();
    $menu->name = $_POST['name'];
    $menu->link = $_POST['link'];
    $menu->created_at = date('Y-m-d H:i:s');
    $menu->created_by = (isset($_SESSION['user_id']) ? $_SESSION['user_id']:1);
    $menu->save();
    MyClass::set_flash('message',['msg'=>'Thêm thành công','type'=>'success']);
    header("Location:index.php?option=menu");
}
if(isset($_POST['CAPNHAT'])){
    $id = $_POST['id'];
    $menu= menu::find($id);
    if($menu == null){
        MyClass::set_flash('message',['msg'=>'Lỗi trang','type'=>'danger']);
        header('Location:index.php?option=menu');
    }
    $menu->name = $_POST['name'];
    $menu->slug = (strlen($_POST['slug'])>0)?$_POST['slug']:"ERORR";  
    $menu->description = $_POST['description'];
    $menu->status = $_POST['status'];
    if (strlen($_FILES[ 'image']['name']) > 0) 
    {
        $target_dir = "../public/images/menu/";
        $target_file = $target_dir. basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
        $filename = $menu->slug .'.'. $extension;
        move_uploaded_file($_FILES['image']['tmp_name'], $target_dir. $filename);
        $menu->image = $filename;
        }
    }   
    $menu->image = $_FILES['image']['name'];
    $menu->updated_at = date('Y-m-d H:i:s');
    $menu->updated_by = (isset($_SESSION['user_id']) ? $_SESSION['user_id']:1);
    $menu->save();
    MyClass::set_flash('message',['msg'=>'Cập nhật thành công','type'=>'success']);
    header("Location:index.php?option=menu");
}