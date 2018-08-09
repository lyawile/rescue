<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Centre[]|\Cake\Collection\CollectionInterface $centres
 */
?>
<div class="centres index large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Centres') ?>
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
                    <?= $this->Html->link(__('New Centre'), ['action' => 'add'], ['class' => 'btn btn btn-success']) ?>
                </div>
            </div>
            <div class="box-body">
                <table cellpadding="0" cellspacing="0" class="table table table-striped">
                    <thead>
                    <tr>
                                                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('number') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('ownership') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('detail') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('principal_name') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('principal_phone') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('contact_one') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('contact_two') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('district_distance') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('centre_type') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('district_id') ?></th>
                                                <th scope="col" class="actions pull-right"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($centres as $centre): ?>
                    <tr>
                                                                                                                                                                                                                                                                            <td><?= $this->Number->format($centre->id) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= h($centre->number) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= h($centre->name) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= h($centre->ownership) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= h($centre->detail) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= h($centre->principal_name) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= h($centre->principal_phone) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= h($centre->contact_one) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= h($centre->contact_two) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= $this->Number->format($centre->district_distance) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= h($centre->centre_type) ?></td>
                                                                                                                                                                                                                                                    <td><?= $centre->has('district') ?
                                        $this->Html->link($centre
                                        ->district->name, ['controller' =>
                                        'Districts', 'action' => 'view', $centre
                                        ->district
                                        ->id]) : '' ?>
                                    </td>
                                                                                                                                                                <td class="actions pull-right">
                            <?= $this->Html->link('', ['action' => 'view', $centre->id], ['class' => 'btn btn-xs fa fa-eye', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => __('View')]) ?>
                            <?= $this->Html->link('', ['action' => 'edit', $centre->id], ['class' => 'btn btn-xs fa fa-pencil-square-o', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => __('Edit')]) ?>
                            <?= $this->Form->postLink('', ['action' => 'delete', $centre->id], ['confirm' =>
                            __('Are you sure you want to delete # {0}?', $centre->id), 'class' => 'btn btn-xs fa fa-trash', 'style' => 'color: red', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => __('Delete')]) ?>
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
