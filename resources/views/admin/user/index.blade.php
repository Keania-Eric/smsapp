@extends('layouts.admin')
@section('page-css')
<!-- Specific Page Vendor CSS -->
<link rel="stylesheet" href="{{asset('assets/vendor/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/jquery-datatables-bs3/assets/css/datatables.css')}}" />
@endsection

@section('page')
    <section role="main" class="content-body">

        <header class="page-header">
            <h2>Dashboard</h2>
        
            <div class="right-wrapper pull-right">
                <ol class="breadcrumbs">
                    <li>
                        <a href="#">
                            <i class="fa fa-users"></i>
                        </a>
                    </li>
                    <li><span>Users</span></li>
                </ol>
        
                <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
            </div>
        </header>

        <div class="row">

            <section class="panel">
                <header class="panel-heading">
            
                    <h2 class="panel-title">All Users</h2>
                </header>

                <div class="panel-body">
                    <table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="{{asset('assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf')}}">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>DOB</th>
                                <th>Anniversary</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->dob}}</td>
                                    <td>{{$user->anniversary}}</td>
                                    <td>
                                        <a class="btn btn-default" href="{{route('admin.edit-form', ['user'=>$user->id])}}"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-danger" href="{{route('admin.destroy-user', ['user'=>$user->id])}}" onclick="event.preventDefault();document.getElementById('delete-user-{{$user->id}}').submit();"><i class="fa fa-trash-o"></i></a>
                                        <form id="delete-user-{{$user->id}}" method="POST" action="{{route('admin.destroy-user', ['user'=>$user->id])}}"> {{csrf_field()}}</form>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>
        </div>

    </section>
@endsection

@section('page-js')
<!-- Specific Page Vendor -->
<script src="{{asset('assets/vendor/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-datatables/media/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-datatables-bs3/assets/js/datatables.js')}}"></script>
@endsection