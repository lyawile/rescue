<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DisqualifiedCandidate $disqualifiedCandidate
 */
?>

<div class="disqualifiedCandidates view large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Disqualified Candidates') ?>
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
                <h4 class="pull-left"><?= h($disqualifiedCandidate->id) ?></h4>
                <div class="btn-group pull-right">
                    <?= $this->Acl->link(__('New Disqualified Candidate'), ['action' => 'add'], ['class' => 'btn btn
                    btn-default']) ?>
                    <?= $this->Acl->link(__('Edit Disqualified Candidate'), ['action' => 'edit', $disqualifiedCandidate->id],
                    ['class' => 'btn btn-default']) ?>
                    <?= $this->Form->postLink(__('Delete Disqualified Candidate'), ['action' => 'delete', $disqualifiedCandidate->id
                    ],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $disqualifiedCandidate->id), 'class' => 'btn
                    btn-danger']) ?>
                </div>
            </div>
            <!-- Default box -->
            <div class="box-body">
                <table class="vertical-table table table table-striped">
                                                                                                        <tr>
                                    <th scope="row"><?= __('Number') ?></th>
                                    <td><?= h($disqualifiedCandidate->number) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('First Name') ?></th>
                                    <td><?= h($disqualifiedCandidate->first_name) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Other Name') ?></th>
                                    <td><?= h($disqualifiedCandidate->other_name) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Surname') ?></th>
                                    <td><?= h($disqualifiedCandidate->surname) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Sex') ?></th>
                                    <td><?= h($disqualifiedCandidate->sex) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('ID Number') ?></th>
                                    <td><?= h($disqualifiedCandidate->ID_number) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Guardian Phone') ?></th>
                                    <td><?= h($disqualifiedCandidate->guardian_phone) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Combination') ?></th>
                                    <td><?= h($disqualifiedCandidate->combination) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Subjects') ?></th>
                                    <td><?= h($disqualifiedCandidate->subjects) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Disabilities') ?></th>
                                    <td><?= h($disqualifiedCandidate->disabilities) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Reason') ?></th>
                                    <td><?= h($disqualifiedCandidate->reason) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Sifa') ?></th>
                                    <td><?= h($disqualifiedCandidate->sifa) ?></td>
                                </tr>
                                                                                                                                                <tr>
                                    <th scope="row"><?= __('Exam Type') ?></th>
                                    <td><?= $disqualifiedCandidate->has('exam_type') ?
                                        $this->Acl->link($disqualifiedCandidate
                                        ->exam_type->name, ['controller' =>
                                        'ExamTypes', 'action' => 'view', $disqualifiedCandidate
                                        ->exam_type
                                        ->id]) : '' ?>
                                    </td>
                                </tr>
                                                                                                                                                <tr>
                                    <th scope="row"><?= __('Centre') ?></th>
                                    <td><?= $disqualifiedCandidate->has('centre') ?
                                        $this->Acl->link($disqualifiedCandidate
                                        ->centre->name, ['controller' =>
                                        'Centres', 'action' => 'view', $disqualifiedCandidate
                                        ->centre
                                        ->id]) : '' ?>
                                    </td>
                                </tr>
                                                                                                                                                                    <tr>
                                <th scope="row"><?= __('Id') ?></th>
                                <td><?= $this->Number->format($disqualifiedCandidate->id) ?></td>
                            </tr>
                                                    <tr>
                                <th scope="row"><?= __('PSLE Number') ?></th>
                                <td><?= $this->Number->format($disqualifiedCandidate->PSLE_number) ?></td>
                            </tr>
                                                    <tr>
                                <th scope="row"><?= __('PSLE Year') ?></th>
                                <td><?= $this->Number->format($disqualifiedCandidate->PSLE_year) ?></td>
                            </tr>
                                                    <tr>
                                <th scope="row"><?= __('Work Experience') ?></th>
                                <td><?= $this->Number->format($disqualifiedCandidate->work_experience) ?></td>
                            </tr>
                                                    <tr>
                                <th scope="row"><?= __('Is Repeater') ?></th>
                                <td><?= $this->Number->format($disqualifiedCandidate->is_repeater) ?></td>
                            </tr>
                                                                                                                    <tr>
                                <th scope="row"><?= __('Date Of Birth') ?></th>
                                <td><?= h($disqualifiedCandidate->date_of_birth) ?></td>
                            </tr>
                                                                                </table>
                                                                                                            <div class="related">
                        <h4><?= __('Related Disability Disqualified Candidates') ?></h4>
                        <?php if (!empty($disqualifiedCandidate->disability_disqualified_candidates)): ?>
                        <table cellpadding="0" cellspacing="0" class="table table table-striped">
                            <tr>
                                                                    <th scope="col"><?= __('Id') ?></th>
                                                                    <th scope="col"><?= __('Disabilitie Id') ?></th>
                                                                    <th scope="col"><?= __('Disqualified Candidate Id') ?></th>
                                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($disqualifiedCandidate->disability_disqualified_candidates as $disabilityDisqualifiedCandidates): ?>
                            <tr>
                                                                    <td><?= h($disabilityDisqualifiedCandidates->id) ?></td>
                                                                    <td><?= h($disabilityDisqualifiedCandidates->disabilitie_id) ?></td>
                                                                    <td><?= h($disabilityDisqualifiedCandidates->disqualified_candidate_id) ?></td>
                                                                                                <td class="actions">
                                    <?= $this->Acl->link(__('View'), ['controller' => 'DisabilityDisqualifiedCandidates',
                                    'action'
                                    =>
                                    'view', $disabilityDisqualifiedCandidates->id]) ?>
                                    <?= $this->Acl->link(__('Edit'), ['controller' => 'DisabilityDisqualifiedCandidates',
                                    'action'
                                    =>
                                    'edit', $disabilityDisqualifiedCandidates->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'DisabilityDisqualifiedCandidates',
                                    'action' =>
                                    'delete', $disabilityDisqualifiedCandidates->id], ['confirm' => __('Are you sure you want to delete #
                                    {0}?', $disabilityDisqualifiedCandidates->id)]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                        <?php endif; ?>
                    </div>
                                                                            <div class="related">
                        <h4><?= __('Related Disqualified Candidate Qualifications') ?></h4>
                        <?php if (!empty($disqualifiedCandidate->disqualified_candidate_qualifications)): ?>
                        <table cellpadding="0" cellspacing="0" class="table table table-striped">
                            <tr>
                                                                    <th scope="col"><?= __('Id') ?></th>
                                                                    <th scope="col"><?= __('Centre Number') ?></th>
                                                                    <th scope="col"><?= __('Candidate Number') ?></th>
                                                                    <th scope="col"><?= __('Exam Year') ?></th>
                                                                    <th scope="col"><?= __('Experience') ?></th>
                                                                    <th scope="col"><?= __('Disqualified Candidate Id') ?></th>
                                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($disqualifiedCandidate->disqualified_candidate_qualifications as $disqualifiedCandidateQualifications): ?>
                            <tr>
                                                                    <td><?= h($disqualifiedCandidateQualifications->id) ?></td>
                                                                    <td><?= h($disqualifiedCandidateQualifications->centre_number) ?></td>
                                                                    <td><?= h($disqualifiedCandidateQualifications->candidate_number) ?></td>
                                                                    <td><?= h($disqualifiedCandidateQualifications->exam_year) ?></td>
                                                                    <td><?= h($disqualifiedCandidateQualifications->experience) ?></td>
                                                                    <td><?= h($disqualifiedCandidateQualifications->disqualified_candidate_id) ?></td>
                                                                                                <td class="actions">
                                    <?= $this->Acl->link(__('View'), ['controller' => 'DisqualifiedCandidateQualifications',
                                    'action'
                                    =>
                                    'view', $disqualifiedCandidateQualifications->id]) ?>
                                    <?= $this->Acl->link(__('Edit'), ['controller' => 'DisqualifiedCandidateQualifications',
                                    'action'
                                    =>
                                    'edit', $disqualifiedCandidateQualifications->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'DisqualifiedCandidateQualifications',
                                    'action' =>
                                    'delete', $disqualifiedCandidateQualifications->id], ['confirm' => __('Are you sure you want to delete #
                                    {0}?', $disqualifiedCandidateQualifications->id)]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                        <?php endif; ?>
                    </div>
                                                                            <div class="related">
                        <h4><?= __('Related Disqualified Candidate Subjects') ?></h4>
                        <?php if (!empty($disqualifiedCandidate->disqualified_candidate_subjects)): ?>
                        <table cellpadding="0" cellspacing="0" class="table table table-striped">
                            <tr>
                                                                    <th scope="col"><?= __('Id') ?></th>
                                                                    <th scope="col"><?= __('Subject Id') ?></th>
                                                                    <th scope="col"><?= __('Disqualified Candidate Id') ?></th>
                                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($disqualifiedCandidate->disqualified_candidate_subjects as $disqualifiedCandidateSubjects): ?>
                            <tr>
                                                                    <td><?= h($disqualifiedCandidateSubjects->id) ?></td>
                                                                    <td><?= h($disqualifiedCandidateSubjects->subject_id) ?></td>
                                                                    <td><?= h($disqualifiedCandidateSubjects->disqualified_candidate_id) ?></td>
                                                                                                <td class="actions">
                                    <?= $this->Acl->link(__('View'), ['controller' => 'DisqualifiedCandidateSubjects',
                                    'action'
                                    =>
                                    'view', $disqualifiedCandidateSubjects->id]) ?>
                                    <?= $this->Acl->link(__('Edit'), ['controller' => 'DisqualifiedCandidateSubjects',
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
                            </div>
        </div>
    </section>
</div>
