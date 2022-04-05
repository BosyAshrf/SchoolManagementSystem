@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{ trans('main-translate.Grades') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h3 class="mb-0">{{ trans('main-translate.Grades') }}</h3>
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
    <div class="col-xl-12 mb-30">     
      <div class="card card-statistics h-100"> 
        <div class="card-body">
     
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                {{ trans('Grades.add_Grade') }}
            </button>
            <br><br>
          
         
          <div class="table-responsive">
          <table id="datatable" class="table table-striped table-bordered p-0 text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ trans('Grades.Name') }}</th>
                    <th>{{ trans('Grades.Notes') }}</th>
                    <th>{{ trans('Grades.Actions') }}</th>
                   
                </tr>
            </thead>
            <tbody>
                @php
                    $i=0;
                @endphp
                @foreach ($grades as $grade)
                 @php
                     $i++;
                 @endphp   
               
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $grade->Name }}</td>
                    <td>{{ $grade->Notes == true ? $grade->Notes : 'لا توجد ملاحظات' }}</td>
                    <td>
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                data-target="#edit{{ $grade->id }}"
                                title="{{ trans('Grades.Edit') }}"><i
                                class="fa fa-edit"></i></button>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                data-target="#delete{{ $grade->id }}"
                                title="{{ trans('Grades.Delete') }}"><i
                                class="fa fa-trash"></i></button>
                    </td>
                    @include('pages.Grades.edit')
                    @include('pages.Grades.delete')
                </tr>
                 @endforeach
                 @include('pages.Grades.create')
            </tbody>
         </table>
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
