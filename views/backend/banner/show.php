<?php

use App\Libraries\MyClass;
use App\Models\Banner;
use App\Models\User;

$id = $_REQUEST['id'];
$banner = Banner::find($id);

$createdById = $banner->created_by;
$updatedById = $banner->updated_by;

$createdByUser = User::find($createdById);
$updatedByUser = User::find($updatedById);

$createdByName = $createdByUser ? $createdByUser->name : 'Unknown';
$updatedByName = $updatedByUser ? $updatedByUser->name : 'Unknown';

if ($banner == null) {
    MyClass::set_flash('message', ['msg' => 'Lỗi trang 404', 'type' => 'danger']);
    header("location:index.php?option=banner");
}
?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="d-inline">Chi tiết sản phẩm</h1>
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
                        <a href="index.php?option=banner" class="btn btn-sm btn-info">
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
                                    <td><?= $banner->id; ?></td>
                                </tr>
                                <tr>
                                    <td>Tên Banner</td>
                                    <td><?= $banner->name; ?></td>
                                </tr>
                                <tr>
                                    <td>Link</td>
                                    <td><?= $banner->link; ?></td>
                                </tr>
                                <tr>
                                    <td>Hình ảnh</td>
                                    <td><img style="width:100px" src="../public/images/banner/<?= $banner->image; ?>" alt="<?= $banner->image; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Vị trí</td>
                                    <td><?= $banner->position; ?></td>
                                </tr>
                                <tr>
                                    <td>Ngày tạo</td>
                                    <td><?= $banner->created_at; ?></td>
                                </tr>
                                <tr>
                                    <td>Người tạo</td>
                                    <td><?= $createdByName; ?></td>
                                </tr>
                                <tr>
                                    <td>Ngày sửa</td>
                                    <td><?= $banner->updated_at; ?></td>
                                </tr>
                                <tr>
                                    <td>Người sửa</td>
                                    <td><?= $updatedByName; ?></td>
                                </tr>
                                <tr>
                                    <td>Trạng thái</td>
                                    <?php if($banner->status == 1): ?>
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