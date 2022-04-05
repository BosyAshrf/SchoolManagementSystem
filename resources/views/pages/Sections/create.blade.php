          <!--اضافة قسم جديد -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h4 class="modal-title" style="font-family: 'Cairo', sans-serif;"
                         id="exampleModalLabel">
                         {{ trans('Sections.add_Sections') }}</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                    <form action="{{ route('Sections.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label>{{ trans('Sections.Section_name_ar') }} :</label>
                                <input class="form-control" type="text" name="Section_name_ar" placeholder="{{ trans('Sections.Section_name_ar') }}">
                            </div>

                            <div class="col">
                                <label>{{ trans('Sections.Section_name_en') }} :</label>     
                                <input class="form-control" type="text" name="Section_name_en" placeholder="{{ trans('Sections.Section_name_en') }}">
                            </div>
                        </div>
                            <br>
                            
                            <div class="col">
                                <label for="inputName" class="control-label">{{ trans('Sections.Name_Grade') }} :</label>
                                <select name="Grade_id" class="custom-select"onchange="console.log($(this).val())">   
                                    <!--placeholder-->
                                    <option value="" selected disabled>{{ trans('Sections.Select_Grade') }} </option>
                                    @foreach ($list_Grades as $list_Grade)
                                        <option value="{{ $list_Grade->id }}"> {{ $list_Grade->Name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>

                            <div class="col">
                                <label for="inputName" class="control-label">{{ trans('Sections.Name_Class') }} :</label>
                                <select name="Class_id" class="custom-select"></select>
                            </div>
                            <br>

                            <div class="col">
                                <label for="inputName" class="control-label">{{ trans('Sections.Name_Teacher') }} :</label>
                                <select multiple class="form-control" name="Teacher_id[]" id="exampleFormControlSelect2">
                                    @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->Name }}</option>
                                    @endforeach
                                  </select>
                            </div>
                            <br>

                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('Sections.Close') }}</button>  
                     <button type="submit" class="btn btn-danger">{{ trans('Sections.Save') }}</button>     
                 </div>

                </form>
             </div>
         </div>
     </div>
    </div>