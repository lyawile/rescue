<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BillItemCandidate[]|\Cake\Collection\CollectionInterface $billItemCandidates
 */
?>
<div class="billItemCandidates index large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Bill Item Candidates') ?>
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
                    <?= $this->Html->link(__('New Bill Item Candidate'), ['action' => 'add'], ['class' => 'btn btn btn-success']) ?>
                </div>
            </div>
            <div class="box-body">
                <table cellpadding="0" cellspacing="0" class="table table table-striped">
                    <thead>
                    <tr>
                                                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('candidate_id') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('bill_item_id') ?></th>
                                                <th scope="col" class="actions pull-right"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($billItemCandidates as $billItemCandidate): ?>
                    <tr>
                                                                                                                                                                                                                                                                            <td><?= $this->Number->format($billItemCandidate->id) ?></td>
                                                                                                                                                                                                                                                    <td><?= $billItemCandidate->has('candidate') ?
                                        $this->Html->link($billItemCandidate
                                        ->candidate->id, ['controller' =>
                                        'Candidates', 'action' => 'view', $billItemCandidate
                                        ->candidate
                                        ->id]) : '' ?>
                                    </td>
                                                                                                                                                                                                                                                                                <td><?= $billItemCandidate->has('bill_item') ?
                                        $this->Html->link($billItemCandidate
                                        ->bill_item->id, ['controller' =>
                                        'BillItems', 'action' => 'view', $billItemCandidate
                                        ->bill_item
                                        ->id]) : '' ?>
                                    </td>
                                                                                                                                                                <td class="actions pull-right">
                            <?= $this->Html->link('', ['action' => 'view', $billItemCandidate->id], ['class' => 'btn btn-xs fa fa-eye', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => __('View')]) ?>
                            <?= $this->Html->link('', ['action' => 'edit', $billItemCandidate->id], ['class' => 'btn btn-xs fa fa-pencil-square-o', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => __('Edit')]) ?>
                            <?= $this->Form->postLink('', ['action' => 'delete', $billItemCandidate->id], ['confirm' =>
                            __('Are you sure you want to delete # {0}?', $billItemCandidate->id), 'class' => 'btn btn-xs fa fa-trash', 'style' => 'color: red', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => __('Delete')]) ?>
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
