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
            <small></small>
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
                <div class="btn-group pull-right">
                    <?= $this->Acl->link(__('New Notification'), ['action' => 'add'], ['class' => 'btn btn
                    btn-default']) ?>
                    <?= $this->Acl->link(__('Edit Notification'), ['action' => 'edit', $notification->id],
                        ['class' => 'btn btn-default']) ?>
                    <?= $this->Acl->postLink(__('Delete Notification'), ['action' => 'delete', $notification->id
                    ],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $notification->id), 'class' => 'btn
                    btn-danger']) ?>
                </div>
            </div>
            <!-- Default box -->
            <div class="box-body notification-container">

                <div class="notification-header">
                    <h4 class="pull-left"><?= h($notification->title) ?></h4>
                    <span class="text-muted pull-right notification-time"><i class="fa fa-clock-o"></i> <?= h($notification->created) ?></span>
                </div>

                <div class="notification-body"><?= $notification->body ?></div>
            </div>
        </div>
    </section>
</div>
