<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Practical $practical
 */
?>

<div class="practicals view large-9 medium-8 columns content">
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
        <div class="box">
            <div class="box-header with-border">
                <h4 class="pull-left"><?= h($practical->id) ?></h4>
                <div class="btn-group pull-right">
                    <?= $this->Html->link(__('New Practical'), ['action' => 'add'], ['class' => 'btn btn
                    btn-default']) ?>
                    <?= $this->Html->link(__('Edit Practical'), ['action' => 'edit', $practical->id],
                    ['class' => 'btn btn-default']) ?>
                    <?= $this->Form->postLink(__('Delete Practical'), ['action' => 'delete', $practical->id
                    ],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $practical->id), 'class' => 'btn
                    btn-danger']) ?>
                </div>
            </div>
            <!-- Default box -->
            <div class="box-body">
                <table class="vertical-table table table table-striped">
                                                                                                                                        <tr>
                                    <th scope="row"><?= __('Subject') ?></th>
                                    <td><?= $practical->has('subject') ?
                                        $this->Html->link($practical
                                        ->subject->name, ['controller' =>
                                        'Subjects', 'action' => 'view', $practical
                                        ->subject
                                        ->id]) : '' ?>
                                    </td>
                                </tr>
                                                                                                                                                <tr>
                                    <th scope="row"><?= __('Centre') ?></th>
                                    <td><?= $practical->has('centre') ?
                                        $this->Html->link($practical
                                        ->centre->name, ['controller' =>
                                        'Centres', 'action' => 'view', $practical
                                        ->centre
                                        ->id]) : '' ?>
                                    </td>
                                </tr>
                                                                                                                                                                    <tr>
                                <th scope="row"><?= __('Id') ?></th>
                                <td><?= $this->Number->format($practical->id) ?></td>
                            </tr>
                                                    <tr>
                                <th scope="row"><?= __('Practical Type') ?></th>
                                <td><?= $this->Number->format($practical->practical_type) ?></td>
                            </tr>
                                                    <tr>
                                <th scope="row"><?= __('Group A') ?></th>
                                <td><?= $this->Number->format($practical->group_A) ?></td>
                            </tr>
                                                    <tr>
                                <th scope="row"><?= __('Group B') ?></th>
                                <td><?= $this->Number->format($practical->group_B) ?></td>
                            </tr>
                                                    <tr>
                                <th scope="row"><?= __('Group C') ?></th>
                                <td><?= $this->Number->format($practical->group_C) ?></td>
                            </tr>
                                                    <tr>
                                <th scope="row"><?= __('Total') ?></th>
                                <td><?= $this->Number->format($practical->total) ?></td>
                            </tr>
                                                                                                    </table>
                                                            </div>
        </div>
    </section>
</div>
