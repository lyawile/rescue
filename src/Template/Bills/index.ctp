<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bill[]|\Cake\Collection\CollectionInterface $bills
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

        <!-- Default box -->
        <div class="box with-border">
            <div class="box-body">
                <table cellpadding="0" cellspacing="0" class="table table table-striped">
                    <thead>
                    <tr>
                                                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('reference') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('amount') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('equivalent_amount') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('misc_amount') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('expire_date') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('generated_date') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('payer_idx') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('payer_name') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('payer_mobile') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('payer_email') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('has_reminder') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('control_number') ?></th>
                                                <th scope="col" class="actions pull-right"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($bills as $bill): ?>
                    <tr>
                                                                                                                                                                                                                <td><?= $this->Number->format($bill->id) ?></td>
                                                                                                                                                                                                                                                                            <td><?= h($bill->reference) ?></td>
                                                                                                                                                                                                                                                                            <td><?= $this->Number->format($bill->amount) ?></td>
                                                                                                                                                                                                                                                                            <td><?= $this->Number->format($bill->equivalent_amount) ?></td>
                                                                                                                                                                                                                                                                            <td><?= $this->Number->format($bill->misc_amount) ?></td>
                                                                                                                                                                                                                                                                            <td><?= h($bill->expire_date) ?></td>
                                                                                                                                                                                                                                                                            <td><?= h($bill->generated_date) ?></td>
                                                                                                                                                                                                                                                                            <td><?= $this->Number->format($bill->payer_idx) ?></td>
                                                                                                                                                                                                                                                                            <td><?= h($bill->payer_name) ?></td>
                                                                                                                                                                                                                                                                            <td><?= h($bill->payer_mobile) ?></td>
                                                                                                                                                                                                                                                                            <td><?= h($bill->payer_email) ?></td>
                                                                                                                                                                                                                                                                            <td><?= $this->Number->format($bill->has_reminder) ?></td>
                                                                                                                                                                                                                                                                            <td><?= h($bill->control_number) ?></td>
                                                                                                                                    <td class="actions pull-right">
                            <?= $this->Html->link('', ['action' => 'view', $bill->id], ['class' => 'btn btn-xs fa fa-eye']) ?>
                            <?= $this->Html->link('', ['action' => 'edit', $bill->id], ['class' => 'btn btn-xs fa fa-pencil-square-o']) ?>
                            <?= $this->Form->postLink('', ['action' => 'delete', $bill->id], ['confirm' =>
                            __('Are you sure you want to delete # {0}?', $bill->id), 'class' => 'btn btn-xs fa fa-trash', 'style' => 'color: red']) ?>
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
