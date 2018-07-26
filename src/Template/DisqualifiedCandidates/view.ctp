<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DisqualifiedCandidate $disqualifiedCandidate
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Disqualified Candidate'), ['action' => 'edit', $disqualifiedCandidate->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Disqualified Candidate'), ['action' => 'delete', $disqualifiedCandidate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $disqualifiedCandidate->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Disqualified Candidates'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Disqualified Candidate'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Exam Types'), ['controller' => 'ExamTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Exam Type'), ['controller' => 'ExamTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Centres'), ['controller' => 'Centres', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Centre'), ['controller' => 'Centres', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="disqualifiedCandidates view large-9 medium-8 columns content">
    <h3><?= h($disqualifiedCandidate->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Number') ?></th>
            <td><?= h($disqualifiedCandidate->number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($disqualifiedCandidate->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Other Name') ?></th>
            <td><?= h($disqualifiedCandidate->other_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Surname') ?></th>
            <td><?= h($disqualifiedCandidate->surname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sex') ?></th>
            <td><?= h($disqualifiedCandidate->sex) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID Number') ?></th>
            <td><?= h($disqualifiedCandidate->ID_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Guardian Phone') ?></th>
            <td><?= h($disqualifiedCandidate->guardian_phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Exam Type') ?></th>
            <td><?= $disqualifiedCandidate->has('exam_type') ? $this->Html->link($disqualifiedCandidate->exam_type->name, ['controller' => 'ExamTypes', 'action' => 'view', $disqualifiedCandidate->exam_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Centre') ?></th>
            <td><?= $disqualifiedCandidate->has('centre') ? $this->Html->link($disqualifiedCandidate->centre->name, ['controller' => 'Centres', 'action' => 'view', $disqualifiedCandidate->centre->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($disqualifiedCandidate->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PSLE Number') ?></th>
            <td><?= $this->Number->format($disqualifiedCandidate->PSLE_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PSLE Year') ?></th>
            <td><?= $this->Number->format($disqualifiedCandidate->PSLE_year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Repeater') ?></th>
            <td><?= $this->Number->format($disqualifiedCandidate->is_repeater) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Of Birth') ?></th>
            <td><?= h($disqualifiedCandidate->date_of_birth) ?></td>
        </tr>
    </table>
</div>
