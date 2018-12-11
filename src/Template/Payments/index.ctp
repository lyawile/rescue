<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payment[]|\Cake\Collection\CollectionInterface $payments
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

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="btn-group pull-right">
                    <?= $this->Html->link(__('New Payment'), ['action' => 'add'], ['class' => 'btn btn btn-success']) ?>
                </div>
            </div>
            <div class="box-body">
                <table cellpadding="0" cellspacing="0" class="table table table-striped">
                    <thead>
                    <tr>
                                                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('transaction_idx') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('transaction_date') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('gepg_receipt') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('control_number') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('bill_amount') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('paid_amount') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('bill_payment_option') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('currency') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('payment_channel') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('payer_mobile') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('payer_email') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('provider_receipt') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('provider_name') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('credited_account') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('bill_id') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('is_consumed') ?></th>
                                                <th scope="col" class="actions pull-right"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($payments as $payment): ?>
                    <tr>
                                                                                                                                                                                                                                                                            <td><?= $this->Number->format($payment->id) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= h($payment->transaction_idx) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= $this->Number->format($payment->transaction_date) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= h($payment->gepg_receipt) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= h($payment->control_number) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= $this->Number->format($payment->bill_amount) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= $this->Number->format($payment->paid_amount) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= h($payment->bill_payment_option) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= h($payment->currency) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= h($payment->created) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= h($payment->modified) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= h($payment->payment_channel) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= h($payment->payer_mobile) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= h($payment->payer_email) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= h($payment->provider_receipt) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= h($payment->provider_name) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= h($payment->credited_account) ?></td>
                                                                                                                                                                                                                                                    <td><?= $payment->has('bill') ?
                                        $this->Html->link($payment
                                        ->bill->id, ['controller' =>
                                        'Bills', 'action' => 'view', $payment
                                        ->bill
                                        ->id]) : '' ?>
                                    </td>
                                                                                                                                                                                                                                                                                                                                                                    <td><?= $this->Number->format($payment->is_consumed) ?></td>
                                                                                                                                    <td class="actions pull-right">
                            <?= $this->Html->link('', ['action' => 'view', $payment->id], ['class' => 'btn btn-xs fa fa-eye', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => __('View')]) ?>
                            <?= $this->Html->link('', ['action' => 'edit', $payment->id], ['class' => 'btn btn-xs fa fa-pencil-square-o', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => __('Edit')]) ?>
                            <?= $this->Form->postLink('', ['action' => 'delete', $payment->id], ['confirm' =>
                            __('Are you sure you want to delete # {0}?', $payment->id), 'class' => 'btn btn-xs fa fa-trash', 'style' => 'color: red', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => __('Delete')]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="box-footer">
                <ul class="pagination pagination-sm no-margin pull-right">
                    <?= $this->Paginator->first('<< ' . __('first')) ?>
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                    <?= $this->Paginator->last(__('last') . ' >>') ?>
                </ul>
                <p class="pull-right" style="margin-top: 5px; margin-right: 16px;"><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}},
                    showing {{current}} record(s) out of {{count}} total')]) ?></p>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    </section>
</div>
