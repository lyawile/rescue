<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Notification $notification
 */
?>

<div class="notifications view large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Notifications') ?>
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
                <h4 class="pull-left"><?= h($notification->title) ?></h4>
                <div class="btn-group pull-right">
                    <?= $this->Html->link(__('New Notification'), ['action' => 'add'], ['class' => 'btn btn
                    btn-default']) ?>
                    <?= $this->Html->link(__('Edit Notification'), ['action' => 'edit', $notification->id],
                    ['class' => 'btn btn-default']) ?>
                    <?= $this->Form->postLink(__('Delete Notification'), ['action' => 'delete', $notification->id
                    ],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $notification->id), 'class' => 'btn
                    btn-danger']) ?>
                </div>
            </div>
            <!-- Default box -->
            <div class="box-body">
                <table class="vertical-table table table table-striped">
                                                                                                        <tr>
                                    <th scope="row"><?= __('Title') ?></th>
                                    <td><?= h($notification->title) ?></td>
                                </tr>
                                                                                                                                                                    <tr>
                                <th scope="row"><?= __('Id') ?></th>
                                <td><?= $this->Number->format($notification->id) ?></td>
                            </tr>
                                                                                                                    <tr>
                                <th scope="row"><?= __('Created') ?></th>
                                <td><?= h($notification->created) ?></td>
                            </tr>
                                                                                </table>
                                                            <div class="row">
                            <h4><?= __('Body') ?></h4>
                            <?= $this->Text->autoParagraph(h($notification->body)); ?>
                        </div>
                                                                                                                                <div class="related">
                        <h4><?= __('Related Users') ?></h4>
                        <?php if (!empty($notification->users)): ?>
                        <table cellpadding="0" cellspacing="0" class="table table table-striped">
                            <tr>
                                                                    <th scope="col"><?= __('Id') ?></th>
                                                                    <th scope="col"><?= __('First Name') ?></th>
                                                                    <th scope="col"><?= __('Other Name') ?></th>
                                                                    <th scope="col"><?= __('Surname') ?></th>
                                                                    <th scope="col"><?= __('Username') ?></th>
                                                                    <th scope="col"><?= __('Password') ?></th>
                                                                    <th scope="col"><?= __('Email') ?></th>
                                                                    <th scope="col"><?= __('Mobile') ?></th>
                                                                    <th scope="col"><?= __('Group Id') ?></th>
                                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($notification->users as $users): ?>
                            <tr>
                                                                    <td><?= h($users->id) ?></td>
                                                                    <td><?= h($users->first_name) ?></td>
                                                                    <td><?= h($users->other_name) ?></td>
                                                                    <td><?= h($users->surname) ?></td>
                                                                    <td><?= h($users->username) ?></td>
                                                                    <td><?= h($users->password) ?></td>
                                                                    <td><?= h($users->email) ?></td>
                                                                    <td><?= h($users->mobile) ?></td>
                                                                    <td><?= h($users->group_id) ?></td>
                                                                                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Users',
                                    'action'
                                    =>
                                    'view', $users->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users',
                                    'action'
                                    =>
                                    'edit', $users->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users',
                                    'action' =>
                                    'delete', $users->id], ['confirm' => __('Are you sure you want to delete #
                                    {0}?', $users->id)]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                        <?php endif; ?>
                    </div>
                            </div>
        </div>
    </section>
</div>
