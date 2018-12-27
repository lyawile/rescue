<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExamType $examType
 */
?>

<div class="examTypes view large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Exam Types') ?>
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
                <h4 class="pull-left"><?= h($examType->name) ?></h4>
                <div class="btn-group pull-right">
                    <?= $this->Acl->link(__('New Exam Type'), ['action' => 'add'], ['class' => 'btn btn
                    btn-default']) ?>
                    <?= $this->Acl->link(__('Edit Exam Type'), ['action' => 'edit', $examType->id],
                        ['class' => 'btn btn-default']) ?>
                    <?= $this->Acl->postLink(__('Delete Exam Type'), ['action' => 'delete', $examType->id
                    ],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $examType->id), 'class' => 'btn
                    btn-danger']) ?>
                </div>
            </div>
            <!-- Default box -->
            <div class="box-body">
                <table class="vertical-table table table table-striped">
                    <tr>
                        <th scope="row"><?= __('Name') ?></th>
                        <td><?= h($examType->name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Short Name') ?></th>
                        <td><?= h($examType->short_name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Has Ca') ?></th>
                        <td><?= $this->Number->format($examType->has_ca) ?></td>
                    </tr>
                </table>
                <div class="related">
                    <h4><?= __('Related Subjects') ?></h4>
                    <?php if (!empty($examType->subjects)): ?>
                        <table cellpadding="0" cellspacing="0" class="table table table-striped">
                            <tr>
                                <th scope="col"><?= __('Code') ?></th>
                                <th scope="col"><?= __('Name') ?></th>
                                <th scope="col"><?= __('Short Name') ?></th>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($examType->subjects as $subjects): ?>
                                <tr>
                                    <td><?= h($subjects->code) ?></td>
                                    <td><?= h($subjects->name) ?></td>
                                    <td><?= h($subjects->short_name) ?></td>
                                    <td class="actions">
                                        <?= $this->Acl->link(__('View'), ['controller' => 'Subjects',
                                            'action'
                                            =>
                                                'view', $subjects->id]) ?>
                                        <?= $this->Acl->link(__('Edit'), ['controller' => 'Subjects',
                                            'action'
                                            =>
                                                'edit', $subjects->id]) ?>
                                        <?= $this->Acl->postLink(__('Delete'), ['controller' => 'Subjects',
                                            'action' =>
                                                'delete', $subjects->id], ['confirm' => __('Are you sure you want to delete #
                                    {0}?', $subjects->id)]) ?>
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
