@extends("dasbor.layouts.default")
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route("dasbor.testimoni.index") }}">Testimoni</a></li>
    @if(isset($data))
        <li class="breadcrumb-item active" aria-current="page">{{trans('global.page_breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active" aria-current="page">{{trans('global.page_breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('pageTitle')
<h1>Testimoni</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{ route("dasbor.testimoni.index") }}"><i class="fas fa-angle-left"></i> {{trans('global.page_back_btn')}}</a>
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
                    <label for="klien" class="col-sm-2 col-form-label">Klien:</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="klien" name="klien" >
                            <option value="">{{trans("global.select")}}</option>
                            @foreach($klien_all as $id => $value)
                                <option value="{{ $id }}" {{ (old('klien') ? old('klien') : $data->klien ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback @if ($errors->has('klien')) d-block @endif">{{trans('global.required_text')}}</div>
                        <small id="klien_help" class="text-muted"></small>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="komentar" class="col-sm-2 col-form-label">Komentar:</label>
                    <div class="col-sm-10">
                        <textarea class="form-control form-control-textarea " id="komentar" name="komentar"  placeholder="Komentar">{{{ old('komentar', isset($data)?$data->komentar : '') }}}</textarea>
                        <div class="invalid-feedback @if ($errors->has('komentar')) d-block @endif">{{trans('global.required_text')}}</div>
                        <small id="komentar_help" class="text-muted"></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-sm-2 pt-0">Rating:</label>
                    <div class="col-sm-10">
                        @foreach($rating_all as $id => $value)
                            @php $checked = ""; @endphp
                            @if(old('rating') == $id)
                                @php $checked = "checked"; @endphp
                            @elseIf(isset($data) && $data->rating == $id)
                                @php $checked = "checked"; @endphp
                            
                            @endIf
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="rating" id="rating{{ $id }}" value="{{ $id }}" {{$checked}} >
                            <label class="form-check-label" for="rating{{ $id }}">{{ $value }}</label>
                        </div>
                        @endforeach
                        <div class="invalid-feedback @if ($errors->has('rating')) d-block @endif">{{trans('global.required_text')}}</div>
                        <small id="rating_help" class="text-muted"></small>
                    </div>
                </div>
        </div>
        <div class="card-footer form-actions" id="form-group-buttons">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary float-start me-1 mb-1 mb-sm-0 save-button">{{trans('global.table_save')}}</button>
                    <a href="{{ route("dasbor.testimoni.index") }}" class="btn btn-secondary float-end" role="button">{{trans('global.table_cancel')}}</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection