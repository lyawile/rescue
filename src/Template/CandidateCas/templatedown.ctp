<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CandidateCa $candidateCa
 */
?>
<?= $this->Html->css('careg'); ?>
<div class="candidateCas view large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Centrewise CA Templates') ?>
            
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>
     	<?= $this->Form->create(null, ['url' => ['action' => 'templatedown'],'id'=>'ftemp']);?>
   		<?= $this->Form->control('', array('type'=>'hidden','name'=>'urlx','id'=>'urlx','value'=>$this->Url->build('/', true))) ?>

    <section class="content">
    <?php if($seth){ ?>
        <div class="box">
       
            <div class="box-header with-border">
            
                <div class="pull-left">
                 	<small>Select Subjects to be included in the CA template File</small>
                    <input type="hidden" name="exam" id="exam" value="" />
                </div>
                 <div class="pull-right">
             		<b><span id="centexm"><?php if(isset($centre))echo $centre; ?></span></b>
      			  </div>
                
            </div>
            <!-- Default box -->
            <div class="box-body">
                   <div id="subs" style="overflow:hidden">
                   <?php
				   if(!empty($subs))
				   {
					   $a=0;
					   foreach($subs as $k=>$v)
					   {
						 	if($a%4==0) echo '<div class="row"><div class="col-md-3">';
							else echo '</div><div class="col-md-3">';
							echo '<label class="checkhd">'.$v.'<input type="checkbox" name="chksub[]" value="'.$k.'"><span class="checkmark"></span></label>';
							if($a%4==3)echo '</div></div>';
							$a++;
					   }
					   $a--;
					if($a%4!=3)echo '</div></div>';
				   
				   }
				   ?>                
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
         <?php }?>
    </section>
</div>
<?= $this->Html->script('jquery'); ?>
<?= $this->Html->script('caandreg') ?>