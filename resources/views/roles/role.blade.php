@extends('layouts.master')
@section('page-css')

<link rel="stylesheet" href="{{asset('assets/styles/vendor/datatables.min.css')}}">
@endsection

@section('main-content')
@include('sweetalert::alert')
<div class="col-md-12 mb-4">
    <div class="card text-left">

        <div class="card-body">
            <h4 class="card-title mb-3"> Roles</h4>

            <div style="margin-bottom:10px; ">
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addRole">
                    <i class="fa fa-plus"></i> Add Role
                </button>
            </div>
            <div class="table-responsive">
                <table id="multicolumn_ordering_table" class="display table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Name</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($roles) > 0)
                        @foreach($roles as $role)
                        <tr>
                            <td> {{ $loop->iteration }}</td>
                            <td> {{$role->name}}</td>
                            <td> {{$role->name}}</td>
                            <td> {{$role->name}}</td>
                            <td>
                                <button onclick="editRole({{$role}});" data-toggle="modal" data-target="#editRole" type="button" class="btn btn-primary btn-sm">Edit</button>
                                <button onclick="deleteRole({{$role->id}});" type="button" class="btn btn-danger btn-sm">Delete</button>

                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>

                </table>
            </div>

        </div>
    </div>
</div>
<!-- end of col -->
<div id="addRole" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                <div class="card-title mb-3">New Role</div>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <form role="form" method="post" action="{{route('addrole')}}">
                                {{ csrf_field() }}
                                <div class="row">
                                    <input type="hidden" name="id" id="id">
                                    <div class="col-md-12 form-group mb-3">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Role name">
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-block btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>

</div>

<div id="editRole" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                <div class="card-title mb-2">Edit Role</div>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <form role="form" method="post" action="{{route('editrole')}}">
                                {{ csrf_field() }}
                                <div class="row">
                                    <input type="hidden" name="id" id="id">
                                    <div class="col-md-12 form-group mb-3">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Role name">
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-block btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-body">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <form role="form" method="post" action="{{route('editrole')}}">
                                {{ csrf_field() }}
                                <div class="row">
                                <div class="card-title mb-2">Assign Permission</div>
                                    <input type="hidden" name="id" id="id">
                                    <div class="col-md-12 form-group mb-3">
                                        <label for="permission">Permission</label>
                                        <select class="form-control" data-width="100%" id="permission" name="permission" autocomplete="permission-name">
                                            <option value="">Please select </option>
                                            @foreach($permissions as $permission)
                                            <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                            @endforeach

                                        </select>

                                    </div>

                                </div>
                                <button type="submit" class="btn btn-block btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>

</div>

@endsection

@section('page-js')

<script src="{{asset('assets/js/vendor/datatables.min.js')}}"></script>
<script src="{{asset('assets/js/datatables.script.js')}}"></script>
<script type="text/javascript">
    function editRole(role) {
        $('#name').val(role.name);
        $('#id').val(role.id);
    }
</script>

@endsection