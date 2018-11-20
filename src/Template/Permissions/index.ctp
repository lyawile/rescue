<div class="users index large-9 medium-8 columns content">
    <section class="content-header">
        <h1>
            <?= __('Permissions') ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>

    <?= $this->Form->create() ?>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><?= __('Group permission') ?></h3>
                <div class="btn-group pull-right">
                    <?= $this->Form->button(__('Update permissions')) ?>
                </div>
            </div>
            <div class="box-body">
                <form>
                    <div class="row">
                        <div class="col-sm-3">
                            <?php
                            echo $this->Form->control('group_id',[
                                'options' => $groups,
                                'class' => 'group-permissions'
                            ]);
                            ?>
                        </div>
                        <div class="col-sm-3">
                            <?php
                            echo $this->Form->control('region_id', [
                                'options' => $permissionRegions,
                                'class' => 'region-permissions',
                                'data-placeholder' => 'Choose a region...',
                                'empty' => true
                            ]);
                            ?>
                        </div>
                        <div class="col-sm-3">
                            <?php
                            echo $this->Form->control('district_id', [
                                'class' => 'district-permissions',
                                'data-placeholder' => 'Choose a district...',
                                'empty' => true
//                            'default' => $this->request->getSession()->read('centreId')
                            ]);
                            ?>
                        </div>
                        <div class="col-sm-3">
                            <?php
                            echo $this->Form->control('centre_id', [
                                'class' => 'centre-permissions',
                                'data-placeholder' => 'Choose a centre...',
                                'empty' => true
//                            'default' => $this->request->getSession()->read('centreId')
                            ]);
                            ?>
                        </div>
                    </div>

            </div>
            <?= $this->Form->end() ?>
        </div>

        <div class="column">
            <div class="col-md-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?= __('Dashboards') ?></h3>
                    </div>
                    <div class="box-body">
                        <div class="col-sm-8">
                            <fieldset>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?= __('Centres') ?></h3>
                    </div>
                    <div class="box-body">
                        <div class="col-sm-8">
                            <fieldset>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?= __('Candidates') ?></h3>
                    </div>
                    <div class="box-body">
                        <div class="col-sm-8">
                            <fieldset>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?= $this->Form->end() ?>
</div>
