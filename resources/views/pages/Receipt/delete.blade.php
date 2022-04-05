<div class="modal fade" id="Delete_receipt{{$ReceiptStudent->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">حذف سند قبض</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('ReceiptStudents.destroy','test')}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{$ReceiptStudent->id}}">
                    <h5 style="color:red"> {{ trans('Sections.Warning_Section') }}</h5>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Students.Close')}}</button>
                        <button  class="btn btn-danger">{{trans('Students.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>