<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bill $bill
 */
?>
<div class="bills index large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Bills') ?>
            <small>short description</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>

    <section class="content">
        <div class="bills form large-9 medium-8 columns content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?= __('Edit Bill') ?></h3>
        </div>
        <div class="box-body">
            <?= $this->Form->create($bill) ?>
            <fieldset>
                <?php
                                    echo $this->Form->control('reference');
                        echo $this->Form->control('amount');
                        echo $this->Form->control('equivalent_amount');
                        echo $this->Form->control('misc_amount');
                        echo $this->Form->control('expire_date');
                        echo $this->Form->control('generated_date');
                        echo $this->Form->control('payer_idx');
                        echo $this->Form->control('payer_name');
                        echo $this->Form->control('payer_mobile');
                        echo $this->Form->control('payer_email');
                        echo $this->Form->control('has_reminder');
                        echo $this->Form->control('control_number');
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
