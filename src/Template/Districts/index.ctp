<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\District[]|\Cake\Collection\CollectionInterface $districts
 */
?>
<div class="districts index large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Districts') ?>
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
                    <?= $this->Acl->link(__('New District'), ['action' => 'add'], ['class' => 'btn btn btn-success']) ?>
                </div>
            </div>
            <div class="box-body">
                <table cellpadding="0" cellspacing="0" class="table table table-striped">
                    <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('number') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('detail') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('region_id') ?></th>
                        <th scope="col" class="actions pull-right"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($districts as $district): ?>
                        <tr>
                            <td><?= $this->Number->format($district->number) ?></td>
                            <td><?= h($district->name) ?></td>
                            <td><?= h($district->detail) ?></td>
                            <td><?= $district->has('region') ?
                                    $this->Acl->link($district
                                        ->region->name, ['controller' =>
                                        'Regions', 'action' => 'view', $district
                                        ->region
                                        ->id]) : '' ?>
                            </td>
                            <td class="actions pull-right">
                                <?= $this->Acl->link('', ['action' => 'view', $district->id], ['class' => 'btn btn-xs fa fa-eye', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => __('View')]) ?>
                                <?= $this->Acl->link('', ['action' => 'edit', $district->id], ['class' => 'btn btn-xs fa fa-pencil-square-o', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => __('Edit')]) ?>
                                <?= $this->Acl->postLink('', ['action' => 'delete', $district->id], ['confirm' =>
                                    __('Are you sure you want to delete # {0}?', $district->id), 'class' => 'btn btn-xs fa fa-trash', 'style' => 'color: red', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => __('Delete')]) ?>
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
                <p class="pull-right"
                   style="margin-top: 5px; margin-right: 16px;"><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}},
                    showing {{current}} record(s) out of {{count}} total')]) ?></p>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    </section>
</div>
