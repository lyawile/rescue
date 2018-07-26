<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Centre $centre
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Centre'), ['action' => 'edit', $centre->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Centre'), ['action' => 'delete', $centre->id], ['confirm' => __('Are you sure you want to delete # {0}?', $centre->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Centres'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Centre'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Districts'), ['controller' => 'Districts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New District'), ['controller' => 'Districts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="centres view large-9 medium-8 columns content">
    <h3><?= h($centre->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Number') ?></th>
            <td><?= h($centre->number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($centre->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ownership') ?></th>
            <td><?= h($centre->ownership) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Detail') ?></th>
            <td><?= h($centre->detail) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Principal Name') ?></th>
            <td><?= h($centre->principal_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Principal Phone') ?></th>
            <td><?= h($centre->principal_phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact One') ?></th>
            <td><?= h($centre->contact_one) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact Two') ?></th>
            <td><?= h($centre->contact_two) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Centre Type') ?></th>
            <td><?= h($centre->centre_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('District') ?></th>
            <td><?= $centre->has('district') ? $this->Html->link($centre->district->name, ['controller' => 'Districts', 'action' => 'view', $centre->district->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($centre->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('District Distance') ?></th>
            <td><?= $this->Number->format($centre->district_distance) ?></td>
        </tr>
    </table>
</div>
