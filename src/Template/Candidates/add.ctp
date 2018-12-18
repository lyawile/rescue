<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Candidate $candidate
 */
?>
<?= $this->Html->css('datepicker.min'); ?>
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
        		 <div class="col-sm-4">
				 <?php echo $this->Form->hidden('insubs', ['id'=>'insubs']);
				 echo $this->Form->select('ssub',$subjects, ['class'=>'form-control','empty'=>'Select a Subject','id'=>'ssub']);?></div>
                 <div class="col-sm-8" id="setsub"></div>
        </div>
         
         <div class="row"><div class="col-sm-12"><br /><h4><?= __('Disabilities') ?></h4></div></div>
         <div class="row">
        		 <div class="col-sm-4">
                  <?php echo $this->Form->hidden('indisbs', ['id'=>'indisbs']);
						echo $this->Form->select('sdis',$disabs, ['class'=>'form-control','empty'=>'Select a Disability','id'=>'sdis']);?></div>
                 <div class="col-sm-8" id="setdis"></div>
        </div>
         <div class="row"><div class="col-sm-12"><br /><h4><?= __('Qualifications') ?></h4></div></div>
         <?php $one = range(1973,date('Y')); $two = range(1973,date('Y')); $sifa_years = array_combine( $one,$two); ?>
         <div class="row">
       			 <div class="col-sm-1">1</div>
        		 <div class="col-sm-2"><?php echo $this->Form->control('centre_number',['name' => 'cntno[]']);?></div>
                 <div class="col-sm-2"><?php echo $this->Form->control('candidate_number',['name' => 'candno[]']);?></div>
                 <div class="col-sm-2"><?php echo $this->Form->select('year[]',$sifa_years, ['class'=>'form-control','id'=>'year']);?></div>
        </div>
        <div class="row">
        		 <div class="col-sm-1">2</div>
        		 <div class="col-sm-2"><?php echo $this->Form->control('centre_number',['name' => 'cntno[]']);?></div>
                 <div class="col-sm-2"><?php echo $this->Form->control('candidate_number',['name' => 'candno[]']);?></div>
                 <div class="col-sm-2"><?php echo $this->Form->select('year[]',$sifa_years, ['class'=>'form-control','id'=>'year']);?></div>
        </div>
        <div class="row">
        		<div class="col-sm-1">3</div>
        		 <div class="col-sm-2"><?php echo $this->Form->control('centre_number',['name' => 'cntno[]']);?></div>
                 <div class="col-sm-2"><?php echo $this->Form->control('candidate_number',['name' => 'candno[]']);?></div>
                 <div class="col-sm-2"><?php echo $this->Form->select('year[]',$sifa_years, ['class'=>'form-control','id'=>'year']);?></div>
        </div>
         <div class="form-group">
                <label>Date:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input class="form-control pull-right" id="datepicker" type="text">
                </div>
                <!-- /.input group -->
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