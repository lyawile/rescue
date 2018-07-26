<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Collection $collection
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Collection'), ['action' => 'edit', $collection->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Collection'), ['action' => 'delete', $collection->id], ['confirm' => __('Are you sure you want to delete # {0}?', $collection->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Collections'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Collection'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Exam Types'), ['controller' => 'ExamTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Exam Type'), ['controller' => 'ExamTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Collection Categories'), ['controller' => 'CollectionCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Collection Category'), ['controller' => 'CollectionCategories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="collections view large-9 medium-8 columns content">
    <h3><?= h($collection->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($collection->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($collection->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Exam Type') ?></th>
            <td><?= $collection->has('exam_type') ? $this->Html->link($collection->exam_type->name, ['controller' => 'ExamTypes', 'action' => 'view', $collection->exam_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Collection Category') ?></th>
            <td><?= $collection->has('collection_category') ? $this->Html->link($collection->collection_category->name, ['controller' => 'CollectionCategories', 'action' => 'view', $collection->collection_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($collection->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ammount') ?></th>
            <td><?= $this->Number->format($collection->ammount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Date') ?></th>
            <td><?= h($collection->start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Date') ?></th>
            <td><?= h($collection->end_date) ?></td>
        </tr>
    </table>
</div>
