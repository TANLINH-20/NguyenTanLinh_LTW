<?php
use App\Models\Order;
use App\Libraries\MyClass;
$id = $_REQUEST['id'];
$order = Order::find($id);
if($order == null){
    MyClass::set_flash('message',['msg'=>'Lỗi trang','type'=>'danger']);
    header('Location:index.php?option=order&cat=trash');
}
$order->delete();
MyClass::set_flash('message',['msg'=>'Xóa khỏi CSDL thành công','type'=>'success']);
header("Location:index.php?option=order&cat=trash");
