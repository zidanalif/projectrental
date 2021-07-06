@if(Gate::any(['klien_allow', 'klien_edit']))
<li class="nav-item{{ $admiko_data['sideBarActive'] === "klien" ? " active" : "" }}"><a class="nav-link" href="{{route('dasbor.klien.index')}}"><i class="fas fas fa-users fa-fw fa-fw"></i>Klien</a></li>
@endIf
@if(Gate::any(['mobil_allow', 'mobil_edit']))
<li class="nav-item{{ $admiko_data['sideBarActive'] === "mobil" ? " active" : "" }}"><a class="nav-link" href="{{route('dasbor.mobil.index')}}"><i class="fas fas fa-car fa-fw fa-fw"></i>Mobil</a></li>
@endIf
@if(Gate::any(['sewa_allow', 'sewa_edit']))
<li class="nav-item{{ $admiko_data['sideBarActive'] === "sewa" ? " active" : "" }}"><a class="nav-link" href="{{route('dasbor.sewa.index')}}"><i class="fas fas fa-money-check-alt fa-fw fa-fw"></i>Sewa</a></li>
@endIf
@if(Gate::any(['testimoni_allow', 'testimoni_edit']))
<li class="nav-item{{ $admiko_data['sideBarActive'] === "testimoni" ? " active" : "" }}"><a class="nav-link" href="{{route('dasbor.testimoni.index')}}"><i class="fas fas fa-edit fa-fw fa-fw"></i>Testimoni</a></li>
@endIf
@if(Gate::any(['kategori_allow','kategori_edit','merek_allow','merek_edit']))
<li class="nav-item dropdown{{ $admiko_data['sideBarActiveFolder'] === "_opsi" ? " open" : "" }}">
    <a href="#" class="nav-link dropdown-link"><i class="fas fas fa-align-left fa-fw fa-fw"></i>Opsi</a>
    <ul class="nav flex-column dropdown-content" {!! $admiko_data['sideBarActiveFolder'] === "_opsi" ? ' style="display:block"' : '' !!}>
	@if(Gate::any(['kategori_allow', 'kategori_edit']))
		<li class="nav-item{{ $admiko_data['sideBarActive'] === "kategori" ? " active" : "" }}"><a class="nav-link dropdown-item" href="{{route('dasbor.kategori.index')}}"><i class="fas fas fa-braille fa-fw fa-fw"></i>Kategori</a></li>
	@endIf
	@if(Gate::any(['merek_allow', 'merek_edit']))
		<li class="nav-item{{ $admiko_data['sideBarActive'] === "merek" ? " active" : "" }}"><a class="nav-link dropdown-item" href="{{route('dasbor.merek.index')}}"><i class="fas fas fa-directions fa-fw fa-fw"></i>Merek</a></li>
	@endIf
    </ul>
</li>
@endIf