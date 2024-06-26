<?php

use App\Libraries\MyClass;
use App\Models\User;

$id = $_REQUEST['id'];
$user = User::find($id);
$createdById = $user->created_by;
$updatedById = $user->updated_by;

$createdByUser = User::find($createdById);
$updatedByUser = User::find($updatedById);

$createdByName = $createdByUser ? $createdByUser->name : 'Unknown';
$updatedByName = $updatedByUser ? $updatedByUser->name : 'Unknown';
if ($user == null) {
    MyClass::set_flash('message', ['msg' => 'Lỗi trang 404', 'type' => 'danger']);
    header("location:index.php?option=customer");
}
?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="d-inline">Thông tin chi tiết</h1>
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
                        <a href="index.php?option=customer" class="btn btn-sm btn-info">
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
                                    <td><?= $user->id; ?></td>
                                </tr>
                                <tr>
                                    <td>Họ Tên</td>
                                    <td><?= $user->name; ?></td>
                                </tr>
                                <tr>
                                    <td>Tên đăng nhập</td>
                                    <td><?= $user->username; ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?= $user->email; ?></td>
                                </tr>
                                <tr>
                                    <td>Hình ảnh</td>
                                    <td><img style="width:100px" src="../public/images/user/<?= $user->image; ?>" alt="<?= $user->image; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Giới tính</td>
                                    <td><?= $user->gender; ?></td>
                                </tr>
                                <tr>
                                    <td>Điện thoại</td>
                                    <td><?= $user->phone; ?></td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ</td>
                                    <td><?= $user->address; ?></td>
                                </tr>
                                <tr>
                                    <td>Ngày tạo</td>
                                    <td><?= $user->created_at; ?></td>
                                </tr>
                                <tr>
                                    <td>Người tạo</td>
                                    <td><?= $createdByName; ?></td>
                                </tr>
                                <tr>
                                    <td>Ngày sửa</td>
                                    <td><?= $user->updated_at; ?></td>
                                </tr>
                                <tr>
                                    <td>Người sửa</td>
                                    <td><?= $updatedByName; ?></td>
                                </tr>
                                <tr>
                                    <td>Trạng thái</td>
                                    <?php if($user->status == 1): ?>
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