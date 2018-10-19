<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\District $district
 */
?>
<div class="districts index large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Districts') ?>
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
        <h3 class="box-title"><?= __('Edit District') ?></h3>
    </div>
    <div class="box-body">
        <?= $this->Form->create($district) ?>
        <div class="col-sm-8">
            <fieldset>
                <?php
                                    echo $this->Form->control('number');
                        echo $this->Form->control('name');
                        echo $this->Form->control('detail');
                    echo $this->Form->control('region_id', ['options' => $regions]);
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
