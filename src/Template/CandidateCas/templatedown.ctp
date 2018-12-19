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
            <small>Select Subjects to be included in the CA template File</small>
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
				   	/*		var dump='';
					$a=0;
					$.each(JSON.parse(data), function (i, item) {
						if($a%4==0)dump+='<div class="row"><div class="col-md-3">';
						else dump+='</div><div class="col-md-3">';
						//$('#myTable > tbody:last-child').append('<tr>...</tr><tr>...</tr>');
				dump+='<label class="checkhd">'+item.text+'<input type="checkbox" name="chksub[]" value="'+item.value+'"><span class="checkmark"></span></label>';
					//	dump+='<input type="checkbox" name="chksub[]" value="'+item.value+'">&nbsp;'+item.text+'<br>';
						if($a%4==3)dump+='</div></div>';
						//else dump+='</div>';
						$a++;
					});
					$a--;
					if($a%4!=3)dump+='</div></div>';*/
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