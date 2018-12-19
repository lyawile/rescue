<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Candidate $candidate
 */
?>
<?= $this->Html->css('datepicker.min'); ?>
<?= $this->Html->css('select2.min'); ?>
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
                 <div class="col-sm-4">
                 		<div class="form-group"><label>Date of Birth:</label>
                        <div class="input-group date"><div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input class="form-control pull-right" name="date_of_birth" id="datepicker" type="text">
                        </div>
                        <!-- /.input group -->
                      </div>
				 <?php // echo $this->Form->control('date_of_birth', ['empty' => true]);?></div>
                 <div class="col-sm-4"><?php echo $this->Form->control('sex',['options' =>['M'=>'Male', 'F'=>'Female']]);?></div>
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
        <div class="row"><div class="col-sm-12"><br /><h4><?= __('Subjects') ?></h4></div></div>
        <div class="row">
        		 <div class="col-sm-12">
                 <select class="form-control select2 select2-hidden-accessible" name="insubs[]" multiple="" data-placeholder="Select Sujects" style="width: 100%; color:#222;" tabindex="-1" aria-hidden="true">
                 <?php foreach($subjects as $k=>$v)echo '<option value="'.$k.'">'.$v.'</option>'; ?>
                </select>
				</div>
        </div>
         
         <div class="row"><div class="col-sm-12"><br /><h4><?= __('Disabilities') ?></h4></div></div>
         <div class="row">
        		 <div class="col-sm-4">
                <select class="form-control select2 select2-hidden-accessible" name="indisbs[]" multiple="" data-placeholder="Select a Disability" style="width: 100%; color:#222;" tabindex="-1" aria-hidden="true">
                 <?php foreach($disabs as $k=>$dis)echo '<option>'.$dis.'</option>'; ?>
                </select>
              </div>
                 <div class="col-sm-8" id="setdis"></div>
        </div>
        <?php ?>
         <div class="row"><div class="col-sm-12"><br /><h4><?= __('Qualifications') ?></h4></div></div>
         <?php $one = range(date('Y'),1973); $two = range(date('Y'),1973); $sifa_years = array_combine( $one,$two); ?>
         <div class="row">
       			 <div class="col-sm-1">1</div>
        		 <div class="col-sm-2"><?php echo $this->Form->control('centre_number',['name' => 'cntno[]']);?></div>
                 <div class="col-sm-2"><?php echo $this->Form->control('candidate_number',['name' => 'candno[]']);?></div>
                 <div class="col-sm-2"><label>Exam Year</label><?php echo $this->Form->select('year[]',$sifa_years, ['class'=>'form-control','id'=>'year']);?></div>
        </div>
        <div class="row">
        		 <div class="col-sm-1">2</div>
        		 <div class="col-sm-2"><?php echo $this->Form->control('centre_number',['name' => 'cntno[]']);?></div>
                 <div class="col-sm-2"><?php echo $this->Form->control('candidate_number',['name' => 'candno[]']);?></div>
                 <div class="col-sm-2"><label>Exam Year</label><?php echo $this->Form->select('year[]',$sifa_years, ['class'=>'form-control','id'=>'year']);?></div>
        </div>
        <div class="row">
        		<div class="col-sm-1">3</div>
        		 <div class="col-sm-2"><?php echo $this->Form->control('centre_number',['name' => 'cntno[]']);?></div>
                 <div class="col-sm-2"><?php echo $this->Form->control('candidate_number',['name' => 'candno[]']);?></div>
                 <div class="col-sm-2"><label>Exam Year</label><?php echo $this->Form->select('year[]',$sifa_years, ['class'=>'form-control','id'=>'year']);?></div>
        </div>
 
    </div>
    <div class="box-footer">
        <?= $this->Form->button(__('Submit')) ?>
    </div>

    <?= $this->Form->end() ?>
</div>    </section>
</div>
<?= $this->Html->script('jquery'); ?>

<?= $this->Html->script('caandreg') ?>