<div class="users index large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Service') ?>
            <small>Gives the user step by step instructions about the service requested</small>
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
                <h3 class="box-title"><?= __('Enter Phone Number') ?></h3>
            </div>
            <div class="box-body">
        <?php echo "Service description goes here"; ?>
            </div>
            <div class="box-footer">
            </div>

    <?= $this->Form->end() ?>
        </div>    </section>
</div>

