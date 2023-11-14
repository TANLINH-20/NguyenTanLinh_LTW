<?php

use App\Libraries\MyClass;
use App\Models\Contact;
use App\Models\User;

$id = $_REQUEST['id'];
$contact = Contact::find($id);

$createdById = $contact->created_by;
$updatedById = $contact->updated_by;

$createdByUser = User::find($createdById);
$updatedByUser = User::find($updatedById);

$createdByName = $createdByUser ? $createdByUser->name : 'Unknown';
$updatedByName = $updatedByUser ? $updatedByUser->name : 'Unknown';

if ($contact == null) {
    MyClass::set_flash('message', ['msg' => 'Lỗi trang 404', 'type' => 'danger']);
    header("location:index.php?option=contact");
}
?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="d-inline">Chi tiết liên hệ</h1>
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
                        <a href="index.php?option=contact" class="btn btn-sm btn-info">
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
                                    <td><?= $contact->id; ?></td>
                                </tr>
                                <tr>
                                    <td>Họ tên</td>
                                    <td><?= $contact->name; ?></td>
                                </tr>
                                <tr>
                                    <td>email</td>
                                    <td><?= $contact->email; ?></td>
                                </tr>
                                <tr>
                                    <td>Tiêu đề</td>
                                    <td><?= $contact->phone; ?></td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td><?= $contact->phone; ?></td>
                                </tr>
                                <tr>
                                    <td>Ngày tạo</td>
                                    <td><?= $contact->created_at; ?></td>
                                </tr>
                                <tr>
                                    <td>Người tạo</td>
                                    <td><?= $createdByName; ?></td>
                                </tr>
                                <tr>
                                    <td>Ngày sửa</td>
                                    <td><?= $contact->updated_at; ?></td>
                                </tr>
                                <tr>
                                    <td>Người sửa</td>
                                    <td><?= $updatedByName; ?></td>
                                </tr>
                                <tr>
                                    <td>Trạng thái</td>
                                    <?php if($contact->status == 1): ?>
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