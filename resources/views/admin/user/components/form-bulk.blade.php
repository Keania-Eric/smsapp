<section class="panel">
    <header class="panel-heading">
        <h2 class="panel-title">Bulk User Upload(Excel)</h2>
    </header>
    <div class="panel-body">
        <form class="form-horizontal form-bordered" action="{{route('admin.upload-bulk-users')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label class="col-md-3 control-label">File Upload</label>
                <div class="col-md-6">
                    <div class="fileupload fileupload-new {{ $errors->has('dob') ? ' is-invalid' : '' }}" data-provides="fileupload">
                        <div class="input-append">
                            <div class="uneditable-input">
                                <i class="fa fa-file fileupload-exists"></i>
                                <span class="fileupload-preview"></span>
                            </div>
                            <span class="btn btn-default btn-file">
                                <span class="fileupload-exists">Change</span>
                                <span class="fileupload-new">Select file</span>
                                <input type="file" name="users" />
                            </span>
                            <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                        </div>
                        @if($errors->has('users'))
                            <small class="text-danger">{{$errors->first('users')}}</small>
                        @endif
                    </div>
                </div>
            </div>
            
            
            <div class="form-group">
                
                <div class="text-center">
                    <span class="input-group-btn">
                        <button type="submit" class="mb-xs mt-xs mr-xs btn btn-success">Upload</button>
                    </span>
                </div>
            </div>	

        </form>
    </div>
</section>