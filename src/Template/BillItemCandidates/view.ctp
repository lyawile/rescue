<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BillItemCandidate $billItemCandidate
 */
?>

<div class="billItemCandidates view large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Bill Item Candidates') ?>
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
                <h4 class="pull-left"><?= h($billItemCandidate->id) ?></h4>
                <div class="btn-group pull-right">
                    <?= $this->Html->link(__('New Bill Item Candidate'), ['action' => 'add'], ['class' => 'btn btn
                    btn-default']) ?>
                    <?= $this->Html->link(__('Edit Bill Item Candidate'), ['action' => 'edit', $billItemCandidate->id],
                    ['class' => 'btn btn-default']) ?>
                    <?= $this->Form->postLink(__('Delete Bill Item Candidate'), ['action' => 'delete', $billItemCandidate->id
                    ],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $billItemCandidate->id), 'class' => 'btn
                    btn-danger']) ?>
                </div>
            </div>
            <!-- Default box -->
            <div class="box-body">
                <table class="vertical-table table table table-striped">
                                                                                                                                        <tr>
                                    <th scope="row"><?= __('Candidate') ?></th>
                                    <td><?= $billItemCandidate->has('candidate') ?
                                        $this->Html->link($billItemCandidate
                                        ->candidate->id, ['controller' =>
                                        'Candidates', 'action' => 'view', $billItemCandidate
                                        ->candidate
                                        ->id]) : '' ?>
                                    </td>
                                </tr>
                                                                                                                                                <tr>
                                    <th scope="row"><?= __('Bill Item') ?></th>
                                    <td><?= $billItemCandidate->has('bill_item') ?
                                        $this->Html->link($billItemCandidate
                                        ->bill_item->id, ['controller' =>
                                        'BillItems', 'action' => 'view', $billItemCandidate
                                        ->bill_item
                                        ->id]) : '' ?>
                                    </td>
                                </tr>
                                                                                                                                                                    <tr>
                                <th scope="row"><?= __('Id') ?></th>
                                <td><?= $this->Number->format($billItemCandidate->id) ?></td>
                            </tr>
                                                                                                    </table>
                                                            </div>
        </div>
    </section>
</div>
