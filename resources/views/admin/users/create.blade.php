@extends('admin.master')

@section('content')
    <!-- Content Header (User header) -->
    <section class="content-header">
        <h1>
            Add User
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            @can('users.create',\Illuminate\Support\Facades\Auth::user())
                <li class="active"><a href="{{ route('users.index') }}">User's List</a></li>
            @endcan
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-7">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aira-hidden="true">
                                    &times;
                                </button>
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="box-body">
                            <div class="form-group">
                                <label for="name" class="required-field">Name &nbsp</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" autocomplete="off" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="email" class="required-field">Email &nbsp</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" autocomplete="off" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label for="password" class="required-field">Password &nbsp</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" autocomplete="off" >
                            </div>
                            <div class="form-group">
                                <label for="confirm-password" class="required-field">Confirm Password &nbsp</label>
                                <input type="password" name="confirm-password" class="form-control" id="confirm-password" placeholder="Enter confirm password" autocomplete="off" >
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <label class="required-field">Assign Role &nbsp</label>
                                    <select class="form-control select2" name="roles_id[]" id="roles_id" multiple="multiple" data-placeholder="Select Role">
                                        @foreach($roles as $key=>$value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    {{--<select class="form-control" name="roles_id">
                                        <option value="">Choose Role</option>
                                        @foreach($roles as $key=>$value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>--}}
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </section>
@endsection
@section('jsscript')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endsection
