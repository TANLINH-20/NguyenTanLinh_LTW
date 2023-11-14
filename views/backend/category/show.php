<?php

use App\Libraries\MyClass;
use App\Models\Category;
use App\Models\User;

$id = $_REQUEST['id'];
$category = Category::find($id);

$parentId = $category->parent_id;
$createdById = $category->created_by;
$updatedById = $category->updated_by;

$idChild = Category::find($parentId);
$createdByUser = User::find($createdById);
$updatedByUser = User::find($updatedById);

$idChildName = $idChild ? $idChild->name : 'Unknown';
$createdByName = $createdByUser ? $createdByUser->name : 'Unknown';
$updatedByName = $updatedByUser ? $updatedByUser->name : 'Unknown';

if ($category == null) {
    MyClass::set_flash('message', ['msg' => 'Lỗi trang 404', 'type' => 'danger']);
    header("location:index.php?option=category");
}
?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="d-inline">Chi tiết danh mục</h1>
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
                        <a href="index.php?option=category" class="btn btn-sm btn-info">
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
                                    <td><?= $category->id; ?></td>
                                </tr>
                                <tr>
                                    <td>Tên danh mục</td>
                                    <td><?= $category->name; ?></td>
                                </tr>
                                <tr>
                                    <td>Slug</td>
                                    <td><?= $category->slug; ?></td>
                                </tr>
                                <tr>
                                    <td>Danh mục cha</td>
                                    <td><?= $idChildName; ?></td>
                                </tr>
                                <tr>
                                    <td>Hình ảnh</td>
                                    <td><img style="width:100px" src="../public/images/category/<?= $category->image; ?>" alt="<?= $category->image; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Mô tả</td>
                                    <td><?= $category->description; ?></td>
                                </tr>
                                <tr>
                                    <td>Ngày tạo</td>
                                    <td><?= $category->created_at; ?></td>
                                </tr>
                                <tr>
                                    <td>Người tạo</td>
                                    <td><?= $createdByName; ?></td>
                                </tr>
                                <tr>
                                    <td>Ngày sửa</td>
                                    <td><?= $category->updated_at; ?></td>
                                </tr>
                                <tr>
                                    <td>Người sửa</td>
                                    <td><?= $updatedByName; ?></td>
                                </tr>
                                <tr>
                                    <td>Trạng thái</td>
                                    <?php if ($category->status == 1) : ?>
                                        <td>Xuất bản</td>
                                    <?php else : ?>
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