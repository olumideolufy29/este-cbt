@extends('layouts.dashboard')

@section('title')
Hasil Ujian {{$test->name}} {{$test->subject->name}}
@endsection

@section('content')
<h3 class="text-center" style="color: #343C47; font-weight: bold;">Hasil Ujian {{$test->name}} {{$test->subject->name}} </h3><br>
 <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-7">

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
              <th>NIS</th>
              <th>Nama</th>
              <th>Kelas</th>
              <th>Nilai</th>
          </tr> 
          </thead>
          <tbody>
            @foreach($results as $result)
            <tr>
            <td>{{ $result->user->no_induk }}</td>
            <td>{{ $result->user->name }}</td>
            <td>{{ $result->user->student or "" }}</td>
            <td>{{ $result->score}}</td>
            </tr>
            @endforeach
                    </tbody>
                </table>
            
              </div>
            <div class="panel-footer">
                <div class="row">
          {!! $results->links() !!}  
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
