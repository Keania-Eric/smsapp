@extends('layouts.admin')

@section('page-css')
<!-- Specific Page Vendor CSS -->
<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css')}}" />
@endsection

@section('page')
    <section role="main" class="content-body">

        <header class="page-header">
            <h2>Dashboard</h2>
        </header>

        <div class="row">

            <div class="col-md-6">
                <section class="panel">
                    <div class="panel-body">
                        <div class="small-chart pull-right" id="sparklineBarDash"></div>
                        <div class="h4 text-bold mb-none">{{\App\Models\User::count()}}</div>
                        <p class="text-xs text-muted mb-none">Users</p>
                    </div>
                </section>
            </div>

            <div class="col-md-6">
                <section class="panel">
                    <div class="panel-body">
                        <div class="small-chart pull-right" id="sparklineBarDash"></div>
                        <div class="h4 text-bold mb-none">{{\App\Models\SentMail::count()}}</div>
                        <p class="text-xs text-muted mb-none">Mails Sent</p>
                    </div>
                </section>
            </div>

            <div class="col-md-6">
                <section class="panel">
                    <div class="panel-body">
                        <div class="small-chart pull-right" id="sparklineBarDash"></div>
                        <div class="h4 text-bold mb-none">{{\App\Models\User::birthdaysToday()->count()}}</div>
                        <p class="text-xs text-muted mb-none">Birthdays Today</p>
                    </div>
                </section>
            </div>

            <div class="col-md-6">
                <section class="panel">
                    <div class="panel-body">
                        <div class="small-chart pull-right" id="sparklineBarDash"></div>
                        <div class="h4 text-bold mb-none">{{\App\Models\User::anniversariesToday()->count()}}</div>
                        <p class="text-xs text-muted mb-none">Anniversary Today</p>
                    </div>
                </section>
            </div>

        </div>

        <div class="row">

            <div class="col-6">
                @php($url = route('admin.store-user'))
                @component('admin.user.components.form-element', ['url'=>$url])
                @endcomponent
            </div>

            <div class="col-6">
                @component('admin.user.components.form-bulk')
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