<?php

use Cake\Core\Configure;

$canAccessDashboardsRegistration = @$this->Acl->canAccess('Dashboards/registration');
$canAccessDashboardsFinance = @$this->Acl->canAccess('Dashboards/finance');

$canAccessCentreDetails = @$this->Acl->canAccess('Centres/index');
$canAccessCentrePracticals = @$this->Acl->canAccess('Practicals/index');
$canAccessCentreExamTypes = @$this->Acl->canAccess('CentreExamTypes/index');

$canAccessCandidateDetails = @$this->Acl->canAccess('Candidates/index');
$canAccessCaDetails = @$this->Acl->canAccess('CandidateCas/index');

$canAccessNotifications = @$this->Acl->canAccess('Notifications/index');

$canAccessBills = @$this->Acl->canAccess('Bills/index');
$canCreateBills = @$this->Acl->canAccess('Bills/add');

$canManageUsers = @$this->Acl->canAccess('Users');
$canManageUserGroups = @$this->Acl->canAccess('Groups');
$canManageGroupPermissions = @$this->Acl->canAccess('Permissions');

$file = Configure::read('Theme.folder') . DS . 'src' . DS . 'Template' . DS . 'Element' . DS . 'aside' . DS . 'sidebar-menu.ctp';
if (file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
} else {
    ?>
    <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <?php if ($canAccessDashboardsRegistration) { ?>
                    <li><a href="<?php echo $this->Url->build(['controller' => 'dashboards', 'action' => 'registration']); ?>"><i class="fa"></i><?= __('Registration') ?></a></li>
                <?php } ?>
                <?php if($canAccessDashboardsFinance){ ?>
                    <li><a href="<?php echo $this->Url->build(['controller' => 'dashboards', 'action' => 'finance']); ?>"><i class="fa"></i><?= __('Finance') ?></a></li>
                <?php } ?>
            </ul>
        </li>
        <?php if($canAccessCentreDetails || $canAccessCentrePracticals || $canAccessCentreExamTypes){ ?>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-university"></i> <span><?= __('Centres') ?></span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <?php if($canAccessCentreDetails){ ?>
                        <li><a href="<?= $this->Url->build(['controller' => 'Centres', 'action' => 'index']); ?>"><i class="fa"></i> <?= __('Centre details') ?></a></li>
                    <?php } ?>
                    <?php if($canAccessCentrePracticals){ ?>
                        <li><a href="<?= $this->Url->build(['controller' => 'Practicals', 'action' => 'index']); ?>"><i class="fa"></i><?= __('Practicals') ?></a></li>
                    <?php } ?>
                    <?php if($canAccessCentreExamTypes){ ?>
                        <li><a href="<?= $this->Url->build(['controller' => 'CentreExamTypes', 'action' => 'index']); ?>"><i class="fa"></i><?= __('Exam types') ?></a></li>
                    <?php } ?>
                </ul>
            </li>
        <?php } ?>

        <?php  if($canAccessCandidateDetails || $canAccessCaDetails){ ?>

        <li class="treeview">
            <a href="#">
                <i class="fa fa-graduation-cap"></i> <span><?= __('Candidates') ?></span>
                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <?php if($canAccessCandidateDetails){ ?>
                    <li><a href="<?php echo $this->Url->build(['controller' => 'Candidates']); ?>"><i class="fa"></i><?= __('Registered') ?></a></li>
                    <li><a href="<?php echo $this->Url->build(['controller' => 'DisqualifiedCandidates']); ?>"><i class="fa"></i><?= __('Disqualified') ?></a></li>
                <?php } ?>
                <?php if($canAccessCaDetails){ ?>
                    <li><a href="<?php echo $this->Url->build(['controller' => 'CandidateCas']); ?>"><i class="fa"></i><?= __('CA') ?></a></li>
                <?php } ?>
            </ul>
        </li>

        <?php } ?>
        <?php if($canAccessBills || $canCreateBills ){ ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-text-o"></i> <span><?= __('Bills') ?></span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <?php if($canAccessBills){ ?>
                    <li><a href="<?php echo $this->Url->build(['controller' => 'Bills', 'action' => 'index']); ?>"><i class="fa"></i><?= __('My bills') ?></a></li>
                    <?php } ?>
                    <?php if($canCreateBills){ ?>
                    <li><a href="<?php echo $this->Url->build(['controller' => 'Bills', 'action' => 'add']); ?>"><i class="fa"></i><?= __('Create bill') ?></a></li>
                    <?php } ?>
                </ul>
            </li>
        <?php } ?>

        <?php if($canAccessNotifications){ ?>
            <li class="treeview">
                <a href="<?php echo $this->Url->build(['controller' => 'notifications']); ?>">
                    <i class="fa fa-bell"></i> <span><?= __('Notifications') ?></span></span>
                </a>
            </li>
        <?php } ?>

        <?php if($canManageUsers || $canManageUserGroups || $canManageGroupPermissions){ ?>
            <li class="treeview">
                <a href="#"><i class="fa fa-users"></i> <span><?= __('Users') ?></span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <?php if($canManageUsers){ ?>
                    <li><a href="<?php echo $this->Url->build(['controller' => 'users', 'action' => 'index']); ?>"><i class="fa"></i><?= __('Users') ?></a></li>
                    <?php } ?>
                    <?php ?>
                    <?php if($canManageUserGroups){ ?>
                        <li><a href="<?php echo $this->Url->build(['controller' => 'groups', 'action' => 'index']); ?>"><i class="fa"></i><?= __('Groups') ?></a></li>
                    <?php } ?>
                    <?php if($canManageGroupPermissions){ ?>
                        <li><a href="<?php echo $this->Url->build(['controller' => 'permissions', 'action' => 'index']); ?>"><i class="fa"></i><?= __('Permissions') ?></a></li>
                    <?php } ?>
                </ul>
            </li>
        <?php } ?>




        <li class="treeview">
            <a href="#">
                <i class="fa fa-gear"></i> <span><?= __('Settings') ?></span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $this->Url->build(['controller' => 'Collections', 'action' => 'index']); ?>"><i
                            class="fa"></i> <?= __('Collections') ?></a></li>
                <li>
                    <a href="<?php echo $this->Url->build(['controller' => 'CollectionCategories', 'action' => 'index']); ?>"><i
                            class="fa"></i> <?= __('Collection categories') ?></a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'Regions', 'action' => 'index']); ?>"><i
                            class="fa"></i> <?= __('Regions') ?></a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'Districts', 'action' => 'index']); ?>"><i
                            class="fa"></i> <?= __('Districts') ?></a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'ExamTypes', 'action' => 'index']); ?>"><i
                            class="fa"></i> <?= __('Exam types') ?></a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'Subjects', 'action' => 'index']); ?>"><i
                            class="fa"></i> <?= __('Subjects') ?></a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'Settings', 'action' => 'general']); ?>"><i
                            class="fa"></i> <?= __('General') ?></a></li>
            </ul>
        </li>
    </ul>
<?php } ?>
