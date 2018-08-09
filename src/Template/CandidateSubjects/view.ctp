<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CandidateSubject $candidateSubject
 */
?>

<div class="candidateSubjects view large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Candidate Subjects') ?>
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
                <h4 class="pull-left"><?= h($candidateSubject->id) ?></h4>
                <div class="btn-group pull-right">
                    <?= $this->Html->link(__('New Candidate Subject'), ['action' => 'add'], ['class' => 'btn btn
                    btn-default']) ?>
                    <?= $this->Html->link(__('Edit Candidate Subject'), ['action' => 'edit', $candidateSubject->id],
                    ['class' => 'btn btn-default']) ?>
                    <?= $this->Form->postLink(__('Delete Candidate Subject'), ['action' => 'delete', $candidateSubject->id
                    ],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $candidateSubject->id), 'class' => 'btn
                    btn-danger']) ?>
                </div>
            </div>
            <!-- Default box -->
            <div class="box-body">
                <table class="vertical-table table table table-striped">
                                                                                                                                        <tr>
                                    <th scope="row"><?= __('Candidate') ?></th>
                                    <td><?= $candidateSubject->has('candidate') ?
                                        $this->Html->link($candidateSubject
                                        ->candidate->id, ['controller' =>
                                        'Candidates', 'action' => 'view', $candidateSubject
                                        ->candidate
                                        ->id]) : '' ?>
                                    </td>
                                </tr>
                                                                                                                                                <tr>
                                    <th scope="row"><?= __('Subject') ?></th>
                                    <td><?= $candidateSubject->has('subject') ?
                                        $this->Html->link($candidateSubject
                                        ->subject->name, ['controller' =>
                                        'Subjects', 'action' => 'view', $candidateSubject
                                        ->subject
                                        ->id]) : '' ?>
                                    </td>
                                </tr>
                                                                                                                                                                    <tr>
                                <th scope="row"><?= __('Id') ?></th>
                                <td><?= $this->Number->format($candidateSubject->id) ?></td>
                            </tr>
                                                                                                    </table>
                                                            </div>
        </div>
    </section>
</div>
