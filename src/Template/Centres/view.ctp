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
                <h4 class="pull-left"><?= h($centre->name) ?></h4>
                <div class="btn-group pull-right">
                    <?= $this->Html->link(__('New Centre'), ['action' => 'add'], ['class' => 'btn btn
                    btn-default']) ?>
                    <?= $this->Html->link(__('Edit Centre'), ['action' => 'edit', $centre->id],
                    ['class' => 'btn btn-default']) ?>
                    <?= $this->Form->postLink(__('Delete Centre'), ['action' => 'delete', $centre->id
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
                                        $this->Html->link($centre
                                        ->district->name, ['controller' =>
                                        'Districts', 'action' => 'view', $centre
                                        ->district
                                        ->id]) : '' ?>
                                    </td>
                                </tr>
                                                                                                                                                                    <tr>
                                <th scope="row"><?= __('Id') ?></th>
                                <td><?= $this->Number->format($centre->id) ?></td>
                            </tr>
                                                    <tr>
                                <th scope="row"><?= __('District Distance') ?></th>
                                <td><?= $this->Number->format($centre->district_distance) ?></td>
                            </tr>
                                                                                                    </table>
                                                                                                            <div class="related">
                        <h4><?= __('Related Candidates') ?></h4>
                        <?php if (!empty($centre->candidates)): ?>
                        <table cellpadding="0" cellspacing="0" class="table table table-striped">
                            <tr>
                                                                    <th scope="col"><?= __('Id') ?></th>
                                                                    <th scope="col"><?= __('Number') ?></th>
                                                                    <th scope="col"><?= __('First Name') ?></th>
                                                                    <th scope="col"><?= __('Other Name') ?></th>
                                                                    <th scope="col"><?= __('Surname') ?></th>
                                                                    <th scope="col"><?= __('Sex') ?></th>
                                                                    <th scope="col"><?= __('PSLE Number') ?></th>
                                                                    <th scope="col"><?= __('PSLE Year') ?></th>
                                                                    <th scope="col"><?= __('ID Number') ?></th>
                                                                    <th scope="col"><?= __('Date Of Birth') ?></th>
                                                                    <th scope="col"><?= __('Guardian Phone') ?></th>
                                                                    <th scope="col"><?= __('Work Experience') ?></th>
                                                                    <th scope="col"><?= __('Combination') ?></th>
                                                                    <th scope="col"><?= __('Is Repeater') ?></th>
                                                                    <th scope="col"><?= __('Exam Type Id') ?></th>
                                                                    <th scope="col"><?= __('Centre Id') ?></th>
                                                                    <th scope="col"><?= __('Billhash') ?></th>
                                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($centre->candidates as $candidates): ?>
                            <tr>
                                                                    <td><?= h($candidates->id) ?></td>
                                                                    <td><?= h($candidates->number) ?></td>
                                                                    <td><?= h($candidates->first_name) ?></td>
                                                                    <td><?= h($candidates->other_name) ?></td>
                                                                    <td><?= h($candidates->surname) ?></td>
                                                                    <td><?= h($candidates->sex) ?></td>
                                                                    <td><?= h($candidates->PSLE_number) ?></td>
                                                                    <td><?= h($candidates->PSLE_year) ?></td>
                                                                    <td><?= h($candidates->ID_number) ?></td>
                                                                    <td><?= h($candidates->date_of_birth) ?></td>
                                                                    <td><?= h($candidates->guardian_phone) ?></td>
                                                                    <td><?= h($candidates->work_experience) ?></td>
                                                                    <td><?= h($candidates->combination) ?></td>
                                                                    <td><?= h($candidates->is_repeater) ?></td>
                                                                    <td><?= h($candidates->exam_type_id) ?></td>
                                                                    <td><?= h($candidates->centre_id) ?></td>
                                                                    <td><?= h($candidates->billhash) ?></td>
                                                                                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Candidates',
                                    'action'
                                    =>
                                    'view', $candidates->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Candidates',
                                    'action'
                                    =>
                                    'edit', $candidates->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Candidates',
                                    'action' =>
                                    'delete', $candidates->id], ['confirm' => __('Are you sure you want to delete #
                                    {0}?', $candidates->id)]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                        <?php endif; ?>
                    </div>
                                                                            <div class="related">
                        <h4><?= __('Related Disqualified Candidates') ?></h4>
                        <?php if (!empty($centre->disqualified_candidates)): ?>
                        <table cellpadding="0" cellspacing="0" class="table table table-striped">
                            <tr>
                                                                    <th scope="col"><?= __('Id') ?></th>
                                                                    <th scope="col"><?= __('Number') ?></th>
                                                                    <th scope="col"><?= __('First Name') ?></th>
                                                                    <th scope="col"><?= __('Other Name') ?></th>
                                                                    <th scope="col"><?= __('Surname') ?></th>
                                                                    <th scope="col"><?= __('Sex') ?></th>
                                                                    <th scope="col"><?= __('PSLE Number') ?></th>
                                                                    <th scope="col"><?= __('PSLE Year') ?></th>
                                                                    <th scope="col"><?= __('ID Number') ?></th>
                                                                    <th scope="col"><?= __('Date Of Birth') ?></th>
                                                                    <th scope="col"><?= __('Guardian Phone') ?></th>
                                                                    <th scope="col"><?= __('Is Repeater') ?></th>
                                                                    <th scope="col"><?= __('Exam Type Id') ?></th>
                                                                    <th scope="col"><?= __('Centre Id') ?></th>
                                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($centre->disqualified_candidates as $disqualifiedCandidates): ?>
                            <tr>
                                                                    <td><?= h($disqualifiedCandidates->id) ?></td>
                                                                    <td><?= h($disqualifiedCandidates->number) ?></td>
                                                                    <td><?= h($disqualifiedCandidates->first_name) ?></td>
                                                                    <td><?= h($disqualifiedCandidates->other_name) ?></td>
                                                                    <td><?= h($disqualifiedCandidates->surname) ?></td>
                                                                    <td><?= h($disqualifiedCandidates->sex) ?></td>
                                                                    <td><?= h($disqualifiedCandidates->PSLE_number) ?></td>
                                                                    <td><?= h($disqualifiedCandidates->PSLE_year) ?></td>
                                                                    <td><?= h($disqualifiedCandidates->ID_number) ?></td>
                                                                    <td><?= h($disqualifiedCandidates->date_of_birth) ?></td>
                                                                    <td><?= h($disqualifiedCandidates->guardian_phone) ?></td>
                                                                    <td><?= h($disqualifiedCandidates->is_repeater) ?></td>
                                                                    <td><?= h($disqualifiedCandidates->exam_type_id) ?></td>
                                                                    <td><?= h($disqualifiedCandidates->centre_id) ?></td>
                                                                                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'DisqualifiedCandidates',
                                    'action'
                                    =>
                                    'view', $disqualifiedCandidates->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'DisqualifiedCandidates',
                                    'action'
                                    =>
                                    'edit', $disqualifiedCandidates->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'DisqualifiedCandidates',
                                    'action' =>
                                    'delete', $disqualifiedCandidates->id], ['confirm' => __('Are you sure you want to delete #
                                    {0}?', $disqualifiedCandidates->id)]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                        <?php endif; ?>
                    </div>
                                                                            <div class="related">
                        <h4><?= __('Related Group District Region School Users') ?></h4>
                        <?php if (!empty($centre->group_district_region_school_users)): ?>
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
                            <?php foreach ($centre->group_district_region_school_users as $groupDistrictRegionSchoolUsers): ?>
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
                        <h4><?= __('Related Practicals') ?></h4>
                        <?php if (!empty($centre->practicals)): ?>
                        <table cellpadding="0" cellspacing="0" class="table table table-striped">
                            <tr>
                                                                    <th scope="col"><?= __('Id') ?></th>
                                                                    <th scope="col"><?= __('Practical Type') ?></th>
                                                                    <th scope="col"><?= __('Group A') ?></th>
                                                                    <th scope="col"><?= __('Group B') ?></th>
                                                                    <th scope="col"><?= __('Group C') ?></th>
                                                                    <th scope="col"><?= __('Total') ?></th>
                                                                    <th scope="col"><?= __('Subject Id') ?></th>
                                                                    <th scope="col"><?= __('Centre Id') ?></th>
                                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($centre->practicals as $practicals): ?>
                            <tr>
                                                                    <td><?= h($practicals->id) ?></td>
                                                                    <td><?= h($practicals->practical_type) ?></td>
                                                                    <td><?= h($practicals->group_A) ?></td>
                                                                    <td><?= h($practicals->group_B) ?></td>
                                                                    <td><?= h($practicals->group_C) ?></td>
                                                                    <td><?= h($practicals->total) ?></td>
                                                                    <td><?= h($practicals->subject_id) ?></td>
                                                                    <td><?= h($practicals->centre_id) ?></td>
                                                                                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Practicals',
                                    'action'
                                    =>
                                    'view', $practicals->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Practicals',
                                    'action'
                                    =>
                                    'edit', $practicals->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Practicals',
                                    'action' =>
                                    'delete', $practicals->id], ['confirm' => __('Are you sure you want to delete #
                                    {0}?', $practicals->id)]) ?>
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
