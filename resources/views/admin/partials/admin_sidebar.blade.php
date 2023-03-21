<!--================================-->
<!-- Page Sidebar Start -->
<!--================================-->
<div class="page-sidebar">
    <div class="logo">
        <a class="logo-img" href="{{ route('admin.dashboard') }}">
            <img class="desktop-logo" src="../../assets/images/logos/logo-arman.png" width="100px" alt="">
            <img class="small-logo" src="../../assets/images/logos/logo-arman.png" width="100px" alt="">
        </a>
        <a id="sidebar-toggle-button-close"><i class="wd-20 ht-20" data-feather="x"></i> </a>
    </div>
    <!--================================-->
    <!-- Sidebar Menu Start -->
    <!--================================-->
    <div class="page-sidebar-inner">
        <div class="page-sidebar-menu">
            <ul class="accordion-menu">
                <li class="menu-label">Dashboard</li>
                <li class="{{ Route::currentRouteName() == 'admin.dashboard' ? 'open active' : '' }}">
                    <a href="">
                        <svg class="adata-svg-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path
                                    d="M13,18.9450712 L13,20 L14,20 C15.1045695,20 16,20.8954305 16,22 L8,22 C8,20.8954305 8.8954305,20 10,20 L11,20 L11,18.9448245 C9.02872877,18.7261967 7.20827378,17.866394 5.79372555,16.5182701 L4.73856106,17.6741866 C4.36621808,18.0820826 3.73370941,18.110904 3.32581341,17.7385611 C2.9179174,17.3662181 2.88909597,16.7337094 3.26143894,16.3258134 L5.04940685,14.367122 C5.46150313,13.9156769 6.17860937,13.9363085 6.56406875,14.4106998 C7.88623094,16.037907 9.86320756,17 12,17 C15.8659932,17 19,13.8659932 19,10 C19,7.73468744 17.9175842,5.65198725 16.1214335,4.34123851 C15.6753081,4.01567657 15.5775721,3.39010038 15.903134,2.94397499 C16.228696,2.49784959 16.8542722,2.4001136 17.3003976,2.72567554 C19.6071362,4.40902808 21,7.08906798 21,10 C21,14.6325537 17.4999505,18.4476269 13,18.9450712 Z"
                                    fill="#000000" fill-rule="nonzero" />
                                <circle fill="#000000" opacity="0.3" cx="12" cy="10" r="6" />
                            </g>
                        </svg>
                        <span>Analytics</span><i class="accordion-icon fa fa-angle-left"></i>
                    </a>
                    <ul class="sub-menu" style="display: block;">
                        <!-- Active Page -->
                        <li class="{{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}"><a
                                    href="{{ route('admin.dashboard') }}">Dashboard</a></li>

                    </ul>
                </li>

                <li
                    class="{{ request()->is('admin/roles') || request()->is('admin/roles/*') || request()->is('admin/users') || request()->is('admin/users/*') ? 'open active' : '' }}">
                    <a href="">
                        <svg class="adata-svg-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                <path
                                    d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                    fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                <path
                                    d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                    fill="#000000" fill-rule="nonzero"></path>
                            </g>
                        </svg>
                        <span>Users Management</span><i class="accordion-icon fa fa-angle-left"></i>
                    </a>
                    <ul class="sub-menu">
                        <li
                            class="{{ Route::currentRouteName() == 'admin.users.index' || Route::currentRouteName() == 'admin.users.create' || Route::currentRouteName() == 'admin.users.edit' ? 'active' : '' }}">
                            <a href="{{ route('admin.users.index') }} ">Users</a></li>
                        <li
                            class="{{ Route::currentRouteName() == 'admin.roles.index' || Route::currentRouteName() == 'admin.roles.create' || Route::currentRouteName() == 'admin.roles.edit' ? 'active' : '' }}">
                            <a href="{{ route('admin.roles.index') }}">Roles</a></li>
                        <li><a href="../cryptocurrency/cryptocurrency-buy-sell.html">Permissions</a></li>

                    </ul>
                </li>
                <li>
                    <a href="../apps/app-file-manager.html">
                        <svg class="adata-svg-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24" />
                                <path
                                    d="M4.85714286,1 L11.7364114,1 C12.0910962,1 12.4343066,1.12568431 12.7051108,1.35473959 L17.4686994,5.3839416 C17.8056532,5.66894833 18,6.08787823 18,6.52920201 L18,19.0833333 C18,20.8738751 17.9795521,21 16.1428571,21 L4.85714286,21 C3.02044787,21 3,20.8738751 3,19.0833333 L3,2.91666667 C3,1.12612489 3.02044787,1 4.85714286,1 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z"
                                    fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                <path
                                    d="M6.85714286,3 L14.7364114,3 C15.0910962,3 15.4343066,3.12568431 15.7051108,3.35473959 L20.4686994,7.3839416 C20.8056532,7.66894833 21,8.08787823 21,8.52920201 L21,21.0833333 C21,22.8738751 20.9795521,23 19.1428571,23 L6.85714286,23 C5.02044787,23 5,22.8738751 5,21.0833333 L5,4.91666667 C5,3.12612489 5.02044787,3 6.85714286,3 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z"
                                    fill="#000000" fill-rule="nonzero" />
                            </g>
                        </svg>
                        <span>File Manager</span>
                    </a>
                </li>

                <li class="menu-label">Content</li>
                <li>
                    <a href="">
                        <svg class="adata-svg-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path
                                    d="M13,18.9450712 L13,20 L14,20 C15.1045695,20 16,20.8954305 16,22 L8,22 C8,20.8954305 8.8954305,20 10,20 L11,20 L11,18.9448245 C9.02872877,18.7261967 7.20827378,17.866394 5.79372555,16.5182701 L4.73856106,17.6741866 C4.36621808,18.0820826 3.73370941,18.110904 3.32581341,17.7385611 C2.9179174,17.3662181 2.88909597,16.7337094 3.26143894,16.3258134 L5.04940685,14.367122 C5.46150313,13.9156769 6.17860937,13.9363085 6.56406875,14.4106998 C7.88623094,16.037907 9.86320756,17 12,17 C15.8659932,17 19,13.8659932 19,10 C19,7.73468744 17.9175842,5.65198725 16.1214335,4.34123851 C15.6753081,4.01567657 15.5775721,3.39010038 15.903134,2.94397499 C16.228696,2.49784959 16.8542722,2.4001136 17.3003976,2.72567554 C19.6071362,4.40902808 21,7.08906798 21,10 C21,14.6325537 17.4999505,18.4476269 13,18.9450712 Z"
                                    fill="#000000" fill-rule="nonzero" />
                                <circle fill="#000000" opacity="0.3" cx="12" cy="10" r="6" />
                            </g>
                        </svg>
                        <span>Jobs Section</span><i class="accordion-icon fa fa-angle-left"></i>
                    </a>
                    <ul class="sub-menu" style="display: block;">
                        <!-- Active Page -->
                        <li><a href="">Add New Job Post</a></li>
                        <li><a href="">Job Post List</a></li>
                        <li><a href="">Add New Job Category</a></li>
                        <li><a href="">Job Category List</a></li>

                    </ul>
                </li>

                <li class="menu-label">GENERAL</li>

            </ul>
        </div>
    </div>
    <!--/ Sidebar Menu End -->
</div>
<!--/ Page Sidebar End -->
