<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CentreExamType $centreExamType
 */
?>

<div class="centreExamTypes view large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Centre Exam Types') ?>
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
                <h4 class="pull-left"><?= h($centreExamType->id) ?></h4>
                <div class="btn-group pull-right">
                    <?= $this->Acl->link(__('New Centre Exam Type'), ['action' => 'add'], ['class' => 'btn btn
                    btn-default']) ?>
                    <?= $this->Acl->link(__('Edit Centre Exam Type'), ['action' => 'edit', $centreExamType->id],
                    ['class' => 'btn btn-default']) ?>
                    <?= $this->Form->postLink(__('Delete Centre Exam Type'), ['action' => 'delete', $centreExamType->id
                    ],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $centreExamType->id), 'class' => 'btn
                    btn-danger']) ?>
                </div>
            </div>
            <!-- Default box -->
            <div class="box-body">
                <table class="vertical-table table table table-striped">
                                                                                                                                        <tr>
                                    <th scope="row"><?= __('Exam Type') ?></th>
                                    <td><?= $centreExamType->has('exam_type') ?
                                        $this->Acl->link($centreExamType
                                        ->exam_type->name, ['controller' =>
                                        'ExamTypes', 'action' => 'view', $centreExamType
                                        ->exam_type
                                        ->id]) : '' ?>
                                    </td>
                                </tr>
                                                                                                                                                <tr>
                                    <th scope="row"><?= __('Centre') ?></th>
                                    <td><?= $centreExamType->has('centre') ?
                                        $this->Acl->link($centreExamType
                                        ->centre->name, ['controller' =>
                                        'Centres', 'action' => 'view', $centreExamType
                                        ->centre
                                        ->id]) : '' ?>
                                    </td>
                                </tr>
                                                                                                                                                                    <tr>
                                <th scope="row"><?= __('Id') ?></th>
                                <td><?= $this->Number->format($centreExamType->id) ?></td>
                            </tr>
                                                                                                    </table>
                                                            </div>
        </div>
    </section>
</div>
