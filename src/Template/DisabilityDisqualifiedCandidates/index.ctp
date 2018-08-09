<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DisabilityDisqualifiedCandidate[]|\Cake\Collection\CollectionInterface $disabilityDisqualifiedCandidates
 */
?>
<div class="disabilityDisqualifiedCandidates index large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Disability Disqualified Candidates') ?>
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
                    <?= $this->Html->link(__('New Disability Disqualified Candidate'), ['action' => 'add'], ['class' => 'btn btn btn-success']) ?>
                </div>
            </div>
            <div class="box-body">
                <table cellpadding="0" cellspacing="0" class="table table table-striped">
                    <thead>
                    <tr>
                                                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('disabilities_id') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('disqualified_candidates_id') ?></th>
                                                <th scope="col" class="actions pull-right"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($disabilityDisqualifiedCandidates as $disabilityDisqualifiedCandidate): ?>
                    <tr>
                                                                                                                                                                                                                                                                            <td><?= $this->Number->format($disabilityDisqualifiedCandidate->id) ?></td>
                                                                                                                                                                                                                                                    <td><?= $disabilityDisqualifiedCandidate->has('disability') ?
                                        $this->Html->link($disabilityDisqualifiedCandidate
                                        ->disability->name, ['controller' =>
                                        'Disabilities', 'action' => 'view', $disabilityDisqualifiedCandidate
                                        ->disability
                                        ->id]) : '' ?>
                                    </td>
                                                                                                                                                                                                                                                                                <td><?= $disabilityDisqualifiedCandidate->has('disqualified_candidate') ?
                                        $this->Html->link($disabilityDisqualifiedCandidate
                                        ->disqualified_candidate->id, ['controller' =>
                                        'DisqualifiedCandidates', 'action' => 'view', $disabilityDisqualifiedCandidate
                                        ->disqualified_candidate
                                        ->id]) : '' ?>
                                    </td>
                                                                                                                                                                <td class="actions pull-right">
                            <?= $this->Html->link('', ['action' => 'view', $disabilityDisqualifiedCandidate->id], ['class' => 'btn btn-xs fa fa-eye', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => __('View')]) ?>
                            <?= $this->Html->link('', ['action' => 'edit', $disabilityDisqualifiedCandidate->id], ['class' => 'btn btn-xs fa fa-pencil-square-o', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => __('Edit')]) ?>
                            <?= $this->Form->postLink('', ['action' => 'delete', $disabilityDisqualifiedCandidate->id], ['confirm' =>
                            __('Are you sure you want to delete # {0}?', $disabilityDisqualifiedCandidate->id), 'class' => 'btn btn-xs fa fa-trash', 'style' => 'color: red', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => __('Delete')]) ?>
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
