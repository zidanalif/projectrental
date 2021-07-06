@extends("dasbor.layouts.default")
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route("dasbor.sewa.index") }}">Sewa</a></li>
    @if(isset($data))
        <li class="breadcrumb-item active" aria-current="page">{{trans('global.page_breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active" aria-current="page">{{trans('global.page_breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('pageTitle')
<h1>Sewa</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{ route("dasbor.sewa.index") }}"><i class="fas fa-angle-left"></i> {{trans('global.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card formPage">
    <legend class="action">{{ isset($data) ? trans('global.update') : trans('global.add_new') }}</legend>
    <form method="POST" action="{{ $admiko_data['formAction'] }}" enctype="multipart/form-data" class="needs-validation" novalidate>
        @if(isset($data)) @method('PUT') @endIf
        @csrf
        <div class="card-body">
            @if ($errors->any())<div class="row"><div class="col-2"></div><div class="col"><div class="invalid-feedback d-block">@foreach($errors->all() as $error) {{$error}}<br> @endforeach</div></div></div>@endif
            
                <div class="form-group row multiSelect">
                    <label for="klien" class="col-sm-2 col-form-label">Klien:</label>
                    <div class="col-sm-10" style="position: relative">
                        <select class="form-select" id="klien" name="klien"  data-placeholder="{{trans('global.select')}}" style="width: 100%" data-width="100%" data-allow-clear="true">
                            <option value="">{{trans("global.select")}}</option>
                            @foreach($klien_all as $id => $value)
                                <option value="{{ $id }}" {{ (old('klien') ? old('klien') : $data->klien ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback @if ($errors->has('klien')) d-block @endif">{{trans('global.required_text')}}</div>
                        <small id="klien_help" class="text-muted"></small>
                    </div>
                </div>

                <div class="form-group row multiSelect">
                    <label for="mobil" class="col-sm-2 col-form-label">Mobil:</label>
                    <div class="col-sm-10" style="position: relative">
                        <select class="form-select" id="mobil" name="mobil"  data-placeholder="{{trans('global.select')}}" style="width: 100%" data-width="100%" data-allow-clear="true">
                            <option value="">{{trans("global.select")}}</option>
                            @foreach($mobil_all as $id => $value)
                                <option value="{{ $id }}" {{ (old('mobil') ? old('mobil') : $data->mobil ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback @if ($errors->has('mobil')) d-block @endif">{{trans('global.required_text')}}</div>
                        <small id="mobil_help" class="text-muted"></small>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tempat_antar" class="col-sm-2 col-form-label">Tempat Antar:</label>
                    <div class="col-sm-10">
                        <textarea class="form-control form-control-textarea " id="tempat_antar" name="tempat_antar"  placeholder="Tempat Antar">{{{ old('tempat_antar', isset($data)?$data->tempat_antar : '') }}}</textarea>
                        <div class="invalid-feedback @if ($errors->has('tempat_antar')) d-block @endif">{{trans('global.required_text')}}</div>
                        <small id="tempat_antar_help" class="text-muted"></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sewa_mulai" class="col-sm-2 col-form-label">Sewa Mulai:</label>
                    <div class="col-sm-10">
                        <div class="input-group" id="dateTimePicker_sewa_mulai" data-target-input="nearest">
                            <input type="text" autocomplete="off" style="max-width: 170px;border-right: unset;"
                                   data-date_time_format="{{config('admiko_config.form_date_time_format')}}"
                                   class="form-control datetimepicker-input dateTimePicker"
                                   data-target="#dateTimePicker_sewa_mulai"  id="sewa_mulai" data-toggle="datetimepicker"
                                   placeholder="Sewa Mulai" name="sewa_mulai" value="{{{ old('sewa_mulai', isset($data)?$data->sewa_mulai : '') }}}">
                            <div class="input-group-append input-group-text" data-target="#dateTimePicker_sewa_mulai" data-toggle="datetimepicker">
                                <i class="fas fa-calendar-alt fa-fw"></i>
                            </div>
                        </div>
                        <div class="invalid-feedback @if ($errors->has('sewa_mulai')) d-block @endif">{{trans('global.required_text')}}</div>
                        <small id="sewa_mulai_help" class="text-muted"></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hingga" class="col-sm-2 col-form-label">Hingga:</label>
                    <div class="col-sm-10">
                        <div class="input-group" id="dateTimePicker_hingga" data-target-input="nearest">
                            <input type="text" autocomplete="off" style="max-width: 170px;border-right: unset;"
                                   data-date_time_format="{{config('admiko_config.form_date_time_format')}}"
                                   class="form-control datetimepicker-input dateTimePicker"
                                   data-target="#dateTimePicker_hingga"  id="hingga" data-toggle="datetimepicker"
                                   placeholder="Hingga" name="hingga" value="{{{ old('hingga', isset($data)?$data->hingga : '') }}}">
                            <div class="input-group-append input-group-text" data-target="#dateTimePicker_hingga" data-toggle="datetimepicker">
                                <i class="fas fa-calendar-alt fa-fw"></i>
                            </div>
                        </div>
                        <div class="invalid-feedback @if ($errors->has('hingga')) d-block @endif">{{trans('global.required_text')}}</div>
                        <small id="hingga_help" class="text-muted"></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="total_sewa" class="col-sm-2 col-form-label">Total Sewa:</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <div class="input-group-prepend input-group-text">Rp.</div>
                            <input type="number" class="form-control limitPozNegDecNumbers moneyWidth" id="total_sewa" name="total_sewa" 
                                   placeholder="Total Sewa" step="1"  data-decimal="0"
                                   value="{{{ old('total_sewa', isset($data)?$data->total_sewa : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('total_sewa')) d-block @endif">{{trans('global.required_text')}}</div>
                        </div>
                        <small id="total_sewa_help" class="text-muted"></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tujuan" class="col-sm-2 col-form-label">Tujuan:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tujuan" name="tujuan"  placeholder="Tujuan"  value="{{{ old('tujuan', isset($data)?$data->tujuan : '') }}}">
                        <div class="invalid-feedback @if ($errors->has('tujuan')) d-block @endif">{{trans('global.required_text')}}</div>
                        <small id="tujuan_help" class="text-muted"></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-sm-2 pt-0">Status Sewa:</label>
                    <div class="col-sm-10">
                        @foreach($status_sewa_all as $id => $value)
                            @php $checked = ""; @endphp
                            @if(old('status_sewa') == $id)
                                @php $checked = "checked"; @endphp
                            @elseIf(isset($data) && $data->status_sewa == $id)
                                @php $checked = "checked"; @endphp
                            
                            @endIf
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="status_sewa" id="status_sewa{{ $id }}" value="{{ $id }}" {{$checked}} >
                            <label class="form-check-label" for="status_sewa{{ $id }}">{{ $value }}</label>
                        </div>
                        @endforeach
                        <div class="invalid-feedback @if ($errors->has('status_sewa')) d-block @endif">{{trans('global.required_text')}}</div>
                        <small id="status_sewa_help" class="text-muted"></small>
                    </div>
                </div>
        </div>
        <div class="card-footer form-actions" id="form-group-buttons">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary float-start me-1 mb-1 mb-sm-0 save-button">{{trans('global.table_save')}}</button>
                    <a href="{{ route("dasbor.sewa.index") }}" class="btn btn-secondary float-end" role="button">{{trans('global.table_cancel')}}</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection