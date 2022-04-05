@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{ trans('Sections.Sections') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h3 class="mb-0">{{ trans('Sections.Sections') }}</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main-translate.Home') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('Sections.Sections') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')

@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="justify-content-between ">
                    <a class="button x-small" href="#" data-toggle="modal" data-target="#exampleModal">
                        {{ trans('Sections.add_Sections') }}</a>
                    <br><br>
                    @include('pages.Sections.create')
                </div>

                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="accordion gray plus-icon round">

                                @foreach ($grades as $grade)
                                
                                <div class="acd-group">
                                    <a href="#" class="acd-heading">{{ $grade->Name }}</a>
                                    <div class="acd-des">

                                        <div class="table table-striped table-hover table-responsive">
                                            <table id="datatable1" class="table table-hover table-sm table-bordered p-0"  style="text-align: center">
                                                <thead>
                                                    <tr class="text-dark">
                                                        <th>#</th>
                                                        <th>{{ trans('Sections.Name_Section') }}</th>
                                                        <th>{{ trans('Sections.Name_Class') }}</th>
                                                        <th>{{ trans('Sections.Status') }}</th>
                                                        <th>{{ trans('Sections.Actions') }}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 0; ?>
                                                      @foreach ($grade->Sections as $xxx)
                                                          
                                                            <tr>
                                                                <?php $i++; ?>

                                                                <td>{{ $i }}</td>
                                                                <td>{{ $xxx->Section_Name }}</td>
                                                                <td>{{ $xxx->Classes->Name_Class }}</td>
                                                                <td>
                                                                    @if ($xxx->Status === 1)
                                                                    <label
                                                                        class="badge badge-success">{{ trans('Sections.Status_Section_AC') }}</label>
                                                                @else
                                                                    <label
                                                                        class="badge badge-danger">{{ trans('Sections.Status_Section_No') }}</label>
                                                                @endif
                                                                </td>
                                                                <td>
                                                                    <a href="#" class="btn btn-success btn-sm"data-toggle="modal"
                                                                         data-target="#edit{{ $xxx->id }}">{{ trans('Sections.Edit') }}</a>
                                                                    
                                                                    <a href="#" class="btn btn-danger btn-sm"data-toggle="modal"
                                                                        data-target="#delete{{ $xxx->id }}">{{ trans('Sections.Delete') }}</a> 
                                                                  
                                                                </td>  
                                                                @include('pages.Sections.edit') 
                                                                @include('pages.Sections.delete') 
                                                            </tr> 
                                                        @endforeach
                                                        </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
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

<script>
    $(document).ready(function () {
        $('select[name="Grade_id"]').on('change', function () {
            var Grade_id = $(this).val();
            if (Grade_id) {
                $.ajax({
                    url: "{{ URL::to('Classes') }}/" + Grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="Class_id"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="Class_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>





@endsection