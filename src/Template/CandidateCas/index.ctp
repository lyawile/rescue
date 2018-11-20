<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CandidateCa[]|\Cake\Collection\CollectionInterface $candidateCas
 */
?>
<div class="candidateCas index large-9 medium-8 columns content">
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

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="btn-group pull-right">
                    <?= $this->Html->link(__('Download CA Template'), ['action' => 'templatedown'], ['class' => 'btn btn btn-info']) ?>
                    <?= $this->Html->link(__('Upload CA file'), ['action' => 'bulk'], ['class' => 'btn btn btn-info']) ?>
                    <?= $this->Html->link(__('New Candidate CA'), ['action' => 'add'], ['class' => 'btn btn btn-info']) ?>
            </div>
            <div class="box-body">
                <table cellpadding="0" cellspacing="0" class="table table table-striped">
                    <thead>
                    <tr>
                                                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('ftwo_centreno') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('ftwo_candidateno') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('ftwo_year') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('y1t1') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('y1t2') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('y2t1') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('project') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('btp') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('candidate_id') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('subject_id') ?></th>
                                                <th scope="col" class="actions pull-right"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($candidateCas as $candidateCa): ?>
                    <tr>
                                                                                                                                                                                                                                                                            <td><?= $this->Number->format($candidateCa->id) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= h($candidateCa->ftwo_centreno) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= h($candidateCa->ftwo_candidateno) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= h($candidateCa->ftwo_year) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= $this->Number->format($candidateCa->y1t1) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= $this->Number->format($candidateCa->y1t2) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= $this->Number->format($candidateCa->y2t1) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= $this->Number->format($candidateCa->project) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= h($candidateCa->btp) ?></td>
                                                                                                                                                                                                                                                    <td><?= $candidateCa->has('candidate') ?
                                        $this->Html->link($candidateCa
                                        ->candidate->number, ['controller' =>
                                        'Candidates', 'action' => 'view', $candidateCa
                                        ->candidate
                                        ->id]) : '' ?>
                                    </td>
                                                                                                                                                                                                                                                                                <td><?= $candidateCa->has('subject') ?
                                        $this->Html->link($candidateCa
                                        ->subject->name, ['controller' =>
                                        'Subjects', 'action' => 'view', $candidateCa
                                        ->subject
                                        ->id]) : '' ?>
                                    </td>
                                                                                                                                                                <td class="actions pull-right">
                            <?= $this->Html->link('', ['action' => 'view', $candidateCa->id], ['class' => 'btn btn-xs fa fa-eye', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => __('View')]) ?>
                            <?= $this->Html->link('', ['action' => 'edit', $candidateCa->id], ['class' => 'btn btn-xs fa fa-pencil-square-o', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => __('Edit')]) ?>
                            <?= $this->Form->postLink('', ['action' => 'delete', $candidateCa->id], ['confirm' =>
                            __('Are you sure you want to delete # {0}?', $candidateCa->id), 'class' => 'btn btn-xs fa fa-trash', 'style' => 'color: red', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => __('Delete')]) ?>
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
