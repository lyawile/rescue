<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DisqualifiedCandidate $disqualifiedCandidate
 */
?>
<div class="disqualifiedCandidates index large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Disqualified Candidates') ?>
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
        <h3 class="box-title"><?= __('Edit Disqualified Candidate') ?></h3>
    </div>
    <div class="box-body">
        <?= $this->Form->create($disqualifiedCandidate) ?>
        <div class="col-sm-8">
            <fieldset>
                <?php
                                    echo $this->Form->control('number');
                        echo $this->Form->control('first_name');
                        echo $this->Form->control('other_name');
                        echo $this->Form->control('surname');
                        echo $this->Form->control('sex');
                        echo $this->Form->control('PSLE_number');
                        echo $this->Form->control('PSLE_year');
                        echo $this->Form->control('ID_number');
                        echo $this->Form->control('date_of_birth', ['empty' => true]);
                        echo $this->Form->control('guardian_phone');
                        echo $this->Form->control('work_experience');
                        echo $this->Form->control('combination');
                        echo $this->Form->control('is_repeater');
                        echo $this->Form->control('subjects');
                        echo $this->Form->control('disabilities');
                        echo $this->Form->control('reason');
                        echo $this->Form->control('sifa');
                    echo $this->Form->control('exam_type_id', ['options' => $examTypes]);
                    echo $this->Form->control('centre_id', ['options' => $centres]);
                ?>
            </fieldset>
        </div>
    </div>
    <div class="box-footer">
        <?= $this->Form->button(__('Submit')) ?>
    </div>

    <?= $this->Form->end() ?>
</div>    </section>
</div>
