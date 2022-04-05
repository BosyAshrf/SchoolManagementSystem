@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('Students.parents')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{trans('Students.parents_information')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
              
                <h4 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('Students.parents_information')}}</h4><br>
                <h6 style="font-family: 'Cairo'">{{trans('Students.father_information')}} :</h6><br>
             
                <div class="row">
                    <div class="col-md-3">
                        <label>{{trans('Parents.Name_Father')}} :</label>
                        <input class="form-control" type="text" name="Name_Father" value="{{ $student->parents->Name_Father }}" readonly>
                    </div>

                    <div class="col-md-3">
                        <label>{{ trans('Students.Job_Father') }} :</label>     
                        <input class="form-control" type="text" name="Job_Father" value="{{ $student->parents->Job_Father }}" readonly>
                    </div>

                    <div class="col-md-3">
                        <label>{{ trans('Parents.Phone_Father') }} :</label>     
                        <input class="form-control" type="text" name="Phone_Father" value="{{ $student->parents->Phone_Father }}" readonly>
                    </div>
                    <div class="col-md-3">
                        <label>{{ trans('Parents.National_ID_Father') }} :</label>     
                        <input class="form-control" type="text" name="National_ID_Father" value="{{ $student->parents->National_ID_Father }}" readonly>
                    </div>
                    
                </div>
                <br>

                <h6 style="font-family: 'Cairo'">{{trans('Students.mother_information')}} :</h6><br>
                <div class="row">

                    <div class="col-md-3">
                        <label>{{trans('Parents.Name_Mother')}} :</label>
                        <input class="form-control" type="text" name="Name_Mother" value="{{ $student->parents->Name_Mother }}" readonly>
                    </div>

                    <div class="col-md-3">
                        <label>{{ trans('Students.Job_Mother') }} :</label>     
                        <input class="form-control" type="text" name="Job_Mother" value="{{ $student->parents->Job_Mother }}" readonly>
                    </div>

                    <div class="col-md-3">
                        <label>{{ trans('Parents.Phone_Mother') }} :</label>     
                        <input class="form-control" type="text" name="Phone_Mother" value="{{ $student->parents->Phone_Mother }}" readonly>
                    </div>
                    <div class="col-md-3">
                        <label>{{ trans('Parents.National_ID_Mother') }} :</label>     
                        <input class="form-control" type="text" name="National_ID_Mother" value="{{ $student->parents->National_ID_Mother }}" readonly>
                    </div>
           
                </div>
                <br>

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
