@extends('admin.layouts.admin-layouts')

@push('style')
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/plugins/dataTable/datatables.min.css') }}">
    <link type="text/css" rel="stylesheet"
        href="{{ asset('assets/plugins/dataTable/extensions/dataTables.jqueryui.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/plugins/simple-line-icons/css/simple-line-icons.css') }}" />
    @include('admin.roles.partials.styles')
@endpush

@section('inner-title-content')
    <div class="pd-y-10 pd-x-30 d-flex justify-content-between align-items-center header-bottom">
        <div class="d-flex align-items-center">
            <h2 class="d-flex align-items-center tx-16 mb-0 pd-r-10 mr-2 bd-r bd-gray-200">Roles</h2>
            <h2 class="d-flex align-items-center tx-15 mb-0 tx-normal">Edit new user roles.</h2>
        </div>
        <div class="d-flex hidden-xs">
            <a href="{{ route('admin.users.index') }}" target=""
                class="btn bg-soft-primary mr-3 e d-md-block pd-y-8-force waves-effect"><span data-feather="life-buoy"
                    class="wd-16 ht-16 mr-1"></span>All Users</a>
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
                        <h6 class="mb-0">Edit this User</h6>

                    </div>

                    <div class="container"> @include('admin.partials.messages')</div>

                    <div class="container ">
                        <form class="m-3" action="{{ route('admin.users.update', $user->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">User Name</label>
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name', $user->name) }}" required autocomplete="name"
                                        placeholder="Enter User Name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">User Email</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email', $user->email) }}" placeholder="Enter User Email" required
                                        autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="name">Password</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        placeholder="Enter Password" autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="form-group col-6">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="text" class="form-control" id="password_confirmation"
                                        name="password_confirmation" value="" placeholder="Enter Confirm Password">
                                </div>
                            </div>
                            <div class="row">
                               
                                <div class="form-group col-6">
                                    <label for="roles">Assign Roles</label>
                                    <select  name="roles" id="roles"  class="form-control select2 select2-hidden-accessible" data-placeholder="Choose A Role" tabindex="-1" aria-hidden="true">
                                    
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}"
                                                {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                            </div>
                            <br>


                            <button type="submit" class="btn btn-primary">Update User Information</button>
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

    <!-- END: Custom JS-->
@endpush
