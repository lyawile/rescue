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
                        <td>Registration
                            <span class="pull-right"><?= $this->Form->control('registration', [
                                    'type' => 'checkbox',
                                    'label' => false,
                                    'class' => 'permission',
                                    'permission' => 'Dashboards/registration',
                                    'checked' => @$this->Acl->check(['Groups' => ['id' => $userGroupId]], 'Dashboards/registration')
                                ]) ?>
                                    </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Finance
                            <span class="pull-right"><?= $this->Form->control('finance', [
                                    'type' => 'checkbox',
                                    'label' => false,
                                    'class' => 'permission',
                                    'permission' => 'Dashboards/finance',
                                    'checked' => @$this->Acl->check(['Groups' => ['id' => $userGroupId]], 'Dashboards/finance')
                                ]) ?>
                                    </span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><?=__('Notifications') ?></h3>
            </div>
            <div class="box-body">
                <table cellpadding="0" cellspacing="0" class="table table table-striped">
                    <tbody>
                    <tr>
                        <td>Manage notifications
                            <span class="pull-right"><?= $this->Form->control('notification', [
                                    'type' => 'checkbox',
                                    'label' => false,
                                    'class' => 'permission',
                                    'permission' => 'Notifications',
                                    'checked' => @$this->Acl->check(['Groups' => ['id' => $userGroupId]], 'Notifications')
                                ]) ?>
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
                <table cellpadding="0" cellspacing="0" class="table table table-striped">
                    <tbody>
                    <tr>
                        <td>Manage centre details
                            <span class="pull-right"><?= $this->Form->control('centres', [
                                    'type' => 'checkbox',
                                    'label' => false,
                                    'class' => 'permission',
                                    'permission' => 'Centres',
                                    'checked' => @$this->Acl->check(['Groups' => ['id' => $userGroupId]], 'Centres')
                                ]) ?>
                                    </span>
                        </td>
                    </tr>
                    <tr>
                        <td>View centre details
                            <span class="pull-right"><?= $this->Form->control('centre_details', [
                                    'type' => 'checkbox',
                                    'label' => false,
                                    'class' => 'permission',
                                    'permission' => 'Centres/viewDetails',
                                    'checked' => @$this->Acl->check(['Groups' => ['id' => $userGroupId]], 'Centres/index')
                                ]) ?>
                                    </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Manage practical details
                            <span class="pull-right"><?= $this->Form->control('practical', [
                                    'type' => 'checkbox',
                                    'label' => false,
                                    'class' => 'permission',
                                    'permission' => 'Practicals',
                                    'checked' => @$this->Acl->check(['Groups' => ['id' => $userGroupId]], 'Practicals')
                                ]) ?>
                                    </span>
                        </td>
                    </tr>
                    <tr>
                        <td>View practicals details
                            <span class="pull-right"><?= $this->Form->control('practical_details', [
                                    'type' => 'checkbox',
                                    'label' => false,
                                    'class' => 'permission',
                                    'permission' => 'Practicals/viewDetails',
                                    'checked' => @$this->Acl->check(['Groups' => ['id' => $userGroupId]], 'Practicals/index')
                                ]) ?>
                                    </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Manage centre exam types
                            <span class="pull-right"><?= $this->Form->control('centre_exam_types', [
                                    'type' => 'checkbox',
                                    'label' => false,
                                    'class' => 'permission',
                                    'permission' => 'CentreExamTypes',
                                    'checked' => @$this->Acl->check(['Groups' => ['id' => $userGroupId]], 'CentreExamTypes')
                                ]) ?>
                                    </span>
                        </td>
                    </tr>
                    <tr>
                        <td>View centre exam types
                            <span class="pull-right"><?= $this->Form->control('centre_exam_types_details', [
                                    'type' => 'checkbox',
                                    'label' => false,
                                    'class' => 'permission',
                                    'permission' => 'CentreExamTypes/viewDetails',
                                    'checked' => @$this->Acl->check(['Groups' => ['id' => $userGroupId]], 'CentreExamTypes/index')
                                ]) ?>
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
                <h3 class="box-title"><?= __('Candidates') ?></h3>
            </div>
            <div class="box-body">
                <table cellpadding="0" cellspacing="0" class="table table table-striped">
                    <tbody>
                    <tr>
                        <td>Manage candidate details
                            <span class="pull-right"><?= $this->Form->control('candidates', [
                                    'type' => 'checkbox',
                                    'label' => false,
                                    'class' => 'permission',
                                    'permission' => 'Candidates/manageDetails',
                                    'checked' => @$this->Acl->check(['Groups' => ['id' => $userGroupId]], 'Candidates')
                                ]) ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>View candidate details
                            <span class="pull-right"><?= $this->Form->control('candidate_details', [
                                    'type' => 'checkbox',
                                    'label' => false,
                                    'class' => 'permission',
                                    'permission' => 'Candidates/viewDetails',
                                    'checked' => @$this->Acl->check(['Groups' => ['id' => $userGroupId]], 'Candidates/index')
                                ]) ?>
                            </span>
                        </td>
                    </tr>

                    <tr>
                        <td>Manage CA details
                            <span class="pull-right"><?= $this->Form->control('candidate_ca', [
                                    'type' => 'checkbox',
                                    'label' => false,
                                    'class' => 'permission',
                                    'permission' => 'CandidateCas',
                                    'checked' => @$this->Acl->check(['Groups' => ['id' => $userGroupId]], 'CandidateCas')
                                ]) ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>View CA details
                            <span class="pull-right"><?= $this->Form->control('candidate_ca_details', [
                                    'type' => 'checkbox',
                                    'label' => false,
                                    'class' => 'permission',
                                    'permission' => 'CandidateCas/viewDetails',
                                    'checked' => @$this->Acl->check(['Groups' => ['id' => $userGroupId]], 'CandidateCas/index')
                                ]) ?>
                            </span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<!--    <div class="col-md-4">-->
<!--        <div class="box">-->
<!--            <div class="box-header with-border">-->
<!--                <h3 class="box-title">--><?//= __('Candidates') ?><!--</h3>-->
<!--            </div>-->
<!--            <div class="box-body">-->
<!--                <div class="col-sm-8">-->
<!--                    <fieldset>-->
<!--                    </fieldset>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
</div>
