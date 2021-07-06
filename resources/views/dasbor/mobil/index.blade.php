@extends("dasbor.layouts.default")
@section('breadcrumbs')
<li class="breadcrumb-item active" aria-current="page">Mobil</li>
@endsection
@section('pageTitle')
<h1>Mobil</h1>
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
							<th scope="col" class="d-none d-md-table-cell nowrap">Plat Nomor</th>
							<th scope="col" class="nowrap">Merek</th>
							<th scope="col" class="d-none d-lg-table-cell nowrap">Tahun</th>
							<th scope="col" class="d-none d-lg-table-cell">Harga Sewa</th>
							<th scope="col" class="d-none d-lg-table-cell">Foto</th>
                            <th scope="col" class="w-5 no-sort" data-orderable="false">{{trans('global.table_edit')}}</th>
                            @if(Gate::allows('mobil_allow'))
                            <th scope="col" class="w-5 no-sort" data-orderable="false"><i class="fas fa-check-double"></i> {{trans('global.table_delete')}}</th>
                            @endIf
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($tableData as $data)
                        <tr>
							<td class="d-none d-md-table-cell nowrap">{{$data->plat_nomor}}</td>
							<td class="nowrap">{{$data->merek_id->merek??""}}</td>
							<td class="d-none d-lg-table-cell nowrap">{{$data->tahun}}</td>
							<td class="d-none d-lg-table-cell">Rp.@php echo number_format($data["harga_sewa"], 0); @endphp</td>
							<td class="d-none d-lg-table-cell">@if (isset($data->foto) && Storage::disk(config("admiko_config.filesystem"))->exists($admiko_data["fileInfo"]["foto"]["original"]["folder"].$data->foto))
                            <a href="{{ Storage::disk(config("admiko_config.filesystem"))->url($admiko_data["fileInfo"]["foto"]["original"]["folder"].$data->foto) }}" target="_blank" class="tableImage">
                                <img src="{{ Storage::disk(config("admiko_config.filesystem"))->url($admiko_data["fileInfo"]["foto"]["original"]["folder"].$data->foto) }}">
                            </a>@endIf</td>
                            <td class="w-5 no-sort"><a href="{{route('dasbor.mobil.edit',[$data->id])}}"><i class="fas fa-edit fa-fw"></i></a></td>
                            @if(Gate::any(['mobil_allow']))
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
                    @if(Gate::any(['mobil_allow']))
                        <a href="{{route('dasbor.mobil.create')}}" class="btn btn-primary" role="button"><i class="fas fa-plus fa-fw"></i> {{trans('global.table_add')}}</a>
                    @endIf
                </div>
                <div class="col-12 col-sm-auto order-0 order-sm-3 pt-3 align-self-center paginationInfo"></div>
                <div class="col-12 col-sm-auto order-0 order-sm-3 pt-3 text-end paginationBox"></div>
            </div>
            @if(Gate::allows('mobil_allow'))
                <div class="row mt-3">
                    <div class="col-12">
                        <p class="mb-1">Multiple Foto upload:</p>
                        <a href="#" class="btn btn-primary dropzoneShow mb-1" role="button"><i class="fas fa-file-upload fa-fw"></i> Upload</a>
                        <div class="dropzoneBox">
                            <div id="dropzone">
                                <form action="{{route('dasbor.mobil.admiko_many_files_store')}}" class="dropzone" id="my-awesome-dropzone">
                                    <div class="dz-message needsclick">
                                        <i class="fas fa-cloud-upload-alt fa-fw"></i><br><i>Drop files here or click to upload.</i>
                                    </div>
                                </form>
                            </div>
                            <p class="mb-0">File size limit: 2 MB. Allowed extension: .jpg,.png,.jpeg. You can select multiple files by holding the "command" key on Mac or "ctrl" key on PC.</p>
                        </div>
                    </div>
                    <script>
                        Dropzone.options.myAwesomeDropzone = {
                            paramName: "foto",
                            parallelUploads: 5,
								maxFilesize:2,
                            addRemoveLinks: true,
                            acceptedFiles:".jpg,.png,.jpeg",
                            uploadMultiple: false,
                            init: function () {
                                this.on('queuecomplete', function () {
                                    window.location.reload();
                                }).on("error", function (file) {
                                    console.log(file);
                                })
                            },
                            headers: {
                                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                            },
                        };
                    </script>
                </div>
            @endIf
        </div>
    </div>
    @if(Gate::allows('mobil_allow'))
    <!-- Delete confirm -->
    <div class="modal fade" id="deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="deleteConfirm" aria-hidden="true">
        <div class="modal-dialog">
            <form method="post" action="{{route("dasbor.mobil.delete")}}">
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