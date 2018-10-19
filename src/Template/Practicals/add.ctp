<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Practical $practical
 */
?>
<div class="practicals index large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Practicals') ?>
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
        <h3 class="box-title"><?= __('Add Practical') ?></h3>
    </div>
    <div class="box-body">
        <?= $this->Form->create($practical) ?>
        <div class="col-sm-8">
            <fieldset>
                <?php
                                    echo $this->Form->control('practical_type');
                        echo $this->Form->control('group_A');
                        echo $this->Form->control('group_B');
                        echo $this->Form->control('group_C');
                        echo $this->Form->control('total');
                    echo $this->Form->control('subject_id', ['options' => $subjects]);
                    echo $this->Form->control('centre_id', ['options' => $centres]);
                ?>
            </fieldset>
        </div>
    </div>
    <div class="box-footer">
        <?= $this->Form->button(__('Submit')) ?>
    </div>

    <?= $this->Form->end() ?>
</div>    </section>
</div>
