  <!-- delete_modal_Grade -->
  <div class="modal fade" id="delete{{ $xxx->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                      {{ trans('Sections.delete_Section') }}
                  </h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form action="{{ route('Sections.destroy','test') }}" method="post">
                      {{ method_field('DELETE') }}
                      @csrf
                      <p class="text-center">
                        <h5 style="color:red"> {{ trans('Sections.Warning_Section') }}</h5>
                        </p>
                     
                      <input id="id" type="hidden" name="id" class="form-control" value="{{ $xxx->id }}">
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('Sections.Close') }}</button>
                             
                          <button type="submit" class="btn btn-danger">{{ trans('Sections.Save') }}</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
