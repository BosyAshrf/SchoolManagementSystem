  
@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('Students.list_Graduate')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('Students.list_Graduate')}} <i class="fas fa-user-graduate"></i>
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <h3 style="font-family: 'Cairo', sans-serif;color: rgb(17, 0, 255)"> {{trans('Students.list_Graduate')}} <span class="text-danger">**</span></h3>
                                <br>

                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"data-page-length="50"
                                           style="text-align: center">
                                           
                                        <thead>
                                        <tr class="alert-danger">
                                            <th>#</th>
                                            <th>{{trans('Students.name')}}</th>
                                            <th>{{trans('Students.email')}}</th>
                                            <th>{{trans('Students.gender')}}</th>
                                            <th>{{trans('Students.Grade')}}</th>
                                            <th>{{trans('Students.classrooms')}}</th>
                                            <th>{{trans('Students.section')}}</th>
                                            <th>{{trans('Students.Actions')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($students as $student)
                                            <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{ $student->name}}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->genders->Name }}</td>
                                            <td>{{ $student->grades->Name }}</td>
                                            <td>{{ $student->classes->Name_Class }}</td>
                                            <td>{{ $student->sections->Section_Name }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#Return_Student{{ $student->id }}" title="{{ trans('Grades_trans.Delete') }}">{{trans('Students.return_back')}}</button>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_Student{{ $student->id }}" title="{{ trans('Grades_trans.Delete') }}">{{trans('Students.delete')}}</button>

                                                </td>
                                                @include('pages.Students.Gratuated.return_back')
                                                @include('pages.Students.Gratuated.delete')
                                            </tr>
                                       
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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