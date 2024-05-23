<div class="col-md-6 mx-auto">
    <form method="post" enctype="multipart/form-data">
        <a href="<?=ROOT?>/home">
            <img class="mb-4 rounded-circle shadow" src="<?=ROOT?>/assets/images/logo.jpg" alt="" width="92" height="92" style="object-fit: cover;">
        </a>
        <h1 class="h3 mb-3 fw-normal">Edit category</h1>

        <?php if(!empty($row)): ?>
            <?php if(!empty($errors)):?>
                <div class="alert alert-danger">Please fix the errors below</div>
            <?php endif; ?>

            <div class="form-floating">
                <input name="category" value="<?=old_value('category', $row['category']);?>" type="text" class="form-control mb-2" id="floatingInput" placeholder="Category">
                <label for="floatingInput">Category</label>
            </div>
            <?php if(!empty($errors['category'])):?>
                <div class="text-danger">
                <?=$errors['category'];?>
                </div>
            <?php endif; ?>

            <div class="form-floating my-3">
                <select name="disabled" class="form-select">
                    <option <?=old_select('disabled', '0', $row['disabled']);?> value="0">Yes</option>
                    <option <?=old_select('disabled', '1', $row['disabled']);?> value="1">No</option>
                </select>
                <label for="floatingInput">Active</label>
            </div>

            <a href="<?=ROOT?>/admin/categories">
                <button class="mt-4 btn btn-lg btn-primary" type="button">Back</button>
            </a>
            <button class="mt-4 btn btn-lg btn-primary float-end" type="submit">Save</button>
        <?php else:?>
            <div class="alert alert-danger text-center">Record not found!</div>
        <?php endif;?>
    </form>
</div>