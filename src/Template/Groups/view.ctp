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
                                                                                                            <div class="related">
                        <h4><?= __('Related Group District Region School Users') ?></h4>
                        <?php if (!empty($group->group_district_region_school_users)): ?>
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
                            <?php foreach ($group->group_district_region_school_users as $groupDistrictRegionSchoolUsers): ?>
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
                                                                            <div class="related">
                        <h4><?= __('Related Users') ?></h4>
                        <?php if (!empty($group->users)): ?>
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
                            <?php foreach ($group->users as $users): ?>
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
