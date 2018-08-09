<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CandidateDisability $candidateDisability
 */
?>

<div class="candidateDisabilities view large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Candidate Disabilities') ?>
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
                <h4 class="pull-left"><?= h($candidateDisability->id) ?></h4>
                <div class="btn-group pull-right">
                    <?= $this->Html->link(__('New Candidate Disability'), ['action' => 'add'], ['class' => 'btn btn
                    btn-default']) ?>
                    <?= $this->Html->link(__('Edit Candidate Disability'), ['action' => 'edit', $candidateDisability->id],
                    ['class' => 'btn btn-default']) ?>
                    <?= $this->Form->postLink(__('Delete Candidate Disability'), ['action' => 'delete', $candidateDisability->id
                    ],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $candidateDisability->id), 'class' => 'btn
                    btn-danger']) ?>
                </div>
            </div>
            <!-- Default box -->
            <div class="box-body">
                <table class="vertical-table table table table-striped">
                                                                                                                                        <tr>
                                    <th scope="row"><?= __('Candidate') ?></th>
                                    <td><?= $candidateDisability->has('candidate') ?
                                        $this->Html->link($candidateDisability
                                        ->candidate->id, ['controller' =>
                                        'Candidates', 'action' => 'view', $candidateDisability
                                        ->candidate
                                        ->id]) : '' ?>
                                    </td>
                                </tr>
                                                                                                                                                <tr>
                                    <th scope="row"><?= __('Disability') ?></th>
                                    <td><?= $candidateDisability->has('disability') ?
                                        $this->Html->link($candidateDisability
                                        ->disability->name, ['controller' =>
                                        'Disabilities', 'action' => 'view', $candidateDisability
                                        ->disability
                                        ->id]) : '' ?>
                                    </td>
                                </tr>
                                                                                                                                                                    <tr>
                                <th scope="row"><?= __('Id') ?></th>
                                <td><?= $this->Number->format($candidateDisability->id) ?></td>
                            </tr>
                                                                                                    </table>
                                                            </div>
        </div>
    </section>
</div>
