<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payment $payment
 */
?>
<div class="payments index large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Payments') ?>
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
        <h3 class="box-title"><?= __('Add Payment') ?></h3>
    </div>
    <div class="box-body">
        <?= $this->Form->create($payment) ?>
        <div class="col-sm-8">
            <fieldset>
                <?php
                                    echo $this->Form->control('transaction_idx');
                        echo $this->Form->control('transaction_date');
                        echo $this->Form->control('gepg_receipt');
                        echo $this->Form->control('control_number');
                        echo $this->Form->control('bill_amount');
                        echo $this->Form->control('paid_amount');
                        echo $this->Form->control('bill_payment_option');
                        echo $this->Form->control('currency');
                        echo $this->Form->control('payment_channel');
                        echo $this->Form->control('payer_mobile');
                        echo $this->Form->control('payer_email');
                        echo $this->Form->control('provider_receipt');
                        echo $this->Form->control('provider_name');
                        echo $this->Form->control('credited_account');
                    echo $this->Form->control('bill_id', ['options' => $bills]);
                        echo $this->Form->control('is_consumed');
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
