<?php

use App\Models\Banner;
use App\Libraries\MyClass;
if (isset($_POST['THEM'])) {
    $banner = new Banner();
    //lấy từ form
    $banner->name = $_POST['name'];
    $banner->link = $_POST['link'];
    $banner->position = $_POST['position'];
    $banner->status = $_POST['status'];

    //Upload file ảnh
    if(strlen($_FILES['image']['name'])>0)
    {
        $target_dir = "../public/images/banner/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if(in_array($extension,['jpg','jpeg','png', 'gif', 'webp']))
        {
            $filename = $banner->slug . '.' . $extension;
            move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$filename);
            $banner->image = $filename;
        }

    }

    //Tự sinh ra
    $banner->created_at = date('Y-m-d H:i:s');
    $banner->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;

    //Lưu vào csdl
    $banner->save();
    //Chuyển hướng trang
    MyClass::set_flash('message',['msg'=>'Thêm thành công','type'=>'success']);
    header("location:index.php?option=banner&cat=create");
}

if (isset($_POST['CAPNHAT'])) {
    $id = $_POST['id'];
    $banner = banner::find($id);
    if ($banner == null) {
        MyClass::set_flash('message', ['msg' => 'Lỗi trang 404', 'type' => 'danger']);
        header("location:index.php?option=banner");
    }
    //lấy từ form
    $banner->name = $_POST['name'];
    $banner->link = $_POST['link'];
    $banner->position = $_POST['position'];
    $banner->status = $_POST['status'];

    //Upload file ảnh
    if(strlen($_FILES['image']['name'])>0)
    {
        $target_dir = "../public/images/brand/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if(in_array($extension,['jpg','jpeg','png', 'gif', 'webp']))
        {
            $filename = $brand->slug . '.' . $extension;
            move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$filename);
            $brand->image = $filename;
        }

    }

    //Tự sinh ra
    $brand->updated_at = date('Y-m-d H:i:s');
    $brand->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;

    //Lưu vào csdl
    $brand->save();
    //Chuyển hướng trang
    MyClass::set_flash('message',['msg'=>'Cập nhật thành công','type'=>'success']);
    header("location:index.php?option=banner");
}
