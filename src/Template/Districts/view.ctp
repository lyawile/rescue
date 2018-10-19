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
                                                                                                            <div class="related">
                        <h4><?= __('Related Centres') ?></h4>
                        <?php if (!empty($district->centres)): ?>
                        <table cellpadding="0" cellspacing="0" class="table table table-striped">
                            <tr>
                                                                    <th scope="col"><?= __('Id') ?></th>
                                                                    <th scope="col"><?= __('Number') ?></th>
                                                                    <th scope="col"><?= __('Name') ?></th>
                                                                    <th scope="col"><?= __('Ownership') ?></th>
                                                                    <th scope="col"><?= __('Detail') ?></th>
                                                                    <th scope="col"><?= __('Principal Name') ?></th>
                                                                    <th scope="col"><?= __('Principal Phone') ?></th>
                                                                    <th scope="col"><?= __('Contact One') ?></th>
                                                                    <th scope="col"><?= __('Contact Two') ?></th>
                                                                    <th scope="col"><?= __('District Distance') ?></th>
                                                                    <th scope="col"><?= __('Centre Type') ?></th>
                                                                    <th scope="col"><?= __('District Id') ?></th>
                                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($district->centres as $centres): ?>
                            <tr>
                                                                    <td><?= h($centres->id) ?></td>
                                                                    <td><?= h($centres->number) ?></td>
                                                                    <td><?= h($centres->name) ?></td>
                                                                    <td><?= h($centres->ownership) ?></td>
                                                                    <td><?= h($centres->detail) ?></td>
                                                                    <td><?= h($centres->principal_name) ?></td>
                                                                    <td><?= h($centres->principal_phone) ?></td>
                                                                    <td><?= h($centres->contact_one) ?></td>
                                                                    <td><?= h($centres->contact_two) ?></td>
                                                                    <td><?= h($centres->district_distance) ?></td>
                                                                    <td><?= h($centres->centre_type) ?></td>
                                                                    <td><?= h($centres->district_id) ?></td>
                                                                                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Centres',
                                    'action'
                                    =>
                                    'view', $centres->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Centres',
                                    'action'
                                    =>
                                    'edit', $centres->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Centres',
                                    'action' =>
                                    'delete', $centres->id], ['confirm' => __('Are you sure you want to delete #
                                    {0}?', $centres->id)]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                        <?php endif; ?>
                    </div>
                                                                            <div class="related">
                        <h4><?= __('Related Group District Region School Users') ?></h4>
                        <?php if (!empty($district->group_district_region_school_users)): ?>
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
                            <?php foreach ($district->group_district_region_school_users as $groupDistrictRegionSchoolUsers): ?>
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
