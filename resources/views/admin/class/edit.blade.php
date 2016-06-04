@extends('layouts.dashboard')

@section('title')
Edit Kelas
@endsection

@section('content')
<h3 class="text-center" style="color: #343C47; font-weight: bold;">EDIT DATA KELAS
<br><small style="color: #343C47;">(Isikan kolom berikut dengan benar)</small></h3><br>
<form id="productForm" method="post" class="form-horizontal" action="{{ action('Admin\KelasController@update', $class->id) }}">
    {!! csrf_field() !!}
    {!! method_field('PUT') !!}

    @include('common.errors')
    
    <div class="form-group">
        <label class="col-xs-4 control-label">Nama Kelas</label>
        <div class="col-xs-6">
            <input type="text" class="form-control" name="name" placeholder="Masukkan Nama Kelas" value="{{ $class->name or old('name') }}" required />
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-4 col-xs-offset-4">
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">SIMPAN</button>
        </div>
    </div>

</form>
@endsection