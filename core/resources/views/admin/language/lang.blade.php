@extends('admin.layouts.app')

@section('panel')
    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive table-responsive--sm">
                        <table class="default-data-table table ">
                            <thead>
                            <tr>
                                <th scope="col">@lang('Name')</th>
                                <th scope="col">@lang('Code')</th>
                                <th scope="col">@lang('Default')</th>
                                <th scope="col">@lang('Actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($languages as $item)
                                <tr>
                                    <td data-label="@lang('Name')">
                                        <div class="user">
                                            <div class="thumb"><img src="{{ getImage($path .'/'. $item->icon,'64x64')}}" alt="image"></div>

                                            <span class="name">{{$item->name}}</span>
                                        </div>
                                    </td>
                                    <td data-label="@lang('Code')"><strong>{{ $item->code }}</strong></td>
                                    <td data-label="@lang('Status')">
                                        @if($item->is_default == 1)
                                            <span class="text--small badge font-weight-normal badge--success">@lang('Default')</span>
                                        @else
                                            <span class="text--small badge font-weight-normal badge--warning">@lang('Selectable')</span>
                                        @endif
                                    </td>
                                    <td data-label="@lang('Action')">
                                        <a href="{{route('admin.language-key', $item->id)}}" class="icon-btn btn--success" data-toggle="tooltip" title="" data-original-title="@lang('Translate')">
                                                <i class="la la-code"></i>
                                            </a>
                                        <a href="javascript:void(0)" class="icon-btn ml-1 editBtn" data-original-title="Edit" data-toggle="tooltip" data-url="{{ route('admin.language-manage-update', $item->id)}}" data-lang="{{ json_encode($item->only('name', 'text_align', 'is_default')) }}" data-icon="{{ getImage($path .'/'. $item->icon,'64x64')}}">
                                            <i class="la la-edit"></i>
                                        </a>


                                        @if($item->id != 1)
                                            <a href="javascript:void(0)" class="icon-btn btn--danger ml-1 deleteBtn" data-original-title="Delete" data-toggle="tooltip" data-url="{{ route('admin.language-manage-del', $item->id) }}">
                                                <i class="la la-trash"></i>
                                            </a>
                                        @endif

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">{{ $empty_message }}</td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
            </div><!-- card end -->
        </div>


    </div>



    {{-- NEW MODAL --}}
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-share-square"></i> Add New Language</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <form class="form-horizontal" method="post" action="{{ route('admin.language-manage-store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="form-row">

                            <div class="col-md-12">

                                <label>Flag Icon </label>
                                <div class="file-upload-wrapper" data-text="Choose file">
                                    <input type="file" name="icon" id="customFile1" class="file-upload-field">
                                </div>
                                <div id="fileUploadsContainer"></div>
                            </div>


                            <small class="my-2 text-facebook">Supported files: <b>png</b>. Image will be resized into
                                <b>{{$size}}px</b></small>
                        </div>
                        <div class="form-row form-group">
                            <label class="font-weight-bold ">Language Name <span class="text-danger">*</span></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control has-error bold " id="code" name="name" placeholder="e.g. Japaneese, Portuguese" required>
                            </div>
                        </div>

                        <div class="form-row form-group">
                            <label class="font-weight-bold">Language Code <span class="text-danger">*</span></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control has-error bold " id="link" name="code" placeholder="e.g. jp, pt-br" required>
                            </div>
                        </div>

                        <div class="form-row form-group">
                            <div class="col-md-6  d-none">
                                <label class="font-weight-bold">Text Direction <span class="text-danger">*</span></label>
                                <select name="text_align" class="form-control">
                                    <option value="0">Left to Right</option>
                                    <option value="1">Right to Left</option>
                                </select>
                            </div>
                            <div class="col-md-6 ">
                                <label for="inputName" class="">Default Language <span class="text-danger">*</span></label>
                                <input type="checkbox" data-width="100%" data-height="40px" data-onstyle="-success" data-offstyle="-danger" data-toggle="toggle" data-on="SET" data-off="UNSET" name="is_default">
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn--primary" id="btn-save" value="add">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- EDIT MODAL --}}
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-fw fa-share-square"></i>Edit Language</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <form method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="form-row">
                            <div class="col-sm-6">
                                <img class="mx-auto language-icon" width="80px">
                            </div>
                            <div class="col-sm-6">
                                <label for="inputName" class="font-weight-bold">Default Language <span class="text-danger">*</span></label>
                                <input type="checkbox" data-width="100%" data-height="40px" data-onstyle="-success" data-offstyle="-danger" data-toggle="toggle" data-on="SET" data-off="UNSET" name="is_default">
                            </div>

                            <div class="col-md-12">

                                <label>Flag Icon </label>
                                <div class="file-upload-wrapper" data-text="Choose file">
                                    <input type="file" name="icon" id="customFile2" class="file-upload-field has-error">
                                </div>
                                <div id="fileUploadsContainer"></div>
                            </div>

                            <small class="my-2 text-facebook">Supported files: <b>png</b>. Image will be resized into
                                <b>{{ $size }}px</b></small>

                        </div>
                        <div class="form-row">
                            <label for="inputName" class="font-weight-bold">Language Name <span class="text-danger">*</span></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control has-error bold " id="code" name="name" required>
                            </div>
                        </div>

                        <div class="form-row d-none">
                            <label class="font-weight-bold">Text Direction <span class="text-danger">*</span></label>
                            <div class="col-sm-12">
                                <select name="text_align" class="form-control" required>
                                    <option value="0">Left to Right</option>
                                    <option value="1">Right to Left</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn--primary" id="btn-save" value="add">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- DELETE MODAL --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">@lang('Remove Language')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <form method="post" action="" >
                    @csrf
                    {{method_field('delete')}}
                    <input type="hidden" name="delete_id" id="delete_id" class="delete_id" value="0">
                    <div class="modal-body">
                        <p class="text-muted">@lang('Are you sure you want to Delete ?')</p>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn--danger deleteButton">@lang('Delete')</button>
                        <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection


@push('breadcrumb-plugins')
    <a class="btn btn-sm btn--primary box--shadow1 text-white text--small" data-toggle="modal" data-target="#myModal"><i class="fa fa-fw fa-plus"></i>@lang('Add New
        Language')</a>
@endpush

@push('script')
    <script>
        (function($){
            "use strict";
            $('.editBtn').on('click', function () {
                var modal = $('#editModal');
                var url = $(this).data('url');
                var icon = $(this).data('icon');
                var lang = $(this).data('lang');

                modal.find('form').attr('action', url);
                modal.find('.language-icon').attr('src',icon);
                modal.find('input[name=name]').val(lang.name);
                modal.find('select[name=text_align]').val(lang.text_align);
                if (lang.is_default == 1) {
                    modal.find('input[name=is_default]').bootstrapToggle('on');
                } else {
                    modal.find('input[name=is_default]').bootstrapToggle('off');
                }
                modal.modal('show');
            });

            $('.deleteBtn').on('click', function () {
                var modal = $('#deleteModal');
                var url = $(this).data('url');

                modal.find('form').attr('action', url);
                modal.modal('show');
            });
        })(jQuery);
    </script>
@endpush