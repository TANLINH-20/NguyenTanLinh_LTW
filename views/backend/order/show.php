<?php
use App\Models\order;
use App\Libraries\MyClass;
$id = $_REQUEST['id'];
$order = order::find($id);
if($order == null){
   MyClass::set_flash('message',['msg'=>'Lỗi trang','type'=>'danger']);
    header('Location:index.php?option=order&cat=order');
}
?>
<?php require_once "../views/backend/header.php"; ?>
      <!-- CONTENT -->
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Chi tiết đơn hàng</h1>
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
                     <a href="index.php?option=order" class="btn btn-sm btn-info">
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
                                 <td>Mã đơn hàng</td>
                                 <td><?=$order->id; ?></td>
                              </tr>  
                              <tr>
                                 <td>mã khách hàng</td>
                                 <td><?=$order->user_id; ?></td>
                              </tr>
                              <tr>
                                 <td>Tên Khách hàng</td>
                                 <td><?=$order->deliveryname; ?></td>
                              </tr>
                              <tr>
                                 <td>Điện thoại</td>
                                 <td><?=$order->deliveryphone; ?></td>
                              </tr>
                              <tr>
                                 <td>Email</td>
                                 <td><?=$order->deliveryemail; ?></td>
                              </tr>
                              <tr>
                                 <td>Địa chỉ</td>
                                 <td><?=$order->deliveryaddress; ?></td>
                              </tr>
                              <tr>
                                 <td>Ngày tạo</td>
                                 <td><?=$order->created_at; ?></td>
                              </tr>
                              <tr>
                                    <td>Trạng thái</td>
                                    <?php if($order->status == 1): ?>
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
