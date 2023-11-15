<?php

use App\Models\Post;
use App\Models\Menu;

$mod_footermenu = Menu::where([['position', '=', 'footermenu'], ['parent_id', '=', 0], ['status', '=', 1]])
   ->orderBy('sort_order', 'ASC')
   ->get();

$slug = $_REQUEST['cat'];
$page = Post::where([['slug', '=', $slug], ['type', '=', 'page'], ['status', '=', 1]])->first();
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
               Trang đơn
            </li>
         </ol>
      </nav>
   </div>
</section>
<section class="hdl-maincontent py-2">
   <div class="container">
      <div class="row">
         <div class="col-md-3 order-2 order-md-1">
            <ul class="list-group mb-3 list-page">
               <li class="list-group-item bg-main py-3">Các chính sách </li>
               <?php foreach ($mod_footermenu as $rowmenu1) : ?>
                  <li class="list-group-item"><a href="<?= $rowmenu1->link; ?>"><?= $rowmenu1->name; ?></a>
                  </li>
               <?php endforeach; ?>
            </ul>
         </div>
         <div class="col-md-9 order-1 order-md-2">
            <h1 class="fs-2 text-main"><?= $page->title ?? "No Title"; ?></h1>
            <p>
               <?= $page->detail ?? "No Detail"; ?>
            </p>
         </div>
      </div>
   </div>
</section>
<?php require_once "views/frontend/footer.php"; ?>