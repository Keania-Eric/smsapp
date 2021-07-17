@extends('layouts.admin')

@section('page-css')
<!-- Specific Page Vendor CSS -->
<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css')}}" />
@endsection

@section('page')
    <section role="main" class="content-body">

        <header class="page-header">
            <h2>Dashboard</h2>
        
            <div class="right-wrapper pull-right">
                <ol class="breadcrumbs">
                    <li>
                        <a href="index.html">
                            <i class="fa fa-home"></i>
                        </a>
                    </li>
                    <li><span>Dashboard</span></li>
                </ol>
        
                <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
            </div>
        </header>

        <div class="row">
            <div class="col-xs-12">
                @php($url = route('admin.update-user', ['user'=>$user->id]))
                @component('admin.user.components.form-element', ['user'=> $user, 'method'=>'PUT', 'url'=> $url])
                @endcomponent
               
            </div>
        </div>

    </section>
@endsection

@section('page-js')
<!-- Specific Page Vendor -->
<script src="{{asset('assets/vendor/jquery-autosize/jquery.autosize.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js')}}"></script>
@endsection