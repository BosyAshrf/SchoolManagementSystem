
                                <!-- delete_modal_Grade -->
                                <div class="modal fade" id="delete{{ $grade->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                   <div class="modal-dialog" role="document">
                                       <div class="modal-content">
                                           <div class="modal-header">
                                               <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                   id="exampleModalLabel">
                                                   {{ trans('Grades.delete_Grade') }}
                                               </h5>
                                               <button type="button" class="close" data-dismiss="modal"
                                                       aria-label="Close">
                                                   <span aria-hidden="true">&times;</span>
                                               </button>
                                           </div>
                                           <div class="modal-body">
                                               <form action="{{route('Grades.destroy','test')}}" method="post">
                                                   {{method_field('DELETE')}}
                                                   @csrf
                                                <p class="text-center">
                                                    <h4 style="color:red">{{ trans('Grades.Warning_Grade') }}</h4>
                                                </p>
                                                   <input id="id" type="hidden" name="id" class="form-control" value="{{ $grade->id }}">
                                                   <br>
                                                         
                                                   <div class="modal-footer">
                                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('Grades.Close') }}</button>
                                                       <button type="submit" class="btn btn-danger">{{ trans('Grades.Save') }}</button>       
                                                   </div>
                                               </form>
                                           </div>
                                       </div>
                                   </div>
                               </div>