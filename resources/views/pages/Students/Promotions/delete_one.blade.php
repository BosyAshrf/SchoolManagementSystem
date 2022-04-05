<div class="modal fade" id="delete_one{{ $promotion->id }}" tabindex="-1" 
    role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('Promotions.destroy', 'test') }}" method="post">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <div class="modal-content">
                <div class="modal-header">
                    <h4 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{trans('Promotions.Back_students')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-center">
                    <h4 style="color:rgb(106, 106, 116)">  {{ trans('Promotions.WarningStudent') }} {{ $promotion->students->name}}</h4>
                    </p>
                    <input type="hidden" name="id" value="{{ $promotion->id }}">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ trans('Students.Close') }}</button>
                    <button type="submit" class="btn btn-danger">{{ trans('Students.Save') }}</button>
                </div>
        </form>
    </div>
</div>
</div>
</div>
