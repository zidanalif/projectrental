@extends("dasbor.layouts.default")
@section('breadcrumbs')
<li class="breadcrumb-item active" aria-current="page">Merek</li>
@endsection
@section('pageTitle')
<h1>Merek</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{route("dasbor.home")}}"><i class="fas fa-angle-left"></i> {{trans('global.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <div class="tableBox">
            <div class="row">
                <div class="col-auto lengthTable"></div>
                <div class="col searchTable">
					<div class="input-group ms-auto">
                        <input type="text" name="admiko_search" class="form-control" placeholder="Search" value="">
                    </div>
                </div>
            </div>
            <div class="tableLayout">
                <table class="table tableSort" data-dom="ltrip">
                    <thead>
                        <tr data-sort-method='thead'>
							<th scope="col" class="w-5">ID</th>
							<th scope="col" class="nowrap">Merek</th>
                            <th scope="col" class="w-5 no-sort" data-orderable="false">{{trans('global.table_edit')}}</th>
                            @if(Gate::allows('merek_allow'))
                            <th scope="col" class="w-5 no-sort" data-orderable="false"><i class="fas fa-check-double"></i> {{trans('global.table_delete')}}</th>
                            @endIf
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($tableData as $data)
                        <tr>
							<td class="w-5"><a href="{{route("dasbor.merek.edit",[$data->id])}}">{{$data->id}}</a></td>
							<td class="nowrap">{{$data->merek}}</td>
                            <td class="w-5 no-sort"><a href="{{route('dasbor.merek.edit',[$data->id])}}"><i class="fas fa-edit fa-fw"></i></a></td>
                            @if(Gate::any(['merek_allow']))
                            <td class="w-5 no-sort">
                            <a href="#" data-id="{{$data->id}}" class="admiko_deleteConfirm" data-bs-toggle="modal" data-bs-target="#deleteConfirm"><i class="fas fa-trash fa-fw"></i></a>
                        </td>
                            @endIf
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-12 col-sm order-3 order-sm-0 pt-3">
                    @if(Gate::any(['merek_allow']))
                        <a href="{{route('dasbor.merek.create')}}" class="btn btn-primary" role="button"><i class="fas fa-plus fa-fw"></i> {{trans('global.table_add')}}</a>
                    @endIf
                </div>
                <div class="col-12 col-sm-auto order-0 order-sm-3 pt-3 align-self-center paginationInfo"></div>
                <div class="col-12 col-sm-auto order-0 order-sm-3 pt-3 text-end paginationBox"></div>
            </div>
        </div>
    </div>
    @if(Gate::allows('merek_allow'))
    <!-- Delete confirm -->
    <div class="modal fade" id="deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="deleteConfirm" aria-hidden="true">
        <div class="modal-dialog">
            <form method="post" action="{{route("dasbor.merek.delete")}}">
            @method('DELETE')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{trans('global.delete_confirm')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">{{trans('global.delete_message')}}</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{trans('global.delete_close_btn')}}</button>
                    <button type="submit" class="btn btn-danger deleteSoft">{{trans('global.delete_delete_btn')}}</button>
                </div>
            </div>
            <div class="dataDelete"></div>
            </form>
        </div>
    </div>
    @endIf
    
</div>
@endsection