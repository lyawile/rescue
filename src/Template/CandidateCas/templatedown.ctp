<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CandidateCa $candidateCa
 */
?>

<div class="candidateCas view large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Select Subjects') ?>
            <small>Subjects to be included in the CA template File</small>
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
                <h4 class="pull-left">???</h4>
                <div class="btn-group pull-right">
                   comands here
                </div>
            </div>
            <!-- Default box -->
            <div class="box-body">
                <?= $this->Form->create(null, ['url' => ['action' => 'templatedown']]);?>
                <table class="vertical-table table table table-striped">
                <tr>
                   <th scope="row">CENTRES</th>
                   <th scope="row">
                   <?= $this->Form->select('centre', $centres, ['class'=>'form-control', 'id'=>'centre']); ?>
                   </th>
                   <th scope="row"></th><th scope="row"></th>
                   <th scope="row">EXAM TYPE</th>
                   <th scope="row">
                   <?= $this->Form->select('etype', $etypes, ['class'=>'form-control', 'id'=>'etype']); ?>
                   </th>
                </tr>
                <tr>
                   <td colspan="6">
                   <div id="subs" style="overflow:auto">Subjects</div>                   
                   </td>
                </tr>
                <tr>
                   <td colspan="6">
                   <small></small>
                   		<div class="btn-group pull-right">
                         <?= $this->Form->button(__('Get Template')) ?>
                    	 <?= $this->Form->end() ?></div>                  
                   </td>
                </tr>
             	</table>
           </div>
        </div>
    </section>
</div>
<?= $this->Html->script('jquery'); ?>
<?= $this->Html->script('caandreg') ?>