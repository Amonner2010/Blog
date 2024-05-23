<div class="col-md-6 mx-auto">
    <form method="post" enctype="multipart/form-data">
        <a href="<?=ROOT?>/home">
            <img class="mb-4 rounded-circle shadow" src="<?=ROOT?>/assets/images/logo.jpg" alt="" width="92" height="92" style="object-fit: cover;">
        </a>
        <h1 class="h3 mb-3 fw-normal">Edit account</h1>

        <?php if(!empty($row)): ?>
            <?php if(!empty($errors)):?>
                <div class="alert alert-danger">Please fix the errors below</div>
            <?php endif; ?>

            <div class="my-2">
                <label class="d-block">
                    <img src="<?=get_image($row['image'])?>" class="mx-auto d-block image-preview-edit" style="cursor: pointer; height: 150px; object-fit: cover; width: 150px;"/>
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
                <input name="username" value="<?=old_value('username', $row['username']);?>" type="text" class="form-control mb-2" id="floatingInput" placeholder="Username">
                <label for="floatingInput">Username</label>
            </div>
            <?php if(!empty($errors['username'])):?>
                <div class="text-danger">
                <?=$errors['username'];?>
                </div>
            <?php endif; ?>

            <div class="form-floating">
                <input name="email" value="<?=old_value('email', $row['email']);?>" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <?php if(!empty($errors['email'])):?>
                <div class="text-danger">
                <?=$errors['email'];?>
                </div>
            <?php endif; ?>

            <div class="form-floating my-3">
                <select name="role" class="form-select">
                    <option <?=old_select('role', 'user', $row['role']);?> value="user">User</option>
                    <option <?=old_select('role', 'admin', $row['role']);?> value="admin">Admin</option>
                </select>
                <label for="floatingInput">Role</label>
            </div>
            <?php if(!empty($errors['role'])):?>
                <div class="text-danger"><?=$errors['role'];?></div>
            <?php endif; ?>

            <div class="form-floating">
                <input name="password" value="<?=old_value('password');?>" type="password" class="form-control" id="floatingPassword" placeholder="Password (Leave empty to keep old one)">
                <label for="floatingPassword">Password (Leave empty to keep old one)</label>
            </div>
            <?php if(!empty($errors['password'])):?>
                <div class="text-danger">
                <?=$errors['password'];?>
                </div>
            <?php endif; ?>

            <div class="form-floating">
                <input name="retype_password" value="<?=old_value('retype_password');?>" type="password" class="form-control" id="floatingPassword" placeholder="Retype Password">
                <label for="floatingPassword">Retype Password</label>
            </div>

            <a href="<?=ROOT?>/admin/users">
                <button class="mt-4 btn btn-lg btn-primary" type="button">Back</button>
            </a>
            <button class="mt-4 btn btn-lg btn-primary float-end" type="submit">Save</button>
        <?php else:?>
            <div class="alert alert-danger text-center">Record not found!</div>
        <?php endif;?>
    </form>
</div>