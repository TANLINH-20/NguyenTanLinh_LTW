<?php

use App\Models\Post;

$post50 = Post::where([['id', '=', 50], ['type', '=', 'post'], ['status', '=', 1]])->first();
$post = Post::where([['id', '!=', 50], ['type', '=', 'post'], ['status', '=', 1]])->get();
?>
<section class="hdl-lastpost bg-main mt-3 py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h3>BÀI VIẾT MỚI</h3>
                <div class="row">
                    <div class="col-md-6">
                        <a href="index.php?option=post&slug=<?= $post50->slug ?>">
                            <img class="img-fluid" src="public/images/post/<?= $post50->image ?>" />
                        </a>
                        <h3 class="post-title fs-4 py-2">
                            <a href="index.php?option=post&slug=<?= $post50->slug ?>">
                                <?= $post50->title ?>
                            </a>
                        </h3>
                        <p><?= $post50->detail ?></p>
                    </div>
                    <div class="col-md-6">
                        <?php if (count($post) > 0) : ?>
                            <?php foreach ($post as $post0) : ?>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <a href="index.php?option=post&slug=<?= $post0->slug ?>">
                                            <img class="img-fluid" src="public/images/post/<?= $post0->image ?>" />
                                        </a>
                                    </div>
                                    <div class="col-md-8">
                                        <h3 class="post-title fs-5">
                                            <a href="index.php?option=post&slug=<?= $post0->slug ?>">
                                                <?= $post0->title ?>
                                            </a>
                                        </h3>
                                        <p><?= $post0->detail ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3">FACEBOOK</div>
        </div>
    </div>
</section>