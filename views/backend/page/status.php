<?php
use App\Models\Post;
use App\Libraries\MyClass;
$id=$_REQUEST['id'];
$page= Post::find($id);
if($page==null){
    MyClass::set_flash('message',['msg'=>'Lỗi trang','type'=>'danger']);
    header("Location:index.php?option=page");

}
$page->status=($page->status==1)?2:1;
$page->updated_at= date('Y-m-d H:i:s');
$page->updated_by = (isset($_SESSION['user_id']) ? $_SESSION['user_id']:1);
$page->save();
MyClass::set_flash('message',['msg'=>'Thay đổi trạng thái thành công','type'=>'success']);
header("Location:index.php?option=page");