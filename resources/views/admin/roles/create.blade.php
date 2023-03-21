@extends('admin.layouts.admin-layouts')

@push('style')
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/plugins/simple-line-icons/css/simple-line-icons.css') }}" />
    @include('admin.roles.partials.styles')
@endpush

@section('inner-title-content')
    <div class="pd-y-10 pd-x-30 d-flex justify-content-between align-items-center header-bottom">
        <div class="d-flex align-items-center">
            <h2 class="d-flex align-items-center tx-16 mb-0 pd-r-10 mr-2 bd-r bd-gray-200">Roles</h2>
            <h2 class="d-flex align-items-center tx-15 mb-0 tx-normal">Create new user roles.</h2>
        </div>
        <div class="d-flex hidden-xs">
            <div class="d-flex hidden-xs">
                <div class="d-flex hidden-xs">
                    <a href="{{ route('admin.roles.index') }}" target=""
                        class="btn bg-soft-primary mr-3 e d-md-block pd-y-8-force waves-effect"><span
                            data-feather="life-buoy" class="wd-16 ht-16 mr-1"></span>All Roles</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('inner-content')
    <!-- Page Inner Content Start -->
    <!--================================-->
    <div class="page-inner">

        <!--================================-->
        <!-- Create Role -->
        <!--================================-->
        <div class="row row-xs">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h6 class="mb-0">Create New Role</h6>

                    </div>

                    <div class="container ">
                        <form class="m-3" action="{{ route('admin.roles.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Role Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter role name">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="name">Permissions</label>



                                <div class="container">
                                    <div class="row"> <label class="switch">
                                            <input type="checkbox" id="checkPermissionAll" value="1">
                                            <span class="slider"></span>
                                        </label>
                                        <label class="mg-l-5" for="checkPermissionAll">Check All</label>
                                    </div>

                                </div>


                                <hr>
                                @php $i = 1; @endphp
                                @foreach ($permission_groups as $group)
                                    <div class="row">
                                        <div class="col-3">

                                            <!-- Rounded switch -->
                                            <label class="form-check-label text-capitalize"
                                                for="checkPermission">{{ $group->name }}</label>
                                            <br>
                                            <label class="switch">
                                                <input type="checkbox" id="{{ $i }}Management"
                                                    value="{{ $group->name }}"
                                                    onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)">
                                                <span class="slider round"></span>
                                            </label>

                                        </div>

                                        <div class="col-9 role-{{ $i }}-management-checkbox">
                                            @php
                                                $permissions = getpermissionsByGroupName($group->name);
                                                $j = 1;
                                            @endphp
                                            @foreach ($permissions as $permission)
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="permissions[]"
                                                        id="checkPermission{{ $permission->id }}"
                                                        value="{{ $permission->name }}">
                                                    <label class="custom-control-label"
                                                        for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                                                </div>



                                                @php  $j++; @endphp
                                            @endforeach
                                            <br>
                                        </div>

                                    </div>
                                    @php  $i++; @endphp
                                @endforeach


                            </div>

                            <button type="submit" class="btn btn-primary">Create Role</button>
                        </form>
                    </div>
                    <br>
                </div>
            </div>
        </div>
        <!--/ Create Role  End -->


    </div>
    <!--/ Page Inner Content End -->
    <!--================================-->
@endsection


@push('scripts')
    <!-- BEGIN: Custom JS-->
    @include('admin.roles.partials.scripts')
    <!-- END: Custom JS-->
@endpush
