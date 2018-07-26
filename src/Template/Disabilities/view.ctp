<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Disability $disability
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Disability'), ['action' => 'edit', $disability->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Disability'), ['action' => 'delete', $disability->id], ['confirm' => __('Are you sure you want to delete # {0}?', $disability->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Disabilities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Disability'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="disabilities view large-9 medium-8 columns content">
    <h3><?= h($disability->name) ?></h3>
    <table class="vertical-table">
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
</div>
