<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Subject $subject
 */
?>

<div class="subjects view large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Subjects') ?>
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
                <h4 class="pull-left"><?= h($subject->name) ?></h4>
                <div class="btn-group pull-right">
                    <?= $this->Html->link(__('New Subject'), ['action' => 'add'], ['class' => 'btn btn
                    btn-default']) ?>
                    <?= $this->Html->link(__('Edit Subject'), ['action' => 'edit', $subject->id],
                    ['class' => 'btn btn-default']) ?>
                    <?= $this->Form->postLink(__('Delete Subject'), ['action' => 'delete', $subject->id
                    ],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $subject->id), 'class' => 'btn
                    btn-danger']) ?>
                </div>
            </div>
            <!-- Default box -->
            <div class="box-body">
                <table class="vertical-table table table table-striped">
                                                                                                        <tr>
                                    <th scope="row"><?= __('Code') ?></th>
                                    <td><?= h($subject->code) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Name') ?></th>
                                    <td><?= h($subject->name) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Short Name') ?></th>
                                    <td><?= h($subject->short_name) ?></td>
                                </tr>
                                                                                                                                                <tr>
                                    <th scope="row"><?= __('Exam Type') ?></th>
                                    <td><?= $subject->has('exam_type') ?
                                        $this->Html->link($subject
                                        ->exam_type->name, ['controller' =>
                                        'ExamTypes', 'action' => 'view', $subject
                                        ->exam_type
                                        ->id]) : '' ?>
                                    </td>
                                </tr>
                                                                                                                                                                    <tr>
                                <th scope="row"><?= __('Id') ?></th>
                                <td><?= $this->Number->format($subject->id) ?></td>
                            </tr>
                                                                                                    </table>
                                                                                                            <div class="related">
                        <h4><?= __('Related Candidate Subjects') ?></h4>
                        <?php if (!empty($subject->candidate_subjects)): ?>
                        <table cellpadding="0" cellspacing="0" class="table table table-striped">
                            <tr>
                                                                    <th scope="col"><?= __('Id') ?></th>
                                                                    <th scope="col"><?= __('Candidate Id') ?></th>
                                                                    <th scope="col"><?= __('Subject Id') ?></th>
                                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($subject->candidate_subjects as $candidateSubjects): ?>
                            <tr>
                                                                    <td><?= h($candidateSubjects->id) ?></td>
                                                                    <td><?= h($candidateSubjects->candidate_id) ?></td>
                                                                    <td><?= h($candidateSubjects->subject_id) ?></td>
                                                                                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'CandidateSubjects',
                                    'action'
                                    =>
                                    'view', $candidateSubjects->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'CandidateSubjects',
                                    'action'
                                    =>
                                    'edit', $candidateSubjects->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CandidateSubjects',
                                    'action' =>
                                    'delete', $candidateSubjects->id], ['confirm' => __('Are you sure you want to delete #
                                    {0}?', $candidateSubjects->id)]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                        <?php endif; ?>
                    </div>
                                                                            <div class="related">
                        <h4><?= __('Related Disqualified Candidate Subjects') ?></h4>
                        <?php if (!empty($subject->disqualified_candidate_subjects)): ?>
                        <table cellpadding="0" cellspacing="0" class="table table table-striped">
                            <tr>
                                                                    <th scope="col"><?= __('Id') ?></th>
                                                                    <th scope="col"><?= __('Subject Id') ?></th>
                                                                    <th scope="col"><?= __('Disqualified Candidate Id') ?></th>
                                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($subject->disqualified_candidate_subjects as $disqualifiedCandidateSubjects): ?>
                            <tr>
                                                                    <td><?= h($disqualifiedCandidateSubjects->id) ?></td>
                                                                    <td><?= h($disqualifiedCandidateSubjects->subject_id) ?></td>
                                                                    <td><?= h($disqualifiedCandidateSubjects->disqualified_candidate_id) ?></td>
                                                                                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'DisqualifiedCandidateSubjects',
                                    'action'
                                    =>
                                    'view', $disqualifiedCandidateSubjects->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'DisqualifiedCandidateSubjects',
                                    'action'
                                    =>
                                    'edit', $disqualifiedCandidateSubjects->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'DisqualifiedCandidateSubjects',
                                    'action' =>
                                    'delete', $disqualifiedCandidateSubjects->id], ['confirm' => __('Are you sure you want to delete #
                                    {0}?', $disqualifiedCandidateSubjects->id)]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                        <?php endif; ?>
                    </div>
                                                                            <div class="related">
                        <h4><?= __('Related Practicals') ?></h4>
                        <?php if (!empty($subject->practicals)): ?>
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
                            <?php foreach ($subject->practicals as $practicals): ?>
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
