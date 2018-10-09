<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Collection $collection
 */
?>

<div class="collections view large-9 medium-8 columns content">
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
        <div class="box">
            <div class="box-header with-border">
                <h4 class="pull-left"><?= h($collection->name) ?></h4>
                <div class="btn-group pull-right">
                    <?= $this->Html->link(__('New Collection'), ['action' => 'add'], ['class' => 'btn btn
                    btn-default']) ?>
                    <?= $this->Html->link(__('Edit Collection'), ['action' => 'edit', $collection->id],
                    ['class' => 'btn btn-default']) ?>
                    <?= $this->Form->postLink(__('Delete Collection'), ['action' => 'delete', $collection->id
                    ],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $collection->id), 'class' => 'btn
                    btn-danger']) ?>
                </div>
            </div>
            <!-- Default box -->
            <div class="box-body">
                <table class="vertical-table table table table-striped">
                                                                                                        <tr>
                                    <th scope="row"><?= __('Name') ?></th>
                                    <td><?= h($collection->name) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Description') ?></th>
                                    <td><?= h($collection->description) ?></td>
                                </tr>
                                                                                                                                                <tr>
                                    <th scope="row"><?= __('Exam Type') ?></th>
                                    <td><?= $collection->has('exam_type') ?
                                        $this->Html->link($collection
                                        ->exam_type->name, ['controller' =>
                                        'ExamTypes', 'action' => 'view', $collection
                                        ->exam_type
                                        ->id]) : '' ?>
                                    </td>
                                </tr>
                                                                                                                                                <tr>
                                    <th scope="row"><?= __('Collection Category') ?></th>
                                    <td><?= $collection->has('collection_category') ?
                                        $this->Html->link($collection
                                        ->collection_category->name, ['controller' =>
                                        'CollectionCategories', 'action' => 'view', $collection
                                        ->collection_category
                                        ->id]) : '' ?>
                                    </td>
                                </tr>
                                                                                                                                                                    <tr>
                                <th scope="row"><?= __('Id') ?></th>
                                <td><?= $this->Number->format($collection->id) ?></td>
                            </tr>
                                                    <tr>
                                <th scope="row"><?= __('Ammount') ?></th>
                                <td><?= $this->Number->format($collection->ammount) ?></td>
                            </tr>
                                                                                                                    <tr>
                                <th scope="row"><?= __('Start Date') ?></th>
                                <td><?= h($collection->start_date) ?></td>
                            </tr>
                                                    <tr>
                                <th scope="row"><?= __('End Date') ?></th>
                                <td><?= h($collection->end_date) ?></td>
                            </tr>
                                                                                </table>
                                                            </div>
        </div>
    </section>
</div>
