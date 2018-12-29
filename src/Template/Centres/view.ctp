<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Centre $centre
 */
?>

<div class="centres view large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Centres') ?>
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
                <h4 class="pull-left"><?= h($centre->name) ?></h4>
                <div class="btn-group pull-right">
                    <?= $this->Acl->link(__('New Centre'), ['action' => 'add'], ['class' => 'btn btn
                    btn-default']) ?>
                    <?= $this->Acl->link(__('Edit Centre'), ['action' => 'edit', $centre->id],
                        ['class' => 'btn btn-default']) ?>
                    <?= $this->Acl->postLink(__('Delete Centre'), ['action' => 'delete', $centre->id
                    ],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $centre->id), 'class' => 'btn
                    btn-danger']) ?>
                </div>
            </div>
            <!-- Default box -->
            <div class="box-body">
                <table class="vertical-table table table table-striped">
                    <tr>
                        <th scope="row"><?= __('Number') ?></th>
                        <td><?= h($centre->number) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Name') ?></th>
                        <td><?= h($centre->name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Ownership') ?></th>
                        <td><?= h($centre->ownership) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Detail') ?></th>
                        <td><?= h($centre->detail) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Principal Name') ?></th>
                        <td><?= h($centre->principal_name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Principal Phone') ?></th>
                        <td><?= h($centre->principal_phone) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Contact One') ?></th>
                        <td><?= h($centre->contact_one) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Contact Two') ?></th>
                        <td><?= h($centre->contact_two) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Centre Type') ?></th>
                        <td><?= h($centre->centre_type) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('District') ?></th>
                        <td><?= $centre->has('district') ?
                                $this->Acl->link($centre
                                    ->district->name, ['controller' =>
                                    'Districts', 'action' => 'view', $centre
                                    ->district
                                    ->id]) : '' ?>
                        </td>
                    </tr>
                    <tr>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('District Distance') ?></th>
                        <td><?= $this->Number->format($centre->district_distance) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </section>
</div>
