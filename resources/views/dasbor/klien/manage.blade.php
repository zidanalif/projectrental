@extends("dasbor.layouts.default")
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route("dasbor.klien.index") }}">Klien</a></li>
    @if(isset($data))
        <li class="breadcrumb-item active" aria-current="page">{{trans('global.page_breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active" aria-current="page">{{trans('global.page_breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('pageTitle')
<h1>Klien</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{ route("dasbor.klien.index") }}"><i class="fas fa-angle-left"></i> {{trans('global.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card formPage">
    <legend class="action">{{ isset($data) ? trans('global.update') : trans('global.add_new') }}</legend>
    <form method="POST" action="{{ $admiko_data['formAction'] }}" enctype="multipart/form-data" class="needs-validation" novalidate>
        @if(isset($data)) @method('PUT') @endIf
        @csrf
        <div class="card-body">
            @if ($errors->any())<div class="row"><div class="col-2"></div><div class="col"><div class="invalid-feedback d-block">@foreach($errors->all() as $error) {{$error}}<br> @endforeach</div></div></div>@endif
            
                <div class="form-group row admiko_separator">
                    <label class="col-12 col-form-label">Data Pribadi</label>
                </div>
                <div class="form-group row">
                    <label for="nik" class="col-sm-2 col-form-label">NIK:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nik" name="nik"  placeholder="NIK"  value="{{{ old('nik', isset($data)?$data->nik : '') }}}">
                        <div class="invalid-feedback @if ($errors->has('nik')) d-block @endif">{{trans('global.required_text')}}</div>
                        <small id="nik_help" class="text-muted"></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama:*</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" required="true" placeholder="Nama"  value="{{{ old('nama', isset($data)?$data->nama : '') }}}">
                        <div class="invalid-feedback @if ($errors->has('nama')) d-block @endif">{{trans('global.required_text')}}</div>
                        <small id="nama_help" class="text-muted"></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_telp" class="col-sm-2 col-form-label">No. Telp:*</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="no_telp" name="no_telp" required="true" placeholder="No. Telp"  value="{{{ old('no_telp', isset($data)?$data->no_telp : '') }}}">
                        <div class="invalid-feedback @if ($errors->has('no_telp')) d-block @endif">{{trans('global.required_text')}}</div>
                        <small id="no_telp_help" class="text-muted"></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat:</label>
                    <div class="col-sm-10">
                        <textarea class="form-control form-control-textarea " id="alamat" name="alamat"  placeholder="Alamat">{{{ old('alamat', isset($data)?$data->alamat : '') }}}</textarea>
                        <div class="invalid-feedback @if ($errors->has('alamat')) d-block @endif">{{trans('global.required_text')}}</div>
                        <small id="alamat_help" class="text-muted"></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-sm-2 pt-0">Jenis Kelamin:</label>
                    <div class="col-sm-10">
                        @foreach($jenis_kelamin_all as $id => $value)
                            @php $checked = ""; @endphp
                            @if(old('jenis_kelamin') == $id)
                                @php $checked = "checked"; @endphp
                            @elseIf(isset($data) && $data->jenis_kelamin == $id)
                                @php $checked = "checked"; @endphp
                            
                            @endIf
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="jenis_kelamin" id="jenis_kelamin{{ $id }}" value="{{ $id }}" {{$checked}} >
                            <label class="form-check-label" for="jenis_kelamin{{ $id }}">{{ $value }}</label>
                        </div>
                        @endforeach
                        <div class="invalid-feedback @if ($errors->has('jenis_kelamin')) d-block @endif">{{trans('global.required_text')}}</div>
                        <small id="jenis_kelamin_help" class="text-muted"></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="foto_diri" class="col-sm-2 col-form-label">Foto Diri:*</label>
                    <div class="col-sm-10">
                        @if (isset($data->foto_diri) && Storage::disk(config("admiko_config.filesystem"))->exists($admiko_data['fileInfo']["foto_diri"]['original']["folder"].$data->foto_diri))
                        <a href="{{ Storage::disk(config("admiko_config.filesystem"))->url($admiko_data['fileInfo']["foto_diri"]['original']["folder"].$data->foto_diri) }}" target="_blank" class="tableImage">
                                <img src="{{ Storage::disk(config("admiko_config.filesystem"))->url($admiko_data['fileInfo']["foto_diri"]['original']["folder"].$data->foto_diri) }}">
                            </a><br>

                        @endif
                        <input type="file" class="imageUpload mt-1" id="foto_diri" accept=".jpg,.png,.jpeg" data-type=".jpg,.png,.jpeg" data-size="2" name="foto_diri" @if(!isset($data)) required="true" @endIf data-selected="{{trans('global.selected_image_preview')}}" >
                        <div class="invalid-feedback @if ($errors->has('foto_diri')) d-block @endif" data-required="{{trans('global.required_image')}}" data-size="{{trans('global.required_size')}}" data-type="{{trans('global.required_type')}}">
                            @if ($errors->has('foto_diri')){{ $errors->first('foto_diri') }}@endif
                        </div>
                        <small id="foto_diri_help" class="text-muted">{{trans("global.file_size_limit")}}2 MB. {{trans("global.file_extension_limit")}}.jpg,.png,.jpeg. {{trans("global.recommended")}}{{trans("global.width")}}1024px, {{trans("global.height")}}768px. {{trans("global.image_action")}}{{trans("global.image_action_resize")}}.</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="foto_ktp" class="col-sm-2 col-form-label">Foto KTP:*</label>
                    <div class="col-sm-10">
                        @if (isset($data->foto_ktp) && Storage::disk(config("admiko_config.filesystem"))->exists($admiko_data['fileInfo']["foto_ktp"]['original']["folder"].$data->foto_ktp))
                        <a href="{{ Storage::disk(config("admiko_config.filesystem"))->url($admiko_data['fileInfo']["foto_ktp"]['original']["folder"].$data->foto_ktp) }}" target="_blank" class="tableImage">
                                <img src="{{ Storage::disk(config("admiko_config.filesystem"))->url($admiko_data['fileInfo']["foto_ktp"]['original']["folder"].$data->foto_ktp) }}">
                            </a><br>

                        @endif
                        <input type="file" class="imageUpload mt-1" id="foto_ktp" accept=".jpg,.png,.jpeg" data-type=".jpg,.png,.jpeg" data-size="2" name="foto_ktp" @if(!isset($data)) required="true" @endIf data-selected="{{trans('global.selected_image_preview')}}" >
                        <div class="invalid-feedback @if ($errors->has('foto_ktp')) d-block @endif" data-required="{{trans('global.required_image')}}" data-size="{{trans('global.required_size')}}" data-type="{{trans('global.required_type')}}">
                            @if ($errors->has('foto_ktp')){{ $errors->first('foto_ktp') }}@endif
                        </div>
                        <small id="foto_ktp_help" class="text-muted">{{trans("global.file_size_limit")}}2 MB. {{trans("global.file_extension_limit")}}.jpg,.png,.jpeg. {{trans("global.recommended")}}{{trans("global.width")}}1024px, {{trans("global.height")}}768px. {{trans("global.image_action")}}{{trans("global.image_action_resize")}}.</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="perusahaan" class="col-sm-2 col-form-label">Perusahaan:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="perusahaan" name="perusahaan"  placeholder="Perusahaan"  value="{{{ old('perusahaan', isset($data)?$data->perusahaan : '') }}}">
                        <div class="invalid-feedback @if ($errors->has('perusahaan')) d-block @endif">{{trans('global.required_text')}}</div>
                        <small id="perusahaan_help" class="text-muted"></small>
                    </div>
                </div>
                <div class="form-group row admiko_separator">
                    <label class="col-12 col-form-label">Data User</label>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email:*</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" required="true" placeholder="Email"  value="{{{ old('email', $data->email??'') }}}">
                        <div class="invalid-feedback @if ($errors->has('email')) d-block @endif">{{trans('global.required_text')}}</div>
                        <small id="email_help" class="text-muted"></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sandi" class="col-sm-2 col-form-label">Sandi:*</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="sandi" name="sandi" required="true" placeholder="Sandi"  value="">
                        @if ($errors->has('sandi'))<div class="invalid-feedback d-block">{{ $errors->first('sandi') }}</div>@endif
                        <div class="invalid-feedback @if ($errors->has('sandi')) d-block @endif">{{trans('global.required_text')}}</div>
                        <small id="sandi_help" class="text-muted"></small>
                    </div>
                </div>
        </div>
        <div class="card-footer form-actions" id="form-group-buttons">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary float-start me-1 mb-1 mb-sm-0 save-button">{{trans('global.table_save')}}</button>
                    <a href="{{ route("dasbor.klien.index") }}" class="btn btn-secondary float-end" role="button">{{trans('global.table_cancel')}}</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection