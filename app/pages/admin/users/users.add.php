<div class="col-md-6 mx-auto">
    <form method="post">
        <a href="<?=ROOT?>/home">
            <img class="mb-4 rounded-circle shadow" src="<?=ROOT?>/assets/images/logo.jpg" alt="" width="92" height="92" style="object-fit: cover;">
        </a>
        <h1 class="h3 mb-3 fw-normal">Create account</h1>

        <?php if(!empty($errors)):?>
            <div class="alert alert-danger">Please fix the errors below</div>
        <?php endif; ?>

        <div class="form-floating">
            <input name="username" value="<?=old_value('username');?>" type="text" class="form-control mb-2" id="floatingInput" placeholder="Username">
            <label for="floatingInput">Username</label>
        </div>
        <?php if(!empty($errors['username'])):?>
            <div class="text-danger">
            <?=$errors['username'];?>
            </div>
        <?php endif; ?>

        <div class="form-floating">
            <input name="email" value="<?=old_value('email');?>" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>
        <?php if(!empty($errors['email'])):?>
            <div class="text-danger">
            <?=$errors['email'];?>
            </div>
        <?php endif; ?>

        <div class="form-floating">
            <input name="password" value="<?=old_value('password');?>" type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
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

        <button class="mt-4 w-100 btn btn-lg btn-primary" type="submit">Create</button>
    </form>
</div>
