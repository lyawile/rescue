<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CollectionCategory[]|\Cake\Collection\CollectionInterface $collectionCategories
 */
?>
<div class="collectionCategories index large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Collection Categories') ?>
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
                                                    <th scope="col"><?= $this->Paginator->sort('gsfcode') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('detail') ?></th>
                                                <th scope="col" class="actions pull-right"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($collectionCategories as $collectionCategory): ?>
                    <tr>
                                                                                                                                                                                                                <td><?= $this->Number->format($collectionCategory->id) ?></td>
                                                                                                                                                                                                                                                                            <td><?= h($collectionCategory->name) ?></td>
                                                                                                                                                                                                                                                                            <td><?= h($collectionCategory->gsfcode) ?></td>
                                                                                                                                                                                                                                                                            <td><?= h($collectionCategory->detail) ?></td>
                                                                                                                                    <td class="actions pull-right">
                            <?= $this->Html->link('', ['action' => 'view', $collectionCategory->id], ['class' => 'btn btn-xs fa fa-eye']) ?>
                            <?= $this->Html->link('', ['action' => 'edit', $collectionCategory->id], ['class' => 'btn btn-xs fa fa-pencil-square-o']) ?>
                            <?= $this->Form->postLink('', ['action' => 'delete', $collectionCategory->id], ['confirm' =>
                            __('Are you sure you want to delete # {0}?', $collectionCategory->id), 'class' => 'btn btn-xs fa fa-trash', 'style' => 'color: red']) ?>
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
