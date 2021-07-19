@extends('layouts.admin')

@section('page-css')
<link rel="stylesheet" href="{{asset('assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/dropzone/css/basic.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/dropzone/css/dropzone.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-markdown/css/bootstrap-markdown.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/summernote/summernote.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/summernote/summernote-bs3.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/codemirror/lib/codemirror.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/codemirror/theme/monokai.css')}}" />
@endsection

@section('page')
    <section role="main" class="content-body">

        <header class="page-header">
            <h2>Dashboard</h2>
        
            <div class="right-wrapper pull-right">
                <ol class="breadcrumbs">
                    <li>
                        <a href="{{route('admin.dashboard')}}">
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
                <section class="panel">
                    <header class="panel-heading">
                        <div class="panel-actions">
                            <a href="#" class="fa fa-caret-down"></a>
                            <a href="#" class="fa fa-times"></a>
                        </div>
        
                        <h2 class="panel-title">Mail Drafts</h2>
                    </header>
                    <div class="panel-body">
                        <form class="form-horizontal form-bordered" method="POST" action="{{route('admin.draft-update')}}">
                            {{csrf_field()}}
                
                            @foreach($drafts as $messageDraft)
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ucfirst($messageDraft->name)}} Draft</label>
                                    <div class="col-md-6">
                                        <textarea  name="{{$messageDraft->name}}" class="form-control {{ $errors->has($messageDraft->name) ? ' is-invalid' : '' }}" id="usermessage">{{$messageDraft->draft}}</textarea>
                                        @if($errors->has($messageDraft->name))
                                            <small class="text-danger">{{$errors->first($messageDraft->name)}}</small>
                                        @endif
                                    </div>
                                </div>
                            @endforeach

                            <div class="form-group">
                
                                <div class="float-right">
                                    <span class="input-group-btn">
                                        <button type="submit" class="mb-xs mt-xs mr-xs btn btn-primary">Save Draft</button>
                                    </span>
                                </div>
                            </div>
                            
        
                        </form>
                    </div>
                </section>
            </div>
        </div>

    </section>
@endsection

@section('page-js')
<!-- Specific Page Vendor -->
<script src="{{asset('assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js')}}"></script>
<script src="{{asset('assets/vendor/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-maskedinput/jquery.maskedinput.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap-timepicker/js/bootstrap-timepicker.js')}}"></script>
<script src="{{asset('assets/vendor/fuelux/js/spinner.js')}}"></script>
<script src="{{asset('assets/vendor/dropzone/dropzone.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap-markdown/js/markdown.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap-markdown/js/to-markdown.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap-markdown/js/bootstrap-markdown.js')}}"></script>
<script src="{{asset('assets/vendor/codemirror/lib/codemirror.js')}}"></script>
<script src="{{asset('assets/vendor/codemirror/addon/selection/active-line.js')}}"></script>
<script src="{{asset('assets/vendor/codemirror/addon/edit/matchbrackets.js')}}"></script>
<script src="{{asset('assets/vendor/codemirror/mode/javascript/javascript.js')}}"></script>
<script src="{{asset('assets/vendor/codemirror/mode/xml/xml.js')}}"></script>
<script src="{{asset('assets/vendor/codemirror/mode/htmlmixed/htmlmixed.js')}}"></script>
<script src="{{asset('assets/vendor/codemirror/mode/css/css.js')}}"></script>
<script src="{{asset('assets/vendor/summernote/summernote.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap-maxlength/bootstrap-maxlength.js')}}"></script>
<script src="{{asset('assets/vendor/ios7-switch/ios7-switch.js')}}"></script>
@endsection