@extends('layouts.master')

@section('title', 'Admin | Roles')

@section('css')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('content')

        <!-- Page Content -->
<div class="container inner-top">

    <div class="row"><!-- holds MAIN CONTENT AREA-->

        <div class="col-lg-12 left-col"><!-- left-col fff background -->

            <div class="row"><!-- upper left content -->
                <div class="col-md-12">


                    <div class="row"><!-- page heading -->
                        <div class="col-md-12">
                            <h2 class="page-header text-uppercase header candara">Roles and Permissions</h2>
                        </div>
                    </div><!-- /.row page heading -->


                    @if (auth()->user()->is_admin)
                        <div class="row"><!-- text row -->
                            <div class="col-md-6">
                                <h3 class="text-uppercase header candara">Create Role</h3>
                                <p>Please enter the role you would like to create below.</p>

                                <form action="/admin/roles" method="POST">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label for="role_name">Role Name</label>
                                        <input type="text" id="role_name" class="form-control" name="role_name" />
                                    </div>

                                    <div class="form-group">
                                        <label for="role_name">Role Slug</label>
                                        <input type="text" id="role_slug" class="form-control" name="role_slug" />
                                    </div>

                                    <button type="submit" class="btn btn-primary pull-right">Add Role</button>
                                </form>
                            </div>

                            <div class="col-md-6">
                                <h3 class="text-uppercase header candara">Create Permission</h3>
                                <p>Please enter the permission you would like to create below.</p>

                                <form action="/admin/permissions" method="POST">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label for="role_name">Permission Name</label>
                                        <input type="text" id="permission_name" class="form-control" name="permission_name" />
                                    </div>

                                    <div class="form-group">
                                        <label for="role_name">Permission Slug</label>
                                        <input type="text" id="permission_slug" class="form-control" name="permission_slug" />
                                    </div>

                                    <button type="submit" class="btn btn-primary pull-right">Add Permission</button>
                                </form>
                            </div>
                        </div><!-- /.row text -->

                        <hr />

                        <div class="row"><!-- text row -->
                            <div class="col-md-6">
                                <h3 class="text-uppercase header candara">Assign Permission to Role</h3>
                                <p>Please enter the role you would like to create below.</p>

                                <form action="/admin/roles/permissions" method="POST">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label for="permission_id">Permission</label>
                                        @if ($permissions->count())
                                            <select name="permission_id" id="permission_id" class="form-control">
                                                <option value="0">Select One...</option>
                                                @foreach ($permissions as $permission)
                                                    <option value="{{ $permission->id }}">{{ $permission->permission_name }}</option>
                                                @endforeach
                                            </select>
                                        @else
                                            No permissions were found.
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="role_id">Role</label>
                                        @if ($roles->count())
                                            <select name="role_id" id="role_id" class="form-control">
                                                <option value="0">Select One...</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                                @endforeach
                                            </select>
                                        @else
                                            No roles were found.
                                        @endif
                                    </div>

                                    <button type="submit" class="btn btn-primary pull-right">Assign Permission</button>
                                </form>
                            </div>

                            <div class="col-md-6">
                                <h3 class="text-uppercase header candara">Assign Role to User</h3>
                                <p>Please enter the permission you would like to create below.</p>

                                <form action="/admin/roles/users" method="POST">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label for="role_id">Role</label>
                                        @if ($roles->count())
                                            <select name="role_id" id="role_id" class="form-control">
                                                <option value="0">Select One...</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                                @endforeach
                                            </select>
                                        @else
                                            No roles were found.
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="user_id">User</label>
                                        @if ($users->count())
                                            <input type="text" name="user" id="user" class="form-control" placeholder="Start typing to select a user by name or email"/>
                                            <div id="user-id"></div>
                                        @else
                                            No roles were found.
                                        @endif
                                    </div>

                                    <button type="submit" class="btn btn-primary pull-right">Add Role</button>
                                </form>
                            </div>
                        </div><!-- /.row text -->
                    @else
                        <div class="col-md-6">
                            <h3 class="text-uppercase header candara">Assign Role to User</h3>
                            <p>Please enter the permission you would like to create below.</p>

                            <form action="/admin/roles/users" method="POST">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="role_id">Role</label>
                                    @if ($roles->count())
                                        <select name="role_id" id="role_id" class="form-control">
                                            <option value="0">Select One...</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        No roles were found.
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="user_id">User</label>
                                    @if ($users->count())
                                        <input type="text" name="user" id="user" class="form-control" placeholder="Start typing to select a user by name or email"/>
                                        <div id="user-id"></div>
                                    @else
                                        No users were found.
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-primary pull-right">Add Role</button>
                            </form>
                        </div>
                    @endif

                    <hr />

                </div>	<!-- col-md-12 -->
            </div><!-- /.row -->

        </div><!-- /.col-lg-12 .left-col -->


    </div><!-- /MAIN CONTENT AREA ABOVE FOOTER -->

</div><!-- /.container inner-top -->

@stop

@section('scripts')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $('#user').autocomplete({
                source: '/users/search',
                minLength: 2,
                select: function(e, ui) {
                    $('#user-id').html('<input type="hidden" name="user_id" value="' + ui.item.id + '" />');
                }
            });
        });
    </script>
@endsection