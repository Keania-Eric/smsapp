<!-- start: sidebar -->
<aside id="sidebar-left" class="sidebar-left">
				
    <div class="sidebar-header">
        <div class="sidebar-title">
            Navigation
        </div>
        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">
                    <li class="nav-active">
                        <a href="{{route('admin.dashboard')}}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.mail')}}">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span>Mail</span>
                        </a>
                    </li>
                   
                    <li>
                        <a href="{{route('admin.users')}}">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span>Users</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('admin.draft-edit')}}">
                            <i class="fa fa-envelope-square" aria-hidden="true"></i>
                            <span>Message Drafts</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('admin.sms-logs')}}">
                            <i class="fa fa-list" aria-hidden="true"></i>
                            <span>SMS Logs</span>
                        </a>
                    </li>

                </ul>
            </nav>

            <hr class="separator" />

           
        </div>

    </div>

</aside>
<!-- end: sidebar -->