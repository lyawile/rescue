<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CandidateCa $candidateCa
 */
?>
<div class="candidateCas index large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Candidate Cas') ?>
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
        <h3 class="box-title"><?= __('Add Candidate Ca') ?></h3>
    </div>
    <div class="box-body">
        <?= $this->Form->create($candidateCa) ?>
        <div class="col-sm-8">
            <fieldset>
                <?php
                                    echo $this->Form->control('ftwo_centreno');
                        echo $this->Form->control('ftwo_candidateno');
                        echo $this->Form->control('ftwo_year');
                        echo $this->Form->control('y1t1');
                        echo $this->Form->control('y1t2');
                        echo $this->Form->control('y2t1');
                        echo $this->Form->control('project');
                        echo $this->Form->control('btp');
                     echo $this->Form->control('candidate_subject_id', ['options' => $candidateSubjects, 'empty' => true]);
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
