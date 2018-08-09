<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Candidate $candidate
 */
?>

<div class="candidates view large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Candidates') ?>
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
                <h4 class="pull-left"><?= h($candidate->id) ?></h4>
                <div class="btn-group pull-right">
                    <?= $this->Html->link(__('New Candidate'), ['action' => 'add'], ['class' => 'btn btn
                    btn-default']) ?>
                    <?= $this->Html->link(__('Edit Candidate'), ['action' => 'edit', $candidate->id],
                    ['class' => 'btn btn-default']) ?>
                    <?= $this->Form->postLink(__('Delete Candidate'), ['action' => 'delete', $candidate->id
                    ],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $candidate->id), 'class' => 'btn
                    btn-danger']) ?>
                </div>
            </div>
            <!-- Default box -->
            <div class="box-body">
                <table class="vertical-table table table table-striped">
                                                                                                        <tr>
                                    <th scope="row"><?= __('Number') ?></th>
                                    <td><?= h($candidate->number) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('First Name') ?></th>
                                    <td><?= h($candidate->first_name) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Other Name') ?></th>
                                    <td><?= h($candidate->other_name) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Surname') ?></th>
                                    <td><?= h($candidate->surname) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Sex') ?></th>
                                    <td><?= h($candidate->sex) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('ID Number') ?></th>
                                    <td><?= h($candidate->ID_number) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Guardian Phone') ?></th>
                                    <td><?= h($candidate->guardian_phone) ?></td>
                                </tr>
                                                                                                                                                <tr>
                                    <th scope="row"><?= __('Exam Type') ?></th>
                                    <td><?= $candidate->has('exam_type') ?
                                        $this->Html->link($candidate
                                        ->exam_type->name, ['controller' =>
                                        'ExamTypes', 'action' => 'view', $candidate
                                        ->exam_type
                                        ->id]) : '' ?>
                                    </td>
                                </tr>
                                                                                                                                                <tr>
                                    <th scope="row"><?= __('Centre') ?></th>
                                    <td><?= $candidate->has('centre') ?
                                        $this->Html->link($candidate
                                        ->centre->name, ['controller' =>
                                        'Centres', 'action' => 'view', $candidate
                                        ->centre
                                        ->id]) : '' ?>
                                    </td>
                                </tr>
                                                                                                                                                                    <tr>
                                <th scope="row"><?= __('Id') ?></th>
                                <td><?= $this->Number->format($candidate->id) ?></td>
                            </tr>
                                                    <tr>
                                <th scope="row"><?= __('PSLE Number') ?></th>
                                <td><?= $this->Number->format($candidate->PSLE_number) ?></td>
                            </tr>
                                                    <tr>
                                <th scope="row"><?= __('PSLE Year') ?></th>
                                <td><?= $this->Number->format($candidate->PSLE_year) ?></td>
                            </tr>
                                                    <tr>
                                <th scope="row"><?= __('Is Repeater') ?></th>
                                <td><?= $this->Number->format($candidate->is_repeater) ?></td>
                            </tr>
                                                                                                                    <tr>
                                <th scope="row"><?= __('Date Of Birth') ?></th>
                                <td><?= h($candidate->date_of_birth) ?></td>
                            </tr>
                                                                                </table>
                                                            </div>
        </div>
    </section>
</div>
