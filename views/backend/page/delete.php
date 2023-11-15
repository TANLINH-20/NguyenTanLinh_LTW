<?php
use App\Models\post;
use App\Libraries\MyClass;
$id = $_REQUEST['id'];
$page = post::find($id);
if($page == null){
    MyClass::set_flash('message',['msg'=>'Lỗi trang','type'=>'danger']);
    header('Location:index.php?option=page');
}
$page->status = 0;
$page->updated_at = date('Y-m-d H:i:s');
$page->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] :   1;
$page->save();
MyClass::set_flash('message',['msg'=>'Xóa thành công','type'=>'success']);
header("Location:index.php?option=page");
