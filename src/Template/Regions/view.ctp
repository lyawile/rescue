<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Region $region
 */
?>

<div class="regions view large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Regions') ?>
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
                <h4 class="pull-left"><?= h($region->name) ?></h4>
                <div class="btn-group pull-right">
                    <?= $this->Html->link(__('New Region'), ['action' => 'add'], ['class' => 'btn btn
                    btn-default']) ?>
                    <?= $this->Html->link(__('Edit Region'), ['action' => 'edit', $region->id],
                    ['class' => 'btn btn-default']) ?>
                    <?= $this->Form->postLink(__('Delete Region'), ['action' => 'delete', $region->id
                    ],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $region->id), 'class' => 'btn
                    btn-danger']) ?>
                </div>
            </div>
            <!-- Default box -->
            <div class="box-body">
                <table class="vertical-table table table table-striped">
                                                                                                        <tr>
                                    <th scope="row"><?= __('Name') ?></th>
                                    <td><?= h($region->name) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Detail') ?></th>
                                    <td><?= h($region->detail) ?></td>
                                </tr>
                                                                                                                                                                    <tr>
                                <th scope="row"><?= __('Id') ?></th>
                                <td><?= $this->Number->format($region->id) ?></td>
                            </tr>
                                                    <tr>
                                <th scope="row"><?= __('Number') ?></th>
                                <td><?= $this->Number->format($region->number) ?></td>
                            </tr>
                                                                                                    </table>
                                                            </div>
        </div>
    </section>
</div>
