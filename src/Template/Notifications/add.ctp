<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Notification $notification
 */
?>
<div class="notifications index large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Notifications') ?>
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
                <h3 class="box-title"><?= __('Add Notification') ?></h3>
            </div>
            <div class="box-body">
                <?= $this->Form->create($notification) ?>
                <div class="col-sm-8">
                    <fieldset>
                        <?php
                        echo $this->Form->control('title');
                        echo '<label for="groups">Groups</label>';
                        echo $this->Form->control('groups', ['options' => $groups, 'multiple' => true, 'label' => false, 'class' => 'multi']);
                        echo $this->Form->control('body');

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
