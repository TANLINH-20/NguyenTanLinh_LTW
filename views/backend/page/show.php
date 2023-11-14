<?php

use App\Libraries\MyClass;
use App\Models\Post;
use App\Models\Topic;
use App\Models\User;

$id = $_REQUEST['id'];
$post = Post::find($id);

$topicId = $post->topic_id;
$createdById = $post->created_by;
$updatedById = $post->updated_by;

$topicIdTopic = Topic::find($topicId);
$createdByUser = User::find($createdById);
$updatedByUser = User::find($updatedById);

$topicIdName   = $topicIdTopic ? $topicIdTopic->name :'Unknown';
$createdByName = $createdByUser ? $createdByUser->name : 'Unknown';
$updatedByName = $updatedByUser ? $updatedByUser->name : 'Unknown';

if ($post == null) {
    MyClass::set_flash('message', ['msg' => 'Lỗi trang 404', 'type' => 'danger']);
    header("location:index.php?option=page");
}
?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="d-inline">Chi tiết bài viết</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <a href="index.php?option=page" class="btn btn-sm btn-info">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            Về danh sách
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Tên trường</th>
                                    <th>Giá trị</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>ID</td>
                                    <td><?= $post->id; ?></td>
                                </tr>
                                <tr>
                                    <td>Tiêu đề bài viết</td>
                                    <td><?= $post->title; ?></td>
                                </tr>
                                <tr>
                                    <td>Tên chủ đề</td>
                                    <td><?= $topicIdName; ?></td>
                                </tr>
                                <tr>
                                    <td>Slug</td>
                                    <td><?= $post->slug; ?></td>
                                </tr>
                                <tr>
                                    <td>Chi tiết</td>
                                    <td><?= $post->detail; ?></td>
                                </tr>
                                <tr>
                                    <td>Kiểu</td>
                                    <td><?= $post->type; ?></td>
                                </tr>
                                <tr>
                                    <td>Hình ảnh</td>
                                    <td><img style="width:100px" src="../public/images/post/<?= $post->image; ?>" alt="<?= $post->image; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Mô tả</td>
                                    <td><?= $post->description; ?></td>
                                </tr>
                                <tr>
                                    <td>Ngày tạo</td>
                                    <td><?= $post->created_at; ?></td>
                                </tr>
                                <tr>
                                    <td>Người tạo</td>
                                    <td><?= $createdByName; ?></td>
                                </tr>
                                <tr>
                                    <td>Ngày sửa</td>
                                    <td><?= $post->updated_at; ?></td>
                                </tr>
                                <tr>
                                    <td>Người sửa</td>
                                    <td><?= $updatedByName; ?></td>
                                </tr>
                                <tr>
                                    <td>Trạng thái</td>
                                    <?php if($post->status == 1): ?>
                                        <td>Xuất bản</td>
                                    <?php else: ?>
                                        <td>Chưa xuất bản</td>
                                    <?php endif; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>