@extends('layout.default')

@section('after_header')
<style>
	.btn { padding: 6px 12px !important; }
	.table > tbody > tr > td {
		vertical-align: middle;
	}
</style>
@stop

@section('content')

	<div class="page-header" id="banner">
		<div class="row text-center">
			<h3>Administration Panel</h3>
		</div>
	</div>
	<div class="container">
		<div class="col-lg-12 col-centered">
			<div class="panel panel-default text-center">
				<div class="panel-body">
					<div class="col-lg-12">
						@include('admin._stats')
					</div>
					
					<div class="col-lg-12">
						<hr>
					</div>
					
					<h3>Daftar Member Terdaftar</h3>
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>Number</th>
								<th>Nama</th>
								<th>Email</th>
								<th>No. Telepon</th>
								<th>Alamat</th>
								<th>Gender</th>
								<th>Type</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach( $members as $member )
							<tr>
								<td>{{ $member->id }}</td>
								<td>{{ $member->fullname }}</td>
								<td>{{ $member->email }}</td>
								<td>{{ $member->phone }}</td>
								<td>{{ $member->address ? : '---' }}</td>
								<td>{{ $member->gender == 'f' ? 'Female' : 'Male' }}</td>
								<td>
									@if( $member->type == 'driver' )
									Delivery Team
									@elseif( $member->type == 'user' )
									Customer
									@else
									Admin
									@endif
								</td>
								<td>
									<div class="btn-group">
									<button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
										Action <span class="caret"></span>
									</button>
									<ul class="dropdown-menu pull-right">
										<li>
											<a href="#"><i class="fa fa-edit"></i> Edit Detail</a>
										</li>
										@if( Auth::user()->id != $member->id )
										<li>
											<a href="#"><i class="fa fa-remove"></i> Hapus</a>
										</li>
										@endif
									</ul>
									</div>
								</td>
							</tr>
							@endforeach
							<tr>
								<td class="text-center" colspan="8">
									{{ $members->links() }}
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

@stop