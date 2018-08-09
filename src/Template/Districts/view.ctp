<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\District $district
 */
?>

<div class="districts view large-9 medium-8 columns content">
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
        <div class="box">
            <div class="box-header with-border">
                <h4 class="pull-left"><?= h($district->name) ?></h4>
                <div class="btn-group pull-right">
                    <?= $this->Html->link(__('New District'), ['action' => 'add'], ['class' => 'btn btn
                    btn-default']) ?>
                    <?= $this->Html->link(__('Edit District'), ['action' => 'edit', $district->id],
                    ['class' => 'btn btn-default']) ?>
                    <?= $this->Form->postLink(__('Delete District'), ['action' => 'delete', $district->id
                    ],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $district->id), 'class' => 'btn
                    btn-danger']) ?>
                </div>
            </div>
            <!-- Default box -->
            <div class="box-body">
                <table class="vertical-table table table table-striped">
                                                                                                        <tr>
                                    <th scope="row"><?= __('Name') ?></th>
                                    <td><?= h($district->name) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Detail') ?></th>
                                    <td><?= h($district->detail) ?></td>
                                </tr>
                                                                                                                                                <tr>
                                    <th scope="row"><?= __('Region') ?></th>
                                    <td><?= $district->has('region') ?
                                        $this->Html->link($district
                                        ->region->name, ['controller' =>
                                        'Regions', 'action' => 'view', $district
                                        ->region
                                        ->id]) : '' ?>
                                    </td>
                                </tr>
                                                                                                                                                                    <tr>
                                <th scope="row"><?= __('Id') ?></th>
                                <td><?= $this->Number->format($district->id) ?></td>
                            </tr>
                                                    <tr>
                                <th scope="row"><?= __('Number') ?></th>
                                <td><?= $this->Number->format($district->number) ?></td>
                            </tr>
                                                                                                    </table>
                                                            </div>
        </div>
    </section>
</div>
