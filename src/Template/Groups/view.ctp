<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Group $group
 */
?>

<div class="groups view large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Groups') ?>
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
                <h4 class="pull-left"><?= h($group->name) ?></h4>
                <div class="btn-group pull-right">
                    <?= $this->Html->link(__('New Group'), ['action' => 'add'], ['class' => 'btn btn
                    btn-default']) ?>
                    <?= $this->Html->link(__('Edit Group'), ['action' => 'edit', $group->id],
                    ['class' => 'btn btn-default']) ?>
                    <?= $this->Form->postLink(__('Delete Group'), ['action' => 'delete', $group->id
                    ],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $group->id), 'class' => 'btn
                    btn-danger']) ?>
                </div>
            </div>
            <!-- Default box -->
            <div class="box-body">
                <table class="vertical-table table table table-striped">
                                                                                                        <tr>
                                    <th scope="row"><?= __('Name') ?></th>
                                    <td><?= h($group->name) ?></td>
                                </tr>
                                                                                                                                                                    <tr>
                                <th scope="row"><?= __('Id') ?></th>
                                <td><?= $this->Number->format($group->id) ?></td>
                            </tr>
                                                                                                    </table>
                                                            </div>
        </div>
    </section>
</div>
