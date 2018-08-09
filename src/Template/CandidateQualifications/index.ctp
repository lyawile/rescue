<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CandidateQualification[]|\Cake\Collection\CollectionInterface $candidateQualifications
 */
?>
<div class="candidateQualifications index large-9 medium-8 columns content">
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

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="btn-group pull-right">
                    <?= $this->Html->link(__('New Candidate Qualification'), ['action' => 'add'], ['class' => 'btn btn btn-success']) ?>
                </div>
            </div>
            <div class="box-body">
                <table cellpadding="0" cellspacing="0" class="table table table-striped">
                    <thead>
                    <tr>
                                                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('centre_number') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('candidate_number') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('exam_year') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('experience') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('candidates_id') ?></th>
                                                <th scope="col" class="actions pull-right"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($candidateQualifications as $candidateQualification): ?>
                    <tr>
                                                                                                                                                                                                                                                                            <td><?= $this->Number->format($candidateQualification->id) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= h($candidateQualification->centre_number) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= h($candidateQualification->candidate_number) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= $this->Number->format($candidateQualification->exam_year) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= $this->Number->format($candidateQualification->experience) ?></td>
                                                                                                                                                                                                                                                    <td><?= $candidateQualification->has('candidate') ?
                                        $this->Html->link($candidateQualification
                                        ->candidate->id, ['controller' =>
                                        'Candidates', 'action' => 'view', $candidateQualification
                                        ->candidate
                                        ->id]) : '' ?>
                                    </td>
                                                                                                                                                                <td class="actions pull-right">
                            <?= $this->Html->link('', ['action' => 'view', $candidateQualification->id], ['class' => 'btn btn-xs fa fa-eye', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => __('View')]) ?>
                            <?= $this->Html->link('', ['action' => 'edit', $candidateQualification->id], ['class' => 'btn btn-xs fa fa-pencil-square-o', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => __('Edit')]) ?>
                            <?= $this->Form->postLink('', ['action' => 'delete', $candidateQualification->id], ['confirm' =>
                            __('Are you sure you want to delete # {0}?', $candidateQualification->id), 'class' => 'btn btn-xs fa fa-trash', 'style' => 'color: red', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => __('Delete')]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="box-footer">
                <ul class="pagination pagination-sm no-margin pull-right">
                    <?= $this->Paginator->first('<< ' . __('first')) ?>
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                    <?= $this->Paginator->last(__('last') . ' >>') ?>
                </ul>
                <p class="pull-right" style="margin-top: 5px; margin-right: 16px;"><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}},
                    showing {{current}} record(s) out of {{count}} total')]) ?></p>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    </section>
</div>
