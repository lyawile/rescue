<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Collection[]|\Cake\Collection\CollectionInterface $collections
 */
?>
<div class="collections index large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Collections') ?>
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
                                                    <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('end_date') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('ammount') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('exam_type_id') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('collection_categorie_id') ?></th>
                                                <th scope="col" class="actions pull-right"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($collections as $collection): ?>
                    <tr>
                                                                                                                                                                                                                                                                            <td><?= $this->Number->format($collection->id) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= h($collection->name) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= h($collection->description) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= h($collection->start_date) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= h($collection->end_date) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= $this->Number->format($collection->ammount) ?></td>
                                                                                                                                                                                                                                                    <td><?= $collection->has('exam_type') ?
                                        $this->Html->link($collection
                                        ->exam_type->name, ['controller' =>
                                        'ExamTypes', 'action' => 'view', $collection
                                        ->exam_type
                                        ->id]) : '' ?>
                                    </td>
                                                                                                                                                                                                                                                                                <td><?= $collection->has('collection_category') ?
                                        $this->Html->link($collection
                                        ->collection_category->name, ['controller' =>
                                        'CollectionCategories', 'action' => 'view', $collection
                                        ->collection_category
                                        ->id]) : '' ?>
                                    </td>
                                                                                                                                                                <td class="actions pull-right">
                            <?= $this->Html->link('', ['action' => 'view', $collection->id], ['class' => 'btn btn-xs fa fa-eye']) ?>
                            <?= $this->Html->link('', ['action' => 'edit', $collection->id], ['class' => 'btn btn-xs fa fa-pencil-square-o']) ?>
                            <?= $this->Form->postLink('', ['action' => 'delete', $collection->id], ['confirm' =>
                            __('Are you sure you want to delete # {0}?', $collection->id), 'class' => 'btn btn-xs fa fa-trash', 'style' => 'color: red']) ?>
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
