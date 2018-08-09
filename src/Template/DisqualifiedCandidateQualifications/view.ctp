<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DisqualifiedCandidateQualification $disqualifiedCandidateQualification
 */
?>

<div class="disqualifiedCandidateQualifications view large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Disqualified Candidate Qualifications') ?>
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
                <h4 class="pull-left"><?= h($disqualifiedCandidateQualification->id) ?></h4>
                <div class="btn-group pull-right">
                    <?= $this->Html->link(__('New Disqualified Candidate Qualification'), ['action' => 'add'], ['class' => 'btn btn
                    btn-default']) ?>
                    <?= $this->Html->link(__('Edit Disqualified Candidate Qualification'), ['action' => 'edit', $disqualifiedCandidateQualification->id],
                    ['class' => 'btn btn-default']) ?>
                    <?= $this->Form->postLink(__('Delete Disqualified Candidate Qualification'), ['action' => 'delete', $disqualifiedCandidateQualification->id
                    ],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $disqualifiedCandidateQualification->id), 'class' => 'btn
                    btn-danger']) ?>
                </div>
            </div>
            <!-- Default box -->
            <div class="box-body">
                <table class="vertical-table table table table-striped">
                                                                                                        <tr>
                                    <th scope="row"><?= __('Centre Number') ?></th>
                                    <td><?= h($disqualifiedCandidateQualification->centre_number) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Candidate Number') ?></th>
                                    <td><?= h($disqualifiedCandidateQualification->candidate_number) ?></td>
                                </tr>
                                                                                                                                                <tr>
                                    <th scope="row"><?= __('Disqualified Candidate') ?></th>
                                    <td><?= $disqualifiedCandidateQualification->has('disqualified_candidate') ?
                                        $this->Html->link($disqualifiedCandidateQualification
                                        ->disqualified_candidate->id, ['controller' =>
                                        'DisqualifiedCandidates', 'action' => 'view', $disqualifiedCandidateQualification
                                        ->disqualified_candidate
                                        ->id]) : '' ?>
                                    </td>
                                </tr>
                                                                                                                                                                    <tr>
                                <th scope="row"><?= __('Id') ?></th>
                                <td><?= $this->Number->format($disqualifiedCandidateQualification->id) ?></td>
                            </tr>
                                                    <tr>
                                <th scope="row"><?= __('Exam Year') ?></th>
                                <td><?= $this->Number->format($disqualifiedCandidateQualification->exam_year) ?></td>
                            </tr>
                                                    <tr>
                                <th scope="row"><?= __('Experience') ?></th>
                                <td><?= $this->Number->format($disqualifiedCandidateQualification->experience) ?></td>
                            </tr>
                                                                                                    </table>
                                                            </div>
        </div>
    </section>
</div>
