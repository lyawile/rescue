<pre>
    <?php // echo @$payer_name; ?>
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
        <?= $this->Form->create() ?>
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><?= __('Add Bill') ?></h3>
            </div>
            <div class="box-body">
                <div class="modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Modal body text goes here.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary">Save changes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-8">
                    <fieldset>
                        <?php
                        echo $this->Form->control('payer_name', array('default' => @$payer_name, 'id' => 'payer'));
                        echo $this->Form->control('payer_mobile', array('default' => @$payer_mobile));
                        echo $this->Form->control('payer_email', array('default' => @$payer_email));
                        ?>
                        <div class="form-group input select">
                            <label for="group-id">Select atleast one service </label>
                        </div>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="col">S/N</th>
                                    <th scope="col">Service Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col" class=" pull-right">Actions</th>
                                </tr>
                                <?php if (!isset($switcher) && empty($switcher)) { ?>
                                    <tr class="service">
                                        <td>1</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <?= $this->Form->control('collection_id[]', array('type' => 'select', 'options' => @$services, 'value' => 1, 'label' => false, 'empty' => 'Select service')); ?>
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
                                <?php } else { ?>
                                <td>Test</td>
                                <td>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <?php echo $this->Form->control('', array('disabled' => true, 'label' => FALSE, 'default' => $requestedServiceName)); ?>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <?= $this->Form->control('quantity[]', array('disabled' => false, 'label' => FALSE, 'default' => $numberOfCands, 'readOnly' => true, 'id' => 'quantity')); ?>
                                            <?php echo $this->Form->hidden('amount', array('disabled' => false, 'label' => FALSE, 'default' => $amountForRequestedService)); ?>
                                            <?php echo $this->Form->hidden('collection_id[]', array('disabled' => false, 'label' => FALSE, 'default' => $requestedServiceId)); ?>
                                            <?php echo $this->Form->hidden('eqid', array('disabled' => false, 'label' => FALSE, 'default' => $requestId)); ?>
                                        </div>
                                    </div>
                                </td>
                                <td class="actions pull-right">
                                    <a href=""   data-placement="bottom" title="Add service"></a>                                                        
                                </td>
                            <?php } ?>

                            </tbody>
                        </table>

                    </fieldset>

                </div>
            </div>
            <div class="box-footer">
                <button title="Add Service" type="button" class="btn btn-default btn-circle">
                    <i class="fa fa-plus"> Add Service</i>
                </button>
                <?= $this->Form->button(__('Submit'), array('id'=>'btnSub')) ?>
            </div>


            <?= $this->Form->end() ?>
        </div>    </section>
</div>
