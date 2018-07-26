<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bill $bill
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Bill'), ['action' => 'edit', $bill->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bill'), ['action' => 'delete', $bill->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bill->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Bills'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bill'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bills view large-9 medium-8 columns content">
    <h3><?= h($bill->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Reference') ?></th>
            <td><?= h($bill->reference) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payer Name') ?></th>
            <td><?= h($bill->payer_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payer Mobile') ?></th>
            <td><?= h($bill->payer_mobile) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payer Email') ?></th>
            <td><?= h($bill->payer_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Control Number') ?></th>
            <td><?= h($bill->control_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($bill->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($bill->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Equivalent Amount') ?></th>
            <td><?= $this->Number->format($bill->equivalent_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Misc Amount') ?></th>
            <td><?= $this->Number->format($bill->misc_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payer Idx') ?></th>
            <td><?= $this->Number->format($bill->payer_idx) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Has Reminder') ?></th>
            <td><?= $this->Number->format($bill->has_reminder) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Expire Date') ?></th>
            <td><?= h($bill->expire_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Generated Date') ?></th>
            <td><?= h($bill->generated_date) ?></td>
        </tr>
    </table>
</div>
