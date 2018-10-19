<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Practical[]|\Cake\Collection\CollectionInterface $practicals
 */
?>
<div class="practicals index large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Practicals') ?>
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
                    <?= $this->Html->link(__('New Practical'), ['action' => 'add'], ['class' => 'btn btn btn-success']) ?>
                </div>
            </div>
            <div class="box-body">
                <table cellpadding="0" cellspacing="0" class="table table table-striped">
                    <thead>
                    <tr>
                                                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('practical_type') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('group_A') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('group_B') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('group_C') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('total') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('subject_id') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('centre_id') ?></th>
                                                <th scope="col" class="actions pull-right"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($practicals as $practical): ?>
                    <tr>
                                                                                                                                                                                                                                                                            <td><?= $this->Number->format($practical->id) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= $this->Number->format($practical->practical_type) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= $this->Number->format($practical->group_A) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= $this->Number->format($practical->group_B) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= $this->Number->format($practical->group_C) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= $this->Number->format($practical->total) ?></td>
                                                                                                                                                                                                                                                    <td><?= $practical->has('subject') ?
                                        $this->Html->link($practical
                                        ->subject->name, ['controller' =>
                                        'Subjects', 'action' => 'view', $practical
                                        ->subject
                                        ->id]) : '' ?>
                                    </td>
                                                                                                                                                                                                                                                                                <td><?= $practical->has('centre') ?
                                        $this->Html->link($practical
                                        ->centre->name, ['controller' =>
                                        'Centres', 'action' => 'view', $practical
                                        ->centre
                                        ->id]) : '' ?>
                                    </td>
                                                                                                                                                                <td class="actions pull-right">
                            <?= $this->Html->link('', ['action' => 'view', $practical->id], ['class' => 'btn btn-xs fa fa-eye', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => __('View')]) ?>
                            <?= $this->Html->link('', ['action' => 'edit', $practical->id], ['class' => 'btn btn-xs fa fa-pencil-square-o', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => __('Edit')]) ?>
                            <?= $this->Form->postLink('', ['action' => 'delete', $practical->id], ['confirm' =>
                            __('Are you sure you want to delete # {0}?', $practical->id), 'class' => 'btn btn-xs fa fa-trash', 'style' => 'color: red', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => __('Delete')]) ?>
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
