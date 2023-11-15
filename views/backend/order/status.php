<?php
use App\Models\order;
use App\Libraries\MyClass;
$id=$_REQUEST['id'];
$order= order::find($id);
if($order==null){
    MyClass::set_flash('message',['msg'=>'Lỗi trang','type'=>'danger']);
    header("Location:index.php?option=order");

}
$order->status=($order->status==1)?2:1;
$order->updated_at= date('Y-m-d H:i:s');
$order->updated_by = (isset($_SESSION['user_id']) ? $_SESSION['user_id']:1);
$order->save();
MyClass::set_flash('message',['msg'=>'Thay đổi trạng thái thành công','type'=>'success']);
header("Location:index.php?option=order");