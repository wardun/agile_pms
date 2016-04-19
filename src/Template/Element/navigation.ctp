<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <!--        <div class="user-panel">
                    <div class="pull-left image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?php //echo $userInfo['username'] ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>-->

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="<?php echo ($this->request->params['controller']) == 'Homes' ? 'active' : ''; ?>">
                <a href="<?php echo $this->Url->build(["controller" => "homes", "action" => "index"]) ?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
                </a>
            </li>
            <li class="treeview <?php echo ($this->request->params['controller']) == 'Users' ? 'active' : ''; ?>">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Users</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo $this->Url->build(["controller" => "users", "action" => "add"]) ?>">Add User</a></li>
                    <li><a href="<?php echo $this->Url->build(["controller" => "users", "action" => "index"]) ?>">Users</a></li>
                </ul>
            </li>
            <li class="treeview <?php echo ($this->request->params['controller']) == 'Projects' ? 'active' : ''; ?>">
                <a href="#">
                    <i class="fa fa-life-ring"></i>
                    <span>Projects</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo $this->Url->build(["controller" => "projects", "action" => "add"]) ?>">Add Project</a></li>
                    <li><a href="<?php echo $this->Url->build(["controller" => "projects", "action" => "index"]) ?>">Projects</a></li>
                </ul>
            </li>
            <li class="treeview <?php echo ($this->request->params['controller']) == 'Teams' ? 'active' : ''; ?>">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Teams</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo $this->Url->build(["controller" => "teams", "action" => "add"]) ?>">Add Team</a></li>
                    <li><a href="<?php echo $this->Url->build(["controller" => "teams", "action" => "index"]) ?>">Teams</a></li>
                </ul>
            </li>
            <li class="treeview <?php echo ($this->request->params['controller']) == 'Tasks' ? 'active' : ''; ?>">
                <a href="#">
                    <i class="fa fa-tasks"></i>
                    <span>Tasks</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo $this->Url->build(["controller" => "tasks", "action" => "add"]) ?>">Add Task</a></li>
                    <li><a href="<?php echo $this->Url->build(["controller" => "tasks", "action" => "index"]) ?>">Tasks</a></li>
                </ul>
            </li>
             <li class="treeview <?php echo ($this->request->params['controller']) == 'Settings' ? 'active' : ''; ?>">
                <a href="#">
                    <i class="fa fa-gear"></i>
                    <span>Settings</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo $this->Url->build(["controller" => "settings", "action" => "add"]) ?>">Add Settings</a></li>
                    <li><a href="<?php echo $this->Url->build(["controller" => "settings", "action" => "index"]) ?>">Settings</a></li>
                </ul>
            </li>
             <li class="treeview <?php echo ($this->request->params['controller']) == 'Sprints' ? 'active' : ''; ?>">
                <a href="#">
                    <i class="fa fa-database"></i>
                    <span>Sprints</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo $this->Url->build(["controller" => "sprints", "action" => "add"]) ?>">Add Sprints</a></li>
                    <li><a href="<?php echo $this->Url->build(["controller" => "sprints", "action" => "index"]) ?>">Sprints</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>