<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DisqualifiedCandidateSubject[]|\Cake\Collection\CollectionInterface $disqualifiedCandidateSubjects
 */
?>
<div class="disqualifiedCandidateSubjects index large-9 medium-8 columns content">
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

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="btn-group pull-right">
                    <?= $this->Html->link(__('New Disqualified Candidate Subject'), ['action' => 'add'], ['class' => 'btn btn btn-success']) ?>
                </div>
            </div>
            <div class="box-body">
                <table cellpadding="0" cellspacing="0" class="table table table-striped">
                    <thead>
                    <tr>
                                                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('subjects_id') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('disqualified_candidates_id') ?></th>
                                                <th scope="col" class="actions pull-right"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($disqualifiedCandidateSubjects as $disqualifiedCandidateSubject): ?>
                    <tr>
                                                                                                                                                                                                                                                                            <td><?= $this->Number->format($disqualifiedCandidateSubject->id) ?></td>
                                                                                                                                                                                                                                                    <td><?= $disqualifiedCandidateSubject->has('subject') ?
                                        $this->Html->link($disqualifiedCandidateSubject
                                        ->subject->name, ['controller' =>
                                        'Subjects', 'action' => 'view', $disqualifiedCandidateSubject
                                        ->subject
                                        ->id]) : '' ?>
                                    </td>
                                                                                                                                                                                                                                                                                <td><?= $disqualifiedCandidateSubject->has('disqualified_candidate') ?
                                        $this->Html->link($disqualifiedCandidateSubject
                                        ->disqualified_candidate->id, ['controller' =>
                                        'DisqualifiedCandidates', 'action' => 'view', $disqualifiedCandidateSubject
                                        ->disqualified_candidate
                                        ->id]) : '' ?>
                                    </td>
                                                                                                                                                                <td class="actions pull-right">
                            <?= $this->Html->link('', ['action' => 'view', $disqualifiedCandidateSubject->id], ['class' => 'btn btn-xs fa fa-eye', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => __('View')]) ?>
                            <?= $this->Html->link('', ['action' => 'edit', $disqualifiedCandidateSubject->id], ['class' => 'btn btn-xs fa fa-pencil-square-o', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => __('Edit')]) ?>
                            <?= $this->Form->postLink('', ['action' => 'delete', $disqualifiedCandidateSubject->id], ['confirm' =>
                            __('Are you sure you want to delete # {0}?', $disqualifiedCandidateSubject->id), 'class' => 'btn btn-xs fa fa-trash', 'style' => 'color: red', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => __('Delete')]) ?>
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
