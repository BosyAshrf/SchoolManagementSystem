<!-- add_modal_class -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('Classrooms.add_class') }}
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class=" row mb-10" action="{{ route('Classrooms.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="repeater">
                            <div data-repeater-list="List_Classes">
                                <div data-repeater-item>
                                    <div class="row">
                                        <div class="col">
                                            <label>{{ trans('Classrooms.Name_class_ar') }} :</label>
                                            <input class="form-control" type="text" name="Name">
                                        </div>

                                        <div class="col">
                                            <label>{{ trans('Classrooms.Name_class_en') }} :</label>     
                                            <input class="form-control" type="text" name="Name_class_en">
                                        </div>

                                        <div class="col">
                                            <label>{{ trans('Classrooms.Name_Grade') }} :</label>
                                            <div class="box">
                                                <select class="fancyselect" name="Grade_id">
                                                    @foreach ($grades as $grade)
                                                    <option value="{{ $grade->id }}">{{ $grade->Name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <label for="Name_en" class="mr-sm-2">{{ trans('Classrooms.Actions') }} :</label>
                                            <input class="btn btn-danger btn-block" data-repeater-delete
                                                type="button" value="{{ trans('Classrooms.delete_row') }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-20">
                                <div class="col-12">
                                    <input class="button" data-repeater-create type="button" value="{{ trans('Classrooms.add_row') }}"/>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('Grades.Close') }}</button>
                                   
                                <button type="submit"  class="btn btn-success">{{ trans('Grades.Save') }}</button>
                                  
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>