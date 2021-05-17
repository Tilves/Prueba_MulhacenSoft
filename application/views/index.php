<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <div class="account-wall">
                <img class="profile-img" src="<?php echo $this->config->item("base_url"); ?>/assets/img/logo.jpg" alt="">
                <form action="<?php echo $this->config->item("base_url"); ?>user/login" method="post" class="form-signin">
                  <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
                  <input type="password" name="password" class="form-control" placeholder="<?= $this->lang->line('password'); ?>" required>
                  <button class="btn btn-lg btn-primary btn-block" type="submit"><?= $this->lang->line('login'); ?></button>
                </form>
            </div>
        </div>
    </div>
</div>
