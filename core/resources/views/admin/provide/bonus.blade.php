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
                                <th scope="col">@lang('SL')</th>
                                <th scope="col">@lang('Total Amount')</th>
                                <th scope="col">@lang('Created By')</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>{{ number_format($bonus_from_admin,2) }} {{ $general->cur_text }}</td>
                                    <td>Admin</td>
                                </tr>
                           </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
      {{-- {{ $bonus_from_admin->links() }} --}}
              </div>
            </div>
        </div>
    </div>


    <div id="addModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> @lang('Provide New Bonus to the all users')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.provide.bonus.confirm') }}" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label> @lang('Percentage')</label>
                        <span>{{ $bonus_setting->instant_bonus }} % </span>
                        <p>All users will receive {{ $bonus_setting->instant_bonus }} % of their current balancer</p>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Cancel')</button>
                    <button type="submit" class="btn btn--primary">@lang('Create')</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection


@push('breadcrumb-plugins')
@if( $userCount != 0)
    <a href="javascript:void(0)" class="btn btn-sm btn--primary box--shadow1 text--small addBtn"><i class="fa fa-fw fa-plus"></i>@lang('Provde New Bonus')</a>
@endif
@endpush


@push('script')

<script>
    (function ($) {

        "use strict";
        $('.addBtn').on('click', function () {
            var modal = $('#addModal');
            modal.modal('show');
        });

    })(jQuery);

</script>

@endpush

