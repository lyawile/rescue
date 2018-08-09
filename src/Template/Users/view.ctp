<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="users view large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Users') ?>
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
                <h4 class="pull-left"><?= h($user->id) ?></h4>
                <div class="btn-group pull-right">
                    <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'btn btn
                    btn-default']) ?>
                    <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id],
                    ['class' => 'btn btn-default']) ?>
                    <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id
                    ],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'btn
                    btn-danger']) ?>
                </div>
            </div>
            <!-- Default box -->
            <div class="box-body">
                <table class="vertical-table table table table-striped">
                                                                                                        <tr>
                                    <th scope="row"><?= __('First Name') ?></th>
                                    <td><?= h($user->first_name) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Other Name') ?></th>
                                    <td><?= h($user->other_name) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Surname') ?></th>
                                    <td><?= h($user->surname) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Username') ?></th>
                                    <td><?= h($user->username) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Password') ?></th>
                                    <td><?= h($user->password) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Email') ?></th>
                                    <td><?= h($user->email) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Mobile') ?></th>
                                    <td><?= h($user->mobile) ?></td>
                                </tr>
                                                                                                                                                <tr>
                                    <th scope="row"><?= __('Group') ?></th>
                                    <td><?= $user->has('group') ?
                                        $this->Html->link($user
                                        ->group->name, ['controller' =>
                                        'Groups', 'action' => 'view', $user
                                        ->group
                                        ->id]) : '' ?>
                                    </td>
                                </tr>
                                                                                                                                                                    <tr>
                                <th scope="row"><?= __('Id') ?></th>
                                <td><?= $this->Number->format($user->id) ?></td>
                            </tr>
                                                                                                    </table>
                                                                                                            <div class="related">
                        <h4><?= __('Related Group District Region School Users') ?></h4>
                        <?php if (!empty($user->group_district_region_school_users)): ?>
                        <table cellpadding="0" cellspacing="0" class="table table table-striped">
                            <tr>
                                                                    <th scope="col"><?= __('Id') ?></th>
                                                                    <th scope="col"><?= __('District Id') ?></th>
                                                                    <th scope="col"><?= __('Region Id') ?></th>
                                                                    <th scope="col"><?= __('Group Id') ?></th>
                                                                    <th scope="col"><?= __('User Id') ?></th>
                                                                    <th scope="col"><?= __('Centre Id') ?></th>
                                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($user->group_district_region_school_users as $groupDistrictRegionSchoolUsers): ?>
                            <tr>
                                                                    <td><?= h($groupDistrictRegionSchoolUsers->id) ?></td>
                                                                    <td><?= h($groupDistrictRegionSchoolUsers->district_id) ?></td>
                                                                    <td><?= h($groupDistrictRegionSchoolUsers->region_id) ?></td>
                                                                    <td><?= h($groupDistrictRegionSchoolUsers->group_id) ?></td>
                                                                    <td><?= h($groupDistrictRegionSchoolUsers->user_id) ?></td>
                                                                    <td><?= h($groupDistrictRegionSchoolUsers->centre_id) ?></td>
                                                                                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'GroupDistrictRegionSchoolUsers',
                                    'action'
                                    =>
                                    'view', $groupDistrictRegionSchoolUsers->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'GroupDistrictRegionSchoolUsers',
                                    'action'
                                    =>
                                    'edit', $groupDistrictRegionSchoolUsers->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'GroupDistrictRegionSchoolUsers',
                                    'action' =>
                                    'delete', $groupDistrictRegionSchoolUsers->id], ['confirm' => __('Are you sure you want to delete #
                                    {0}?', $groupDistrictRegionSchoolUsers->id)]) ?>
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
