  
@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('Students.add_Graduate')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('Students.add_Graduate')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">

    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <h5 style="font-family: 'Cairo', sans-serif;color: blue">  {{trans('Students.add_Graduate')}} <span class="text-danger">**</span></h5>
                <br>

                @if (Session::has('error_Graduated'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{Session::get('error_Graduated')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                    <form action="{{route('Gratuated.store')}}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputState">{{trans('Students.Grade')}}</label>
                            <select class="custom-select mr-sm-2" name="Grade_id" required>
                                <option selected disabled>{{trans('Parents.Choose')}}...</option>
                                @foreach($Grades as $Grade)
                                    <option value="{{$Grade->id}}">{{$Grade->Name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="Classroom_id">{{trans('Students.classrooms')}} : <span
                                    class="text-danger">*</span></label>
                            <select class="custom-select mr-sm-2" name="Classroom_id" required>

                            </select>
                        </div>

                        <div class="form-group col">
                            <label for="section_id">{{trans('Students.section')}} : </label>
                            <select class="custom-select mr-sm-2" name="section_id" required>

                            </select>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">{{trans('Promotions.Save')}}</button>
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