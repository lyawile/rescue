<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CollectionCategory $collectionCategory
 */
?>

<div class="collectionCategories view large-9 medium-8 columns content">
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
        <div class="box">
            <div class="box-header with-border">
                <h4 class="pull-left"><?= h($collectionCategory->name) ?></h4>
                <div class="btn-group pull-right">
                    <?= $this->Html->link(__('New Collection Category'), ['action' => 'add'], ['class' => 'btn btn
                    btn-default']) ?>
                    <?= $this->Html->link(__('Edit Collection Category'), ['action' => 'edit', $collectionCategory->id],
                    ['class' => 'btn btn-default']) ?>
                    <?= $this->Form->postLink(__('Delete Collection Category'), ['action' => 'delete', $collectionCategory->id
                    ],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $collectionCategory->id), 'class' => 'btn
                    btn-danger']) ?>
                </div>
            </div>
            <!-- Default box -->
            <div class="box-body">
                <table class="vertical-table table table table-striped">
                                                                                                        <tr>
                                    <th scope="row"><?= __('Name') ?></th>
                                    <td><?= h($collectionCategory->name) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Gsfcode') ?></th>
                                    <td><?= h($collectionCategory->gsfcode) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Detail') ?></th>
                                    <td><?= h($collectionCategory->detail) ?></td>
                                </tr>
                                                                                                                                                                    <tr>
                                <th scope="row"><?= __('Id') ?></th>
                                <td><?= $this->Number->format($collectionCategory->id) ?></td>
                            </tr>
                                                                                                    </table>
                                                            </div>
        </div>
    </section>
</div>
