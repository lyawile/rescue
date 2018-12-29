<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CentreExamType[]|\Cake\Collection\CollectionInterface $centreExamTypes
 */
?>
<div class="centreExamTypes index large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Centre Exam Types') ?>
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
                    <?= $this->Acl->link(__('New Centre Exam Type'), ['action' => 'add'], ['class' => 'btn btn btn-success']) ?>
                </div>
            </div>
            <div class="box-body">
                <table cellpadding="0" cellspacing="0" class="table table table-striped">
                    <thead>
                    <tr>
                                                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('exam_type_id') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('centre_id') ?></th>
                                                <th scope="col" class="actions pull-right"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($centreExamTypes as $centreExamType): ?>
                    <tr>
                                                                                                                                                                                                                                                                            <td><?= $this->Number->format($centreExamType->id) ?></td>
                                                                                                                                                                                                                                                    <td><?= $centreExamType->has('exam_type') ?
                                        $this->Acl->link($centreExamType
                                        ->exam_type->name, ['controller' =>
                                        'ExamTypes', 'action' => 'view', $centreExamType
                                        ->exam_type
                                        ->id]) : '' ?>
                                    </td>
                                                                                                                                                                                                                                                                                <td><?= $centreExamType->has('centre') ?
                                        $this->Acl->link($centreExamType
                                        ->centre->name, ['controller' =>
                                        'Centres', 'action' => 'view', $centreExamType
                                        ->centre
                                        ->id]) : '' ?>
                                    </td>
                                                                                                                                                                <td class="actions pull-right">
                            <?= $this->Acl->link('', ['action' => 'view', $centreExamType->id], ['class' => 'btn btn-xs fa fa-eye', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => __('View')]) ?>
                            <?= $this->Acl->link('', ['action' => 'edit', $centreExamType->id], ['class' => 'btn btn-xs fa fa-pencil-square-o', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => __('Edit')]) ?>
                            <?= $this->Form->postLink('', ['action' => 'delete', $centreExamType->id], ['confirm' =>
                            __('Are you sure you want to delete # {0}?', $centreExamType->id), 'class' => 'btn btn-xs fa fa-trash', 'style' => 'color: red', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => __('Delete')]) ?>
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
