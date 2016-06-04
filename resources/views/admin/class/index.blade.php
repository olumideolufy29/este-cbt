@extends('layouts.dashboard')

@section('title')
Manajemen Kelas
@endsection

@section('content')
<h3 class="text-center" style="color: #343C47; font-weight: bold;">MANAJEMEN KELAS</h3><br>
 <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-7">
                  	@if(auth()->user()->role == 'admin')
                    <a href="{{action('Admin\KelasController@create')}}" class="btn btn-sm btn-primary btn-create">Tambah Kelas</a>
                    @endif
                  </div>

                </div>
              </div>
              <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
					<thead>
					<tr>
                  	@if(auth()->user()->role == 'admin')
					    <th><i class="glyphicon glyphicon-cog"></i></th>
					@endif
					    <th>Nama Kelas</th>
					    <th>Keterangan</th>
					</tr> 
					</thead>
					<tbody>
						@foreach($classs as $class)
						<tr>
                  	@if(auth()->user()->role == 'admin')
						<td align="center">
	                        <form action="{{ url('admin/class-management/'.$class->id) }}" method="POST">
	                            {!! csrf_field() !!}
	                            {!! method_field('DELETE') !!}
								<a href="{{ url('/admin/class-management/'.$class->id.'/edit') }}" class="btn btn-default"><i class="glyphicon glyphicon-pencil"></i></a>
								{{-- <a href="{{ url('/admin/class-management/'.$class->id) }}"class="btn btn-primary"><i class="glyphicon glyphicon-eye-open"></i></a> --}}
	                            <button type="submit" class="btn btn-danger">
	                                <i class="glyphicon glyphicon-trash"></i>
	                            </button>
	                        </form>
						</td>
					@endif
						<td>{{ $class->name }}</td>
						<td>
							<a href="{{ url('/admin/class-management/'.$class->id.'/edit') }}" class="btn btn-default"><i class="glyphicon glyphicon-eye"></i> Lihat Siswa</a>
						</td>
						</tr>
						@endforeach
                    </tbody>
                </table>
            
              </div>
            <div class="panel-footer">
                <div class="row">
					{!! $classs->links() !!}	
                </div>
            </div>
        </div>
    </div>
</div>

@endsection