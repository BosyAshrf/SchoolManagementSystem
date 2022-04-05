<div class="modal fade" id="delete{{ $student->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('Students.destroy', 'test') }}" method="post">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <div class="modal-content">
                <div class="modal-header">
                    <h4 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ trans('Students.Delete_student') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-center">
                    <h5 style="color:red"> {{ trans('Sections.Warning_Section') }}</h5>
                    </p>
                    <input type="hidden" name="id" value="{{ $student->id }}">
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

