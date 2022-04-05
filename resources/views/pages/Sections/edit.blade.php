<!--تعديل قسم جديد -->
<div class="modal fade" id="edit{{ $xxx->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">
                    {{ trans('Sections.edit_Section') }}
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route('Sections.update', 'test') }}" method="POST">
                    {{ method_field('patch') }}
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col">
                            <label>{{ trans('Sections.Section_name_ar') }} :</label>
                            <input type="text" name="Section_name_ar" class="form-control"
                                value="{{ $xxx->getTranslation('Section_Name', 'ar') }}">
                        </div>

                        <div class="col">
                            <label>{{ trans('Sections.Section_name_en') }} :</label>
                            <input type="text" name="Section_name_en" class="form-control"
                                value="{{ $xxx->getTranslation('Section_Name', 'en') }}">


                            <input id="id" type="hidden" name="id" class="form-control"
                                value="{{ $xxx->id }}">
                        </div>

                    </div>
                    <br>


                    <div class="col">
                        <label for="inputName" class="control-label">{{ trans('Sections.Name_Grade') }} :</label>
                        <select name="Grade_id" class="custom-select" onclick="console.log($(this).val())">
                            <!--placeholder-->
                            <option value="{{ $grade->id }}"> {{ $grade->Name }}</option>
                            @foreach ($list_Grades as $list_Grade)
                                <option value="{{ $list_Grade->id }}"> {{ $list_Grade->Name }}</option>
                                  
                            @endforeach
                        </select>
                    </div>
                    <br>

                    <div class="col">
                        <label for="inputName" class="control-label">{{ trans('Sections.Name_Class') }} :</label>
                        <select name="Class_id" class="custom-select">
                            <option value="{{ $xxx->Classes->id }}">
                                {{ $xxx->Classes->Name_Class }}
                            </option>
                        </select>
                    </div>
                    <br>

                    <div class="col">
                        <div class="form-check">

                            @if ($xxx->Status === 1)
                                <input type="checkbox" checked class="form-check-input" name="Status" id="exampleCheck1">
                                   
                            @else

                                <input type="checkbox" class="form-check-input" name="Status" id="exampleCheck1">

                            @endif

                            <label class="form-check-label"
                                for="exampleCheck1">{{ trans('Sections.Status') }}</label>
                        </div>
                    </div>

                    <div class="col">
                        <label for="inputName" class="control-label">{{ trans('Sections.Name_Teacher') }} :</label>
                        <select multiple class="form-control" name="Teacher_id[]" id="exampleFormControlSelect2">
                            <!--ده عشان كنا عاملينه لاقسام xxx اول تكرار ده عشان يجيب كل قسم يجيبلى المدرس الخاص به -->
                            @foreach ($xxx->teachers as $teacher)
                            <option selected value="{{ $teacher['id ']}}">{{ $teacher['Name'] }}</option>
                            @endforeach
                            <!-- التكرار التانى ده بقي معناه هيجيب كل المدرسين عشان بعرف يعدل ويختار مدرس تانى -->
                            @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->Name }}</option>
                            @endforeach
                            
                          </select>
                    </div>
                    <br>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('Sections.Close') }}</button>
                   
                <button type="submit" class="btn btn-danger">{{ trans('Sections.Save') }}</button>
            </div>
            </form>
        </div>
    </div>
</div>
