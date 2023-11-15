<?php
use App\Models\Post;
use App\Libraries\MyClass;
$id = $_REQUEST['id'];
$page = Post::find($id);
if($page == null){
    MyClass::set_flash('message',['msg'=>'Lỗi trang','type'=>'danger']);
    header('Location:index.php?option=page&cat=trash');
}
$page->delete();
MyClass::set_flash('message',['msg'=>'Xóa khỏi Database thành công','type'=>'success']);
header("Location:index.php?option=page&cat=trash");
