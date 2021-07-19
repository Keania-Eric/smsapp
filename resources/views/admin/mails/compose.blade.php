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
            <h2>Send Mail/SMS</h2>
        </header>

        <div class="row">
            <div class="col-xs-12">
                <section class="panel">
                    <header class="panel-heading">
        
                        <h2 class="panel-title">Send Mail/SMS</h2>
                    </header>
                    <div class="panel-body">
                        <form class="form-horizontal form-bordered" method="POST" action="{{route('admin.send-mail')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="col-md-3 control-label">Subject</label>
                                <div class="col-md-6">
                                    <input type="text"  name="subject" class="form-control {{ $errors->has('subject') ? ' is-invalid' : '' }}" value="{{isset($user) ? $user->subject : old('subject')}}" id="usersubject">
                                    @if($errors->has('subject'))
                                        <small class="text-danger">{{$errors->first('subject')}}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Users</label>
                                <div class="col-md-6">
                                    <select multiple data-plugin-selectTwo class="form-control populate" name="users[]">
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Mail Message</label>
                                <div class="col-md-6">
                                    <textarea  name="message" class="form-control {{ $errors->has('message') ? ' is-invalid' : '' }}" id="usermessage">{{old('message')}}</textarea>
                                    @if($errors->has('message'))
                                        <small class="text-danger">{{$errors->first('message')}}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                
                                <div class="text-center">
                                    <span class="input-group-btn">
                                        <button type="submit" class="mb-xs mt-xs mr-xs btn btn-success">Send Mail</button>
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