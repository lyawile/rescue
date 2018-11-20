<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CandidateCa $candidateCa
 */
?>

<div class="candidateCas view large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Centrewise CA Templates') ?>
            <small>Select Subjects to be included in the CA template File</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>
     	<?= $this->Form->create(null, ['url' => ['action' => 'templatedown'],'id'=>'ftemp']);?>
   		<?= $this->Form->input('', array('type'=>'hidden','name'=>'urlx','id'=>'urlx','value'=>$this->Url->build('/', true))) ?>

    <section class="content">
        <div class="box">
       
            <div class="box-header with-border">
            
                <div class="pull-left">
                 	
                    <input type="hidden" name="exam" id="exam" value="" />
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:120px;">
                                    <span id="hd_exam">Select Exam</span>&nbsp;&nbsp;<span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                        <?php
                                        foreach($etypes as $k=>$exam)
										{
											echo '<li><a href="#" id="'.$k.'" class="ca_exams">'.$exam.'</a></li>';
										}
										?>
                                        </ul>
                </div>
                 <div class="pull-right">
             		<b><span id="centexm"><?php echo $centre; ?></span></b>
      			  </div>
                
            </div>
            <!-- Default box -->
            <div class="box-body">
                   <div id="subs" style="overflow:hidden">
                   Subjects                
               </div><!-- hidden -->
               <div><!-- box -->
               
                   <div class="callout callout-info pull-left">
                   <b>Please Enter Only Marks/Grades in the Template,<br /> Do not alter the Template in anyway, add or remove any Sheet/Candidate/Row/Column. Use only downloaded Template, do not make yours!</b>
                   </div>
                   
                   		<div class="btn-group pull-right"> 
                         <?= $this->Form->button(__('Get Template')) ?>
                    	 <?= $this->Form->end() ?></div>                  
                 </div>
           </div>
        </div>
    </section>
</div>
<?= $this->Html->script('jquery'); ?>
<?= $this->Html->css('careg'); ?>
<?= $this->Html->script('caandreg') ?>