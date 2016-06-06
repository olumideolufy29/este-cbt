@extends('layouts.dashboard')

@section('title')
Dashboard Siswa
@endsection

@section('content')

<div class="text-center" style="margin-top: 40px">
	<img class="center" src="{{url('assets/image/alert.png')}}" width="10%">
</div>

<h3 class="text-center" style="color: #343C47; font-weight: bold;">
	MASUKKAN KODE TEST
	<br><small style="color: #343C47;">
	(Kode test ujian diberikan oleh pengawas ujian)
	</small>
</h3>

<div class="card2 card-container">
	<form class="form-signin" method="post" action="{{action('StudentController@masuk')}}">
    	@include('common.errors')
	    {!! csrf_field() !!}
		<input type="text" name="test_code" id="inputPassword" class="form-control" placeholder="Kode Test" required>
		<button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">MULAI</button>
	</form><!-- /form -->
</div><!-- /card-container -->

@endsection