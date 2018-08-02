<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bill $bill
 */
?>
<div class="bills index large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Bills') ?>
            <small>Generates the bill for the customer</small>
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
                <h3 class="box-title"><?= __('Add Bill') ?></h3>
            </div>
            <div class="box-body">
                <?= $this->Form->create() ?>
                <div class="col-sm-8">
                    <fieldset>
                        <?php
//                                    echo $this->Form->control('reference');
//                        echo $this->Form->control('amount');
//                        echo $this->Form->control('equivalent_amount');
//                        echo $this->Form->control('misc_amount');
//                        echo $this->Form->control('expire_date');
//                        echo $this->Form->control('generated_date');
//                        echo $this->Form->control('payer_idx');
                        
                        echo $this->Form->control('payer_name');
                        echo $this->Form->control('payer_mobile');
                        echo $this->Form->control('payer_email');
//                        echo $this->Form->control('has_reminder');
                        ?>
                        <div class="form-group input select">
                            <label for="group-id">Select atleast one service </label>
                        </div>
                        <table cellpadding="0" cellspacing="0" class="table table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col"><a href="/eservice/users?direction=asc&amp;sort=id">S/N</a></th>
                                    <th scope="col"><a href="/eservice/users?direction=asc&amp;sort=first_name">Service Name</a></th>
                                    <th scope="col"><a href="/eservice/users?direction=asc&amp;sort=other_name">Units</a></th>
                                    <th scope="col" class=" pull-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <select name="collection_id" class="form-control" id="group-id">
                                            <?php foreach ($services as $serv) { ?>
                                                <option value="<?= $serv->id ?>"><?= $serv->name ?></option>
                                            <?php } ?>
                                        </select> 
                                    </td>
                                    <td>
                                       <?=$this->Form->control('bill_items.quantity', array( 'label' => false )) ?>
                                    </td>
                                    <td class="actions pull-right">
                                        <a href="" class="btn btn-xs fa fa-plus" data-toggle="tooltip" data-placement="bottom" title="Add service"></a>                                                        
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                </div>
            </div>
            <div class="box-footer">
                <?= $this->Form->button(__('Submit')) ?>
            </div>

            <?= $this->Form->end() ?>
        </div>    </section>
</div>
