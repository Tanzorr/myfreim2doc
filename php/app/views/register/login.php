<?php $this->start('head');?>
<?php $this->end();?>
<?php $this->start('body');?>
<div class="container">
    <h3 class="text-center">Log In</h3>
    <div class="row justify-content-center">

        <div class="col-md-6 coll-md-offset-3 well">
            <form action="/register/login" class="form" method="post">
                <div class=""><?= $this->displayErrors ?></div>
                <div class="form-group">
                    <label for="username">username</label>
                    <input type="text" name="username" id="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="username">password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="remember_me">Remeber me
                        <input type="checkbox" id="remember_me" name="remember_me" value="on">
                    </label>
                </div>
                <div class="form-group">
                    <input type="submit" value="Login" class="btn btn-primary">
                </div>
                <div class="text-right">
                    <a href="<?=ROOT?>/register/register">register</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $this->end();?>
