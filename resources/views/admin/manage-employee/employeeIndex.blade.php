@extends('admin.admin-layouts.master')
@section('content')
    <div class="content-header" xmlns="http://www.w3.org/1999/html">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{$title}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{$title}}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Begin Page Content -->
    <div class="container-fluid">


                <div class="card shadow mb-4">

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Department</th>
                                    <th>Designation</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($employees as $key=>$employee )
                                <tr>
                                    <td>{{$employee->id}}</td>
                                    <td><img src="/files/uploads/{{ $employee->emp_info->avatar }}" alt="employee" class="rounded-circle" width="50px" height="50px"></td>
                                    <td>{{$employee->name}}</td>
                                    <td>{{$employee->email}}</td>
                                    <td>{{$employee->emp_info->department}}</td>
                                    <td>{{$employee->emp_info->designation}}</td>
                                    <td>
                                        <a href="{{route('admin.employeeView',$employee->id)}}" class="btn btn-sm btn-success"><i class="fas fa-eye" aria-hidden="true"></i></a>

                                        <a href="{{route('admin.employeeEdit',$employee->emp_info->id)}}" class="btn btn-sm btn-info"><i class="fas fa-edit" aria-hidden="true"></i></a>

                                        <a href="{{ route('admin.employeeDisable',$employee->id) }}" class="btn btn-sm btn-warning" onclick="return confirm('Are You Confirm To Disable')"><i class="fas fa-ban" aria-hidden="true"></i></a>

                                        <form method="POST" action="{{ route('admin.EmployeeDelete',$employee->emp_info->id) }}" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{$employee->id}}">
                                            <button type="submit" class="btn btn-sm btn-danger mt-1" onclick="return confirm('Are You Confirm To Delete')" >
                                                <i class="fa fa-times" aria-hidden="true"></i>
                                            </button>

                                        </form>



                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>



        <!-- DataTales Example -->

    </div>
    <!-- /.container-fluid -->

@endsection
