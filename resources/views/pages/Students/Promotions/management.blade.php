@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
     {{trans('Promotions.Management_Promotions')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
     {{trans('Promotions.Management_Promotions')}}
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

                                   <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#back_all">
                                    {{trans('Promotions.Back_students')}}
                                  </button>

                                <br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th class="alert-success">#</th>
                                            <th class="alert-danger">{{trans('Students.name')}}</th>
                                            <th class="alert-danger">{{trans('Promotions.Old_Grades')}}</th>
                                            <th class="alert-danger">{{trans('Promotions.Old_classrooms')}}</th>
                                            <th class="alert-danger">{{trans('Promotions.Old_section')}}</th>
                                            <th class="alert-danger">{{trans('Promotions.academic_year')}}</th>
                                            <th class="alert-dark">{{trans('Promotions.New_Grades')}}</th>
                                            <th class="alert-dark">{{trans('Promotions.New_classrooms')}}</th>
                                            <th class="alert-dark">{{trans('Promotions.New_section')}}</th>
                                            <th class="alert-dark">{{trans('Promotions.New_academic_year')}}</th>
                                            <th class="alert-success">{{trans('Promotions.Actions')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i=0;
                                            @endphp
                                        @foreach($promotions as $promotion)
                                            @php
                                                $i++;
                                            @endphp
                                            <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $promotion->students->name}}</td>
                                            <td>{{ $promotion->fromgrade->Name }}</td>
                                            <td>{{ $promotion->fromclasses->Name_Class }}</td>
                                            <td>{{ $promotion->fromsections->Section_Name }}</td>
                                            <td>{{ $promotion->academic_year }}</td>
                                            <td>{{ $promotion->tograde->Name }}</td>
                                            <td>{{ $promotion->toclasses->Name_Class }}</td>
                                            <td>{{ $promotion->tosections->Section_Name }}</td>
                                            <td>{{ $promotion->academic_year_new}}</td>
                                   
                                                <td>
                                                    <div class="dropdown">
                                                        <button aria-expanded="false" aria-haspopup="true"
                                                            class="btn ripple btn-danger btn-sm" data-toggle="dropdown"
                                                            id="dropdownMenuButton" type="button">{{ trans('promotions.Actions') }}<i
                                                                class="fa fa-caret-down ml-1"></i></button>
                                                        <div class="dropdown-menu tx-13">

                                                        
                                                              <a class="dropdown-item" data-toggle="modal"
                                                              data-target="#delete_one{{ $promotion->id }}"><i
                                                                  class="text-danger fa fa-trash"></i>
                                                              &nbsp;&nbsp;{{ trans('Promotions.Back_student') }}</a> 
                               
                             
                                                        </div>
                                                    </div>
                                                </td>
                                            @include('pages.Students.Promotions.back_all')
                                            @include('pages.Students.Promotions.delete_one')
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