<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExamType $examType
 */
?>

<div class="examTypes view large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Exam Types') ?>
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
                <h4 class="pull-left"><?= h($examType->name) ?></h4>
                <div class="btn-group pull-right">
                    <?= $this->Html->link(__('New Exam Type'), ['action' => 'add'], ['class' => 'btn btn
                    btn-default']) ?>
                    <?= $this->Html->link(__('Edit Exam Type'), ['action' => 'edit', $examType->id],
                    ['class' => 'btn btn-default']) ?>
                    <?= $this->Form->postLink(__('Delete Exam Type'), ['action' => 'delete', $examType->id
                    ],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $examType->id), 'class' => 'btn
                    btn-danger']) ?>
                </div>
            </div>
            <!-- Default box -->
            <div class="box-body">
                <table class="vertical-table table table table-striped">
                                                                                                        <tr>
                                    <th scope="row"><?= __('Name') ?></th>
                                    <td><?= h($examType->name) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Short Name') ?></th>
                                    <td><?= h($examType->short_name) ?></td>
                                </tr>
                                                                                                                                                                    <tr>
                                <th scope="row"><?= __('Id') ?></th>
                                <td><?= $this->Number->format($examType->id) ?></td>
                            </tr>
                                                    <tr>
                                <th scope="row"><?= __('Code') ?></th>
                                <td><?= $this->Number->format($examType->code) ?></td>
                            </tr>
                                                    <tr>
                                <th scope="row"><?= __('Has Ca') ?></th>
                                <td><?= $this->Number->format($examType->has_ca) ?></td>
                            </tr>
                                                                                                    </table>
                                                                                                            <div class="related">
                        <h4><?= __('Related Candidates') ?></h4>
                        <?php if (!empty($examType->candidates)): ?>
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
                            <?php foreach ($examType->candidates as $candidates): ?>
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
                        <h4><?= __('Related Centre Exam Types') ?></h4>
                        <?php if (!empty($examType->centre_exam_types)): ?>
                        <table cellpadding="0" cellspacing="0" class="table table table-striped">
                            <tr>
                                                                    <th scope="col"><?= __('Id') ?></th>
                                                                    <th scope="col"><?= __('Exam Type Id') ?></th>
                                                                    <th scope="col"><?= __('Centre Id') ?></th>
                                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($examType->centre_exam_types as $centreExamTypes): ?>
                            <tr>
                                                                    <td><?= h($centreExamTypes->id) ?></td>
                                                                    <td><?= h($centreExamTypes->exam_type_id) ?></td>
                                                                    <td><?= h($centreExamTypes->centre_id) ?></td>
                                                                                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'CentreExamTypes',
                                    'action'
                                    =>
                                    'view', $centreExamTypes->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'CentreExamTypes',
                                    'action'
                                    =>
                                    'edit', $centreExamTypes->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CentreExamTypes',
                                    'action' =>
                                    'delete', $centreExamTypes->id], ['confirm' => __('Are you sure you want to delete #
                                    {0}?', $centreExamTypes->id)]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                        <?php endif; ?>
                    </div>
                                                                            <div class="related">
                        <h4><?= __('Related Collections') ?></h4>
                        <?php if (!empty($examType->collections)): ?>
                        <table cellpadding="0" cellspacing="0" class="table table table-striped">
                            <tr>
                                                                    <th scope="col"><?= __('Id') ?></th>
                                                                    <th scope="col"><?= __('Name') ?></th>
                                                                    <th scope="col"><?= __('Description') ?></th>
                                                                    <th scope="col"><?= __('Start Date') ?></th>
                                                                    <th scope="col"><?= __('End Date') ?></th>
                                                                    <th scope="col"><?= __('Amount') ?></th>
                                                                    <th scope="col"><?= __('Exam Type Id') ?></th>
                                                                    <th scope="col"><?= __('Collection Categorie Id') ?></th>
                                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($examType->collections as $collections): ?>
                            <tr>
                                                                    <td><?= h($collections->id) ?></td>
                                                                    <td><?= h($collections->name) ?></td>
                                                                    <td><?= h($collections->description) ?></td>
                                                                    <td><?= h($collections->start_date) ?></td>
                                                                    <td><?= h($collections->end_date) ?></td>
                                                                    <td><?= h($collections->amount) ?></td>
                                                                    <td><?= h($collections->exam_type_id) ?></td>
                                                                    <td><?= h($collections->collection_categorie_id) ?></td>
                                                                                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Collections',
                                    'action'
                                    =>
                                    'view', $collections->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Collections',
                                    'action'
                                    =>
                                    'edit', $collections->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Collections',
                                    'action' =>
                                    'delete', $collections->id], ['confirm' => __('Are you sure you want to delete #
                                    {0}?', $collections->id)]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                        <?php endif; ?>
                    </div>
                                                                            <div class="related">
                        <h4><?= __('Related Disqualified Candidates') ?></h4>
                        <?php if (!empty($examType->disqualified_candidates)): ?>
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
                            <?php foreach ($examType->disqualified_candidates as $disqualifiedCandidates): ?>
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
                        <h4><?= __('Related Subjects') ?></h4>
                        <?php if (!empty($examType->subjects)): ?>
                        <table cellpadding="0" cellspacing="0" class="table table table-striped">
                            <tr>
                                                                    <th scope="col"><?= __('Id') ?></th>
                                                                    <th scope="col"><?= __('Code') ?></th>
                                                                    <th scope="col"><?= __('Name') ?></th>
                                                                    <th scope="col"><?= __('Short Name') ?></th>
                                                                    <th scope="col"><?= __('Exam Type Id') ?></th>
                                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($examType->subjects as $subjects): ?>
                            <tr>
                                                                    <td><?= h($subjects->id) ?></td>
                                                                    <td><?= h($subjects->code) ?></td>
                                                                    <td><?= h($subjects->name) ?></td>
                                                                    <td><?= h($subjects->short_name) ?></td>
                                                                    <td><?= h($subjects->exam_type_id) ?></td>
                                                                                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Subjects',
                                    'action'
                                    =>
                                    'view', $subjects->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Subjects',
                                    'action'
                                    =>
                                    'edit', $subjects->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Subjects',
                                    'action' =>
                                    'delete', $subjects->id], ['confirm' => __('Are you sure you want to delete #
                                    {0}?', $subjects->id)]) ?>
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
