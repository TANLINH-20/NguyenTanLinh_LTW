<?php
use App\Libraries\MyClass;
?>

<?php if(MyClass::has_flash('message')):?>
   <?php $arg= MyClass::get_flash('message');?>
   <div class="alert alert-<?=$arg['type'];?> alert-dismissible fade show" role="alert">
   <strong>Thông báo!</strong> <?=$arg['msg'];?>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="false">&times;</span>
   </button>
   </div>
<?php endif;?>