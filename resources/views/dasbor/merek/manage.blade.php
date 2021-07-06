@extends("dasbor.layouts.default")
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route("dasbor.merek.index") }}">Merek</a></li>
    @if(isset($data))
        <li class="breadcrumb-item active" aria-current="page">{{trans('global.page_breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active" aria-current="page">{{trans('global.page_breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('pageTitle')
<h1>Merek</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{ route("dasbor.merek.index") }}"><i class="fas fa-angle-left"></i> {{trans('global.page_back_btn')}}</a>
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
                    <label for="merek" class="col-sm-2 col-form-label">Merek:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="merek" name="merek"  placeholder="Merek"  value="{{{ old('merek', isset($data)?$data->merek : '') }}}">
                        <div class="invalid-feedback @if ($errors->has('merek')) d-block @endif">{{trans('global.required_text')}}</div>
                        <small id="merek_help" class="text-muted"></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="manufaktur" class="col-sm-2 col-form-label">Manufaktur:*</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="manufaktur" name="manufaktur" required="true">
                            
                            @foreach($manufaktur_all as $id => $value)
                                <option value="{{ $id }}" {{ (old('manufaktur') ? old('manufaktur') : $data->manufaktur ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback @if ($errors->has('manufaktur')) d-block @endif">{{trans('global.required_text')}}</div>
                        <small id="manufaktur_help" class="text-muted"></small>
                    </div>
                </div>

        </div>
        <div class="card-footer form-actions" id="form-group-buttons">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary float-start me-1 mb-1 mb-sm-0 save-button">{{trans('global.table_save')}}</button>
                    <a href="{{ route("dasbor.merek.index") }}" class="btn btn-secondary float-end" role="button">{{trans('global.table_cancel')}}</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection