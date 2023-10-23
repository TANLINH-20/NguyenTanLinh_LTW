<?php

use App\Libraries\MyClass;
use App\Models\Brand;
$id=$_REQUEST['id'];
$brand=Brand::find($id);
if($brand==null)
{
    MyClass::set_flash('message',['msg'=>'Lỗi trang 404','type'=>'danger']);
    header("location:index.php?option=brand&cat=trash");
}
$brand->delete();//xóa khỏi CSDL
MyClass::set_flash('message',['msg'=>'Xóa CSDL thành công','type'=>'success']);
header("location:index.php?option=brand&cat=trash");
?>