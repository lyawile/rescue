<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DisqualifiedCandidateSubject $disqualifiedCandidateSubject
 */
?>
<div class="disqualifiedCandidateSubjects index large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Disqualified Candidate Subjects') ?>
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
        <h3 class="box-title"><?= __('Edit Disqualified Candidate Subject') ?></h3>
    </div>
    <div class="box-body">
        <?= $this->Form->create($disqualifiedCandidateSubject) ?>
        <fieldset>
            <?php
                            echo $this->Form->control('subjects_id', ['options' => $subjects]);
                echo $this->Form->control('disqualified_candidates_id', ['options' => $disqualifiedCandidates]);
            ?>
        </fieldset>
    </div>
    <div class="box-footer">
        <?= $this->Form->button(__('Submit')) ?>
    </div>

    <?= $this->Form->end() ?>
</div>    </section>
</div>
