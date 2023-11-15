<?php

use App\Models\Post;

$list = Post::where('status', '!=', 0)
   ->orderBy('created_at', 'DESC')
   ->get();
?>
<?php require_once '../views/backend/header.php'; ?>
<!-- CONTENT -->
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-12">
               <h1 class="d-inline">Tất cả trang đơn</h1>
            </div>

         </div>
      </div>
   </section>
   <!-- Main content -->
   <section class="content">
      <?php require_once "../views/backend/message.php"; ?>
      <div class="card">
         <div class="card-header p-2">
            <div class="row">
               <div class="col-md-6">
                  <a href="index.php?option=page">Tất cả</a> |
                  <a href="index.php?option=page&cat=trash">Thùng rác</a>
               </div>
               <div class="col-md-6 text-right">
                  <a href="index.php?option=page&cat=create" class="btn btn-sm btn-primary">Thêm trang đơn</a>
               </div>
         </div>
      </div>
      <div class="card-body p-2">
         <table class="table table-bordered">
            <thead>
               <tr>
                  <th class="text-center" style="width:30px;">
                     <input type="checkbox">
                  </th>
                  <th class="text-center" style="width:130px;">Hình ảnh</th>
                  <th>Tên trang đơn</th>
                  <th>slug</th>
               </tr>
            </thead>
            <tbody>
               <tr class="datarow">
                  <?php if (count($list) > 0) : ?>
                     <?php foreach ($list as $item) : ?>
                        <td>
                           <input type="checkbox">
                        </td>
                        <td>
                           <img class="img-fluid" src="../public/images/post/<?= $item->image; ?>" alt="<?= $item->image; ?>">
                        </td>
                        <td>
                           <div class="title">
                              <?= $item->title; ?>
                           </div>
                           <div class="function_style">
                              <?php if ($item->status == 1) : ?>
                                 <a class="btn btn-success btn-xs" href="index.php?option=post&cat=status&id=<?= $item->id ?>">
                                    <i class="fa fa-toggle-on"></i>
                                    Hiện</a>
                              <?php else : ?>
                                 <a class="btn btn-danger btn-xs" href="index.php?option=post&cat=status&id=<?= $item->id ?>">
                                    <i class="fa fa-toggle-off"></i>
                                    Ẩn</a>
                              <?php endif; ?>
                              <a class="btn btn-primary btn-xs" href="index.php?option=post&cat=edit&id=<?= $item->id ?>">
                                 <i class="fa fa-edit"></i>
                                 Chỉnh sửa</a>
                              <a class="btn btn-info btn-xs" href="index.php?option=post&cat=show&id=<?= $item->id ?>">
                                 <i class="fa fa-eye"></i>
                                 Chi tiết</a>
                              <a class="btn btn-danger btn-xs" href="index.php?option=post&cat=delete&id=<?= $item->id ?>">
                                 <i class="fa fa-trash"></i>
                                 Xoá</a>
                           </div>
                        </td>
                        <td><?= $item->slug; ?></td>
               </tr>
            <?php endforeach; ?>
         <?php endif; ?>
            </tbody>
         </table>
      </div>
</div>
</section>
</div>
<!-- END CONTENT-->
<footer class="main-footer">
   <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
   </div>
   <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
   reserved.
</footer>
</div>
<script src="../public/jquery/jquery-3.7.0.min.js"></script>
<script src="../public/datatables/js/dataTables.min.js"></script>
<script src="../public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../public/dist/js/adminlte.min.js"></script>
<script>
   $(document).ready(function() {
      $('#mytable').DataTable();
   });
</script>
</body>

</html>