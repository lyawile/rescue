<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Candidate $candidate
 */
?>

<div class="candidates view large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Candidates') ?>
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
                <h4 class="pull-left"><?= h($candidate->id) ?></h4>
                <div class="btn-group pull-right">
                    <?= $this->Acl->link(__('New Candidate'), ['action' => 'add'], ['class' => 'btn btn
                    btn-default']) ?>
                    <?= $this->Acl->link(__('Edit Candidate'), ['action' => 'edit', $candidate->id],
                    ['class' => 'btn btn-default']) ?>
                    <?= $this->Form->postLink(__('Delete Candidate'), ['action' => 'delete', $candidate->id
                    ],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $candidate->id), 'class' => 'btn
                    btn-danger']) ?>
                </div>
            </div>
            <!-- Default box -->
            <div class="box-body">
                <table class="vertical-table table table table-striped">
                                                                                                        <tr>
                                    <th scope="row"><?= __('Number') ?></th>
                                    <td><?= h($candidate->number) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('First Name') ?></th>
                                    <td><?= h($candidate->first_name) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Other Name') ?></th>
                                    <td><?= h($candidate->other_name) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Surname') ?></th>
                                    <td><?= h($candidate->surname) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Sex') ?></th>
                                    <td><?= h($candidate->sex) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('ID Number') ?></th>
                                    <td><?= h($candidate->ID_number) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Guardian Phone') ?></th>
                                    <td><?= h($candidate->guardian_phone) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Combination') ?></th>
                                    <td><?= h($candidate->combination) ?></td>
                                </tr>
                                                                                                                                                <tr>
                                    <th scope="row"><?= __('Exam Type') ?></th>
                                    <td><?= $candidate->has('exam_type') ?
                                        $this->Acl->link($candidate
                                        ->exam_type->name, ['controller' =>
                                        'ExamTypes', 'action' => 'view', $candidate
                                        ->exam_type
                                        ->id]) : '' ?>
                                    </td>
                                </tr>
                                                                                                                                                <tr>
                                    <th scope="row"><?= __('Centre') ?></th>
                                    <td><?= $candidate->has('centre') ?
                                        $this->Acl->link($candidate
                                        ->centre->name, ['controller' =>
                                        'Centres', 'action' => 'view', $candidate
                                        ->centre
                                        ->id]) : '' ?>
                                    </td>
                                </tr>
                                                                                                                                                                    <tr>
                                <th scope="row"><?= __('Id') ?></th>
                                <td><?= $this->Number->format($candidate->id) ?></td>
                            </tr>
                                                    <tr>
                                <th scope="row"><?= __('PSLE Number') ?></th>
                                <td><?= $this->Number->format($candidate->PSLE_number) ?></td>
                            </tr>
                                                    <tr>
                                <th scope="row"><?= __('PSLE Year') ?></th>
                                <td><?= $this->Number->format($candidate->PSLE_year) ?></td>
                            </tr>
                                                    <tr>
                                <th scope="row"><?= __('Work Experience') ?></th>
                                <td><?= $this->Number->format($candidate->work_experience) ?></td>
                            </tr>
                                                    <tr>
                                <th scope="row"><?= __('Is Repeater') ?></th>
                                <td><?= $this->Number->format($candidate->is_repeater) ?></td>
                            </tr>
                                                                                                                    <tr>
                                <th scope="row"><?= __('Date Of Birth') ?></th>
                                <td><?= h($candidate->date_of_birth) ?></td>
                            </tr>
                                                                                </table>
                                                                                                            <div class="related">
                        <h4><?= __('Related Bill Item Candidates') ?></h4>
                        <?php if (!empty($candidate->bill_item_candidates)): ?>
                        <table cellpadding="0" cellspacing="0" class="table table table-striped">
                            <tr>
                                                                    <th scope="col"><?= __('Id') ?></th>
                                                                    <th scope="col"><?= __('Candidate Id') ?></th>
                                                                    <th scope="col"><?= __('Bill Item Id') ?></th>
                                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($candidate->bill_item_candidates as $billItemCandidates): ?>
                            <tr>
                                                                    <td><?= h($billItemCandidates->id) ?></td>
                                                                    <td><?= h($billItemCandidates->candidate_id) ?></td>
                                                                    <td><?= h($billItemCandidates->bill_item_id) ?></td>
                                                                                                <td class="actions">
                                    <?= $this->Acl->link(__('View'), ['controller' => 'BillItemCandidates',
                                    'action'
                                    =>
                                    'view', $billItemCandidates->id]) ?>
                                    <?= $this->Acl->link(__('Edit'), ['controller' => 'BillItemCandidates',
                                    'action'
                                    =>
                                    'edit', $billItemCandidates->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'BillItemCandidates',
                                    'action' =>
                                    'delete', $billItemCandidates->id], ['confirm' => __('Are you sure you want to delete #
                                    {0}?', $billItemCandidates->id)]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                        <?php endif; ?>
                    </div>
                                                                            <div class="related">
                        <h4><?= __('Related Candidate Disabilities') ?></h4>
                        <?php if (!empty($candidate->candidate_disabilities)): ?>
                        <table cellpadding="0" cellspacing="0" class="table table table-striped">
                            <tr>
                                                                    <th scope="col"><?= __('Id') ?></th>
                                                                    <th scope="col"><?= __('Candidate Id') ?></th>
                                                                    <th scope="col"><?= __('Disability Id') ?></th>
                                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($candidate->candidate_disabilities as $candidateDisabilities): ?>
                            <tr>
                                                                    <td><?= h($candidateDisabilities->id) ?></td>
                                                                    <td><?= h($candidateDisabilities->candidate_id) ?></td>
                                                                    <td><?= h($candidateDisabilities->disability_id) ?></td>
                                                                                                <td class="actions">
                                    <?= $this->Acl->link(__('View'), ['controller' => 'CandidateDisabilities',
                                    'action'
                                    =>
                                    'view', $candidateDisabilities->id]) ?>
                                    <?= $this->Acl->link(__('Edit'), ['controller' => 'CandidateDisabilities',
                                    'action'
                                    =>
                                    'edit', $candidateDisabilities->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CandidateDisabilities',
                                    'action' =>
                                    'delete', $candidateDisabilities->id], ['confirm' => __('Are you sure you want to delete #
                                    {0}?', $candidateDisabilities->id)]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                        <?php endif; ?>
                    </div>
                                                                            <div class="related">
                        <h4><?= __('Related Candidate Qualifications') ?></h4>
                        <?php if (!empty($candidate->candidate_qualifications)): ?>
                        <table cellpadding="0" cellspacing="0" class="table table table-striped">
                            <tr>
                                                                    <th scope="col"><?= __('Id') ?></th>
                                                                    <th scope="col"><?= __('Centre Number') ?></th>
                                                                    <th scope="col"><?= __('Candidate Number') ?></th>
                                                                    <th scope="col"><?= __('Exam Year') ?></th>
                                                                    <th scope="col"><?= __('Experience') ?></th>
                                                                    <th scope="col"><?= __('Candidate Id') ?></th>
                                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($candidate->candidate_qualifications as $candidateQualifications): ?>
                            <tr>
                                                                    <td><?= h($candidateQualifications->id) ?></td>
                                                                    <td><?= h($candidateQualifications->centre_number) ?></td>
                                                                    <td><?= h($candidateQualifications->candidate_number) ?></td>
                                                                    <td><?= h($candidateQualifications->exam_year) ?></td>
                                                                    <td><?= h($candidateQualifications->experience) ?></td>
                                                                    <td><?= h($candidateQualifications->candidate_id) ?></td>
                                                                                                <td class="actions">
                                    <?= $this->Acl->link(__('View'), ['controller' => 'CandidateQualifications',
                                    'action'
                                    =>
                                    'view', $candidateQualifications->id]) ?>
                                    <?= $this->Acl->link(__('Edit'), ['controller' => 'CandidateQualifications',
                                    'action'
                                    =>
                                    'edit', $candidateQualifications->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CandidateQualifications',
                                    'action' =>
                                    'delete', $candidateQualifications->id], ['confirm' => __('Are you sure you want to delete #
                                    {0}?', $candidateQualifications->id)]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                        <?php endif; ?>
                    </div>
                                                                            <div class="related">
                        <h4><?= __('Related Candidate Subjects') ?></h4>
                        <?php if (!empty($candidate->candidate_subjects)): ?>
                        <table cellpadding="0" cellspacing="0" class="table table table-striped">
                            <tr>
                                                                    <th scope="col"><?= __('Id') ?></th>
                                                                    <th scope="col"><?= __('Candidate Id') ?></th>
                                                                    <th scope="col"><?= __('Subject Id') ?></th>
                                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($candidate->candidate_subjects as $candidateSubjects): ?>
                            <tr>
                                                                    <td><?= h($candidateSubjects->id) ?></td>
                                                                    <td><?= h($candidateSubjects->candidate_id) ?></td>
                                                                    <td><?= h($candidateSubjects->subject_id) ?></td>
                                                                                                <td class="actions">
                                    <?= $this->Acl->link(__('View'), ['controller' => 'CandidateSubjects',
                                    'action'
                                    =>
                                    'view', $candidateSubjects->id]) ?>
                                    <?= $this->Acl->link(__('Edit'), ['controller' => 'CandidateSubjects',
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
                            </div>
        </div>
    </section>
</div>
