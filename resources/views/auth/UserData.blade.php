@extends('layouts.app')
<link rel="stylesheet" href="/css/register.css">
@section('content')
<div class="row">
    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                <h3>Welcome</h3>
                <p>Fill out this form once and you will be readyto go.</p>
                <input type="submit" name="" value="Login"/><br/>
            </div>
            <div class="col-md-9 register-right">

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <form action="{{ route('fill.data') }}" method="POST">
                            {{csrf_field()}}
                        <h3 class="register-heading">Please Fill this Form</h3>
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                        <select class="form-control  {{ $errors->has('blood') ? ' is-invalid' : '' }}" name="blood">
                                            <option class="hidden"  selected disabled>Please select your Blood Type</option>
                                            @forelse($bloodgroups as $bloodgroup)
                                            <option value="{{$bloodgroup->id}}">{{$bloodgroup->name}}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                        @if ($errors->has('blood'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('blood') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                   <div class="form-group">
                                        <input type="text" class="form-control  {{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" placeholder="Country *" value="{{ old('country') }}" />
                                        @if ($errors->has('country'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('country') }}</strong>
                                        </span>
                                        @endif
                                </div>
                                <div class="form-group">
                                        <input type="text" class="form-control  {{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" placeholder="age *" value="{{ old('age') }}" />
                                        @if ($errors->has('age'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('age') }}</strong>
                                        </span>
                                        @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                        <input type="text" class="form-control  {{ $errors->has('zone') ? ' is-invalid' : '' }}" name="zone" placeholder="Zone *" value="{{ old('zone') }}" />
                                        @if ($errors->has('zone'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('zone') }}</strong>
                                        </span>
                                        @endif
                                </div>
                                <div class="form-group">
                                        <input type="text" class="form-control  {{ $errors->has('district') ? ' is-invalid' : '' }}" name="district" placeholder="District *" value="{{ old('district') }}" />
                                        @if ($errors->has('district'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('district') }}</strong>
                                        </span>
                                        @endif
                                </div>
                                <div class="form-group">
                                        <input type="text" name="area" class="form-control {{ $errors->has('area') ? ' is-invalid' : '' }}" placeholder="Street Name *" value="{{ old('area') }}" />
                                        @if ($errors->has('area'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('area') }}</strong>
                                        </span>
                                        @endif
                                </div>
                                <input type="submit" class="btnRegister"  value="Register"/>
                            </div>
                        </div>
                    </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
