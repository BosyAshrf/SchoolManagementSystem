@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('Teachers.Add_Teacher') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('Teachers.Add_Teacher') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')


@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<!-- row -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
        <h4>{{ trans('Teachers.Add_Teacher') }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('Teachers.store') }}" method="POST">
                   @csrf
                    <div class="row">
                        <div class="col">
                            <label>{{ trans('Teachers.Email') }}</label>
                            <input type="email" required name="Email" class="form-control">
                            @error('Email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
        
                        <div class="col">
                            <label>{{ trans('Teachers.Password') }}</label>
                            <input type="password" required name="Password" class="form-control">
                            @error('Password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <br>
        
        
                     <div class="form-row">
                        <div class="col">
                            <label>{{ trans('Teachers.Name_ar') }}</label>
                            <input type="text" name="Name_ar" class="form-control">
                            @error('Name_ar')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label>{{ trans('Teachers.Name_en') }}</label>
                            <input type="text" name="Name_en" class="form-control">
                            @error('Name_en')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <br>
        
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputCity">{{ trans('Teachers.specialization') }}</label>
                            <select class="custom-select my-1 mr-sm-2" name="Specialization_id">
                                <option selected disabled>{{ trans('Parents.Choose') }}...</option>
                                @foreach ($specializations as $specialization)
                                    <option value="{{ $specialization->id }}">{{ $specialization->Name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('Specialization_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
        
                        <div class="form-group col">
                            <label for="inputState">{{ trans('Teachers.Gender') }}</label>
                            <select class="custom-select my-1 mr-sm-2" name="Gender_id">
                                <option selected disabled>{{ trans('Parents.Choose') }}...</option>
                                @foreach ($genders as $gender)
                                    <option value="{{ $gender->id }}">{{ $gender->Name }}</option>
                                @endforeach
                            </select>
                            @error('Gender_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <br>
        
                    <div class="form-row">
                        <div class="col">
                            <label>{{ trans('Teachers.Joining_Date') }}</label>
                            <div class='input-group date'>
                                <input class="form-control" type="text" id="datepicker-action" name="Joining_Data"
                                    data-date-format="yyyy-mm-dd" required>
                            </div>
                            @error('Joining_Data')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <br>
        
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">{{ trans('Teachers.Address') }}</label>
                        <textarea class="form-control" name="Address" id="exampleFormControlTextarea1" rows="4"></textarea>
                        @error('Address')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div> 


                    <div class="row">
                        <div class="col-3">
                            <button class="btn btn-success">{{ trans('Teachers.Save') }}</button>
                        </div>
                    </div>


        
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
