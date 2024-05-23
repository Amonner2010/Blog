<link rel="stylesheet" type="text/css" href="<?=ROOT?>/assets/summernote/summernote-lite.min.css">
<div class="col-md-12 mx-auto">
    <form method="post" enctype="multipart/form-data">
        <a href="<?=ROOT?>/home">
            <img class="mb-4 rounded-circle shadow" src="<?=ROOT?>/assets/images/logo.jpg" alt="" width="92" height="92" style="object-fit: cover;">
        </a>
        <h1 class="h3 mb-3 fw-normal">Create post</h1>

        <?php if(!empty($errors)):?>
            <div class="alert alert-danger">Please fix the errors below</div>
        <?php endif; ?>

        <div class="my-2">
            Featured Image: <br>
            <label class="d-block">
                <img src="<?=get_image('')?>" class="mx-auto d-block image-preview-edit" style="cursor: pointer; height: 150px; object-fit: cover; width: 150px;"/>
                <input onchange="display_image_edit(this.files[0])" type="file" name="image" class="d-none">
            </label>
        </div>
        <?php if(!empty($errors['image'])):?>
            <div class="text-danger"><?=$errors['image']?></div>
        <?php endif;?>
        <script>
            function display_image_edit(file) {
                document.querySelector(".image-preview-edit").src = URL.createObjectURL(file);
            }
        </script>

        <div class="form-floating">
            <input name="title" value="<?=old_value('title');?>" type="text" class="form-control mb-2" id="floatingInput" placeholder="Title">
            <label for="floatingInput">Title</label>
        </div>
        <?php if(!empty($errors['title'])):?>
            <div class="text-danger"><?=$errors['title'];?></div>
        <?php endif; ?>

        <div class="">
            <textarea id="summernote" rows="8" name="content" type="content" class="form-control" id="floatingInput" placeholder="Post content"><?=old_value('content');?></textarea>
        </div>
        <?php if(!empty($errors['content'])):?>
            <div class="text-danger"><?=$errors['content'];?></div>
        <?php endif; ?>

        <div class="form-floating my-3">
            <select name="category_id" class="form-select">
                <?php
                    $query = "select * from categories order by id desc";
                    $categories = query($query);
                ?>
                <option value="">--Select--</option>
                <?php if(!empty($categories)):?>
                    <?php foreach($categories as $cat):?>
                        <option <?=old_select('category_id', $cat['id'])?> value="<?=$cat['id']?>"><?=$cat['category']?></option>
                    <?php endforeach;?>
                <?php endif;?>
            </select>
            <label for="floatingInput">Category</label>
        </div>
        <?php if(!empty($errors['category'])):?>
            <div class="text-danger"><?=$errors['category'];?></div>
        <?php endif; ?>

        <a href="<?=ROOT?>/admin/posts">
            <button class="mt-4 btn btn-lg btn-primary" type="button">Back</button>
        </a>
        <button class="mt-4 btn btn-lg btn-primary float-end" type="submit">Create</button>
    </form>
</div>

<script src="<?=ROOT?>/assets/js/jquery.js"></script>
<script src="<?=ROOT?>/assets/summernote/summernote-lite.min.js"></script>
<script>
    $('#summernote').summernote({
        placeholder: 'Post content',
        tabsize: 2,
        height: 400
    });
</script>
