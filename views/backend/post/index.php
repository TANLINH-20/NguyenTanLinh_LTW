<?php

use App\Models\Post;

$list = Post::where('post.status', '!=', '0')
   ->join('topic','topic.id','=','post.topic_id')
   ->select('post.id','post.status','post.title','post.image','topic.name as topicname')
   ->orderBy('post.created_at', 'desc')->get();
?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-12">
               <h1 class="d-inline">Tất cả bài viết</h1>
            </div>
         </div>
      </div>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="card">
         <div class="card-header p-2">
            <div class="row">
               <div class="col-md-6">
                  <a href="index.php?option=post">Tất cả</a> |
                  <a href="index.php?option=post&cat=trash">Thùng rác</a>
               </div>
               <div class="col-md-6 text-right">
                  <a href="index.php?option=post&cat=create" class="btn btn-sm btn-primary">Thêm bài viết</a>
               </div>
            </div>
         </div>
         <div class="card-body p-2">
            <?php require_once "../views/backend/message.php"; ?>
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th class="text-center" style="width:30px;">
                        <input type="checkbox">
                     </th>
                     <th class="text-center" style="width:130px;">Hình ảnh</th>
                     <th>Tiêu đề bài viết</th>
                     <th>Tên chủ đề</th>
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
                              <img style="width:100px;" src="../public/images/post/<?= $item->image; ?>" alt="<?= $item->image; ?>">
                           </td>
                           <td>
                              <div class="name">
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
                           <td> <?= $item->topicname; ?></td>
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
<?php require_once "../views/backend/footer.php"; ?>