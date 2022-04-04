@extends('admin.layouts.app')

@section('panel')


    <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive table-responsive--sm">
                        <table class="default-data-table table ">
                            <thead>
                            <tr>
                                <th scope="col">@lang('Level Order')</th>
                                <th scope="col">@lang('Percent')</th>
                                <th scope="col">@lang('Title')</th>
                                <th scope="col">@lang('Status')</th>
                                <th scope="col">@lang('Action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($depositLevels as $level)
                                <tr>
                                    <td>{{ $level->level_order }}</td>
                                    <td>{{ $level->percent }} %</td>
                                    <td>{{ $level->title }}</td>
                                    <td>
                                        @if($level->status == 1)
                                            Active
                                        @else
                                            Inctive
                                        @endif
                                    </td>
                                 <td>
                                 <button class="icon-btn editBtn" data-toggle="modal" data-toggle="tooltip" title="Edit" data-original-title="Edit" data-id="{{ $level->id }}" data-percent="{{ $level->percent }}">
                                <i class="fa fa-edit"></i>
                                </button> &nbsp;
                                @if($loop->last)
                                <button class="icon-btn btn--danger ml-1 removeBtn"
                                                    data-id="{{ $level->id }}">
                                <i class="las la-trash"></i>
                                </button>
                                @endif
                                 </td>
                                </tr>
                            @endforeach
                           </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                <div class="card-footer py-4">
      		{{ $depositLevels->links('admin.partials.paginate') }}
              </div>
            </div><!-- card end -->
        </div>


<div id="editModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> @lang('Edit Deposit Level Tree Percent')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.level.tree.edit') }}" method="POST" id='edit_form'>
                @csrf
            <input type="hidden" name="id">
                <div class="modal-body">

                     <div class="form-group">
                        <label> @lang('Percent') *</label>
                        <input type="text" class="form-control form-control" name="percent" value="{{old('percent')}}"
                        required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                    <button type="submit" id="create_btn" class="btn btn--primary">@lang('Save')</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div id="addModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> @lang('Create New Level')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.level.tree.create') }}" method="POST" id='form'>
                @csrf

                <div class="modal-body">

                     <div class="form-group">
                        <label> @lang('Title') *</label>
                        <input type="text" class="form-control form-control" name="title" value="{{old('title')}}"
                        required>
                    </div>

                    <div class="form-group">
                        <label> @lang('Level Order') *</label>
                        <input type="text" class="form-control form-control" readonly name="level_order" value="{{ count($depositLevels)+1 }}"
                        required>
                    </div>

                     <div class="form-group">
                        <label> @lang('Percent') *</label>
                        <input type="text" class="form-control form-control" name="percent" value="{{old('percent')}}"
                        required>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                    <button type="submit" id="create_btn" class="btn btn--primary">@lang('Save')</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div id="removeModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> @lang('Confirmation')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

      <form action="{{ route('admin.level.tree.delete') }}" method="post">
            @csrf
            @method('delete')
            <input type="hidden" name="id">
            <div class="modal-body">
                <p>@lang('Are you sure to remove this ?')</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn--secondary" data-dismiss="modal">@lang('Close')</button>
                <button type="submit" class="btn btn--danger">@lang('Remove')</button>
            </div>
        </form>
    </div>
</div>
</div>

@endsection


@push('breadcrumb-plugins')
<a href="javascript:void(0)" class="btn btn-sm btn--primary box--shadow1 text--small addBtn"><i class="fa fa-fw fa-plus"></i>@lang('New Level')</a>
@endpush

@push('script')

<script>
    (function ($) {
        "use strict";

        $('.addBtn').on('click', function () {
            var modal = $('#addModal');
            modal.find('input[name=id]').val($(this).data('id'))
            modal.modal('show');
        });

        $('.editBtn').on('click', function () {
            var modal = $('#editModal');
            modal.find('input[name=percent]').val($(this).data('percent'));
            modal.find('input[name=id]').val($(this).data('id'));
            modal.modal('show');
        });

        $('.removeBtn').on('click', function () {
            var modal = $('#removeModal');
            modal.find('input[name=id]').val($(this).data('id'));
            modal.modal('show');
        });

    })(jQuery);

</script>

@endpush
