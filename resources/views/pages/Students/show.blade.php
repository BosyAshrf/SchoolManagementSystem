@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('Students.Student_details') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('Students.Student_details') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
<div class="col-md-12 mb-30">
    <div class="card card-statistics h-100">
        <div class="card-body">
            <div class="card-body">
                <div class="tab nav-border">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="home-02-tab" data-toggle="tab" href="#home-02"
                                role="tab" aria-controls="home-02"
                                aria-selected="true">{{ trans('Students.Student_details') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-02-tab" data-toggle="tab" href="#profile-02" role="tab"
                                aria-controls="profile-02"
                                aria-selected="false">{{ trans('Students.Attachments') }}</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="home-02" role="tabpanel"
                            aria-labelledby="home-02-tab">
                            <table class="table table-striped table-hover" style="text-align:center">
                                <tbody>
                                    <tr>
                                        <th scope="row">{{ trans('Students.name') }}</th>
                                        <td>{{ $Student->name }}</td>
                                        <th scope="row">{{ trans('Students.email') }}</th>
                                        <td>{{ $Student->email }}</td>
                                        <th scope="row">{{ trans('Students.gender') }}</th>
                                        <td>{{ $Student->genders->Name }}</td>
                                        <th scope="row">{{ trans('Students.Nationality') }}</th>
                                        <td>{{ $Student->Nationality->Name }}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">{{ trans('Students.Grade') }}</th>
                                        <td>{{ $Student->grades->Name }}</td>
                                        <th scope="row">{{ trans('Students.classrooms') }}</th>
                                        <td>{{ $Student->classes->Name_Class }}</td>
                                        <th scope="row">{{ trans('Students.section') }}</th>
                                        <td>{{ $Student->sections->Name_Section }}</td>
                                        <th scope="row">{{ trans('Students.Date_of_Birth') }}</th>
                                        <td>{{ $Student->Date_Birth }}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">{{ trans('Students.parent') }}</th>
                                        <td>{{ $Student->parents->Name_Father }}</td>
                                        <th scope="row">{{ trans('Students.academic_year') }}</th>
                                        <td>{{ $Student->academic_year }}</td>
                                        <th scope="row"></th>
                                        <td></td>
                                        <th scope="row"></th>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- tab 2 الخاصة بالمرفقات -->
                        <div class="tab-pane fade" id="profile-02" role="tabpanel" aria-labelledby="profile-02-tab">
                            <div class="card card-statistics">
                                <div class="card-body">
                                    <form method="post" action="{{route('Upload_attachment')}}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="academic_year">{{ trans('Students.Attachments') }} :<span class="text-danger">*</span></label>
                                                   
                                                <input type="file" accept="image/*" name="photos[]" multiple required>
                                                    <!-- public عندى ع السيرفر خد اسم الطالب مخفى عشان يتحفظ ف -->
                                                <input type="hidden" name="student_name" value="{{ $Student->name }}">
                                                    <!-- خد id الطالب عشان يتحفظ فى الداتا بيز -->
                                                <input type="hidden" name="student_id" value="{{ $Student->id }}">       
                                            </div>
                                        </div>
                                        <br><br>
                                        <button type="submit" class="button button-border x-small"> {{ trans('Students.submit') }}</button>
                                    </form>
                                </div>
                                <br>

                                <table class="table center-aligned-table mb-0 table table-hover"
                                    style="text-align:center">
                                    <thead>
                                        <tr class="table-secondary">
                                            <th scope="col">#</th>
                                            <th scope="col">{{ trans('Students.filename') }}</th>
                                            <th scope="col">{{ trans('Students.created_at') }}</th>
                                            <th scope="col">{{ trans('Students.Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i=0;
                                        @endphp
                                        @foreach ($Student->images as $attachment)
                                        @php
                                         $i++;
                                        @endphp
                                            <tr style='text-align:center;vertical-align:middle'>
                                                <td>{{ $i }}</td>
                                                <td>{{ $attachment->Filename }}</td>
                                                <td>{{ $attachment->created_at->diffForHumans() }}</td>
                                                <td colspan="2">
                                                    <a class="btn btn-outline-info btn-sm"
                                                        href="{{Url ('Download_attachment') }}/{{ $attachment->imageable->name }}/{{ $attachment->Filename }}"
                                                        role="button">&nbsp;
                                                        {{ trans('Students.Download') }}</a>

                                                    <button type="button" class="btn btn-outline-danger btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#Deleteimage{{ $attachment->id }}"
                                                        title="{{ trans('Grades.Delete') }}">{{ trans('Students.Delete') }}
                                                    </button>
                                                </td>
                                                @include('pages.Students.delete_img')
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

    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
