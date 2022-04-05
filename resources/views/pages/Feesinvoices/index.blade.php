@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{ trans('FeesInvoices.FeesInvoices') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
{{ trans('FeesInvoices.FeesInvoices') }}
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
                                <div>
                                    <h4 class="text-danger">{{ trans('FeesInvoices.FeesInvoices') }}</h4>
                                </div>
                                <br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{ trans('Students.name') }}</th>
                                            <th>{{ trans('Fees.Fee_type') }}</th>
                                            <th>{{ trans('Fees.amount_fees') }}</th>
                                            <th>{{trans('Students.Grade')}}</th>
                                            <th>{{trans('Students.classrooms')}}</th>
                                            <th>{{ trans('Fees.notes') }}</th>
                                            <th>{{ trans('Grades.Actions') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($fee_invoices as $fee_invoice)
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$fee_invoice->student->name}}</td>
                                            <td>{{$fee_invoice->fees->title}}</td>
                                            <td>{{ number_format($fee_invoice->amount, 2) }}</td>
                                            <td>{{$fee_invoice->grade->Name}}</td>
                                            <td>{{$fee_invoice->classroom->Name_Class}}</td>
                                           
                                            <td>{{$fee_invoice->notes}}</td>
                                                <td>
                                                    <a href="{{ route('Fees_Invoices.edit',$fee_invoice->id) }}" class="btn btn-info btn-sm" 
                                                        role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $fee_invoice->id }}" ><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            @include('pages.Feesinvoices.delete')
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