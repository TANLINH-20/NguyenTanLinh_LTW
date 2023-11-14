<?php

use App\Libraries\MyClass;
use App\Models\Category;
$id=$_REQUEST['id'];
$category=Category::find($id);
if($category==null)
{
    MyClass::set_flash('message',['msg'=>'Lỗi trang 404','type'=>'danger']);
    header("location:index.php?option=category&cat=trash");
}
$category->delete();//xóa khỏi CSDL
MyClass::set_flash('message',['msg'=>'Xóa CSDL thành công','type'=>'success']);
header("location:index.php?option=category&cat=trash");
?>