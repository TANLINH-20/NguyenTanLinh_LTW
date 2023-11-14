<?php

use App\Libraries\MyClass;
use App\Models\Post;
$id=$_REQUEST['id'];
$post=Post::find($id);
if($post==null)
{
    MyClass::set_flash('message',['msg'=>'Lỗi trang 404','type'=>'danger']);
    header("location:index.php?option=post&cat=trash");
}
$post->delete();//xóa khỏi CSDL
MyClass::set_flash('message',['msg'=>'Xóa CSDL thành công','type'=>'success']);
header("location:index.php?option=post&cat=trash");
?>