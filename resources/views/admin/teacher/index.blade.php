@extends('layouts.dashboard')

@section('title')
Manajemen Guru
@endsection

@section('content')
<h3 class="text-center" style="color: #343C47; font-weight: bold;">MANAJEMEN GURU</h3><br>
 <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-7">
                    <a href="{{action('Admin\TeacherController@create')}}" class="btn btn-sm btn-primary btn-create">Tambah Guru</a>
                  </div>
                  <div class="col col-xs-5 text-right">
                    <input type="search" name="" id="input" class="form-control" value="" required="required" title="" placeholder="Cari Mata Pelajaran..">
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
					<thead>
					<tr>
					    <th><i class="glyphicon glyphicon-cog"></i></th>
					    <th>NIP</th>
					    <th>Nama</th>
					    <th>Jenis Kelamin</th>
					    <th>Mata Pelajaran</th>
					</tr> 
					</thead>
					<tbody>
						@foreach($teachers as $teacher)
						<tr>
						<td align="center">
	                        <form action="{{ url('admin/teacher-management/'.$teacher->id) }}" method="POST">
	                            {!! csrf_field() !!}
	                            {!! method_field('DELETE') !!}
								<a href="{{ url('/admin/teacher-management/'.$teacher->id.'/edit') }}" class="btn btn-default"><i class="glyphicon glyphicon-pencil"></i></a>
								{{-- <a href="{{ url('/admin/teacher-management/'.$teacher->id) }}"class="btn btn-primary"><i class="glyphicon glyphicon-eye-open"></i></a> --}}
	                            <button type="submit" class="btn btn-danger">
	                                <i class="glyphicon glyphicon-trash"></i>
	                            </button>
	                        </form>
						</td>
						<td>{{ $teacher->user->no_induk }}</td>
						<td>{{ $teacher->user->name }}</td>
						<td>{{ $teacher->gender }}</td>
						<td>{{ $teacher->subject->name }}</td>
						</tr>
						@endforeach
                    </tbody>
                </table>
            
              </div>
            <div class="panel-footer">
                <div class="row">
					{!! $teachers->links() !!}	
                </div>
            </div>
        </div>
    </div>
</div>

@endsection