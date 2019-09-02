<?php $this->start('head');?>
<?php $this->end();?>
<?php $this->start('body');?>
<div class="container">
    <div class="row justify-content-center">
        <h3 class="text-center">Register</h3>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6 col-md-offset-3 well">
            <form action="" class="form" method="post">
                <div class=""><?=$this->displayErrors ?></div>
                <div class="form-group">
                    <label for="fname">First name</label>
                    <input type="text" id="fname" name="fname" class="form-control" value="<?=$this->post['fname']?>">
                </div>
                <div class="form-group">
                    <label for="lname">Last name</label>
                    <input type="text" id="lname" name="lname" class="form-control" value="<?= $this->post['lname']?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" class="form-control" value="<?= $this->post['email']?>">
                </div>
                <div class="form-group">
                    <label for="usernamne">username</label>
                    <input type="text" id="usernamne" class="form-control" name="username" value="<?=$this->post['username']?>">
                </div>
                <div class="form-group">
                    <label for="password">Chose password</label>
                    <input type="password" id="password" class="form-control" name="password" value="<?=$this->post['password']?>">
                </div>
                <div class="form-group">
                    <label for="password">Confirm password</label>
                    <input type="password" id="confirm" class="form-control" name="confirm" value="<?=$this->post['confirm']?>">
                </div>
                <div class="pull-right">
                    <input type="submit" class="btn btn-primary btn-large" value="Register">
                </div>
            </form>
        </div>
    </div>
</div>

<?php $this->end();?>
