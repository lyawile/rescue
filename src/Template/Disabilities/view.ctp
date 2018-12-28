<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Disability $disability
 */
?>

<div class="disabilities view large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Disabilities') ?>
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
                <h4 class="pull-left"><?= h($disability->name) ?></h4>
                <div class="btn-group pull-right">
                    <?= $this->Html->link(__('New Disability'), ['action' => 'add'], ['class' => 'btn btn
                    btn-default']) ?>
                    <?= $this->Html->link(__('Edit Disability'), ['action' => 'edit', $disability->id],
                        ['class' => 'btn btn-default']) ?>
                    <?= $this->Form->postLink(__('Delete Disability'), ['action' => 'delete', $disability->id
                    ],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $disability->id), 'class' => 'btn
                    btn-danger']) ?>
                </div>
            </div>
            <!-- Default box -->
            <div class="box-body">
                <table class="vertical-table table table table-striped">
                    <tr>
                        <th scope="row"><?= __('Name') ?></th>
                        <td><?= h($disability->name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Shortname') ?></th>
                        <td><?= h($disability->shortname) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Details') ?></th>
                        <td><?= h($disability->details) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($disability->id) ?></td>
                    </tr>
                </table>
                <div class="related">
                    <h4><?= __('Related Candidate Disabilities') ?></h4>
                    <?php if (!empty($disability->candidate_disabilities)): ?>
                        <table cellpadding="0" cellspacing="0" class="table table table-striped">
                            <tr>
                                <th scope="col"><?= __('Id') ?></th>
                                <th scope="col"><?= __('Candidate Id') ?></th>
                                <th scope="col"><?= __('Disability Id') ?></th>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($disability->candidate_disabilities as $candidateDisabilities): ?>
                                <tr>
                                    <td><?= h($candidateDisabilities->id) ?></td>
                                    <td><?= h($candidateDisabilities->candidate_id) ?></td>
                                    <td><?= h($candidateDisabilities->disability_id) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'CandidateDisabilities',
                                            'action'
                                            =>
                                                'view', $candidateDisabilities->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['controller' => 'CandidateDisabilities',
                                            'action'
                                            =>
                                                'edit', $candidateDisabilities->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'CandidateDisabilities',
                                            'action' =>
                                                'delete', $candidateDisabilities->id], ['confirm' => __('Are you sure you want to delete #
                                    {0}?', $candidateDisabilities->id)]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</div>
