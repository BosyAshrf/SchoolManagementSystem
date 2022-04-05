@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('Teachers.Teachers') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h3 class="mb-0">{{ trans('Teachers.Teachers') }}</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">Page Title</li>
            </ol>
        </div>
    </div>
</div>
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

                            <a href="{{ route('Teachers.create') }}" class="btn btn-success btn-sm">{{ trans('Teachers.Add_Teacher') }}</a>
                            <br><br>

                            <div class="table-responsive">
                                <table id="datatable"
                                    class="table table-striped table-bordered table-hover table-sm  p-0 text-center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('Teachers.Name_Teacher') }}</th>
                                            <th>{{ trans('Teachers.Gender') }}</th>
                                            <th>{{ trans('Teachers.Joining_Date') }}</th>
                                            <th>{{ trans('Teachers.specialization') }}</th>
                                            <th>{{ trans('Teachers.Actions') }}</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @php
                                            $i = 0;
                                        @endphp
                                        @foreach ($Teachers as $Teacher)
                                            @php
                                                $i++;
                                            @endphp

                                            <td>{{ $i }}</td>
                                            <td>{{ $Teacher->Name }}</td>
                                            <td>{{ $Teacher->Genders->Name }}</td>
                                            <td>{{ $Teacher->Joining_Data }}</td>
                                            <td>{{ $Teacher->Specializations->Name }}</td>
                                            <td>
                                                <a href="{{ route('Teachers.edit',$Teacher->id) }}" class="btn btn-success btn-sm" role="button"
                                                    aria-pressed="true">{{ trans('Teachers.Edit') }}</a>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#delete{{ $Teacher->id }}"
                                                    title="{{ trans('Grades_trans.Delete') }}">{{ trans('Teachers.Delete') }}</button>
                                            </td>
                                            @include('pages.Teachers.delete')
                                            </tr>
                                        @endforeach
                                    </tbody>
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