<?php
use App\Models\Topic;
$list = Topic::where('status','!=','0')
->orderBy('created_at','desc')->get();
?>
<?php require_once "../views/backend/header.php"; ?> 
<!-- CONTENT -->
<form action="index.php?option=topic&cat=process" method="post" enctype="multipart/form-data" >
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Tất cả chủ đề</h1>
               </div>
            </div>
         </div>
      </section>
      <!-- Main content -->
      <section class="content">
         <div class="card">
         <div class="card-header ">
               <div class="row">
                  <div class="col-md-6">
                     <a href="index.php?option=topic">Tất cả</a> |
                     <a href="index.php?option=topic&cat=trash">Thùng rác</a>
                  </div>
                  <div class="col-md-6 text-right">
                     <button class="btn btn-sm btn-success" type="submit" name="THEM">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        Lưu
                     </button>
                  </div>
               </div>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-md-4">
                     <div class="mb-3">
                        <label>Tên chủ đề (*)</label>
                        <input type="text" name="name" class="form-control">
                     </div>
                     <div class="mb-2">
                        <label>Slug</label>
                        <input type="text" name="slug" class="form-control">
                     </div>
                     <div class="mb-2">
                        <label>Chủ đề cha (*)</label>
                        <select name="parent_id" class="form-control">
                           <?php if (count($list) > 0) : ?>
                              <?php foreach ($list as $item) : ?>
                                 <option value="<?= $item->parent_id ?>"><?= $item->name ?></option>
                              <?php endforeach; ?>
                           <?php endif; ?>
                        </select>
                     </div>
                     <div class="mb-2">
                        <label>Từ khóa SEO</label>
                        <textarea name="metakey" class="form-control"></textarea>
                     </div>
                     <div class="mb-2">
                        <label>Mô tả SEO</label>
                        <textarea name="metadesc" class="form-control"></textarea>
                     </div>
                     <div class="mb-2">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control">
                           <option value="1">Xuất bản</option>
                           <option value="2">Chưa xuất bản</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-8">
                     <table class="table table-bordered">
                        <thead>
                           <tr>
                              <th class="text-center" style="width:30px;">
                                 <input type="checkbox">
                              </th>
                              <th>Tên chủ đề</th>
                              <th>Tên slug</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php if(count($list)>0): ?>
                              <?php foreach ($list as $item): ?>
                              <tr class="datarow">
                                 <td>
                                    <input type="checkbox">
                                 </td>
                                 <td>
                                    <div class="name">
                                       <?= $item->name; ?>
                                    </div>
                                    <div class="function_style">
                                          <?php if ($item->status == 1) : ?>
                                             <a class="btn btn-success btn-xs" href="index.php?option=topic&cat=status&id=<?= $item->id ?>">
                                                <i class="fa fa-toggle-on"></i>
                                                Hiện</a>
                                          <?php else : ?>
                                             <a class="btn btn-danger btn-xs" href="index.php?option=topic&cat=status&id=<?= $item->id ?>">
                                                <i class="fa fa-toggle-off"></i>
                                                Ẩn</a>
                                          <?php endif; ?>
                                          <a class="btn btn-primary btn-xs" href="index.php?option=topic&cat=edit&id=<?= $item->id ?>">
                                             <i class="fa fa-edit"></i>
                                             Chỉnh sửa</a>
                                          <a class="btn btn-info btn-xs" href="index.php?option=topic&cat=show&id=<?= $item->id ?>">
                                             <i class="fa fa-eye"></i>
                                             Chi tiết</a>
                                          <a class="btn btn-danger btn-xs" href="index.php?option=topic&cat=delete&id=<?= $item->id ?>">
                                             <i class="fa fa-trash"></i>
                                             Xoá</a>
                                       </div>
                                 </td> 
                                 <td>  <?= $item->slug; ?></td>
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
</form>
<!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>