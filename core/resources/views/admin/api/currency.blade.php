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
                                <th>Rate</th>
                                <th scope="col">@lang('Use All Currency')</th>
                                <th scope="col">@lang('Status')</th>
                                <th scope="col">@lang('API Key')</th>
                                <th scope="col">@lang('Whole API Url')</th>
                                <th scope="col">@lang('Currency Codes')</th>
                                <th scope="col">@lang('Current Currency')</th>
                                <th scope="col">@lang('Time')</th>
                                <th scope="col">@lang('Edit')</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($currenciesApi as $key => $data)
                                    <tr>
                                        <td>
                                        @if( $data->status != 0 )
                                            <a href="{{ route('admin.api.currency.rate',['id'=>$data->id]) }}"> <i class='fa fa-desktop'></i></a>
                                        @endif
                                        </td>
                                        <td>{{ $data->use_all_currency == 1 ? 'Yes' : 'No'}}</td>
                                        <td>{{ $data->status == 1 ? 'Active' : 'Inactive'}}</td>
                                        <td>{{ $data->api_key }}</td>
                                        <td>{{ $data->whole_url }}</td>
                                        <td>{{ $data->currency_codes }}</td>
                                        <td>
                                            @foreach (json_decode($data->currency_rate, true)['rates'] as $key => $value)
                                                @php
                                                    echo $key.',';
                                                @endphp
                                            @endforeach
                                        </td>
                                        <td>{{ showDateTime($data->created_at) }}</td>
                                        <td>
                                            <button class="icon-btn editBtn" data-toggle="modal" data-toggle="tooltip" title="Edit"  data-original-title="Edit"
                                            data-up_id="{{ $data->id }}"
                                            data-status="{{ $data->status }}"
                                            data-api_key="{{ $data->api_key }}"
                                            data-api_key="{{ $data->status }}"
                                            data-whole_url="{{ $data->whole_url }}"
                                            data-currency_codes="{{ $data->currency_codes }}"
                                            data-use_all_currency="{{ $data->use_all_currency }}"
                                            >
                                            <i class="fa fa-edit"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                           </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
              {{-- {{ $date->links('admin.partials.paginate') }} --}}
              </div>
            </div><!-- card end -->
        </div>

    </div>

    {{-- Add METHOD MODAL --}}
<div id="addModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> @lang('Add New Currency API')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.api.currency.create') }}" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label> @lang('Use All Currency ?')</label>
                            <select name="use_all_currency" id="use_all_currency" required class="form-control">
                                <option value="">---Select One---</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                    </div>

                    <div class="form-group">
                        <label> @lang('Currency Codes')</label>
                        <select name="currency_codes[]"  class="form-control select2-auto-tokenize"  multiple="multiple" required>

                        </select>
                    </div>

                    <div class="form-group">
                        <label> @lang('API Key') </label>
                        <input type="text" class="form-control form-control-lg" name="api_key" value="{{old('api_key')}}"
                        required>
                    </div>

                    <div class="form-group">
                        <label> @lang('Whole API Url') </label>
                        <input type="text" class="form-control form-control-lg" name="whole_url" value="{{old('whole_url')}}"
                        required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                    <button type="submit" class="btn btn--primary">@lang('Create')</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div id="editModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> @lang('Edit Currency API')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.api.currency.edit') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="up_id">
                    <div class="form-group">
                        <label> @lang('Use All Currency ?')</label>
                            <select name="use_all_currency" id="use_all_currency2" required class="form-control">
                                <option value="">---Select One---</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                    </div>

                    <div class="form-group" id="status_id">
                        <label> @lang('Status')</label>
                        <select name="status" id="status2" required class="form-control">
                            <option value="">---Select One---</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                            </select>
                    </div>


                    <div class="form-group">
                        <label> @lang('Currency Codes')</label>
                        <select name="currency_codes[]" id="currency_codes2" class="form-control select2-auto-tokenize"  multiple="multiple" required>
                        {{-- @foreach ($currenciesApi as $data )
                                @foreach (json_decode($data->currency_codes, true) as $value)
                                   <option value="{{ $value }}" data-value="{{ $value }}" class="curOpt">{{ $value }}</option>
                                @endforeach
                        @endforeach --}}
                        </select>
                    </div>

                    <div class="form-group">
                        <label> @lang('API Key') </label>
                        <input type="text" class="form-control form-control-lg" name="api_key" value="{{old('api_key')}}"
                        required>
                    </div>

                    <div class="form-group">
                        <label> @lang('Whole API Url') </label>
                        <input type="text" class="form-control form-control-lg" name="whole_url" value="{{old('whole_url')}}"
                        required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                    <button type="submit" class="btn btn--primary">@lang('Update')</button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection

@push('breadcrumb-plugins')
<a href="javascript:void(0)" class="btn btn-sm btn--primary box--shadow1 text--small addBtn"><i class="fa fa-fw fa-plus"></i>@lang('Add New Currency API')</a>
@endpush

@push('script')

<script>
    (function ($) {
        "use strict";

        $('.editBtn').on('click', function () {
            var modal = $('#editModal');
            modal.find('input[name=up_id]').val($(this).data('up_id'));
            modal.find('input[name=api_key]').val($(this).data('api_key'));
            modal.find('select[name=use_all_currency]').val($(this).data('use_all_currency'));
            modal.find('input[name=whole_url]').val($(this).data('whole_url'));

            if( $(this).data('status') == 1 ){
                modal.find('select[name=status]').val($(this).data('status'));
                document.getElementById("status_id").style.display = "none";
            }else{
                modal.find('select[name=status]').val($(this).data('status'));
            }

            var currecncyValue = $(this).data('currency_codes');
            var select = $('#currency_codes2');
            var $newOption = '';

            for (let i = 0; i < currecncyValue.length; i++) {
                    select.append(
                        $(`<option selected>`).val(currecncyValue[i]).text(currecncyValue[i])
                 )
            }
            modal.modal('show');
        });


        $('.addBtn').on('click', function () {
            var modal = $('#addModal');
            modal.find('input[name=id]').val($(this).data('id'))
            modal.modal('show');
        });

    })(jQuery);

</script>

@endpush
