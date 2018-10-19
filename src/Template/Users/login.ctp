<?php $this->layout = 'AdminLTE.login'; ?>

<?= $this->Form->create() ?>
<!--<form action="--><?php //echo $this->Url->build(array('controller' => 'users', 'action' => 'login')); ?><!--" method="post">-->
<div class="form-group has-feedback">
    <!--        <input type="text" class="form-control" placeholder="E-mail" name="email">-->

    <?= $this->Form->control('username') ?>
    <!--        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>-->
</div>
<div class="form-group has-feedback">
    <?= $this->Form->control('password') ?>
    <!--        <input type="password" class="form-control" placeholder="Password" name="password">-->
    <!--        <span class="glyphicon glyphicon-lock form-control-feedback"></span>-->
</div>
<div class="row">

    <!-- /.col -->
    <div class="col-xs-4">
        <?= $this->Form->button(__('Sign In')) ?>
        <!--            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>-->
    </div>

    <div class="col-xs-8">
        <!--        <div class="checkbox icheck">-->
        <!--            <label>-->
        <!--                <input type="checkbox"> Remember Me-->
        <!--            </label>-->
        <!--        </div>-->
    </div>
    <!-- /.col -->
</div>
<!--</form>-->
<?= $this->Form->end() ?>