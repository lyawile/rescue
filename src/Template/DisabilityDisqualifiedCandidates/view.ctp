<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DisabilityDisqualifiedCandidate $disabilityDisqualifiedCandidate
 */
?>

<div class="disabilityDisqualifiedCandidates view large-9 medium-8 columns content">
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
        <div class="box">
            <div class="box-header with-border">
                <h4 class="pull-left"><?= h($disabilityDisqualifiedCandidate->id) ?></h4>
                <div class="btn-group pull-right">
                    <?= $this->Html->link(__('New Disability Disqualified Candidate'), ['action' => 'add'], ['class' => 'btn btn
                    btn-default']) ?>
                    <?= $this->Html->link(__('Edit Disability Disqualified Candidate'), ['action' => 'edit', $disabilityDisqualifiedCandidate->id],
                    ['class' => 'btn btn-default']) ?>
                    <?= $this->Form->postLink(__('Delete Disability Disqualified Candidate'), ['action' => 'delete', $disabilityDisqualifiedCandidate->id
                    ],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $disabilityDisqualifiedCandidate->id), 'class' => 'btn
                    btn-danger']) ?>
                </div>
            </div>
            <!-- Default box -->
            <div class="box-body">
                <table class="vertical-table table table table-striped">
                                                                                                                                        <tr>
                                    <th scope="row"><?= __('Disability') ?></th>
                                    <td><?= $disabilityDisqualifiedCandidate->has('disability') ?
                                        $this->Html->link($disabilityDisqualifiedCandidate
                                        ->disability->name, ['controller' =>
                                        'Disabilities', 'action' => 'view', $disabilityDisqualifiedCandidate
                                        ->disability
                                        ->id]) : '' ?>
                                    </td>
                                </tr>
                                                                                                                                                <tr>
                                    <th scope="row"><?= __('Disqualified Candidate') ?></th>
                                    <td><?= $disabilityDisqualifiedCandidate->has('disqualified_candidate') ?
                                        $this->Html->link($disabilityDisqualifiedCandidate
                                        ->disqualified_candidate->id, ['controller' =>
                                        'DisqualifiedCandidates', 'action' => 'view', $disabilityDisqualifiedCandidate
                                        ->disqualified_candidate
                                        ->id]) : '' ?>
                                    </td>
                                </tr>
                                                                                                                                                                    <tr>
                                <th scope="row"><?= __('Id') ?></th>
                                <td><?= $this->Number->format($disabilityDisqualifiedCandidate->id) ?></td>
                            </tr>
                                                                                                    </table>
                                                            </div>
        </div>
    </section>
</div>
