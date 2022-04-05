@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{trans('Classrooms.title_page')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h3 class="mb-0">{{trans('Classrooms.title_page')}}</h3>
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
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="justify-content-between ">
                
        <button class="modal-effect btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal">
            {{ trans('Classrooms.add_class') }}
        </button>
        @include('pages.Classrooms.create')
            </div>

            <button class="modal-effect btn btn-sm btn-info" id="btn_delete_all">
                {{ trans('Classrooms.Delete_all') }}
            </button>
            @include('pages.Classrooms.Delete_all')
        <br><br>

        <div class="row">
            <div class="col-3">
                <form action="{{ route('Filter_Classes') }}" method="POST">
                    {{ csrf_field() }}
                    <select class="form-control p-1" name="Grade_id" required
                            onchange="this.form.submit()">
                        <option value="" selected disabled>{{ trans('Classrooms.Search_By_Grade') }}</option>
                        @foreach ($grades as $grade)
                            <option value="{{ $grade->id }}">{{ $grade->Name }}</option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>
        

        <br>


                <div class="table table-striped table-hover table-responsive">
                    <table id="datatable" class="table table-hover table-sm table-bordered p-0" data-page-length="50"
                        style="text-align: center">
                        <thead>
                            <tr>
                                <th><input name="select_all" id="select-all" type="checkbox" onclick="CheckAll('box1', this)" /></th>
                                <th>#</th>
                                <th>{{ trans('Classrooms.Name_class') }}</th>
                                <th>{{ trans('Classrooms.Name_Grade') }}</th>
                                <th>{{ trans('Classrooms.Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
        
                            @if (isset($details))

                            <?php $List_Classes = $details; ?>
                             @else
    
                            <?php $List_Classes = $classes; ?>
                            @endif

                            @php
                            $i=0;
                        @endphp
                        @foreach ($List_Classes as $class)
                            @php
                            $i++;
                            @endphp
                       
                            <tr>
        
                                <td><input type="checkbox"  value="{{ $class->id }}" class="box1" ></td>
                                <td>{{ $i }}</td>
                                <td>{{ $class->Name_Class }}</td>
                                <td>{{ $class->Grades->Name }}</td>
                                <td>  
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" 
                                data-target="#edit{{$class->id}}">{{ trans('Grades.Edit') }}</button>
                                    
                                   
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#delete{{$class->id}}">{{ trans('Grades.Delete') }}</button>
                                  
                            </td>
                            @include('pages.Classrooms.edit')
                            @include('pages.Classrooms.delete')
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
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_r

<!-- الكود ده عشان اما يضغط ع زرار الصفوف المختاره ومحدد ف الشيك بوكس يظهر الموديل للمستخدم -->
<script type="text/javascript">
    $(function() {
        $("#btn_delete_all").click(function() {
            var selected = new Array();
            $("#datatable input[type=checkbox]:checked").each(function() {
                selected.push(this.value);
            });
            if (selected.length > 0) {
                $('#delete_all').modal('show')
                $('input[id="delete_all_id"]').val(selected);
            }
        });
    });
</script>

@endsection




