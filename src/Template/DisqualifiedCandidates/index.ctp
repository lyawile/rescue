<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DisqualifiedCandidate[]|\Cake\Collection\CollectionInterface $disqualifiedCandidates
 */
?>
<div class="disqualifiedCandidates index large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Disqualified Candidates') ?>
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
                    <?= $this->Html->link(__('New Disqualified Candidate'), ['action' => 'add'], ['class' => 'btn btn btn-success']) ?>
                </div>
            </div>
            <div class="box-body">
                <table cellpadding="0" cellspacing="0" class="table table table-striped">
                    <thead>
                    <tr>
                                                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('number') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('other_name') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('surname') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('sex') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('PSLE_number') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('PSLE_year') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('ID_number') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('date_of_birth') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('guardian_phone') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('is_repeater') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('exam_types_id') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('centres_id') ?></th>
                                                <th scope="col" class="actions pull-right"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($disqualifiedCandidates as $disqualifiedCandidate): ?>
                    <tr>
                                                                                                                                                                                                                                                                            <td><?= $this->Number->format($disqualifiedCandidate->id) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= h($disqualifiedCandidate->number) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= h($disqualifiedCandidate->first_name) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= h($disqualifiedCandidate->other_name) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= h($disqualifiedCandidate->surname) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= h($disqualifiedCandidate->sex) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= $this->Number->format($disqualifiedCandidate->PSLE_number) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= $this->Number->format($disqualifiedCandidate->PSLE_year) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= h($disqualifiedCandidate->ID_number) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= h($disqualifiedCandidate->date_of_birth) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= h($disqualifiedCandidate->guardian_phone) ?></td>
                                                                                                                                                                                                                                                                                                                                        <td><?= $this->Number->format($disqualifiedCandidate->is_repeater) ?></td>
                                                                                                                                                                                                                                                    <td><?= $disqualifiedCandidate->has('exam_type') ?
                                        $this->Html->link($disqualifiedCandidate
                                        ->exam_type->name, ['controller' =>
                                        'ExamTypes', 'action' => 'view', $disqualifiedCandidate
                                        ->exam_type
                                        ->id]) : '' ?>
                                    </td>
                                                                                                                                                                                                                                                                                <td><?= $disqualifiedCandidate->has('centre') ?
                                        $this->Html->link($disqualifiedCandidate
                                        ->centre->name, ['controller' =>
                                        'Centres', 'action' => 'view', $disqualifiedCandidate
                                        ->centre
                                        ->id]) : '' ?>
                                    </td>
                                                                                                                                                                <td class="actions pull-right">
                            <?= $this->Html->link('', ['action' => 'view', $disqualifiedCandidate->id], ['class' => 'btn btn-xs fa fa-eye', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => __('View')]) ?>
                            <?= $this->Html->link('', ['action' => 'edit', $disqualifiedCandidate->id], ['class' => 'btn btn-xs fa fa-pencil-square-o', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => __('Edit')]) ?>
                            <?= $this->Form->postLink('', ['action' => 'delete', $disqualifiedCandidate->id], ['confirm' =>
                            __('Are you sure you want to delete # {0}?', $disqualifiedCandidate->id), 'class' => 'btn btn-xs fa fa-trash', 'style' => 'color: red', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => __('Delete')]) ?>
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
