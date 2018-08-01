<div class="users index large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Control Numbers') ?>
            <small>Checks if the Control number exists</small>
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
                <h3 class="box-title"><?= __('Enter Control Number') ?></h3>
            </div>
            <div class="box-body">
        <?= $this->Form->create() ?>
                <fieldset>
            <?php
                    echo $this->Form->control('controlNumber');
            ?>
                </fieldset>
            </div>
            <div class="box-footer">
        <?= $this->Form->button(__('Submit')) ?>
            </div>

    <?= $this->Form->end() ?>
        </div>    </section>
</div>

