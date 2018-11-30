<?php
$index = 1;
echo '<span class="index0" style="visibility: hidden; margin:0; padding: 0">Test</span>';
if (!empty($serviceAmount)) {
    foreach (@$serviceAmount as $amount) {
        echo '<span class="index' . $index . '" style="visibility: hidden; margin:0; padding: 0">' . $amount . '</span>';
        $index++;
    }
}
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
        <?= $this->Form->create() ?>
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><?= __('Add Bill') ?></h3>
            </div>
            <div class="box-body">
                <div class="col-sm-8">
                    <fieldset>
                        <?php
                        if(isset($errors['payer_name']['_empty']) && !empty($errors['payer_name']['_empty'])){
                            ?>
                        <div class="error-message"><?php echo $errors['payer_name']['_empty'] ?></div>

                        <?php
                        }
                        echo $this->Form->control('payer_name', array('default' => @$payer_name, 'id' => 'payer'));
                          if(isset($errors['payer_mobile']['_empty']) && !empty($errors['payer_mobile']['_empty'])){
                              ?>
                        <div class="error-message"><?php echo $errors['payer_mobile']['_empty'] ?></div>
                        <?php
                          }
                        echo $this->Form->control('payer_mobile', array('default' => @$payer_mobile));
                        echo $this->Form->control('payer_email', array('default' => @$payer_email));
                        ?>
                        <div class="form-group input select">
                            <label for="group-id">Select atleast one service </label>
                        </div>
                        <table class="table">
                            <tbody>

                                <?php if (!isset($switcher) && empty($switcher)) { ?>
                                <tr>
                                    <th scope="col">Service Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Service Cost</th>
                                    <th scope="col" class=" pull-right">Actions</th>
                                </tr>
                                <tr class="service">
                                    <td>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                    <?= $this->Form->control('collection_id[]', array('type' => 'select', 'options' => @$services, 'value' => 1, 'label' => false, 'empty' => 'Select service', 'id' => 'serviceSelect')); ?>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                    <?= $this->Form->control('quantity[]', array('label' => false, 'id' => 'quantity', 'type' => 'number', 'default'=>1, 'required', 'min'=>"1")) ?>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <p class="form-control"></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="actions pull-right">
                                        <a href="" class="btn btn-xs fa fa-minus "  data-placement="bottom" title="Add service"></a>
                                    </td>
                                </tr>

                                <?php } else { ?>
                                <tr>
                                    <th scope="col">Service Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Amount</th>
                                </tr>
                                <tr>
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
                                    <td>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                    <?= $this->Form->control('', array('disabled' => false, 'label' => FALSE, 'default' => $numberOfCands*$amountForRequestedService, 'readOnly' => true, 'id' => 'quantity')); ?>

                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <?php } ?>

                            </tbody>
                        </table>

                    </fieldset>

                </div>
            </div>
            <div class="box-body">
                <div class="total col-sm-8 callout callout-info">
                    <!--<h4>Information!</h4>-->
                    <span>If you submit this form, you will pay:  </span>
                    <span style="font-weight: bold"><?php echo number_format(@$amountForRequestedService * @$numberOfCands, 2) ?></span>
                </div>
            </div>
            <div class="box-footer">
                <button title="Add Service" type="button" class="btn btn-default btn-circle addService">
                    <i class="fa fa-plus "> Add Service</i>
                </button>
                <?= $this->Form->button(__('Submit'), array('id' => 'btnSub')) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </section>
</div>
