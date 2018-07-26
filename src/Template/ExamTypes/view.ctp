<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExamType $examType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Exam Type'), ['action' => 'edit', $examType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Exam Type'), ['action' => 'delete', $examType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Exam Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Exam Type'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="examTypes view large-9 medium-8 columns content">
    <h3><?= h($examType->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($examType->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Short Name') ?></th>
            <td><?= h($examType->short_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($examType->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= $this->Number->format($examType->code) ?></td>
        </tr>
    </table>
</div>
