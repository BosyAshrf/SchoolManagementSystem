<div class="modal fade" id="delete{{$Teacher->id}}" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route('Teachers.destroy','test')}}" method="post">
            {{method_field('DELETE')}}
            {{csrf_field()}}
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('Teachers.Delete_Teacher') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-center">
                    <h5 style="color:red"> {{ trans('Sections.Warning_Section') }}</h5>
                </p>
                <input type="hidden" name="id"  value="{{$Teacher->id}}">
            </div>
           
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('Teachers.Close') }}</button>
                    <button type="submit"
                            class="btn btn-danger">{{ trans('Teachers.Save') }}</button>
            </div>
        </form>
        </div>
        </div>
    </div>
</div>