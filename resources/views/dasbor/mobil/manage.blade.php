@extends("dasbor.layouts.default")
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route("dasbor.mobil.index") }}">Mobil</a></li>
    @if(isset($data))
        <li class="breadcrumb-item active" aria-current="page">{{trans('global.page_breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active" aria-current="page">{{trans('global.page_breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('pageTitle')
<h1>Mobil</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{ route("dasbor.mobil.index") }}"><i class="fas fa-angle-left"></i> {{trans('global.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card formPage">
    <legend class="action">{{ isset($data) ? trans('global.update') : trans('global.add_new') }}</legend>
    <form method="POST" action="{{ $admiko_data['formAction'] }}" enctype="multipart/form-data" class="needs-validation" novalidate>
        @if(isset($data)) @method('PUT') @endIf
        @csrf
        <div class="card-body">
            @if ($errors->any())<div class="row"><div class="col-2"></div><div class="col"><div class="invalid-feedback d-block">@foreach($errors->all() as $error) {{$error}}<br> @endforeach</div></div></div>@endif
            
                <div class="form-group row">
                    <label for="nama_mobil" class="col-sm-2 col-form-label">Nama Mobil:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_mobil" name="nama_mobil"  placeholder="Nama Mobil"  value="{{{ old('nama_mobil', isset($data)?$data->nama_mobil : '') }}}">
                        <div class="invalid-feedback @if ($errors->has('nama_mobil')) d-block @endif">{{trans('global.required_text')}}</div>
                        <small id="nama_mobil_help" class="text-muted"></small>
                    </div>
                </div>
                <div class="form-group row multiSelect">
                    <label for="merek" class="col-sm-2 col-form-label">Merek:*</label>
                    <div class="col-sm-10" style="position: relative">
                        <select class="form-select" id="merek" name="merek" required="true" data-placeholder="{{trans('global.select')}}" style="width: 100%" data-width="100%" data-allow-clear="true">
                            
                            @foreach($merek_all as $id => $value)
                                <option value="{{ $id }}" {{ (old('merek') ? old('merek') : $data->merek ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback @if ($errors->has('merek')) d-block @endif">{{trans('global.required_text')}}</div>
                        <small id="merek_help" class="text-muted"></small>
                    </div>
                </div>

                <div class="form-group row multiSelect">
                    <label for="kategori" class="col-sm-2 col-form-label">Kategori:*</label>
                    <div class="col-sm-10" style="position: relative">
                        <select class="form-select" id="kategori" name="kategori" required="true" data-placeholder="{{trans('global.select')}}" style="width: 100%" data-width="100%" data-allow-clear="true">
                            
                            @foreach($kategori_all as $id => $value)
                                <option value="{{ $id }}" {{ (old('kategori') ? old('kategori') : $data->kategori ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback @if ($errors->has('kategori')) d-block @endif">{{trans('global.required_text')}}</div>
                        <small id="kategori_help" class="text-muted"></small>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tanggal_pajak" class="col-sm-2 col-form-label">Tanggal Pajak:*</label>
                    <div class="col-sm-10">
                        <div class="input-group" id="datePicker_tanggal_pajak" data-target-input="nearest">
                            <input type="text" autocomplete="off" style="max-width: 170px;border-right: unset;"
                                   data-date_time_format="{{config('admiko_config.form_date_format')}}"
                                   class="form-control datetimepicker-input datePicker"
                                   data-target="#datePicker_tanggal_pajak" required="true" id="tanggal_pajak" data-toggle="datetimepicker"
                                   placeholder="Tanggal Pajak" name="tanggal_pajak" value="{{{ old('tanggal_pajak', isset($data)?$data->tanggal_pajak : '') }}}">
                            <div class="input-group-append input-group-text" data-target="#datePicker_tanggal_pajak" data-toggle="datetimepicker">
                                <i class="fas fa-calendar-alt fa-fw"></i>
                            </div>
                        </div>
                        <div class="invalid-feedback @if ($errors->has('tanggal_pajak')) d-block @endif">{{trans('global.required_text')}}</div>
                        <small id="tanggal_pajak_help" class="text-muted"></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="plat_nomor" class="col-sm-2 col-form-label">Plat Nomor:*</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="plat_nomor" name="plat_nomor" required="true" placeholder="Plat Nomor"  value="{{{ old('plat_nomor', isset($data)?$data->plat_nomor : '') }}}">
                        <div class="invalid-feedback @if ($errors->has('plat_nomor')) d-block @endif">{{trans('global.required_text')}}</div>
                        <small id="plat_nomor_help" class="text-muted"></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_mesin" class="col-sm-2 col-form-label">No. Mesin:*</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="no_mesin" name="no_mesin" required="true" placeholder="No. Mesin"  value="{{{ old('no_mesin', isset($data)?$data->no_mesin : '') }}}">
                        <div class="invalid-feedback @if ($errors->has('no_mesin')) d-block @endif">{{trans('global.required_text')}}</div>
                        <small id="no_mesin_help" class="text-muted"></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kapasitas_silinder" class="col-sm-2 col-form-label">Kapasitas Silinder:</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control limitPozNegNumbers numbersWidth" id="kapasitas_silinder" name="kapasitas_silinder"  placeholder="Kapasitas Silinder"
                               step="1" 
                               value="{{{ old('kapasitas_silinder', isset($data)?$data->kapasitas_silinder : '') }}}">
                        <div class="invalid-feedback @if ($errors->has('kapasitas_silinder')) d-block @endif">{{trans('global.required_text')}}</div>
                        <small id="kapasitas_silinder_help" class="text-muted"></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-sm-2 pt-0">Bahan Bakar:*</label>
                    <div class="col-sm-10">
                        @foreach($bahan_bakar_all as $id => $value)
                            @php $checked = ""; @endphp
                            @if(old('bahan_bakar') == $id)
                                @php $checked = "checked"; @endphp
                            @elseIf(isset($data) && $data->bahan_bakar == $id)
                                @php $checked = "checked"; @endphp
                            @elseIf($loop->index == 0)
                                @php $checked = "checked"; @endphp
                            @endIf
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="bahan_bakar" id="bahan_bakar{{ $id }}" value="{{ $id }}" {{$checked}} >
                            <label class="form-check-label" for="bahan_bakar{{ $id }}">{{ $value }}</label>
                        </div>
                        @endforeach
                        <div class="invalid-feedback @if ($errors->has('bahan_bakar')) d-block @endif">{{trans('global.required_text')}}</div>
                        <small id="bahan_bakar_help" class="text-muted"></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kursi_penumpang" class="col-sm-2 col-form-label">Kursi Penumpang:*</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control limitPozNegNumbers numbersWidth" id="kursi_penumpang" name="kursi_penumpang" required="true" placeholder="Kursi Penumpang"
                               step="1"  data-min="2" min="2" data-max="16" max="16"
                               value="{{{ old('kursi_penumpang', isset($data)?$data->kursi_penumpang : '') }}}">
                        <div class="invalid-feedback @if ($errors->has('kursi_penumpang')) d-block @endif">{{trans('global.required_text')}}</div>
                        <small id="kursi_penumpang_help" class="text-muted"> Min: 2 Max: 16</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tahun" class="col-sm-2 col-form-label">Tahun:*</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tahun" name="tahun" required="true" placeholder="Tahun"  value="{{{ old('tahun', isset($data)?$data->tahun : '') }}}">
                        <div class="invalid-feedback @if ($errors->has('tahun')) d-block @endif">{{trans('global.required_text')}}</div>
                        <small id="tahun_help" class="text-muted"></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fitur" class="col-sm-2 col-form-label">Fitur:</label>
                    <div class="col-sm-10">
                        @if(isset($data))
                            @php $fitur_select = $data->fitur_many_select(); @endphp
                        @endIf
                        @foreach($fitur_all as $id => $value)
                            @php $checked = ""; @endphp
                            @if(in_array($id, old('fitur', [])))
                                @php $checked = "checked"; @endphp
                            @elseIf(isset($data) && $fitur_select->contains($id))
                                @php $checked = "checked"; @endphp
                            @endIf
                        <div class="form-check form-checkbox">
                            <input type="checkbox" class="form-check-input" name="fitur[]" id="fitur{{ $id }}" value="{{ $id }}" {{$checked}}>
                            <label class="form-check-label" for="fitur{{ $id }}">{{ $value }}</label>
                        </div>
                        @endforeach
                        <div class="invalid-feedback @if ($errors->has('fitur')) d-block @endif">{{trans('global.required_text')}}</div>
                        <small id="fitur_help" class="text-muted"></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="harga_sewa" class="col-sm-2 col-form-label">Harga Sewa:*</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <div class="input-group-prepend input-group-text">Rp.</div>
                            <input type="number" class="form-control limitPozNegDecNumbers moneyWidth" id="harga_sewa" name="harga_sewa" required="true"
                                   placeholder="Harga Sewa" step="1"  data-decimal="0"
                                   value="{{{ old('harga_sewa', isset($data)?$data->harga_sewa : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('harga_sewa')) d-block @endif">{{trans('global.required_text')}}</div>
                        </div>
                        <small id="harga_sewa_help" class="text-muted"></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="foto" class="col-sm-2 col-form-label">Foto:*</label>
                    <div class="col-sm-10">
                        @if (isset($data->foto) && Storage::disk(config("admiko_config.filesystem"))->exists($admiko_data['fileInfo']["foto"]['original']["folder"].$data->foto))
                        <a href="{{ Storage::disk(config("admiko_config.filesystem"))->url($admiko_data['fileInfo']["foto"]['original']["folder"].$data->foto) }}" target="_blank" class="tableImage">
                                <img src="{{ Storage::disk(config("admiko_config.filesystem"))->url($admiko_data['fileInfo']["foto"]['original']["folder"].$data->foto) }}">
                            </a><br>

                        @endif
                        <input type="file" class="imageUpload mt-1" id="foto" accept=".jpg,.png,.jpeg" data-type=".jpg,.png,.jpeg" data-size="2" name="foto" @if(!isset($data)) required="true" @endIf data-selected="{{trans('global.selected_image_preview')}}" >
                        <div class="invalid-feedback @if ($errors->has('foto')) d-block @endif" data-required="{{trans('global.required_image')}}" data-size="{{trans('global.required_size')}}" data-type="{{trans('global.required_type')}}">
                            @if ($errors->has('foto')){{ $errors->first('foto') }}@endif
                        </div>
                        <small id="foto_help" class="text-muted">{{trans("global.file_size_limit")}}2 MB. {{trans("global.file_extension_limit")}}.jpg,.png,.jpeg. {{trans("global.recommended")}}{{trans("global.width")}}1920px, {{trans("global.height")}}1080px. {{trans("global.image_action")}}{{trans("global.image_action_resize")}}.</small>
                    </div>
                </div>
        </div>
        <div class="card-footer form-actions" id="form-group-buttons">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary float-start me-1 mb-1 mb-sm-0 save-button">{{trans('global.table_save')}}</button>
                    <a href="{{ route("dasbor.mobil.index") }}" class="btn btn-secondary float-end" role="button">{{trans('global.table_cancel')}}</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection