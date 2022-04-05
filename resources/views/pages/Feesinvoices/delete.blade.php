<!-- Deleted inFormation Student -->
<div class="modal fade" id="delete{{ $fee_invoice->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('FeesInvoices.deleteInvoices') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('Fees_Invoices.destroy','test')}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{$fee_invoice->id }}">
                    <h4 style="font-family: 'Cairo', sans-serif;color:red  ">{{ trans('FeesInvoices.delete') }}</h4>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Students.Close')}}</button>
                        <button  class="btn btn-danger">{{trans('Students.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>