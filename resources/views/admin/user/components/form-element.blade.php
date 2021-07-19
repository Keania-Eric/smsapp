<section class="panel">
    <header class="panel-heading">
        @if(isset($user))
            <h2 class="panel-title">Edit {{$user->name}}</h2>
        @else
        <h2 class="panel-title">Add User</h2>
        @endif
    </header>
    <div class="panel-body">
        <form class="form-horizontal form-bordered" action="{{$url}}" method="POST">
            {{csrf_field()}}
            <div class="form-group">
                <label class="col-md-3 control-label" for="userName">Name of User</label>
                <div class="col-md-6">
                    <input type="text"  name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{isset($user) ? $user->name : old('name')}}" id="userName">
                    @if($errors->has('name'))
                        <small class="text-danger">{{$errors->first('name')}}</small>
                    @endif
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-md-3 control-label" for="userEmail">User Email</label>
                <div class="col-md-6">
                    <input type="text"  name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{isset($user) ? $user->email : old('email')}}" id="userEmail">
                    @if($errors->has('email'))
                        <small class="text-danger">{{$errors->first('email')}}</small>
                    @endif
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-md-3 control-label" for="userPhone">User Phone</label>
                <div class="col-md-6">
                    <input type="text"  name="phone" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}"  value="{{isset($user) ? $user->phone : old('phone')}}" id="userPhone">
                    @if($errors->has('phone'))
                        <small class="text-danger">{{$errors->first('phone')}}</small>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="dateOfBirth">Date Of Birth</label>
                <div class="col-md-6">
                    <input type="date"  name="dob" class="form-control {{ $errors->has('dob') ? ' is-invalid' : '' }}" value="{{isset($user) ? $user->dob : old('dob')}}"  id="dateOfBirth">
                    @if($errors->has('dob'))
                        <small class="text-danger">{{$errors->first('dob')}}</small>
                    @endif
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-md-3 control-label" for="anniversary">Wedding Aniversary</label>
                <div class="col-md-6">
                    <input type="date" name="anniversary" class="form-control {{ $errors->has('anniversary') ? ' is-invalid' : '' }}" value="{{isset($user) ? $user->anniversary : old('anniversary')}}"  id="anniversary">
                    @if($errors->has('anniversary'))
                        <small class="text-danger">{{$errors->first('anniversary')}}</small>
                    @endif
                </div>
            </div>
            
            <div class="form-group">
                
                <div class="text-center">
                    <span class="input-group-btn">
                        <button type="submit" class="mb-xs mt-xs mr-xs btn btn-primary">Primary</button>
                    </span>
                </div>
            </div>	

        </form>
    </div>
</section>