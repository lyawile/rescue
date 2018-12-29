<?php echo $this->Html->css('permissions/permissions') ?>

<div class="users index large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Permissions') ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>

    <?= $this->Form->create() ?>
    <section class="content">
        <div class="box content-inner">
            <div class="box-header with-border">
                <h3 class="box-title"><?= __('Group permission') ?></h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-4 group-permissions-wrapper">
                        <?php
                        echo $this->Form->control('group_id', [
                            'options' => $groups,
                            'class' => 'group-permissions'
                        ]);
                        ?>
                    </div>
                </div>

                <div id="permission-content">

                </div>
            </div>
        </div>
    </section>
    <?= $this->Form->end() ?>
</div>
<?php echo $this->Html->script('jquery'); ?>
<?php echo $this->Html->script('permissions'); ?>
