 <!-- edit_modal_Grade -->
 <div class="modal fade" id="edit{{ $grade->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                   id="exampleModalLabel">
                   {{ trans('Grades.edit_Grade') }}
               </h5>
               <button type="button" class="close" data-dismiss="modal"
                       aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
               <!-- add_form -->
               <form action="{{route('Grades.update','test')}}" method="post">
                   {{method_field('patch')}}
                   @csrf
                   <div class="row">
                       <div class="col">
                           <label for="Name" class="mr-sm-2">{{ trans('Grades.stage_name_ar') }} :</label>
                           <input id="Name" type="text" name="Name" class="form-control" value="{{$grade->getTranslation('Name', 'ar')}}" autocomplete="off" required>
                           <input id="id" type="hidden" name="id" class="form-control"  value="{{ $grade->id }}">      
                       </div>

                       <div class="col">
                           <label for="Name_en" class="mr-sm-2">{{ trans('Grades.stage_name_en') }} :</label>
                           <input type="text" class="form-control"value="{{$grade->getTranslation('Name', 'en')}}" name="Name_en" autocomplete="off" required>      
                       </div>
                   </div>

                   <div class="form-group">
                       <label for="exampleFormControlTextarea1">{{ trans('Grades.Notes') }} :</label>  
                       <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1" rows="3">{{ $grade->Notes }}</textarea>      
                   </div>
                   <br><br>

                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('Grades.Close') }}</button>
                        
                       <button type="submit" class="btn btn-success">{{ trans('Grades.Save') }}</button>
                               
                   </div>
               </form>
           </div>
       </div>
   </div>
</div>