@extends('layouts.dashboard')

@section('title')
Daftar Ujian
@endsection

@section('content')
<h3 class="text-center" style="color: #343C47; font-weight: bold;">Daftar Ujian</h3><br>
 <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-7">
                    <a href="{{action('Make\TestController@create')}}" class="btn btn-sm btn-primary btn-create">Tambah Ujian</a>
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
              <th>Name</th>
              <th>Code</th>
              <th>Duration</th>
              <th>Type</th>
              <th>Subject</th>
              <th>Soal</th>
          </tr> 
          </thead>
          <tbody>
            @foreach($tests as $test)
            <tr>
            <td align="center">
              <form action="{{ url('teacher/test-management/'.$test->id) }}" method="POST">
                  {!! csrf_field() !!}
                  {!! method_field('DELETE') !!}
                    <a href="{{ url('/teacher/test-management/'.$test->id.'/edit') }}" class="btn btn-default"><i class="glyphicon glyphicon-pencil"></i></a>
                  <button type="submit" class="btn btn-danger">
                      <i class="glyphicon glyphicon-trash"></i>
                  </button>
              </form>
            </td>
            <td>{{ $test->name }}</td>
            <td>{{ $test->code }}</td>
            <td>{{ $test->duration }}</td>
            <td>{{ $test->type }}</td>
            <td>{{ $test->subject->name}}</td>
            <td align="center">            
              <form action="{{ url('teacher/question-management/'.$test->id) }}" method="POST">
                  {!! csrf_field() !!}
                  {!! method_field('DELETE') !!}
                    <a href="{{ url('/teacher/question-management/'.$test->id.'/edit') }}" class="btn btn-default"><i class="glyphicon glyphicon-pencil"></i></a>
                  <button type="submit" class="btn btn-danger">
                      <i class="glyphicon glyphicon-trash"></i>
                  </button>
              </form>        
            </td>
            </tr>
            @endforeach
                    </tbody>
                </table>
            
              </div>
            <div class="panel-footer">
                <div class="row">
          {!! $tests->links() !!}  
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
