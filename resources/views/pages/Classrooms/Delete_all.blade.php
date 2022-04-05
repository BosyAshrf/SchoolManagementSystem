<!-- حذف مجموعة صفوف -->
<div class="modal fade" id="delete_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('Classrooms.delete_class') }}
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('Delete_all')}}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <p class="text-center">
                        <h4 style="color:red">{{ trans('Classrooms.Warning_class') }}</h4>
                    </p>
    
                    <input class="text" type="hidden" id="delete_all_id" name="delete_all_id" value="">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('Classrooms.Close') }}</button>  
                    <button type="submit" class="btn btn-danger">{{ trans('Classrooms.Save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
