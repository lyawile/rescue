<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CandidateCa $candidateCa
 */
?>

<div class="candidateCas view large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Candidate Cas') ?>
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
                <h4 class="pull-left"><?= h($candidateCa->id) ?></h4>
                <div class="btn-group pull-right">
                    <?= $this->Html->link(__('New Candidate Ca'), ['action' => 'add'], ['class' => 'btn btn
                    btn-default']) ?>
                    <?= $this->Html->link(__('Edit Candidate Ca'), ['action' => 'edit', $candidateCa->id],
                    ['class' => 'btn btn-default']) ?>
                    <?= $this->Form->postLink(__('Delete Candidate Ca'), ['action' => 'delete', $candidateCa->id
                    ],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $candidateCa->id), 'class' => 'btn
                    btn-danger']) ?>
                </div>
            </div>
            <!-- Default box -->
            <div class="box-body">
                <table class="vertical-table table table table-striped">
                                                                                                        <tr>
                                    <th scope="row"><?= __('Ftwo Centreno') ?></th>
                                    <td><?= h($candidateCa->ftwo_centreno) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Ftwo Candidateno') ?></th>
                                    <td><?= h($candidateCa->ftwo_candidateno) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Ftwo Year') ?></th>
                                    <td><?= h($candidateCa->ftwo_year) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Btp') ?></th>
                                    <td><?= h($candidateCa->btp) ?></td>
                                </tr>
                                                                                                                                                <tr>
                                    <th scope="row"><?= __('Candidate Subject') ?></th>
                                    <td><?= $candidateCa->has('candidate_subject') ?
                                        $this->Html->link($candidateCa
                                        ->candidate_subject->id, ['controller' =>
                                        'CandidateSubjects', 'action' => 'view', $candidateCa
                                        ->candidate_subject
                                        ->id]) : '' ?>
                                    </td>
                                </tr>
                                                                                                                                                                    <tr>
                                <th scope="row"><?= __('Id') ?></th>
                                <td><?= $this->Number->format($candidateCa->id) ?></td>
                            </tr>
                                                    <tr>
                                <th scope="row"><?= __('Y1t1') ?></th>
                                <td><?= $this->Number->format($candidateCa->y1t1) ?></td>
                            </tr>
                                                    <tr>
                                <th scope="row"><?= __('Y1t2') ?></th>
                                <td><?= $this->Number->format($candidateCa->y1t2) ?></td>
                            </tr>
                                                    <tr>
                                <th scope="row"><?= __('Y2t1') ?></th>
                                <td><?= $this->Number->format($candidateCa->y2t1) ?></td>
                            </tr>
                                                    <tr>
                                <th scope="row"><?= __('Project') ?></th>
                                <td><?= $this->Number->format($candidateCa->project) ?></td>
                            </tr>
                                                                                                    </table>
                                                            </div>
        </div>
    </section>
</div>
