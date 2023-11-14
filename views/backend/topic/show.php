<?php

use App\Libraries\MyClass;
use App\Models\Topic;
use App\Models\User;

$id = $_REQUEST['id'];
$topic = Topic::find($id);

$parentId = $topic->parent_id;
$createdById = $topic->created_by;
$updatedById = $topic->updated_by;

$idChild = Topic::find($parentId);
$createdByUser = User::find($createdById);
$updatedByUser = User::find($updatedById);

$idChildName = $idChild ? $idChild->name : 'Unknown';
$createdByName = $createdByUser ? $createdByUser->name : 'Unknown';
$updatedByName = $updatedByUser ? $updatedByUser->name : 'Unknown';

if ($topic == null) {
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
                    <h1 class="d-inline">Chi tiết chủ đề</h1>
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
                        <a href="index.php?option=topic" class="btn btn-sm btn-info">
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
                                    <td><?= $topic->id; ?></td>
                                </tr>
                                <tr>
                                    <td>Tên chủ đề</td>
                                    <td><?= $topic->name; ?></td>
                                </tr>
                                <tr>
                                    <td>Slug</td>
                                    <td><?= $topic->slug; ?></td>
                                </tr>
                                <tr>
                                    <td>Chủ đề cha</td>
                                    <td><?= $idChildName; ?></td>
                                </tr>
                                <tr>
                                    <td>Từ khóa SEO</td>
                                    <td><?= $topic->metakey; ?></td>
                                </tr>
                                <tr>
                                    <td>Mô tả SEO</td>
                                    <td><?= $topic->metadesc; ?></td>
                                </tr>
                                <tr>
                                    <td>Ngày tạo</td>
                                    <td><?= $topic->created_at; ?></td>
                                </tr>
                                <tr>
                                    <td>Người tạo</td>
                                    <td><?= $createdByName; ?></td>
                                </tr>
                                <tr>
                                    <td>Ngày sửa</td>
                                    <td><?= $topic->updated_at; ?></td>
                                </tr>
                                <tr>
                                    <td>Người sửa</td>
                                    <td><?= $updatedByName; ?></td>
                                </tr>
                                <tr>
                                    <td>Trạng thái</td>
                                    <?php if($topic->status == 1): ?>
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