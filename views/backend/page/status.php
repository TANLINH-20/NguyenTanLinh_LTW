<?php

use App\Libraries\MyClass;
use App\Models\Post;
$id=$_REQUEST['id'];
$post=Post::find($id);
if($post==null)
{
    MyClass::set_flash('message',['msg'=>'Lỗi trang 404','type'=>'danger']);
    header("location:index.php?option=page");
}
$post->status=($post->status==1)?2:1;
$post->updated_at=date('Y-m-d H:i:s');
$post->updated_by=(isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$post->save();
MyClass::set_flash('message',['msg'=>'Thay đổi trạng thái thành công','type'=>'success']);
header("location:index.php?option=page");
?>