<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Subject $subject
 */
?>
<div class="subjects index large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Subjects') ?>
            <small>short description</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>

    <section class="content">
        <div class="subjects form large-9 medium-8 columns content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?= __('Add Subject') ?></h3>
        </div>
        <div class="box-body">
            <?= $this->Form->create($subject) ?>
            <fieldset>
                <?php
                                    echo $this->Form->control('code');
                        echo $this->Form->control('name');
                        echo $this->Form->control('short_name');
                    echo $this->Form->control('exam_type_id', ['options' => $examTypes]);
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
