<button class="btn btn-success btn-sm btn-lg pull-right" wire:click="showformadd" type="button">
    {{ trans('Parents.Add_Parent') }}</button>
<br><br>
<div class="table-responsive">
    <table id="datatable" class="table table-hover table-sm table-bordered p-0" data-page-length="50"
           style="text-align: center">
        <thead>
        <tr class="table-success">
            <th>#</th>
            <th>{{ trans('Parents.Name_Father') }}</th>
            <th>{{ trans('Parents.Email') }}</th>
            <th>{{ trans('Parents.Phone_Father') }}</th>
            <th>{{ trans('Parents.National_ID_Father') }}</th>
            <th>{{ trans('Parents.Passport_ID_Father') }}</th>
            <th>{{ trans('Parents.Job_Father') }}</th>
            <th>{{ trans('Parents.Actions') }}</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 0; ?>
        @foreach ($My_Parents as $Parent)
            <tr>
                <?php $i++; ?>
                <td>{{ $i }}</td>
                <td>{{ $Parent->Name_Father }}</td>
                <td>{{ $Parent->Email }}</td>
                <td>{{ $Parent->Phone_Father }}</td>
                <td>{{ $Parent->National_ID_Father }}</td>
                <td>{{ $Parent->Passport_ID_Father }}</td>
                <td>{{ $Parent->Job_Father }}</td>
                <td>
                    <button wire:click="edit({{ $Parent->id }})" title="{{ trans('Grades.Edit') }}"
                            class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button>
                            
                    <button type="button" class="btn btn-danger btn-sm" wire:click="delete({{ $Parent->id }})" 
                        title="{{ trans('Grades.Delete') }}"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        @endforeach
    </table>
</div>