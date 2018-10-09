<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CollectionCategory $collectionCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Collection Category'), ['action' => 'edit', $collectionCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Collection Category'), ['action' => 'delete', $collectionCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $collectionCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Collection Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Collection Category'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="collectionCategories view large-9 medium-8 columns content">
    <h3><?= h($collectionCategory->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($collectionCategory->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gsfcode') ?></th>
            <td><?= h($collectionCategory->gsfcode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Detail') ?></th>
            <td><?= h($collectionCategory->detail) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($collectionCategory->id) ?></td>
        </tr>
    </table>
</div>
