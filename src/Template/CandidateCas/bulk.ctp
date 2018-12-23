<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CandidateCa $candidateCa
 */
?>
<div class="candidateCas index large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Candidate CAs') ?>
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
        <h3 class="box-title"><?= __('Upload Continuous Assessment (CA) File') ?></h3>
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
                                    <input type="hidden" name="centreid" value="<?php echo $centreid; ?>" />
                                      <div class="input-group-btn">
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
			  if(isset($msgs))
			  {
				  $b=1;
				  foreach($msgs as $one)
				  {
					  if($b%2==0) echo '<div class="col-md-6">';
					  else echo '<div class="row"><div class="col-md-6">';
					  
					  $mtype = explode (';',$one[2]);
					  $type=$mtype[0] == '0' ?'danger':($mtype[0] =='1'?'warning':'success');
					  echo '<div class="callout callout-'.$type.'">';
					  echo '<b>'.$b.' ) </b> FILE : '.$one[0].'  SHEET : '.$one[1].'<br>'.$mtype[1];
					  echo '</div>';
					  if($b%2==0) echo '</div></div>';
					  else  echo '</div>';
					  $b++;
				  }
			  }
			  ?>
              
              
    </div><!-- box body -->
    <div class="box-footer">
    </div>

</div>    </section>
</div>
<?= $this->Html->script('jquery'); ?>
<?= $this->Html->script('caandreg') ?>