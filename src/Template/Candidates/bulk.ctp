<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CandidateCa $candidateCa
 */
?>
<div class="candidateCas index large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Candidate Registration') ?>
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
        <h3 class="box-title"><?= __('Upload Registration File') ?></h3>
        <div class="pull-right">
             <b><span id="centexm"><?php echo $centre; ?></span></b>
        </div>
    </div>
    <div class="box-body">
    
    	<div class="row">
              <div class="col-lg-6">
              <?= $this->Form->create(null, ['type' => 'file','url' => ['action' => 'bulk']]) ?>
                                    <div class="input-group">
                                    <input type="file" id="file" name="file" class="form-control" aria-label="...">
                                    <input type="hidden" name="exam" id="exam" value="" />
                                      <div class="input-group-btn">
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:120px;">
                                    <span id="hd_exam">Select Exam</span>&nbsp;&nbsp;<span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                        <?php
                                        foreach($etypes as $exam)
										{
											echo '<li><a href="#" class="cls_exams">'.$exam.'</a></li>';
										}
										?>
                                        </ul>
                                        <!-- disabled=disabled -->
                                      <button class="btn btn-info" type="submit" >Upload File!</button>
                    <?= $this->Form->end() ?>
                                        <!-- Buttons -->
                                      </div>
                                    </div>
              </div><!-- /.col-lg-6 -->
              <div class="col-lg-6"></div>
		</div>
        <br />
	    
         <?php 
		 if(isset($comp))
		{
			echo '<div class="row"><div class="col-md-12"><div class="callout callout-warning"><h5>STUDENTS ALREADY REGISTERED</h5><br>'.$comp.'</div></div></div>';
		}
		if(isset($incomp))
		{
		echo '<div class="row"><div class="col-md-12"><div class="callout callout-warning"><h5>STUDENTS ALREADY DISQUALIFIED</h5><br>'.$incomp.'</div></div></div>';
		}
		?>
              
              
    </div><!-- box body --> 
    <div class="box-footer">
    </div>

</div>    </section>
</div>
<?= $this->Html->script('jquery'); ?>
<?= $this->Html->script('caandreg') ?>