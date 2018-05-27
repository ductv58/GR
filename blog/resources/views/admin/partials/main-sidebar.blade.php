<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-fw fa-users"></i> <span>Manages Question</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.question.create') }}"><i class="fa fa-circle-o"></i> Create Question
                        </a>
                    </li>
                    <li><a href="{{ route('admin.question.index') }}"><i class="fa fa-circle-o"></i> List Question</a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-fw fa-users"></i> <span>Manages Branch</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.branch.create') }}"><i class="fa fa-circle-o"></i> Create Branch </a>
                    </li>
                    <li><a href="{{ route('admin.branch.index') }}"><i class="fa fa-circle-o"></i> List Branch</a>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>