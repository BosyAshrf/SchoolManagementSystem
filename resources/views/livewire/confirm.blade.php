<div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
    <br><br>
    @if ($currentStep != 3)
        <div style="display: none" class="row setup-content" id="step-3">
    @endif
    <div class="card" style="width: 110%;">
        <div class="card-body">
            <div class="col">
                <div class="col">
                    <label style="color: red">{{trans('Parents.Attachments')}}</label>
               <div class="form-group">
                   <input type="file" wire:model="photos" accept="image/*" multiple>
               </div>
               <br>

               <input type="hidden" wire:model="Parent_id">

               <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button"
                       wire:click="back(2)">{{ trans('Parents.Back') }}</button>

               @if($updateForm)
                   <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" 
                   wire:click="submitForm_edit"
                    type="button">{{trans('Parents.Finish')}}
                   </button>  
               @else
                   <button class="btn btn-success btn-sm btn-lg pull-right" wire:click="submitForm"
                           type="button">{{ trans('Parents.Finish') }}</button>
               @endif

                </div>
            </div>
        </div>
    </div>
</div>

