<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExamType[]|\Cake\Collection\CollectionInterface $examTypes
 */
?>
<div class="examTypes index large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Exam Types') ?>
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
                    <?= $this->Html->link(__('New Exam Type'), ['action' => 'add'], ['class' => 'btn btn btn-success']) ?>
                </div>
            </div>
            <div class="box-body">
                <table cellpadding="0" cellspacing="0" class="table table table-striped">
                    <thead>
                    <tr>
                                                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('code') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('short_name') ?></th>
                                                <th scope="col" class="actions pull-right"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($examTypes as $examType): ?>
                    <tr>
                                                                                                                                                                                                                <td><?= $this->Number->format($examType->id) ?></td>
                                                                                                                                                                                                                                                                            <td><?= $this->Number->format($examType->code) ?></td>
                                                                                                                                                                                                                                                                            <td><?= h($examType->name) ?></td>
                                                                                                                                                                                                                                                                            <td><?= h($examType->short_name) ?></td>
                                                                                                                                    <td class="actions pull-right">
                            <?= $this->Html->link('', ['action' => 'view', $examType->id], ['class' => 'btn btn-xs fa fa-eye']) ?>
                            <?= $this->Html->link('', ['action' => 'edit', $examType->id], ['class' => 'btn btn-xs fa fa-pencil-square-o']) ?>
                            <?= $this->Form->postLink('', ['action' => 'delete', $examType->id], ['confirm' =>
                            __('Are you sure you want to delete # {0}?', $examType->id), 'class' => 'btn btn-xs fa fa-trash', 'style' => 'color: red']) ?>
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
