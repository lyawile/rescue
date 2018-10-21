<?php

use Cake\Core\Configure;

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
                <li><a href="<?php echo $this->Url->build(['controller' => 'dashboards', 'action' => 'registration']); ?>"><i
                            class="fa fa-circle-o"></i><?= __('Registration') ?></a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'dashboards', 'action' => 'finance']); ?>"><i
                            class="fa fa-circle-o"></i><?= __('Finance') ?></a></li>
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
            <a href="#">
                <i class="fa fa-users"></i> <span><?= __('Users') ?></span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $this->Url->build(['controller' => 'users']); ?>"><i
                            class="fa"></i><?= __('Users') ?></a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'groups']); ?>"><i
                            class="fa"></i><?= __('Groups') ?></a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'permissions']); ?>"><i
                            class="fa"></i><?= __('Permissions') ?></a></li>
            </ul>
        </li>

        <li class="treeview">
            <a href="#">
                <i class="fa fa-graduation-cap"></i> <span><?= __('Candidates') ?></span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $this->Url->build(['controller' => 'Candidates']); ?>"><i
                            class="fa"></i><?= __('Registered') ?></a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'DisqualifiedCandidates']); ?>"><i
                            class="fa"></i><?= __('Disqualified') ?></a></li>
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
                <li><a href="<?php echo $this->Url->build('/'); ?>"><i class="fa"></i> <?= __('General') ?></a></li>
            </ul>
        </li>
        <li>
            <a href="<?php echo $this->Url->build('/pages/widgets'); ?>">
                <i class="fa fa-th"></i> <span>Widgets</span>
                <span class="pull-right-container">
                <small class="label pull-right bg-green">new</small>
            </span>
            </a>
        </li>
        <li><a href="<?php echo $this->Url->build('/pages/debug'); ?>"><i class="fa fa-bug"></i> Debug</a></li>
    </ul>
<?php } ?>
