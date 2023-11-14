<?php
use App\Models\Banner;
use App\Libraries\MyClass;
$id = $_REQUEST['id'];
$banner = Banner::find($id);
if($banner == null){
    MyClass::set_flash('message',['msg'=>'Lỗi trang','type'=>'danger']);
    header('Location:index.php?option=banner&cat=trash');
}
$banner->delete();
MyClass::set_flash('message',['msg'=>'Xóa khỏi CSDL thành công','type'=>'success']);
header("Location:index.php?option=banner&cat=trash");