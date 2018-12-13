<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payment $payment
 */
?>

<div class="payments view large-9 medium-8 columns content">
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
                <h4 class="pull-left"><?= h($payment->id) ?></h4>
                <div class="btn-group pull-right">
                    <?= $this->Html->link(__('New Payment'), ['action' => 'add'], ['class' => 'btn btn
                    btn-default']) ?>
                    <?= $this->Html->link(__('Edit Payment'), ['action' => 'edit', $payment->id],
                    ['class' => 'btn btn-default']) ?>
                    <?= $this->Form->postLink(__('Delete Payment'), ['action' => 'delete', $payment->id
                    ],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $payment->id), 'class' => 'btn
                    btn-danger']) ?>
                </div>
            </div>
            <!-- Default box -->
            <div class="box-body">
                <table class="vertical-table table table table-striped">
                                                                                                        <tr>
                                    <th scope="row"><?= __('Transaction Idx') ?></th>
                                    <td><?= h($payment->transaction_idx) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Gepg Receipt') ?></th>
                                    <td><?= h($payment->gepg_receipt) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Control Number') ?></th>
                                    <td><?= h($payment->control_number) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Bill Payment Option') ?></th>
                                    <td><?= h($payment->bill_payment_option) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Currency') ?></th>
                                    <td><?= h($payment->currency) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Payment Channel') ?></th>
                                    <td><?= h($payment->payment_channel) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Payer Mobile') ?></th>
                                    <td><?= h($payment->payer_mobile) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Payer Email') ?></th>
                                    <td><?= h($payment->payer_email) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Provider Receipt') ?></th>
                                    <td><?= h($payment->provider_receipt) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Provider Name') ?></th>
                                    <td><?= h($payment->provider_name) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Credited Account') ?></th>
                                    <td><?= h($payment->credited_account) ?></td>
                                </tr>
                                                                                                                                                <tr>
                                    <th scope="row"><?= __('Bill') ?></th>
                                    <td><?= $payment->has('bill') ?
                                        $this->Html->link($payment
                                        ->bill->id, ['controller' =>
                                        'Bills', 'action' => 'view', $payment
                                        ->bill
                                        ->id]) : '' ?>
                                    </td>
                                </tr>
                                                                                                                                                                    <tr>
                                <th scope="row"><?= __('Id') ?></th>
                                <td><?= $this->Number->format($payment->id) ?></td>
                            </tr>
                                                    <tr>
                                <th scope="row"><?= __('Transaction Date') ?></th>
                                <td><?= $this->Number->format($payment->transaction_date) ?></td>
                            </tr>
                                                    <tr>
                                <th scope="row"><?= __('Bill Amount') ?></th>
                                <td><?= $this->Number->format($payment->bill_amount) ?></td>
                            </tr>
                                                    <tr>
                                <th scope="row"><?= __('Paid Amount') ?></th>
                                <td><?= $this->Number->format($payment->paid_amount) ?></td>
                            </tr>
                                                    <tr>
                                <th scope="row"><?= __('Is Consumed') ?></th>
                                <td><?= $this->Number->format($payment->is_consumed) ?></td>
                            </tr>
                                                                                                                    <tr>
                                <th scope="row"><?= __('Created') ?></th>
                                <td><?= h($payment->created) ?></td>
                            </tr>
                                                    <tr>
                                <th scope="row"><?= __('Modified') ?></th>
                                <td><?= h($payment->modified) ?></td>
                            </tr>
                                                                                </table>
                                                                                                            <div class="related">
                        <h4><?= __('Related Payment Reconciliations') ?></h4>
                        <?php if (!empty($payment->payment_reconciliations)): ?>
                        <table cellpadding="0" cellspacing="0" class="table table table-striped">
                            <tr>
                                                                    <th scope="col"><?= __('Id') ?></th>
                                                                    <th scope="col"><?= __('Payment Id') ?></th>
                                                                    <th scope="col"><?= __('Recoinciliation Id') ?></th>
                                                                    <th scope="col"><?= __('Transaction Idx') ?></th>
                                                                    <th scope="col"><?= __('Payment Reconciliationscol') ?></th>
                                                                    <th scope="col"><?= __('Bill Idx') ?></th>
                                                                    <th scope="col"><?= __('Provide Name') ?></th>
                                                                    <th scope="col"><?= __('Provider Code') ?></th>
                                                                    <th scope="col"><?= __('Reconciliation Status Code') ?></th>
                                                                    <th scope="col"><?= __('Reconciliation Detail') ?></th>
                                                                    <th scope="col"><?= __('Gepg Receipt') ?></th>
                                                                    <th scope="col"><?= __('Control Number') ?></th>
                                                                    <th scope="col"><?= __('Paid Amount') ?></th>
                                                                    <th scope="col"><?= __('Currency') ?></th>
                                                                    <th scope="col"><?= __('Transaction Date') ?></th>
                                                                    <th scope="col"><?= __('Credited Account') ?></th>
                                                                    <th scope="col"><?= __('Payer Mobile') ?></th>
                                                                    <th scope="col"><?= __('Payer Name') ?></th>
                                                                    <th scope="col"><?= __('Payer Email') ?></th>
                                                                    <th scope="col"><?= __('Remarks') ?></th>
                                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($payment->payment_reconciliations as $paymentReconciliations): ?>
                            <tr>
                                                                    <td><?= h($paymentReconciliations->id) ?></td>
                                                                    <td><?= h($paymentReconciliations->payment_id) ?></td>
                                                                    <td><?= h($paymentReconciliations->recoinciliation_id) ?></td>
                                                                    <td><?= h($paymentReconciliations->transaction_idx) ?></td>
                                                                    <td><?= h($paymentReconciliations->payment_reconciliationscol) ?></td>
                                                                    <td><?= h($paymentReconciliations->bill_idx) ?></td>
                                                                    <td><?= h($paymentReconciliations->provide_name) ?></td>
                                                                    <td><?= h($paymentReconciliations->provider_code) ?></td>
                                                                    <td><?= h($paymentReconciliations->reconciliation_status_code) ?></td>
                                                                    <td><?= h($paymentReconciliations->reconciliation_detail) ?></td>
                                                                    <td><?= h($paymentReconciliations->gepg_receipt) ?></td>
                                                                    <td><?= h($paymentReconciliations->control_number) ?></td>
                                                                    <td><?= h($paymentReconciliations->paid_amount) ?></td>
                                                                    <td><?= h($paymentReconciliations->currency) ?></td>
                                                                    <td><?= h($paymentReconciliations->transaction_date) ?></td>
                                                                    <td><?= h($paymentReconciliations->credited_account) ?></td>
                                                                    <td><?= h($paymentReconciliations->payer_mobile) ?></td>
                                                                    <td><?= h($paymentReconciliations->payer_name) ?></td>
                                                                    <td><?= h($paymentReconciliations->payer_email) ?></td>
                                                                    <td><?= h($paymentReconciliations->remarks) ?></td>
                                                                                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'PaymentReconciliations',
                                    'action'
                                    =>
                                    'view', $paymentReconciliations->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'PaymentReconciliations',
                                    'action'
                                    =>
                                    'edit', $paymentReconciliations->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PaymentReconciliations',
                                    'action' =>
                                    'delete', $paymentReconciliations->id], ['confirm' => __('Are you sure you want to delete #
                                    {0}?', $paymentReconciliations->id)]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                        <?php endif; ?>
                    </div>
                            </div>
        </div>
    </section>
</div>
