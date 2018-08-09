<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CandidateQualification $candidateQualification
 */
?>

<div class="candidateQualifications view large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Candidate Qualifications') ?>
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
                <h4 class="pull-left"><?= h($candidateQualification->id) ?></h4>
                <div class="btn-group pull-right">
                    <?= $this->Html->link(__('New Candidate Qualification'), ['action' => 'add'], ['class' => 'btn btn
                    btn-default']) ?>
                    <?= $this->Html->link(__('Edit Candidate Qualification'), ['action' => 'edit', $candidateQualification->id],
                    ['class' => 'btn btn-default']) ?>
                    <?= $this->Form->postLink(__('Delete Candidate Qualification'), ['action' => 'delete', $candidateQualification->id
                    ],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $candidateQualification->id), 'class' => 'btn
                    btn-danger']) ?>
                </div>
            </div>
            <!-- Default box -->
            <div class="box-body">
                <table class="vertical-table table table table-striped">
                                                                                                        <tr>
                                    <th scope="row"><?= __('Centre Number') ?></th>
                                    <td><?= h($candidateQualification->centre_number) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Candidate Number') ?></th>
                                    <td><?= h($candidateQualification->candidate_number) ?></td>
                                </tr>
                                                                                                                                                <tr>
                                    <th scope="row"><?= __('Candidate') ?></th>
                                    <td><?= $candidateQualification->has('candidate') ?
                                        $this->Html->link($candidateQualification
                                        ->candidate->id, ['controller' =>
                                        'Candidates', 'action' => 'view', $candidateQualification
                                        ->candidate
                                        ->id]) : '' ?>
                                    </td>
                                </tr>
                                                                                                                                                                    <tr>
                                <th scope="row"><?= __('Id') ?></th>
                                <td><?= $this->Number->format($candidateQualification->id) ?></td>
                            </tr>
                                                    <tr>
                                <th scope="row"><?= __('Exam Year') ?></th>
                                <td><?= $this->Number->format($candidateQualification->exam_year) ?></td>
                            </tr>
                                                    <tr>
                                <th scope="row"><?= __('Experience') ?></th>
                                <td><?= $this->Number->format($candidateQualification->experience) ?></td>
                            </tr>
                                                                                                    </table>
                                                            </div>
        </div>
    </section>
</div>
