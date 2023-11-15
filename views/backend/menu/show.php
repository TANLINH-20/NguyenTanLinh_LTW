<?php
use App\Models\Menu;
use App\Models\User;
use App\Libraries\MyClass;
$id = $_REQUEST['id'];
$menu = Menu::find($id);
$parentId= Menu::find($menu->parent_id);

$parentName = $parentId ? $parentId->name : '';
if($menu == null){
   MyClass::set_flash('message',['msg'=>'Lỗi trang 404','type'=>'danger']);
    header('Location:index.php?option=menu&cat=menu');
}
?>
<?php require_once "../views/backend/header.php"; ?>
      <!-- CONTENT -->
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Chi tiết menu</h1>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <div class="card-header text-right">
                  <div class="row">
                     <div class="col-md-12 text-right">
                     <a href="index.php?option=menu" class="btn btn-sm btn-info">
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
                                 <td><?=$menu->id; ?></td>
                              </tr>  
                              <tr>
                                 
                                 <td>Tên menu</td>
                                 <td><?=$menu->name; ?></td>
                              </tr>
                              <tr>
                                 
                                 <td>Link</td>
                                 <td><?=$menu->link; ?></td>
                              </tr>
                              <tr>
                                 
                                 <td>Kiểu menu</td>
                                 <td><?=$menu->type; ?></td>
                              </tr>
                              <tr>
                                 
                                 <td>Vị trí</td>
                                 <td><?=$menu->postion; ?></td>
                              </tr>
                              <tr>
                                 
                                 <td>Level</td>
                                 <td><?=$menu->level; ?></td>
                              </tr>
                              <tr>
                                 <td>Tên cấp cha</td>
                                 <td><?=$parentName; ?></td>
                              </tr>
                              <tr>
                                    <td>Ngày tạo</td>
                                    <td><?= $menu->created_at; ?></td>
                                </tr>
                                <tr>
                                    <td>Mã người tạo</td>
                                    <td><?= $menu->created_by; ?></td>
                                </tr>
                                <tr>
                                    <td>Trạng thái</td>
                                    <?php if($menu->status == 1): ?>
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
      <!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>
