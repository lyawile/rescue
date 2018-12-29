<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bill $bill
 */
?>

<div class="bills view large-9 medium-8 columns content">
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
        <div class="box">
            <div class="box-header with-border">
                <h4 class="pull-left"><?= h($bill->id) ?></h4>
                <div class="btn-group pull-right">
                    <?= $this->Acl->link(__('New Bill'), ['action' => 'add'], ['class' => 'btn btn
                    btn-default']) ?>
                    <?= $this->Acl->link(__('Edit Bill'), ['action' => 'edit', $bill->id],
                    ['class' => 'btn btn-default']) ?>
                    <?= $this->Form->postLink(__('Delete Bill'), ['action' => 'delete', $bill->id
                    ],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $bill->id), 'class' => 'btn
                    btn-danger']) ?>
                </div>
            </div>
            <!-- Default box -->
            <div class="box-body">
                <table class="vertical-table table table table-striped">
                                                                                                        <tr>
                                    <th scope="row"><?= __('Reference') ?></th>
                                    <td><?= h($bill->reference) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Payer Name') ?></th>
                                    <td><?= h($bill->payer_name) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Payer Mobile') ?></th>
                                    <td><?= h($bill->payer_mobile) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Payer Email') ?></th>
                                    <td><?= h($bill->payer_email) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Control Number') ?></th>
                                    <td><?= h($bill->control_number) ?></td>
                                </tr>
                                                                                                                                                                    <tr>
                                <th scope="row"><?= __('Id') ?></th>
                                <td><?= $this->Number->format($bill->id) ?></td>
                            </tr>
                                                    <tr>
                                <th scope="row"><?= __('Amount') ?></th>
                                <td><?= $this->Number->format($bill->amount) ?></td>
                            </tr>
                                                    <tr>
                                <th scope="row"><?= __('Equivalent Amount') ?></th>
                                <td><?= $this->Number->format($bill->equivalent_amount) ?></td>
                            </tr>
                                                    <tr>
                                <th scope="row"><?= __('Misc Amount') ?></th>
                                <td><?= $this->Number->format($bill->misc_amount) ?></td>
                            </tr>
                                                    <tr>
                                <th scope="row"><?= __('Payer Idx') ?></th>
                                <td><?= $this->Number->format($bill->payer_idx) ?></td>
                            </tr>
                                                    <tr>
                                <th scope="row"><?= __('Has Reminder') ?></th>
                                <td><?= $this->Number->format($bill->has_reminder) ?></td>
                            </tr>
                                                                                                                    <tr>
                                <th scope="row"><?= __('Expire Date') ?></th>
                                <td><?= h($bill->expire_date) ?></td>
                            </tr>
                                                    <tr>
                                <th scope="row"><?= __('Generated Date') ?></th>
                                <td><?= h($bill->generated_date) ?></td>
                            </tr>
                                                                                </table>
                                                                                                            <div class="related">
                        <h4><?= __('Related Bill Items') ?></h4>
                        <?php if (!empty($bill->bill_items)): ?>
                        <table cellpadding="0" cellspacing="0" class="table table table-striped">
                            <tr>
                                                                    <th scope="col"><?= __('Id') ?></th>
                                                                    <th scope="col"><?= __('Detail') ?></th>
                                                                    <th scope="col"><?= __('Ammount') ?></th>
                                                                    <th scope="col"><?= __('Equivalent Amount') ?></th>
                                                                    <th scope="col"><?= __('Misc Amount') ?></th>
                                                                    <th scope="col"><?= __('Quantity') ?></th>
                                                                    <th scope="col"><?= __('Unit') ?></th>
                                                                    <th scope="col"><?= __('Collection Id') ?></th>
                                                                    <th scope="col"><?= __('Bill Id') ?></th>
                                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($bill->bill_items as $billItems): ?>
                            <tr>
                                                                    <td><?= h($billItems->id) ?></td>
                                                                    <td><?= h($billItems->detail) ?></td>
                                                                    <td><?= h($billItems->ammount) ?></td>
                                                                    <td><?= h($billItems->equivalent_amount) ?></td>
                                                                    <td><?= h($billItems->misc_amount) ?></td>
                                                                    <td><?= h($billItems->quantity) ?></td>
                                                                    <td><?= h($billItems->unit) ?></td>
                                                                    <td><?= h($billItems->collection_id) ?></td>
                                                                    <td><?= h($billItems->bill_id) ?></td>
                                                                                                <td class="actions">
                                    <?= $this->Acl->link(__('View'), ['controller' => 'BillItems',
                                    'action'
                                    =>
                                    'view', $billItems->id]) ?>
                                    <?= $this->Acl->link(__('Edit'), ['controller' => 'BillItems',
                                    'action'
                                    =>
                                    'edit', $billItems->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'BillItems',
                                    'action' =>
                                    'delete', $billItems->id], ['confirm' => __('Are you sure you want to delete #
                                    {0}?', $billItems->id)]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                        <?php endif; ?>
                    </div>
                                                                            <div class="related">
                        <h4><?= __('Related Payments') ?></h4>
                        <?php if (!empty($bill->payments)): ?>
                        <table cellpadding="0" cellspacing="0" class="table table table-striped">
                            <tr>
                                                                    <th scope="col"><?= __('Id') ?></th>
                                                                    <th scope="col"><?= __('Transaction Idx') ?></th>
                                                                    <th scope="col"><?= __('Transaction Date') ?></th>
                                                                    <th scope="col"><?= __('Gepg Receipt') ?></th>
                                                                    <th scope="col"><?= __('Control Number') ?></th>
                                                                    <th scope="col"><?= __('Bill Amount') ?></th>
                                                                    <th scope="col"><?= __('Paid Amount') ?></th>
                                                                    <th scope="col"><?= __('Bill Payment Option') ?></th>
                                                                    <th scope="col"><?= __('Currency') ?></th>
                                                                    <th scope="col"><?= __('Created') ?></th>
                                                                    <th scope="col"><?= __('Modified') ?></th>
                                                                    <th scope="col"><?= __('Payment Channel') ?></th>
                                                                    <th scope="col"><?= __('Payer Mobile') ?></th>
                                                                    <th scope="col"><?= __('Payer Email') ?></th>
                                                                    <th scope="col"><?= __('Provider Receipt') ?></th>
                                                                    <th scope="col"><?= __('Provider Name') ?></th>
                                                                    <th scope="col"><?= __('Credited Account') ?></th>
                                                                    <th scope="col"><?= __('Bill Id') ?></th>
                                                                    <th scope="col"><?= __('Is Consumed') ?></th>
                                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($bill->payments as $payments): ?>
                            <tr>
                                                                    <td><?= h($payments->id) ?></td>
                                                                    <td><?= h($payments->transaction_idx) ?></td>
                                                                    <td><?= h($payments->transaction_date) ?></td>
                                                                    <td><?= h($payments->gepg_receipt) ?></td>
                                                                    <td><?= h($payments->control_number) ?></td>
                                                                    <td><?= h($payments->bill_amount) ?></td>
                                                                    <td><?= h($payments->paid_amount) ?></td>
                                                                    <td><?= h($payments->bill_payment_option) ?></td>
                                                                    <td><?= h($payments->currency) ?></td>
                                                                    <td><?= h($payments->created) ?></td>
                                                                    <td><?= h($payments->modified) ?></td>
                                                                    <td><?= h($payments->payment_channel) ?></td>
                                                                    <td><?= h($payments->payer_mobile) ?></td>
                                                                    <td><?= h($payments->payer_email) ?></td>
                                                                    <td><?= h($payments->provider_receipt) ?></td>
                                                                    <td><?= h($payments->provider_name) ?></td>
                                                                    <td><?= h($payments->credited_account) ?></td>
                                                                    <td><?= h($payments->bill_id) ?></td>
                                                                    <td><?= h($payments->is_consumed) ?></td>
                                                                                                <td class="actions">
                                    <?= $this->Acl->link(__('View'), ['controller' => 'Payments',
                                    'action'
                                    =>
                                    'view', $payments->id]) ?>
                                    <?= $this->Acl->link(__('Edit'), ['controller' => 'Payments',
                                    'action'
                                    =>
                                    'edit', $payments->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Payments',
                                    'action' =>
                                    'delete', $payments->id], ['confirm' => __('Are you sure you want to delete #
                                    {0}?', $payments->id)]) ?>
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
