@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('Students.List_students')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('Students.List_students')}}
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

                                

                                <a href="{{route('Students.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{trans('Students.add_students')}}</a>
                                <br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('Students.name')}}</th>
                                            <th>{{trans('Students.email')}}</th>
                                            <th>{{trans('Students.gender')}}</th>
                                            <th>{{trans('Students.Grade')}}</th>
                                            <th>{{trans('Students.classrooms')}}</th>
                                            <th>{{trans('Students.section')}}</th>
                                            <th>{{trans('Students.parents')}}</th>
                                            <th>{{trans('Students.Actions')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i=0;
                                            @endphp
                                        @foreach($students as $student)
                                            @php
                                                $i++;
                                            @endphp
                                            <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $student->name}}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->genders->Name }}</td>
                                            <td>{{ $student->grades->Name }}</td>
                                            <td>{{ $student->classes->Name_Class }}</td>
                                            <td>{{ $student->sections->Section_Name }}</td>
                                            <td>
                                                <a href="ParentsStudent/{{  $student->id }}" class="text-danger">{{ $student->parents->Name_Father }}</a>
                                            </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button aria-expanded="false" aria-haspopup="true"
                                                            class="btn ripple btn-success btn-sm" data-toggle="dropdown"
                                                            id="dropdownMenuButton" type="button">{{ trans('Students.Actions') }}<i
                                                                class="fa fa-caret-down ml-1"></i></button>
                                                        <div class="dropdown-menu tx-13">

                                                            <a class="dropdown-item"
                                                            href="{{ route('Students.show',$student->id) }}"><i class="text-warning fa fa-eye"></i>
                                                            &nbsp;&nbsp;{{ trans('Students.Show_Data') }}</a>

                                                            <a class="dropdown-item"
                                                                href="{{ route('Students.edit',$student->id) }}">
                                                                <i class="text-info fa fa-edit"></i>
                                                                &nbsp;&nbsp;{{ trans('Students.Edit_Data') }}</a>
                                                                
                                                            <a class="dropdown-item" data-toggle="modal"
                                                                data-target="#delete{{ $student->id }}"><i
                                                                    class="text-danger fa fa-trash"></i>
                                                                &nbsp;&nbsp;{{ trans('Students.Delete_Data') }}</a> 
                                                                
                                                            <a class="dropdown-item"
                                                                href="{{ route('Fees_Invoices.show',$student->id) }}">
                                                                <i class="text-success fa fa-edit"></i>
                                                                &nbsp;&nbsp;{{ trans('Students.add_Fees_Invoices') }}</a>
                                                                
                                                            <a class="dropdown-item"
                                                                href="{{ route('ReceiptStudents.show',$student->id) }}">
                                                                <i style="color: #9dc8e2" class="fa fa-money-bill-alt"></i>
                                                                &nbsp;&nbsp;{{ trans('Students.Catch_Receipt') }}</a>

                                                            <a class="dropdown-item"
                                                                href="{{ route('Payments.show',$student->id) }}">
                                                                <i style="color: #9dc8e2" class="fas fa-donate"></i>
                                                                &nbsp;&nbsp;{{ trans('Fees.Payments') }}</a>

                                                            <a class="dropdown-item"
                                                                href="{{ route('ProcessingFees.show',$student->id) }}">
                                                                <i style="color: #9dc8e2" class="fa fa-money-bill-alt"></i>
                                                                &nbsp;&nbsp;{{ trans('FeesInvoices.FeeExclusion') }}</a>

                                                        </div>
                                                    </div>
                                                </td>
                                                @include('pages.Students.delete')
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