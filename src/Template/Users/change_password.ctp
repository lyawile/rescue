<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="users index large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Users') ?>
            <small>short description</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><?= __('Change password') ?></h3>
            </div>
            <div class="box-body">
                <?= $this->Form->create($user) ?>
                <div class="col-sm-8">
                    <fieldset>
                        <?php
                        echo $this->Form->control('old_password', ['value' => '', 'label' => 'Current pasword', 'type' => 'password']);
                        echo $this->Form->control('password1', ['value' => '', 'label' => 'New password', 'type' => 'password']);
                        echo $this->Form->control('password2', ['value' => '', 'label' => 'Confirm new password', 'type' => 'password']);
                        ?>
                    </fieldset>
                </div>
            </div>
            <div class="box-footer">
                <?= $this->Form->button(__('Submit')) ?>
            </div>

            <?= $this->Form->end() ?>
        </div>
    </section>
</div>
