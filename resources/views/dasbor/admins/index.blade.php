@extends("dasbor.layouts.default")
@section('breadcrumbs')
    <li class="breadcrumb-item active">{{ trans('global.admins_title') }}</li>
@endsection
@section('pageTitle')
    <h1>{{ trans('global.admins_title') }}</h1>
@endsection
@section('pageInfo')@endsection
@section('backBtn')
    <a href="{{route("dasbor.home")}}"><i class="fas fa-angle-left"></i> {{ trans('global.page_back_btn') }}</a>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="tableBox">
                <div class="row">
                    <div class="col-auto mb-2">
                        <a href="{{route('dasbor.admin_roles.index')}}"><i class="fas fa-cog fa-fw"></i> {{ trans('global.roles_manager') }}</a>
                    </div>
                    <div class="col mb-2 searchTable">
                        <div class="input-group ms-auto">
                            <input type="text" name="admiko_search" class="form-control" placeholder="Search" value="">
                        </div>
                    </div>
                </div>
                <div class="tableLayout">
                    <table class="table" data-dom="tr" data-page-length='-1'>
                        <thead>
                        <tr data-sort-method='thead'>
                            <th scope="col" class="w-5">ID</th>
                            <th scope="col" class="">{{ trans('global.admins_name') }}</th>
                            <th scope="col" class="">{{ trans('global.admins_email') }}</th>
                            <th scope="col" class="">{{ trans('global.admins_role') }}</th>
                            <th scope="col" class="w-5 no-sort" data-orderable="false">{{ trans('global.table_edit') }}</th>
                            <th scope="col" class="w-5 no-sort" data-orderable="false">{{ trans('global.table_delete') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tableData as $data)
                            <tr>
                                <td class="w-5">{{$data->id}}</td>
                                <td class=" nowrap"><a href="{{route('dasbor.admins.edit',$data->id)}}">{{{$data->name}}}</a></td>
                                <td class=" nowrap"><a href="{{route('dasbor.admins.edit',$data->id)}}">{{{$data->email}}}</a></td>
                                <td class=" nowrap">{{$data->adminsRole->title??''}}</td>
                                <td class="w-5 no-sort">
                                    <a href="{{route('dasbor.admins.edit',$data->id)}}"><i class="fas fa-edit fa-fw"></i></a>
                                </td>
                                <td class="w-5 no-sort">
                                    @if($data->id != 1)
                                        <a href="{{route('dasbor.admins.destroy',$data->id)}}" data-id="{{$data->id}}" class="admiko_deleteConfirm" data-bs-toggle="modal" data-bs-target="#deleteConfirm"><i class="fas fa-trash fa-fw"></i></a>
                                    @endIf
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-12 col-sm order-3 order-sm-0 pt-3">
                        <a href="{{route('dasbor.admins.create')}}" class="btn btn-primary" role="button"><i class="fas fa-plus fa-fw"></i> {{ trans('global.table_add') }}</a>
                    </div>
                    <div class="col-12 col-sm-auto order-0 order-sm-3 pt-3 align-self-center paginationInfo"></div>
                    <div class="col-12 col-sm-auto order-0 order-sm-3 pt-3 text-end paginationBox"></div>
                </div>
            </div>
        </div>
        <!-- Delete confirm -->
        <div class="modal fade" id="deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="deleteConfirm" aria-hidden="true">
            <div class="modal-dialog">
                <form method="post" action="{{route("dasbor.admins.delete")}}">
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
    </div>
@endsection
