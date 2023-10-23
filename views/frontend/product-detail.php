<?php

use App\Models\Product;
// $pro = Product::where('')->
// $slug =
// $title = 
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
               Chi tiết sản phẩm
            </li>
         </ol>
      </nav>
   </div>
</section>
<section class="hdl-maincontent py-2">
   <div class="container">
      <div class="row">
         <div class="col-md-6">
            <div class="image">
               <img id="productimage" class="img-fluid w-100" src="../public/images/product/thoi-trang-nam-1.jpg" alt="">
            </div>
            <div class="list-image mt-3">
               <div class="row">
                  <div class="col-3">
                     <img class="img-fluid w-100" src="../public/images/product/thoi-trang-nam-2.jpg" alt="" onclick="changeimage(src)">
                  </div>
                  <div class="col-3">
                     <img class="img-fluid" src="../public/images/product/thoi-trang-nu-1.jpg" alt="" onclick="changeimage(src)">
                  </div>
                  <div class="col-3">
                     <img class="img-fluid" src="../public/images/product/thoi-trang-nu-2.jpg" alt="" onclick="changeimage(src)">
                  </div>
                  <div class="col-3">
                     <img class="img-fluid" src="../public/images/product/thoi-trang-nam-1.jpg" alt="" onclick="changeimage(src)">
                  </div>
               </div>
            </div>
            <script>
               function changeimage(src) {
                  document.getElementById("productimage").src = src;
               }
            </script>
         </div>
         <div class="col-md-6">
            <h1 class="text-main">Tên sản phẩm</h1>
            <h3 class="fs-5"> Video provides a powerful way to help you prove your point. When you click Online
               Video, you can paste
               in the embed code for the video you want to add. You can also type a keyword to search online for the
            </h3>
            <h2 class="text-main py-4">Giá: 3000000đ</h2>
            <div class="mb-3 product-size">
               <input id="sizexxl" type="radio" class="d-none" value="xxl" name="size">
               <label for="sizexxl" class="bg-info p-2">XXX</label>
               <input id="sizexl" type="radio" class="d-none" value="xl" name="size">
               <label for="sizexl" class="bg-info p-2 px-3">XL</label>
               <input id="sizel" type="radio" class="d-none" value="xl" name="size">
               <label for="sizel" class="bg-primary p-2 px-3">M</label>
            </div>
            <div class="mb-3">
               <label for="">Số lượng</label>
               <input type="number" value="1" name="qty" class="form-control" style="width:200px">
            </div>
            <div class="mb-3">
               <a class="btn btn-main" href="checkout.html">Mua ngay</a>
               <button class="btn btn-main">Thêm vào giỏ hàng</button>
            </div>
         </div>
      </div>
      <div class="row">
         <h2 class="text-main fs-4 pt-4">Chi tiết sản phẩm</h2>
         <p>
            Video provides a powerful way to help you prove your point. When you click Online Video, you can paste
            in the embed code for the video you want to add. You can also type a keyword to search online for the
            video that best fits your document. To make your document look professionally produced, Word provides
            header, footer, cover page, and text box designs that complement each other.
            For example, you can add a matching cover page, header, and sidebar. Click Insert and then choose the
            elements you want from the different galleries. Themes and styles also help keep your document
            coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics
            change to match your new theme.
            When you apply styles, your headings change to match the new theme. Save time in Word with new buttons
            that show up where you need them. To change the way a picture fits in your document, click it and a
            button for layout options appears next to it. When you work on a table, click where you want to add a
            row or a column, and then click the plus sign.
            Video provides a powerful way to help you prove your point. When you click Online Video, you can paste
            in the embed code for the video you want to add. You can also type a keyword to search online for the
            video that best fits your document. To make your document look professionally produced, Word provides
            header, footer, cover page, and text box designs that complement each other.
            For example, you can add a matching cover page, header, and sidebar. Click Insert and then choose the
            elements you want from the different galleries. Themes and styles also help keep your document
            coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics
            change to match your new theme.
         </p>
      </div>
      <div class="row">
         <h2 class="text-main fs-4 pt-4">Sản phẩm khác</h2>
         <div class="product-category mt-3">
            <div class="row product-list">
               <div class="col-6 col-md-3 mb-4">
                  <div class="product-item border">
                     <div class="product-item-image">
                        <a href="product_detail.html">
                           <img src="../public/images/product/thoi-trang-nam-1.jpg" class="img-fluid" alt="" id="img1">
                           <img class="img-fluid" src="../public/images/product/thoi-trang-nam-2.jpg" alt="" id="img2">
                        </a>
                     </div>
                     <h2 class="product-item-name text-main text-center fs-5 py-1">
                        <a href="product_detail.html">Thời trang nam 1</a>
                     </h2>
                     <h3 class="product-item-price fs-6 p-2 d-flex">
                        <div class="flex-fill"><del>200.000đ</del></div>
                        <div class="flex-fill text-end text-main">190.000đ</div>
                     </h3>
                  </div>
               </div>
               <div class="col-6 col-md-3 mb-4">
                  <div class="product-item border">
                     <div class="product-item-image">
                        <a href="product_detail.html">
                           <img src="../public/images/product/thoi-trang-nam-1.jpg" class="img-fluid" alt="" id="img1">
                           <img class="img-fluid" src="../public/images/product/thoi-trang-nam-2.jpg" alt="" id="img2">
                        </a>
                     </div>
                     <h2 class="product-item-name text-main text-center fs-5 py-1">
                        <a href="product_detail.html">Thời trang nam 2</a>
                     </h2>
                     <h3 class="product-item-price fs-6 p-2 d-flex">
                        <div class="flex-fill"><del>200.000đ</del></div>
                        <div class="flex-fill text-end text-main">190.000đ</div>
                     </h3>
                  </div>
               </div>
               <div class="col-6 col-md-3 mb-4">
                  <div class="product-item border">
                     <div class="product-item-image">
                        <a href="product_detail.html">
                           <img src="../public/images/product/thoi-trang-nam-1.jpg" class="img-fluid" alt="" id="img1">
                           <img class="img-fluid" src="../public/images/product/thoi-trang-nam-2.jpg" alt="" id="img2">
                        </a>
                     </div>
                     <h2 class="product-item-name text-main text-center fs-5 py-1">
                        <a href="product_detail.html">Thời trang nam 2</a>
                     </h2>
                     <h3 class="product-item-price fs-6 p-2 d-flex">
                        <div class="flex-fill"><del>200.000đ</del></div>
                        <div class="flex-fill text-end text-main">190.000đ</div>
                     </h3>
                  </div>
               </div>
               <div class="col-6 col-md-3 mb-4">
                  <div class="product-item border">
                     <div class="product-item-image">
                        <a href="product_detail.html">
                           <img src="../public/images/product/thoi-trang-nam-1.jpg" class="img-fluid" alt="" id="img1">
                           <img class="img-fluid" src="../public/images/product/thoi-trang-nam-2.jpg" alt="" id="img2">
                        </a>
                     </div>
                     <h2 class="product-item-name text-main text-center fs-5 py-1">
                        <a href="product_detail.html">Thời trang nam 2</a>
                     </h2>
                     <h3 class="product-item-price fs-6 p-2 d-flex">
                        <div class="flex-fill"><del>200.000đ</del></div>
                        <div class="flex-fill text-end text-main">190.000đ</div>
                     </h3>
                  </div>
               </div>
               <div class="col-6 col-md-3 mb-4">
                  <div class="product-item border">
                     <div class="product-item-image">
                        <a href="product_detail.html">
                           <img src="../public/images/product/thoi-trang-nam-1.jpg" class="img-fluid" alt="" id="img1">
                           <img class="img-fluid" src="../public/images/product/thoi-trang-nam-2.jpg" alt="" id="img2">
                        </a>
                     </div>
                     <h2 class="product-item-name text-main text-center fs-5 py-1">
                        <a href="product_detail.html">Thời trang nam 2</a>
                     </h2>
                     <h3 class="product-item-price fs-6 p-2 d-flex">
                        <div class="flex-fill"><del>200.000đ</del></div>
                        <div class="flex-fill text-end text-main">190.000đ</div>
                     </h3>
                  </div>
               </div>
               <div class="col-6 col-md-3 mb-4">
                  <div class="product-item border">
                     <div class="product-item-image">
                        <a href="product_detail.html">
                           <img src="../public/images/product/thoi-trang-nam-1.jpg" class="img-fluid" alt="" id="img1">
                           <img class="img-fluid" src="../public/images/product/thoi-trang-nam-2.jpg" alt="" id="img2">
                        </a>
                     </div>
                     <h2 class="product-item-name text-main text-center fs-5 py-1">
                        <a href="product_detail.html">Thời trang nam 2</a>
                     </h2>
                     <h3 class="product-item-price fs-6 p-2 d-flex">
                        <div class="flex-fill"><del>200.000đ</del></div>
                        <div class="flex-fill text-end text-main">190.000đ</div>
                     </h3>
                  </div>
               </div>
               <div class="col-6 col-md-3 mb-4">
                  <div class="product-item border">
                     <div class="product-item-image">
                        <a href="product_detail.html">
                           <img src="../public/images/product/thoi-trang-nam-1.jpg" class="img-fluid" alt="" id="img1">
                           <img class="img-fluid" src="../public/images/product/thoi-trang-nam-2.jpg" alt="" id="img2">
                        </a>
                     </div>
                     <h2 class="product-item-name text-main text-center fs-5 py-1">
                        <a href="product_detail.html">Thời trang nam 2</a>
                     </h2>
                     <h3 class="product-item-price fs-6 p-2 d-flex">
                        <div class="flex-fill"><del>200.000đ</del></div>
                        <div class="flex-fill text-end text-main">190.000đ</div>
                     </h3>
                  </div>
               </div>
               <div class="col-6 col-md-3 mb-4">
                  <div class="product-item border">
                     <div class="product-item-image">
                        <a href="product_detail.html">
                           <img src="../public/images/product/thoi-trang-nam-1.jpg" class="img-fluid" alt="" id="img1">
                           <img class="img-fluid" src="../public/images/product/thoi-trang-nam-2.jpg" alt="" id="img2">
                        </a>
                     </div>
                     <h2 class="product-item-name text-main text-center fs-5 py-1">
                        <a href="product_detail.html">Thời trang nam 2</a>
                     </h2>
                     <h3 class="product-item-price fs-6 p-2 d-flex">
                        <div class="flex-fill"><del>200.000đ</del></div>
                        <div class="flex-fill text-end text-main">190.000đ</div>
                     </h3>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php require_once "views/frontend/footer.php"; ?>