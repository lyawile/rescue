<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Subject $subject
 */
?>

<div class="subjects view large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Subjects') ?>
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
                <h4 class="pull-left"><?= h($subject->name) ?></h4>
                <div class="btn-group pull-right">
                    <?= $this->Html->link(__('New Subject'), ['action' => 'add'], ['class' => 'btn btn
                    btn-default']) ?>
                    <?= $this->Html->link(__('Edit Subject'), ['action' => 'edit', $subject->id],
                    ['class' => 'btn btn-default']) ?>
                    <?= $this->Form->postLink(__('Delete Subject'), ['action' => 'delete', $subject->id
                    ],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $subject->id), 'class' => 'btn
                    btn-danger']) ?>
                </div>
            </div>
            <!-- Default box -->
            <div class="box-body">
                <table class="vertical-table table table table-striped">
                                                                                                        <tr>
                                    <th scope="row"><?= __('Code') ?></th>
                                    <td><?= h($subject->code) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Name') ?></th>
                                    <td><?= h($subject->name) ?></td>
                                </tr>
                                                                                                                <tr>
                                    <th scope="row"><?= __('Short Name') ?></th>
                                    <td><?= h($subject->short_name) ?></td>
                                </tr>
                                                                                                                                                <tr>
                                    <th scope="row"><?= __('Exam Type') ?></th>
                                    <td><?= $subject->has('exam_type') ?
                                        $this->Html->link($subject
                                        ->exam_type->name, ['controller' =>
                                        'ExamTypes', 'action' => 'view', $subject
                                        ->exam_type
                                        ->id]) : '' ?>
                                    </td>
                                </tr>
                                                                                                                                                                    <tr>
                                <th scope="row"><?= __('Id') ?></th>
                                <td><?= $this->Number->format($subject->id) ?></td>
                            </tr>
                                                                                                    </table>
                                                            </div>
        </div>
    </section>
</div>
