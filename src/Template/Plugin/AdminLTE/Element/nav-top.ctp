<?php

use Cake\Core\Configure;

$file = Configure::read('Theme.folder') . DS . 'src' . DS . 'Template' . DS . 'Element' . DS . 'nav-top.ctp';

if (file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
} else {
    ?>
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li>
                    <div class="user-level float-right">
                        <?= $this->Form->control('region_id', [
                            'options' => $regions,
                            'class' => 'region',
                            'data-placeholder' => 'Choose a region...',
                            'label' => false,
                            'empty' => true,
                            'default' => $this->request->getSession()->read('regionId')
                        ]); ?>
                    </div>
                </li>
                <li>
                    <div class="user-level float-right">
                        <?= $this->Form->control('district_id', [
                            'options' => $districts,
                            'class' => 'district',
                            'data-placeholder' => 'Choose a district...',
                            'label' => false,
                            'empty' => true,
                            'default' => $this->request->getSession()->read('districtId')
                        ]); ?>
                    </div>
                </li>
                <li>
                    <div class="user-level float-right">
                        <?= $this->Form->control('centre_id', [
                            'options' => $centres,
                            'class' => 'centre',
                            'data-placeholder' => 'Choose a centre...',
                            'label' => false,
                            'empty' => true,
                            'default' => $this->request->getSession()->read('centreId')
                        ]); ?>
                    </div>
                </li>
                <!-- Notifications: style can be found in dropdown.less -->
                <li class="reload">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa  fa-repeat"></i>
                    </a>
                </li>
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell"></i>
                        <?php if(count($unreadNotifications > 0)) echo '<span class="label label-warning">' . $unreadNotifications . '</span>';?>

                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">

                                <?php
                                foreach ($userNotifications as $userNotification) {
                                    ?>
                                    <li>
                                        <a href="<?= $this->Url->build(['controller' => 'notifications', 'action' => 'view', $userNotification->id]); ?>">
                                            <?= h($userNotification->title) ?>
                                        </a>
                                    </li>
                                    <?php
                                }

                                ?>
                            </ul>
                        </li>
                        <li class="footer"><a href="<?= $this->Url->build(['controller' => 'notifications', 'action' => 'inbox']); ?>">View
                                all</a></li>
                    </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                        <span
                            style="margin-right: 8px"><?php echo $this->Html->image('user2-160x160.jpg', array('class' => 'img-circle', 'alt' => 'User Image', 'height' => '20px')); ?></span>
                        <span class="hidden-xs"><?= $this->request->getSession()->read('Auth.User.username') ?></span>
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><?= $this->Html->link(__('Change password'), ['controller' => 'users', 'action' => 'changePassword']) ?></li>
                        <li class="divider"></li>
                        <li> <?= $this->Html->link(__('Logout'), ['controller' => 'users', 'action' => 'logout']) ?></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <?php
}
?>
