@extends('layouts.admin')

@section('page-css')
<!-- Specific Page Vendor CSS -->
<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css')}}" />
@endsection

@section('page')
    <section role="main" class="content-body">

        <header class="page-header">
            <h2>Update User</h2>
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