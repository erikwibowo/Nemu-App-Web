<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ asset('template/assets/img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ session('name') }}
                            <span class="user-level">{{ session('level') }}</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item {{ Request::segment(2) == '' ? 'active':'' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                        {{-- <span class="badge badge-count">5</span> --}}
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">DATA</h4>
                </li>
                <li class="nav-item {{ Request::segment(2) == 'admin' ? 'active':'' }}">
                    <a href="{{ route('admin.index') }}">
                        <i class="fas fa-user"></i>
                        <p>Admin</p>
                        {{-- <span class="badge badge-count">5</span> --}}
                    </a>
                </li>
                <li class="nav-item {{ Request::segment(2) == 'user' ? 'active':'' }}">
                    <a href="{{ route('user.index') }}">
                        <i class="fas fa-users"></i>
                        <p>User</p>
                        {{-- <span class="badge badge-count">5</span> --}}
                    </a>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#post">
                        <i class="fas fa-file-alt"></i>
                        <p>Post</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="post">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="sidebar-style-1.html') }}">
                                    <span class="sub-item">Penemuan</span>
                                </a>
                            </li>
                            <li>
                                <a href="overlay-sidebar.html') }}">
                                    <span class="sub-item">Kehilangan</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ Request::segment(2) == 'comment' ? 'active':'' }}">
                    <a href="{{ route('comment.index') }}">
                        <i class="fas fa-comment"></i>
                        <p>Komentar</p>
                        {{-- <span class="badge badge-count">5</span> --}}
                    </a>
                </li>
                <li class="nav-item {{ Request::segment(2) == 'pemberitahuan' ? 'active':'' }}">
                    <a href="">
                        <i class="fas fa-bell"></i>
                        <p>Pemberitahuan</p>
                        {{-- <span class="badge badge-count">5</span> --}}
                    </a>
                </li>
                <li class="nav-item {{ Request::segment(2) == 'pembaruan' ? 'active':'' }}">
                    <a href="">
                        <i class="fas fa-redo-alt"></i>
                        <p>Pembaruan</p>
                        {{-- <span class="badge badge-count">5</span> --}}
                    </a>
                </li>
                <li class="nav-item {{ Request::segment(2) == 'pengaturan' ? 'active':'' }}">
                    <a href="">
                        <i class="fas fa-cog"></i>
                        <p>Pengaturan</p>
                        {{-- <span class="badge badge-count">5</span> --}}
                    </a>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#sidebarLayouts">
                        <i class="fas fa-th-list"></i>
                        <p>Sidebar Layouts</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="sidebarLayouts">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="sidebar-style-1.html') }}">
                                    <span class="sub-item">Sidebar Style 1</span>
                                </a>
                            </li>
                            <li>
                                <a href="overlay-sidebar.html') }}">
                                    <span class="sub-item">Overlay Sidebar</span>
                                </a>
                            </li>
                            <li>
                                <a href="compact-sidebar.html') }}">
                                    <span class="sub-item">Compact Sidebar</span>
                                </a>
                            </li>
                            <li>
                                <a href="static-sidebar.html') }}">
                                    <span class="sub-item">Static Sidebar</span>
                                </a>
                            </li>
                            <li>
                                <a href="icon-menu.html') }}">
                                    <span class="sub-item">Icon Menu</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>