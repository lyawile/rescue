<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bill $bill
 */
//echo $test;
?>
<pre>
    <?php // echo @var_dump($dddd); ?>
</pre>
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
                        echo $this->Form->control('payer_name');
                        echo $this->Form->control('payer_mobile');
                        echo $this->Form->control('payer_email');
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
                                <tr class="service">
                                    <td>1</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <?= $this->Form->control('collection_id[]', array('type' => 'select', 'options' => $services, 'value' => 1, 'label' => false, 'empty' => 'Select service')); ?>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <?= $this->Form->control('quantity[]', array('label' => false, 'type' => 'number')) ?>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="actions pull-right">
                                        <a href="" class="btn btn-xs fa fa-plus "  data-placement="bottom" title="Add service"></a>                                                        
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
