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
                <h3 class="box-title"><?= __('Add User') ?></h3>
            </div>
            <div class="box-body">
                <?= $this->Form->create($user) ?>
                <div class="col-sm-8">
                    <fieldset>
                        <?php
                        echo $this->Form->control('username');
                        echo $this->Form->control('group_id', ['options' => $groups]);
                        echo $this->Form->control('group_district_region_school_users.0.region_id', [
                            'options' => $permissionRegions,
                            'class' => 'region-permissions',
                            'data-placeholder' => 'Choose a region...',
                            'empty' => true
                        ]);

                        echo $this->Form->control('group_district_region_school_users.0.district_id', [
                            'class' => 'district-permissions',
                            'data-placeholder' => 'Choose a district...',
                            'empty' => true
                        ]);

                        echo $this->Form->control('group_district_region_school_users.0.centre_id', [
                            'class' => 'centre-permissions',
                            'data-placeholder' => 'Choose a centre...',
                            'empty' => true
                        ]);

                        echo $this->Form->control('first_name');
                        echo $this->Form->control('other_name');
                        echo $this->Form->control('surname');
                        echo $this->Form->control('password');
                        echo $this->Form->control('email');
                        echo $this->Form->control('mobile');
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
