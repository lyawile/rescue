<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Candidate[]|\Cake\Collection\CollectionInterface $candidates
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
	<?php if($seth){ ?>
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="btn-group pull-right">
                    <?= $this->Html->link(__('Upload Registration'), ['action' => 'bulk'], ['class' => 'btn btn btn-success']) ?>
                    <?= $this->Html->link(__('New Candidate'), ['action' => 'add'], ['class' => 'btn btn btn-success']) ?>
                    
                </div>
            </div>
            <div class="box-body">
                <table cellpadding="0" cellspacing="0" class="table table table-striped">
                    <thead>
                    <tr>
                       <!--    <th scope="col"><?= $this->Paginator->sort('id') ?></th> -->
                       <th scope="col"><?= $this->Paginator->sort('number') ?></th>
                       <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                       <th scope="col"><?= $this->Paginator->sort('other_name') ?></th>
                       <th scope="col"><?= $this->Paginator->sort('surname') ?></th>
                       <th scope="col"><?= $this->Paginator->sort('sex') ?></th>
                       <!--     <th scope="col"><?= $this->Paginator->sort('PSLE_number') ?></th> -->
                       <!--     <th scope="col"><?= $this->Paginator->sort('PSLE_year') ?></th> -->
                       <!--     <th scope="col"><?= $this->Paginator->sort('ID_number') ?></th> -->
                       <th scope="col"><?= $this->Paginator->sort('date_of_birth') ?></th>
                       <!--     <th scope="col"><?= $this->Paginator->sort('guardian_phone') ?></th> -->
                       <!--     <th scope="col"><?= $this->Paginator->sort('work_experience') ?></th> -->
                       <!--     <th scope="col"><?= $this->Paginator->sort('combination') ?></th> -->
                       <!--     <th scope="col"><?= $this->Paginator->sort('is_repeater') ?></th> -->
                       <th scope="col"><?= $this->Paginator->sort('exam_type_id') ?></th>
                       <th scope="col"><?= $this->Paginator->sort('centre_id') ?></th>
                       <th scope="col"><?= $this->Form->control('Select All', array('type'=>'checkbox','class'=>'chkhd')) ?></th>
                       <th scope="col" class="actions pull-right"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($candidates as $candidate): ?>
                    <tr>
                                                                                                                                                                                                 <!--	<td><?= $this->Number->format($candidate->id) ?></td> -->
					  <td><?= h($candidate->number) ?></td>
                                                                                                                                                                                                 <td><?= h($candidate->first_name) ?></td>
                      <td><?= h($candidate->other_name) ?></td>
                      <td><?= h($candidate->surname) ?></td>
                      <td><?= h($candidate->sex) ?></td>
                      <!-- <td><?= $this->Number->format($candidate->PSLE_number) ?></td> -->
                      <!-- <td><?= $this->Number->format($candidate->PSLE_year) ?></td> -->
                      <!-- <td><?= h($candidate->ID_number) ?></td> -->
                      <td><?= h($candidate->date_of_birth) ?></td>
                      <!-- <td><?= h($candidate->guardian_phone) ?></td> -->
                      <!-- <td><?= $this->Number->format($candidate->work_experience) ?></td> -->
                      <!-- <td><?= h($candidate->combination) ?></td> -->
                      <!-- <td><?= $this->Number->format($candidate->is_repeater) ?></td> -->
                      <td><?= $candidate->has('exam_type') ?
                                        $this->Html->link($candidate
                                        ->exam_type->short_name, ['controller' =>
                                        'ExamTypes', 'action' => 'view', $candidate
                                        ->exam_type
                                        ->id]) : '' ?>
                       </td>
                       <td><?= $candidate->has('centre') ?
                                        $this->Html->link($candidate
                                        ->centre->name, ['controller' =>
                                        'Centres', 'action' => 'view', $candidate
                                        ->centre
                                        ->id]) : '' ?>
                        </td>
                        <td><?= $this->Form->control('', array('type'=>'checkbox','class'=>'chk','value'=>$candidate->id)) ?></td>
                        <td class="actions pull-right">
                            <?= $this->Html->link('', ['action' => 'view', $candidate->id], ['class' => 'btn btn-xs fa fa-eye', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => __('View')]) ?>
                            <?= $this->Html->link('', ['action' => 'edit', $candidate->id], ['class' => 'btn btn-xs fa fa-pencil-square-o', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => __('Edit')]) ?>
                            <?= $this->Form->postLink('', ['action' => 'delete', $candidate->id], ['confirm' =>
                            __('Are you sure you want to delete # {0}?', $candidate->id), 'class' => 'btn btn-xs fa fa-trash', 'style' => 'color: red', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => __('Delete')]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="box-footer">
          		<div class="btn-group pull-right">
                Pay Fees
                <?= $this->Form->create(null, ['url' => ['controller' => 'Epay', 'action' => 'fees']]);?>
                <?= $this->Form->control('', array('type'=>'hidden','name'=>'put','id'=>'put','value'=>'')) ?>
				<?= $this->Form->button(__('Selected')) ?>
                <?= $this->Html->link(__('Whole Centre'), ['controller' => 'epay','action' => 'feesall'], ['class' => 'btn btn btn-success']) ?>
                <?= $this->Form->end() ?>
                </div>
            </div>
            
               
    		</div>  
            <div class="box-footer">
                <ul class="pagination pagination-sm no-margin pull-right">
                    <?= $this->Paginator->first('<< ' . __('first')) ?>
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                    <?= $this->Paginator->last(__('last') . ' >>') ?>
                </ul>
                <p class="pull-right" style="margin-top: 5px; margin-right: 16px;"><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}},
                    showing {{current}} record(s) out of {{count}} total')]) ?></p>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
        <?php }?>
    </section>
</div>
<?= $this->Html->script('jquery'); ?>
<?= $this->Html->script('fpay') ?>
