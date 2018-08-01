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
            <small>Enables customer to fill in the application form for the service</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>

    <section class="content">
        <div class="bills form large-9 medium-8 columns content">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= __('Add Bill') ?></h3>
                </div>
                <div class="box-body">
            <?= $this->Form->create() ?>
                    <fieldset>
                <?php   
                        echo $this->Form->control('reference');
                        echo $this->Form->control('payer_name');
                        echo $this->Form->control('payer_mobile');
                        echo $this->Form->control('payer_email');
                       
                ?>
                        <div class="form-group input select">
                            <label for="regions-id">Services</label>
                            <select name="" class="form-control" id="regions-id">
                                <?php foreach($services as $serv){ ?>
                                <option value="<?php $serv->id ?>"><?php echo $serv->name; ?></option>
                               <?php } ?>
                            </select>
                        </div>
                    </fieldset>
                </div>
                <div class="box-footer">
            <?= $this->Form->button(__('Submit')) ?>
                </div>

        <?= $this->Form->end() ?>
            </div>
        </div>    </section>
</div>
