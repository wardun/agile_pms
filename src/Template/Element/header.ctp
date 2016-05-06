<header class="main-header">
    <!-- Logo -->
    <a href="<?= $this->request->webroot ?>" class="logo">
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Agile</b>PMS</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <!--                <li class="dropdown messages-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-envelope-o"></i>
                                        <span class="label label-success">4</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="header">You have 4 messages</li>
                                        <li>
                                             inner menu: contains the actual data 
                                            <ul class="menu">
                                                <li> start message 
                                                    <a href="#">
                                                        <div class="pull-left">
                                                            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                                        </div>
                                                        <h4>
                                                            Support Team
                                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                        </h4>
                                                        <p>Why not buy a new awesome theme?</p>
                                                    </a>
                                                </li> end message 
                                                <li>
                                                    <a href="#">
                                                        <div class="pull-left">
                                                            <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                                        </div>
                                                        <h4>
                                                            AdminLTE Design Team
                                                            <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                                        </h4>
                                                        <p>Why not buy a new awesome theme?</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="pull-left">
                                                            <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                                        </div>
                                                        <h4>
                                                            Developers
                                                            <small><i class="fa fa-clock-o"></i> Today</small>
                                                        </h4>
                                                        <p>Why not buy a new awesome theme?</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="pull-left">
                                                            <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                                        </div>
                                                        <h4>
                                                            Sales Department
                                                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                        </h4>
                                                        <p>Why not buy a new awesome theme?</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="pull-left">
                                                            <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                                        </div>
                                                        <h4>
                                                            Reviewers
                                                            <small><i class="fa fa-clock-o"></i> 2 days</small>
                                                        </h4>
                                                        <p>Why not buy a new awesome theme?</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="footer"><a href="#">See All Messages</a></li>
                                    </ul>
                                </li>-->

                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning"><?=$totalNotification?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <?php
                                if ($notifications) {
                                    foreach ($notifications as $notification) {
                                        ?>
                                        <li>
                                            <a href="<?php echo $this->Url->build('/'.$notification->link, true)?>">
                                               <?php echo $notification->message?>
                                            </a>
                                        </li>
                                        <?php
                                        unset($notification);
                                    }
                                }
                                ?>
                            </ul>
                        </li>
                    </ul>
                </li>

                <!-- Tasks: style can be found in dropdown.less -->
                <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Notice Board">
                        <i class="fa fa-flag-o"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Official Notices</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <?php
                                if ($noticeBoard) {
                                    foreach ($noticeBoard as $notice) {
                                        ?>
                                        <li><!-- Task item -->
                                            <a href="<?php echo $this->Url->build(["controller" => "notices", "action" => "view/" . $notice->id]) ?>">
                                                <h3>
                                                    <?= $notice->title ?>
                                                </h3>
                                            </a>
                                        </li><!-- end task item -->
                                        <?php
                                    }
                                    unset($notice);
                                }
                                ?>
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="<?php echo $this->Url->build(["controller" => "notices", "action" => "index"]) ?>">View all notices</a>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!--<img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">-->
                        <i class="glyphicon glyphicon-user"></i>
                        <span class="hidden-xs"><?php echo $userInfo['username'] ?>
                            <i class="caret"></i>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            
                            <img src="<?php echo $this->request->webroot?>img/defaultavatar.jpg" class="img-circle" alt="User Image">
                            <p>
                                <?php echo $userInfo['first_name'] . ' ' . $userInfo['last_name'] ?> - <?= $userInfo['designation'] ?>
                                <small>Member since <?= date('F, Y', strtotime($userInfo['joindate'])) ?></small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <!--                        <li class="user-body">
                                                    <div class="col-xs-4 text-center">
                                                        <a href="#">Followers</a>
                                                    </div>
                                                    <div class="col-xs-4 text-center">
                                                        <a href="#">Sales</a>
                                                    </div>
                                                    <div class="col-xs-4 text-center">
                                                        <a href="#">Friends</a>
                                                    </div>
                                                </li>-->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="<?php echo $this->Url->build(["controller" => "users", "action" => "logout"]) ?>" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>