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
                            echo $this->Form->control('group_id', [
                                'options' => $groups,
                                'class' => 'group-permissions'
                            ]);
                            ?>
                        </div>
                    </div>
                </form>
            </div>

        </div>

        <div class="column">
            <div class="col-md-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?= __('Dashboards') ?></h3>
                    </div>
                    <div class="box-body">
                        <table cellpadding="0" cellspacing="0" class="table table table-striped">
                            <tbody>
                            <tr>
                                <td>Registration <?= $this->Acl->check('Administrator', 'controllers/dashboards', ['registration']); ?>
                                    <span class="pull-right"><?= $this->Form->control('registration',
                                            ['type' => 'checkbox',
                                                'label' => false]) ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>Finance
                                    <span class="pull-right"><?= $this->Form->control('finance',
                                            ['type' => 'checkbox',
                                                'label' => false]) ?>
                                    </span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?= __('Centres') ?></h3>
                    </div>
                    <div class="box-body">

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
