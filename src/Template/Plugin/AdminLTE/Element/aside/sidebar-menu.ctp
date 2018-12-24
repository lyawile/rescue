<?php

use Cake\Core\Configure;
$group_id = $this->request->getSession()->read('Auth.User.group_id ');

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
                <li><a href="<?php echo $this->Url->build(['controller' => 'dashboards', 'action' => 'registration']); ?>"><i class="fa"></i><?= __('Registration') ?></a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'dashboards', 'action' => 'finance']); ?>"><i class="fa"></i><?= __('Finance') ?></a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-university"></i> <span><?= __('Centres') ?></span>
                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
<!--                --><?php //if($this->Acl->check(['model' => 'Group', 'foreign_key' => $group_id], 'Practicals/add')) { ?>
                    <li><a href="<?php echo $this->Url->build(['controller' => 'Practicals']); ?>"><i class="fa"></i><?= __('Practicals') ?></a></li>
<!--                --><?php //} ?>
                <li><a href="<?php echo $this->Url->build(['controller' => 'CentreExamTypes']); ?>"><i class="fa"></i><?= __('Exam types') ?></a></li>
            </ul>
        </li>

        <li class="treeview">
            <a href="#">
                <i class="fa fa-graduation-cap"></i> <span><?= __('Candidates') ?></span>
                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $this->Url->build(['controller' => 'Candidates']); ?>"><i class="fa"></i><?= __('Registered') ?></a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'DisqualifiedCandidates']); ?>"><i class="fa"></i><?= __('Disqualified') ?></a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'CandidateCas']); ?>"><i class="fa"></i><?= __('CA') ?></a></li>
            </ul>
        </li>

        <li class="treeview">
            <a href="#">
                <i class="fa fa-file-text-o"></i> <span><?= __('Bills') ?></span>
                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $this->Url->build(['controller' => 'Bills', 'action' => 'index']); ?>"><i class="fa"></i><?= __('My bills') ?></a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'Bills', 'action' => 'add']); ?>"><i class="fa"></i><?= __('Create bill') ?></a></li>
            </ul>
        </li>

        <li class="treeview">
            <a href="<?php echo $this->Url->build(['controller' => 'notifications']); ?>">
                <i class="fa fa-bell"></i> <span><?= __('Notifications') ?></span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
        </li>
        <li class="treeview">
            <a href="#"><i class="fa fa-users"></i> <span><?= __('Users') ?></span>
                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $this->Url->build(['controller' => 'users']); ?>"><i class="fa"></i><?= __('Users') ?></a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'groups']); ?>"><i class="fa"></i><?= __('Groups') ?></a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'permissions']); ?>"><i class="fa"></i><?= __('Permissions') ?></a></li>
            </ul>
        </li>

        <li class="treeview">
            <a href="#">
                <i class="fa fa-gear"></i> <span><?= __('Settings') ?></span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $this->Url->build(['controller' => 'Collections', 'action' => 'index']); ?>"><i class="fa"></i> <?= __('Collections') ?></a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'CollectionCategories', 'action' => 'index']); ?>"><i class="fa"></i> <?= __('Collection categories') ?></a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'Regions', 'action' => 'index']); ?>"><i class="fa"></i> <?= __('Regions') ?></a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'Districts', 'action' => 'index']); ?>"><i class="fa"></i> <?= __('Districts') ?></a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'Centres', 'action' => 'index']); ?>"><i class="fa"></i> <?= __('Centres') ?></a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'ExamTypes', 'action' => 'index']); ?>"><i class="fa"></i> <?= __('Exam types') ?></a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'Subjects', 'action' => 'index']); ?>"><i class="fa"></i> <?= __('Subjects') ?></a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'Settings', 'action' => 'general']); ?>"><i class="fa"></i> <?= __('General') ?></a></li>
            </ul>
        </li>
    </ul>
<?php } ?>
