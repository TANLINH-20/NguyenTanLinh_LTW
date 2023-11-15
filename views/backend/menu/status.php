<?php
use App\Models\menu;
use App\Libraries\MyClass;
$id=$_REQUEST['id'];
$menu= menu::find($id);
if($menu==null){
    MyClass::set_flash('message',['msg'=>'Lỗi trang','type'=>'danger']);
    header("Location:index.php?option=menu");

}
$menu->status=($menu->status==1)?2:1;
$menu->updated_at= date('Y-m-d H:i:s');
$menu->updated_by = (isset($_SESSION['user_id']) ? $_SESSION['user_id']:1);
$menu->save();
MyClass::set_flash('message',['msg'=>'Thay đổi trạng thái thành công','type'=>'success']);
header("Location:index.php?option=menu");