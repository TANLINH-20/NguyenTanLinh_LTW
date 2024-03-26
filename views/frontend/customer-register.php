<?php

use App\Models\User;
$error = "";
if (isset($_POST["REGISTER"])) {
   $name = $_POST['name'];
   $phone = $_POST['phone'];
   $address = $_POST['address'];
   $gender = isset($_POST['gennder']) ? 'Nam' : 'Nữ';
   $username = $_POST['username'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $password_re = $_POST['password_re'];

   $existingUser = User::where('username', '=', $username)
      ->orWhere('email', '=', $email)
      ->first();

   if ($existingUser) {
      $error = "Tài khoản hoặc email đã tồn tại. Vui lòng chọn thông tin khác.";
   } else {
      if ($password !== $password_re) {
         $error = "Mật khẩu xác nhận không khớp. Vui lòng thử lại.";
      } else {
         $newUser = new User();
         $newUser->name = $name;
         $newUser->phone = $phone;
         $newUser->address = $address;
         $newUser->gender = $gender;
         $newUser->username = $username;
         $newUser->email = $email;
         $newUser->password = sha1($password);
         $newUser->image = '';
         $newUser->roles = '';
         $newUser->created_at = date('Y-m-d H:i:s');
         $newUser->created_by = '';
         $newUser->created_at = date('Y-m-d H:i:s');
         $newUser->updated_by = '';
         $newUser->status = 1;

         if ($newUser->save()) {
            $successMessage = "Đăng ký thành công. Đăng nhập để tiếp tục.";
         } else {
            $error = "Đăng ký thất bại. Vui lòng thử lại.";
         }
      }
   }
}

?>
<?php require_once "views/frontend/header.php"; ?>
<section class="bg-light">
   <div class="container">
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
         <ol class="breadcrumb py-2 my-0">
            <li class="breadcrumb-item">
               <a class="text-main" href="index.php">Trang chủ</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
               Đăng ký tài khoản
            </li>
         </ol>
      </nav>
   </div>
</section>
<section class="hdl-maincontent py-2">
   <form action="index.php?option=customer&register=true" method="post" name="registercustomer">
      <div class="container">
         <h1 class="fs-2 text-main text-center">ĐĂNG KÝ TÀI KHOẢN</h1>
         <h6 class="<?php echo isset($successMessage) ? 'btn-success' : 'btn-danger'; ?>">
            <?php echo $successMessage ?? $error; ?>
         </h6>
         <div class="row">
            <div class="col-md-6">
               <div class="mb-3">
                  <label for="name" class="text-main">Họ tên(*)</label>
                  <input type="text" name="name" id="name" class="form-control" placeholder="nhập họ tên" required>
               </div>
               <div class="mb-3">
                  <label for="phone" class="text-main">Điện thoại(*)</label>
                  <input type="text" name="phone" id="phone" class="form-control" placeholder="Nhập điện thoại" required>
               </div>
               <div class="mb-3">
                  <div class="card">
                     <div class="card-header text-main">
                        Địa chỉ
                     </div>
                     <div class="card-body">
                        <div class="mb-3">
                           <label for="address">Địa chỉ</label>
                           <input type="text" name="address" id="address" class="form-control" placeholder="Nhập địa chỉ">
                        </div>
                        <div class="row">
                           <div class="col-4">
                              <select name="tinhtp" id="tinhtp" class="form-control">
                                 <option value="">Chọn Tỉnh/TP</option>
                              </select>
                           </div>
                           <div class="col-4">
                              <select name="quanhuyen" id="quanhuyen" class="form-control">
                                 <option value="">Chọn Quận/Huyện</option>
                              </select>
                           </div>
                           <div class="col-4">
                              <select name="phuongxa" id="phuongxa" class="form-control">
                                 <option value="">Chọn Phường/Xã</option>
                              </select>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="mb-3">
                  <label class="text-main">Giới tính</label>
                  <div class="form-check form-switch">
                     <input name="gennder" class="form-check-input" type="checkbox" role="switch" id="genderChecked" checked onchange="changeGender()">
                     <label class="form-check-label" id="labelgender" for="genderChecked">Nam</label>
                  </div>
               </div>
               <script>
                  function changeGender() {
                     const elementGender = document.querySelector("#genderChecked").checked;
                     if (elementGender == true) {
                        document.querySelector("#labelgender").innerHTML = "Nam";
                     } else {
                        document.querySelector("#labelgender").innerHTML = "Nữ";
                     }
                  }
               </script>
            </div>
            <div class="col-md-6">
               <div class="mb-3">
                  <label for="username" class="text-main">Tên tài khoản(*)</label>
                  <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tài khoản đăng nhập" required>
               </div>
               <div class="mb-3">
                  <label for="email" class="text-main">Email(*)</label>
                  <input type="email" name="email" id="email" class="form-control" placeholder="Nhập email" required>
               </div>
               <div class="mb-3">
                  <label for="password" class="text-main">Mật khẩu(*)</label>
                  <input type="password" name="password" id="password" class="form-control" placeholder="Mật khẩu" required>
               </div>
               <div class="mb-3">
                  <label for="password_re" class="text-main">Xác nhận Mật khẩu(*)</label>
                  <input type="password" name="password_re" id="password_re" class="form-control" placeholder="Xác nhận mật khẩu" required>
               </div>
               <div class="mb-3">
                  <button class="btn btn-main" name="REGISTER">Đăng ký</button>
               </div>
            </div>
         </div>
      </div>
   </form>
</section>
<?php require_once "views/frontend/footer.php"; ?>