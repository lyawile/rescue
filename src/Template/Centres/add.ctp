<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Centre $centre
 */
?>
<div class="centres index large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Centres') ?>
            <small>short description</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>

    <section class="content">
        <div class="centres form large-9 medium-8 columns content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?= __('Add Centre') ?></h3>
        </div>
        <div class="box-body">
            <?= $this->Form->create($centre) ?>
            <fieldset>
                <?php
                                    echo $this->Form->control('number');
                        echo $this->Form->control('name');
                        echo $this->Form->control('ownership');
                        echo $this->Form->control('detail');
                        echo $this->Form->control('principal_name');
                        echo $this->Form->control('principal_phone');
                        echo $this->Form->control('contact_one');
                        echo $this->Form->control('contact_two');
                        echo $this->Form->control('district_distance');
                        echo $this->Form->control('centre_type');
                    echo $this->Form->control('district_id', ['options' => $districts]);
                ?>
            </fieldset>
        </div>
        <div class="box-footer">
            <?= $this->Form->button(__('Submit')) ?>
        </div>

        <?= $this->Form->end() ?>
    </div>
</div>    </section>
</div>
