@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{ url('/home') }}">Home</a></li>
				<li><a href="{{ url('/admin/members') }}">Member</a></li>
				<li class="active">Detail {{ $member->name }}</li>
			</ul>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title">Detail {{ $member->name }}</h2>
				</div>
				<div class="panel-body">
					<p><b>Barang Yang Sedang Dipinjam</b></p>
					<table class="table table-condensed table-striped">
						<thead>
							<tr>
								<td>Judul</td>
								<td>Tanggal Peminjaman</td>
							</tr>
						</thead>
						<tbody>
							@forelse ($member->borrowLogs()->borrowed()->get() as $log)
							<tr>
								<td>{{ $log->barang->title }}</td>
								<td>{{ $log->created_at }}</td>
							</tr>
							@empty
							<tr>
								<td colspan="2">Tidak Ada Data Peminjaman</td>
							</tr>
							@endforelse
						</tbody>
					</table>

					<p><b>Barang Yang Telah Dikembalikan</b></p>
					<table class="table table-condensed table-striped">
						<thead>
							<tr>
								<td>Judul</td>
								<td>Tanggal Kembali</td>
							</tr>
						</thead>
						<tbody>
							@forelse ($member->borrowLogs()->returned()->get() as $log)
							<tr>
								<td>{{ $log->barang->title }}</td>
								<td>{{ $log->updated_at }}</td>
							</tr>
							@empty
							<tr>
								<td colspan="2">Tidak Ada Data Pengembalian</td>
							</tr>
							@endforelse
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection