<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Collection $collection
 */
?>
<div class="collections index large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Collections') ?>
            <small>short description</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>

    <section class="content">
        <div class="collections form large-9 medium-8 columns content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?= __('Edit Collection') ?></h3>
        </div>
        <div class="box-body">
            <?= $this->Form->create($collection) ?>
            <fieldset>
                <?php
                                    echo $this->Form->control('name');
                        echo $this->Form->control('description');
                        echo $this->Form->control('start_date');
                        echo $this->Form->control('end_date');
                        echo $this->Form->control('ammount');
                    echo $this->Form->control('exam_type_id', ['options' => $examTypes]);
                    echo $this->Form->control('collection_categorie_id', ['options' => $collectionCategories]);
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
