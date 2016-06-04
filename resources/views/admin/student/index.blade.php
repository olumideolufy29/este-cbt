@extends('layouts.dashboard')

@section('title')
Manajemen Siswa
@endsection

@section('content')
<h3 class="text-center" style="color: #343C47; font-weight: bold;">MANAJEMEN SISWA</h3><br>
 <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-7">
                    <a href="{{action('Admin\StudentController@create')}}" class="btn btn-sm btn-primary btn-create">Tambah Siswa</a>
                  </div>
                  <div class="col col-xs-5 text-right">
                    <input type="search" name="" id="input" class="form-control" value="" required="required" title="" placeholder="Cari Siswa..">
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
					<thead>
					<tr>
					    <th><i class="glyphicon glyphicon-cog"></i></th>
					    <th>NIS</th>
					    <th>Nama</th>
					    <th>Kelas</th>
					    <th>Jenis Kelamin</th>
<!-- 					    <th>Hasil Studi</th> -->
					</tr> 
					</thead>
					<tbody>
						@foreach($students as $student)
						<tr>
						<td align="center">
	                        <form action="{{ url('admin/student-management/'.$student->id) }}" method="POST">
	                            {!! csrf_field() !!}
	                            {!! method_field('DELETE') !!}
								<a href="{{ url('/admin/student-management/'.$student->id.'/edit') }}" class="btn btn-default"><i class="glyphicon glyphicon-pencil"></i></a>
								{{-- <a href="{{ url('/admin/student-management/'.$student->id) }}"class="btn btn-primary"><i class="glyphicon glyphicon-eye-open"></i></a> --}}
	                            <button type="submit" class="btn btn-danger">
	                                <i class="glyphicon glyphicon-trash"></i>
	                            </button>
	                        </form>
						</td>
						<td>{{ $student->user->no_induk }}</td>
						<td>{{ $student->user->name }}</td>
						<td>{{ $student->inClass->name }}</td>
						<td>{{ $student->gender }}</td>
						</tr>
						@endforeach
                    </tbody>
                </table>
            
              </div>
            <div class="panel-footer">
                <div class="row">
					{!! $students->links() !!}	
                </div>
            </div>
        </div>
    </div>
</div>

@endsection