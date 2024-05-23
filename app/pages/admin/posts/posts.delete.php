<div class="col-md-6 mx-auto">
    <form method="post">
        <a href="<?=ROOT?>/home">
            <img class="mb-4 rounded-circle shadow" src="<?=ROOT?>/assets/images/logo.jpg" alt="" width="92" height="92" style="object-fit: cover;">
        </a>
        <h1 class="h3 mb-3 fw-normal">Delete post</h1>

        <?php if(!empty($row)): ?>
            <?php if(!empty($errors)):?>
                <div class="alert alert-danger">Please fix the errors below</div>
            <?php endif; ?>

            <div class="form-floating">
                <div class="form-control mb-2"><?=old_value('title', $row['title']);?></div>
            </div>
            <?php if(!empty($errors['title'])):?>
                <div class="text-danger"><?=$errors['title'];?></div>
            <?php endif; ?>

            <div class="form-floating">
                <div class="form-control mb-2"><?=old_value('slug', $row['slug']);?></div>
            </div>
            <?php if(!empty($errors['slug'])):?>
                <div class="text-danger"><?=$errors['slug'];?></div>
            <?php endif; ?>

            <a href="<?=ROOT?>/admin/posts">
                <button class="mt-4 btn btn-lg btn-primary" type="button">Back</button>
            </a>
            <button class="mt-4 btn btn-lg btn-danger float-end" type="submit">Delete</button>
        <?php else:?>
            <div class="alert alert-danger text-center">Record not found!</div>
        <?php endif;?>
    </form>
</div>