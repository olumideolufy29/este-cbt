@extends('layouts.dashboard')

@section('title')
Manajemen Soal
@endsection

@section('content')
<h3 class="text-center" style="color: #343C47; font-weight: bold;">MANAJEMEN SOAL </h3>
<p></p>
<br>
 <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-7">
                    <a href="{{action('Make\QuestionsController@create',$id_test)}}" class="btn btn-sm btn-primary btn-create">Tambah Soal</a>
                  </div>
                  <div class="col col-xs-5 text-right">
                    <input type="search" name="" id="input" class="form-control" value="" required="required" title="" placeholder="Cari Soal..">
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
					<thead>
					<tr>
					    <th><i class="glyphicon glyphicon-cog"></i></th>
					    <th>Soal</th>
					    <th>Kunci Jawaban</th>
					</tr> 
					</thead>
					<tbody>
						@foreach($questions as $question)
						<tr>
						<td align="center">
	                        <form action="{{ url('test-management/'.$id_test.'questions/'.$question->id) }}" method="POST">
	                            {!! csrf_field() !!}
	                            {!! method_field('DELETE') !!}
								<a href="{{ url('/test-management/'.$id_test.'questions/'.$question->id.'/edit') }}" class="btn btn-default"><i class="glyphicon glyphicon-pencil"></i></a>
								{{-- <a href="{{ url('/admin/test-management/'.$id_test) }}"class="btn btn-primary"><i class="glyphicon glyphicon-eye-open"></i></a> --}}
	                            <button type="submit" class="btn btn-danger">
	                                <i class="glyphicon glyphicon-trash"></i>
	                            </button>
	                        </form>
						</td>
						<td><b>{{ $question->question }}</b>
							<br/>a. {{ $question->a }}
							<br/>b. {{ $question->b }}
							<br/>c. {{ $question->c }}
							<br/>d. {{ $question->d }}
							<br/>e. {{ $question->e }}
						</td>
						<td>{{ $question->correct_answer }}</td>
						<td>
							<a href="{{ url('/test-management/'.$id_test.'/questions') }}" class="btn btn-default"><i class="glyphicon  glyphicon-eye-open"></i> Lihat Soal</a>
							
						</td>
						</tr>
						@endforeach
                    </tbody>
                </table>
            
              </div>
            <div class="panel-footer">
                <div class="row">
					{!! $questions->links() !!}	
                </div>
            </div>
        </div>
    </div>
</div>

@endsection