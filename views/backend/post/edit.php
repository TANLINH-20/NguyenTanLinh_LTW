<?php

use App\Libraries\MyClass;
use App\Models\Post;
use App\Models\Topic;

$list_topic = Topic::where('status', '!=', '0')
   ->orderBy('created_at', 'desc')
   ->select('id', 'name')
   ->get();
$id = $_REQUEST['id'];
$post = Post::find($id);
if ($post == null) {
    MyClass::set_flash('message', ['msg' => 'Lỗi trang 404', 'type' => 'danger']);
    header("location:index.php?option=post");
}
?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<form action="index.php?option=post&cat=process" method="post" enctype="multipart/form-data">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="d-inline">Cập nhật bài viết</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header text-right">
                    <button class="btn btn-sm btn-success" type="submit" name="CAPNHAT">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        Lưu
                    </button>
                    <a href="index.php?option=post" class="btn btn-sm btn-info">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Về danh sách
                    </a>
                </div>
                <div class="card-body">
                <div class="row">
                  <div class="col-md-9">
                     <div class="mb-3">
                     <input type="hidden" name="id" value="<?= $post->id; ?>" />
                        <label>Tiêu đề bài viết (*)</label>
                        <input type="text" name="title" value="<?= $post->title; ?>" class="form-control" required>
                     </div>
                     <div class="mb-3">
                        <label>Slug</label>
                        <input type="text" name="slug" value="<?= $post->slug; ?>" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Mô tả</label>
                        <textarea name="description" class="form-control"><?= $post->description; ?></textarea>
                     </div>
                     <div class="mb-3">
                        <label>Chi tiết (*)</label>
                        <textarea name="detail" rows="5" class="form-control" required><?= $post->detail; ?></textarea>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="mb-3">
                        <label>Chủ đề (*)</label>
                        <select name="topic_id" class="form-control">
                           <?php if (count($list_topic) > 0) : ?>
                              <?php foreach ($list_topic as $item) : ?>
                                 <option value="<?= $item->id ?>"<?= ($post->topic_id == $item->id) ? 'selected' : ''; ?>><?= $item->name ?></option>
                              <?php endforeach; ?>
                           <?php endif; ?>
                        </select>
                     </div>
                     <div class="mb-3">
                        <label>Kiểu</label>
                        <input type="text" name="type" value="<?= $post->type; ?>" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Hình đại diện</label>
                        <input type="file" name="image" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control">
                           <option value="1"<?= ($post->status == 1) ? 'selected' : ''; ?>>Xuất bản</option>
                           <option value="2"<?= ($post->status == 2) ? 'selected' : ''; ?>>Chưa xuất bản</option>
                        </select>
                     </div>
                  </div>
               </div>
                </div>
            </div>
        </section>
    </div>
</form>
<!-- END CONTENT-->
<?php require_once '../views/backend/footer.php'; ?>