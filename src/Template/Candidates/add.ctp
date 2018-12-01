<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Candidate $candidate
 */
?>
<div class="candidates index large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Candidates') ?>
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
        <h3 class="box-title"><?= __('Add Candidate') ?></h3>
    </div>
    <div class="box-body">
        <?= $this->Form->create($candidate) ?>
        <div class="row">
        		 <div class="col-sm-4"><?php echo $this->Form->control('first_name');?></div>
                 <div class="col-sm-4"><?php echo $this->Form->control('other_name');?></div>
                 <div class="col-sm-4"><?php echo $this->Form->control('surname');?></div>
        </div>
        <div class="row">
        		 <div class="col-sm-4"><?php echo $this->Form->control('number');?></div>
                 <div class="col-sm-4"><?php echo $this->Form->control('date_of_birth', ['empty' => true]);?></div>
                 <div class="col-sm-4"><?php echo $this->Form->control('sex');?></div>
        </div>
        
        <div class="row">
        		 <div class="col-sm-4"><?php echo $this->Form->control('PSLE_number');?></div>
                 <div class="col-sm-4"><?php echo $this->Form->control('PSLE_year');?></div>
                 <div class="col-sm-4"><?php echo $this->Form->control('ID_number');?></div>
        </div>
        <div class="row">
        		 <div class="col-sm-4"><?php echo $this->Form->control('guardian_phone');?></div>
                 <div class="col-sm-4"><?php echo $this->Form->control('work_experience');?></div>
                 <div class="col-sm-4"><?php echo $this->Form->control('combination');?></div>
        </div>
        <div class="row">
        		 <div class="col-sm-4"><?php echo $this->Form->control('is_repeater');?></div>
                 <div class="col-sm-4"><?php  echo $this->Form->control('exam_type_id', ['options' => $examTypes]); ?></div>
                 <div class="col-sm-4"><?php echo $this->Form->control('centre_id', ['options' => $centres]);?></div>
        </div>
        
    </div>
    <div class="box-footer">
        <?= $this->Form->button(__('Submit')) ?>
    </div>

    <?= $this->Form->end() ?>
</div>    </section>
</div>
