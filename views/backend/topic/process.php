<?php

use App\Models\Topic;
use App\Libraries\MyClass;
if (isset($_POST['them'])) {
    $topic = new Topic();
    //lấy từ form
    $topic->name = $_POST['name'];
    $topic->slug = strlen($_POST['slug']>0)?$_POST['slug']: MyClass::str_slug($_POST['name']);
    $topic->parent_id = $_POST['parent_id'];
    $topic->metakey = $_POST['metakey'];
    $topic->metadesc = $_POST['metadesc'];
    $topic->status = $_POST['status'];

    //Tự sinh ra
    $topic->created_at = date('Y-m-d H:i:s');
    $topic->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;

    //Lưu vào csdl
    $topic->save();
    //Chuyển hướng trang
    header('location:index.php?option=topic');
}
