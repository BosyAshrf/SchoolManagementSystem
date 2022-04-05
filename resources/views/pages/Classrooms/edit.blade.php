             <!-- edit_modal_Grade -->
             <div class="modal fade" id="edit{{$class->id}}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog" role="document">
                   <div class="modal-content">
                       <div class="modal-header">
                           <h4 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                               id="exampleModalLabel">
                               {{ trans('Classrooms.edit_class') }}
                           </h4>
                           <button type="button" class="close" data-dismiss="modal"
                                   aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                           </button>
                       </div>
                       <div class="modal-body">
                           <!-- edit_form -->
                           <form action="{{ route('Classrooms.update', 'test') }}" method="post">
                               {{ method_field('patch') }}
                               @csrf
                               <div class="row">
                                   <div class="col">
                                       <label>{{ trans('Classrooms.Name_class_ar') }} :</label>
                                       <input id="Name" type="text" name="Name" class="form-control" value="{{ $class->getTranslation('Name_Class', 'ar') }}" required>
                         
                                       <input id="id" type="hidden" name="id" class="form-control"
                                              value="{{$class->id}}">
                                   </div>

                                   <div class="col">
                                       <label>{{ trans('Classrooms.Name_class_en') }}:</label>
                                       <input type="text" name="Name_class_en" class="form-control" value="{{ $class->getTranslation('Name_Class', 'en') }}" required>

                                   </div>
                               </div><br>

                               <div class="form-group">
                                   <label for="exampleFormControlTextarea1">{{ trans('Classrooms.Name_Grade') }}:</label>
                                   <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="Grade_id">
                                          
                                       <option value="{{ $class->Grades->id }}"> {{ $class->Grades->Name }}</option>
                                       @foreach ($grades as $grade)
                                           <option value="{{ $grade->id }}"> {{ $grade->Name }}</option>
                                       @endforeach
                                   </select>

                               </div>
                               <br><br>

                               <div class="modal-footer">
                                   <button type="button" class="btn btn-secondary"
                                           data-dismiss="modal">{{ trans('Grades.Close') }}</button>
                                   <button type="submit"
                                           class="btn btn-success">{{ trans('Grades.Save') }}</button>
                               </div>
                           </form>

                       </div>
                   </div>
               </div>
           </div>