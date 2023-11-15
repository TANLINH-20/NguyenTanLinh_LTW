<?php
use App\Models\menu;
use App\Libraries\MyClass;
$id = $_REQUEST['id'];
$menu = menu::find($id);
if($menu == null){
    MyClass::set_flash('message',['msg'=>'Lỗi trang','type'=>'danger']);
    header('Location:index.php?option=menu&cat=trash');
}
$menu->delete();
MyClass::set_flash('message',['msg'=>'Xóa khỏi Database thành công','type'=>'success']);
header("Location:index.php?option=menu&cat=trash");
