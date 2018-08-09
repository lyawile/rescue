<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Group $group
 */
?>
<div class="groups index large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Groups') ?>
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
        <h3 class="box-title"><?= __('Edit Group') ?></h3>
    </div>
    <div class="box-body">
        <?= $this->Form->create($group) ?>
<<<<<<< HEAD
        <fieldset>
            <?php
                                echo $this->Form->control('name');
            ?>
        </fieldset>
=======
        <div class="col-sm-8">
            <fieldset>
                <?php
                                    echo $this->Form->control('name');
                ?>
            </fieldset>
        </div>
>>>>>>> 46c60288ea9de37159a95c261b2a1153559036ae
    </div>
    <div class="box-footer">
        <?= $this->Form->button(__('Submit')) ?>
    </div>

    <?= $this->Form->end() ?>
</div>    </section>
</div>
