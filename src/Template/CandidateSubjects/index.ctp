<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CandidateSubject[]|\Cake\Collection\CollectionInterface $candidateSubjects
 */
?>
<div class="candidateSubjects index large-9 medium-8 columns content">
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

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="btn-group pull-right">
                    <?= $this->Html->link(__('New Candidate Subject'), ['action' => 'add'], ['class' => 'btn btn btn-success']) ?>
                </div>
            </div>
            <div class="box-body">
                <table cellpadding="0" cellspacing="0" class="table table table-striped">
                    <thead>
                    <tr>
                                                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('candidates_id') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('subjects_id') ?></th>
                                                <th scope="col" class="actions pull-right"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($candidateSubjects as $candidateSubject): ?>
                    <tr>
                                                                                                                                                                                                                                                                            <td><?= $this->Number->format($candidateSubject->id) ?></td>
                                                                                                                                                                                                                                                    <td><?= $candidateSubject->has('candidate') ?
                                        $this->Html->link($candidateSubject
                                        ->candidate->id, ['controller' =>
                                        'Candidates', 'action' => 'view', $candidateSubject
                                        ->candidate
                                        ->id]) : '' ?>
                                    </td>
                                                                                                                                                                                                                                                                                <td><?= $candidateSubject->has('subject') ?
                                        $this->Html->link($candidateSubject
                                        ->subject->name, ['controller' =>
                                        'Subjects', 'action' => 'view', $candidateSubject
                                        ->subject
                                        ->id]) : '' ?>
                                    </td>
                                                                                                                                                                <td class="actions pull-right">
                            <?= $this->Html->link('', ['action' => 'view', $candidateSubject->id], ['class' => 'btn btn-xs fa fa-eye', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => __('View')]) ?>
                            <?= $this->Html->link('', ['action' => 'edit', $candidateSubject->id], ['class' => 'btn btn-xs fa fa-pencil-square-o', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => __('Edit')]) ?>
                            <?= $this->Form->postLink('', ['action' => 'delete', $candidateSubject->id], ['confirm' =>
                            __('Are you sure you want to delete # {0}?', $candidateSubject->id), 'class' => 'btn btn-xs fa fa-trash', 'style' => 'color: red', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => __('Delete')]) ?>
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
