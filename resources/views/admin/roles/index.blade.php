@extends('admin.layouts.admin-layouts')

@push('style')
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/plugins/dataTable/datatables.min.css') }}">
    <link type="text/css" rel="stylesheet"
        href="{{ asset('assets/plugins/dataTable/extensions/dataTables.jqueryui.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/plugins/simple-line-icons/css/simple-line-icons.css') }}" />
@endpush

@section('inner-title-content')
    <div class="pd-y-10 pd-x-30 d-flex justify-content-between align-items-center header-bottom">
        <div class="d-flex align-items-center">
            <h2 class="d-flex align-items-center tx-16 mb-0 pd-r-10 mr-2 bd-r bd-gray-200">Roles</h2>
            <h2 class="d-flex align-items-center tx-15 mb-0 tx-normal">Manage user roles.</h2>
        </div>
        <div class="d-flex hidden-xs">
            <a href="{{ route('admin.roles.create') }}"
                class="btn bg-soft-primary mr-3 e d-md-block pd-y-8-force waves-effect"><span data-feather="life-buoy"
                    class="wd-16 ht-16 mr-1"></span>Create Role</a>
        </div>
    </div>
@endsection
@section('inner-content')
    <!-- Page Inner Content Start -->
    <!--================================-->
    <div class="page-inner">

        <!--================================-->
        <!-- Coin Market Start -->
        <!--================================-->
        <div class="row row-xs">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h6 class="mb-0">All roles</h6>


                    </div>
                    <div class="container">
                        @include('admin.partials.messages')
                    </div>
                    <div class="collapse show" id="coinMarket">
                        <div class="card-body pd-0">
                            <div class="table-responsive">

                                <table id="basicDataTable" class="table table-hover table-bordered mb-0">
                                    <thead class="tx-12 tx-uppercase">
                                        <tr>
                                            <th>ID</th>
                                            <th>ROLE NAME</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($roleList as $key => $role)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $role->name }}</td>
                                                <td><a href="{{ route('admin.roles.edit', $role->id) }}"
                                                        class="btn btn-primary btn-icon">
                                                        <div><i class="icon-pencil"></i></div>
                                                    </a>
                                                    <a class="btn btn-danger btn-icon text-white"
                                                        onclick="deleteRole({{ $role->id }})">
                                                        <div><i class="icon-trash"></i></div>
                                                    </a>

                                                </td>

                                            </tr>
                                        @endforeach



                                    </tbody>
                                    {{-- <tfoot>
                                        <tr>
                                            <th>IDS</th>
                                            <th>ROLE NAME</th>
                                            <th>Action</th>
                                           
                                        </tr>
                                    </tfoot> --}}
                                </table>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Coin Market End -->


    </div>
    <!--/ Page Inner Content End -->
    <!--================================-->
@endsection


@push('scripts')
    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('assets/plugins/dataTable/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/dataTable/responsive/dataTables.responsive.js') }}"></script>
    <script src="{{ asset('assets/plugins/dataTable/extensions/dataTables.jqueryui.min.js') }}"></script>
    <!-- END: Vendor JS-->
    <!-- BEGIN: Custom JS-->
    <script>
        $('#basicDataTable').DataTable({
            responsive: true,
            language: {
                searchPlaceholder: 'Search...',
                sSearch: ''
            }
        });
    </script>


    <script>
        function deleteRole(roleId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // send a DELETE request using AJAX
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('admin.roles.destroy', ':id') }}'.replace(':id', roleId),

                        data: {
                            _method: "DELETE",
                            _token: "{{ csrf_token() }}"
                        },
                        dataType: 'JSON',
                        success: function(data) {
                            // alert(data.success);
                       

                                if (typeof(data.error) != "undefined") {
                                    Swal.fire({
                                        title: 'Sorry!',
                                        text: `${data.error}`,
                                        icon: 'error'
                                    }).then((result) => {
                                        console.log(result);
                                        // reload the page after success
                                        if (result.isConfirmed) {
                                      
                                            location.reload();
                                        }
                                    });
                                } else {

                                    Swal.fire({
                                        title: 'Deleted!',
                                        text: `${data.success}`,
                                        icon: 'success'
                                    }).then((result) => {
                                        console.log(result);
                                        // reload the page after success
                                        if (result.isConfirmed) {
                                            $(`button[data-product-id="${roleId}"]`).closest(
                                                    'tr')
                                                .remove();
                                            location.reload();
                                        }
                                    });
                                }
                        }


                    });
                }
            });
        }
    </script>
    <!-- END: Custom JS-->
@endpush
