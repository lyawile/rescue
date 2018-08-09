<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DisqualifiedCandidateSubject $disqualifiedCandidateSubject
 */
?>

<div class="disqualifiedCandidateSubjects view large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Disqualified Candidate Subjects') ?>
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
                <h4 class="pull-left"><?= h($disqualifiedCandidateSubject->id) ?></h4>
                <div class="btn-group pull-right">
                    <?= $this->Html->link(__('New Disqualified Candidate Subject'), ['action' => 'add'], ['class' => 'btn btn
                    btn-default']) ?>
                    <?= $this->Html->link(__('Edit Disqualified Candidate Subject'), ['action' => 'edit', $disqualifiedCandidateSubject->id],
                    ['class' => 'btn btn-default']) ?>
                    <?= $this->Form->postLink(__('Delete Disqualified Candidate Subject'), ['action' => 'delete', $disqualifiedCandidateSubject->id
                    ],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $disqualifiedCandidateSubject->id), 'class' => 'btn
                    btn-danger']) ?>
                </div>
            </div>
            <!-- Default box -->
            <div class="box-body">
                <table class="vertical-table table table table-striped">
                                                                                                                                        <tr>
                                    <th scope="row"><?= __('Subject') ?></th>
                                    <td><?= $disqualifiedCandidateSubject->has('subject') ?
                                        $this->Html->link($disqualifiedCandidateSubject
                                        ->subject->name, ['controller' =>
                                        'Subjects', 'action' => 'view', $disqualifiedCandidateSubject
                                        ->subject
                                        ->id]) : '' ?>
                                    </td>
                                </tr>
                                                                                                                                                <tr>
                                    <th scope="row"><?= __('Disqualified Candidate') ?></th>
                                    <td><?= $disqualifiedCandidateSubject->has('disqualified_candidate') ?
                                        $this->Html->link($disqualifiedCandidateSubject
                                        ->disqualified_candidate->id, ['controller' =>
                                        'DisqualifiedCandidates', 'action' => 'view', $disqualifiedCandidateSubject
                                        ->disqualified_candidate
                                        ->id]) : '' ?>
                                    </td>
                                </tr>
                                                                                                                                                                    <tr>
                                <th scope="row"><?= __('Id') ?></th>
                                <td><?= $this->Number->format($disqualifiedCandidateSubject->id) ?></td>
                            </tr>
                                                                                                    </table>
                                                            </div>
        </div>
    </section>
</div>
