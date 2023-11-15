<?php

use App\Models\Post;

$slug = $_REQUEST['slug'];
$post = Post::where([['slug', '=', $slug], ['type', '=', 'post'], ['status', '=', 1]])->first();
$postall = Post::where([['type', '=', 'post'], ['status', '=', 1]])->get();
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
               Chi tiết
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
               <li class="list-group-item bg-main py-3">Các bài viết </li>
               <?php foreach ($postall as $posall) : ?>
                  <li class="list-group-item">
                     <a href="index.php?option=post&slug=<?= $posall->slug ?>"><?= $posall->title ?></a>
               </li>
            <?php endforeach; ?>
            </ul>
         </div>
         <div class="col-md-9 order-1 order-md-2">
            <h1 class="fs-2 text-main"><?= $post->title; ?></h1>
            <p><?= $post->detail; ?>
         </div>
      </div>
   </div>
</section>
<?php require_once "views/frontend/footer.php"; ?>