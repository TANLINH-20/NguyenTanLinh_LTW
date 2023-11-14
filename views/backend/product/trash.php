<?php

use App\Models\Product;

$list = Product::where('product.status', '=', 0)
   ->join('category', 'category.id', '=', 'product.category_id')
   ->join('brand', 'brand.id', '=', 'product.brand_id')
   ->orderBy('product.created_at', 'DESC')
   ->select('product.name', 'product.image', 'product.status', 'product.id', 'category.name as catename', 'brand.name as brandname')
   ->get();
?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="d-inline">Thùng rác sản phẩm</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header ">
                <?php require_once "../views/backend/message.php"; ?>
                <div class="row">
                    <div class="col-md-6">
                        <a href="index.php?option=product">Tất cả</a> |
                        <a href="index.php?option=product&cat=trash">Thùng rác</a>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="index.php?option=product" class="btn btn-sm btn-info">
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
                                    <th class="text-center" style="width:30px;">
                                        <input type="checkbox">
                                    </th>
                                    <th class="text-center" style="width:130px;">Hình ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Tên danh mục</th>
                                    <th>Tên thương hiệu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (count($list) > 0) : ?>
                                    <?php foreach ($list as $item) : ?>
                                        <tr class="datarow">
                                            <td>
                                                <input type="checkbox">
                                            </td>
                                            <td>
                                                <img style="width:100px" src="../public/images/product/<?= $item->image; ?>" alt="<?= $item->image; ?>">
                                            </td>
                                            <td>
                                                <div class="name">
                                                    <?= $item->name; ?>
                                                </div>
                                                <div class="function_style">
                                                    <a href="index.php?option=product&cat=restore&id=<?= $item->id; ?>" class="btn btn-info btn-xs">
                                                        <i class="fas fa-undo"></i> Khôi phục
                                                    </a>
                                                    <a href="index.php?option=product&cat=destroy&id=<?= $item->id; ?>" class="btn btn-danger btn-xs">
                                                        <i class="fas fa-trash"></i>Xoá
                                                    </a>
                                                </div>
                                            </td>
                                            <td><?= $item->catename ?></td>
                                            <td><?= $item->brandname ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>