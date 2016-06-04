
@extends('layouts.dashboard')

@section('title')
Tambah Guru
@endsection

@section('content')
<h3 class="text-center" style="color: #343C47; font-weight: bold;">TAMBAH DATA GURU
<br><small style="color: #343C47;">(Isikan kolom berikut dengan benar)</small></h3><br>
<form id="productForm" method="post" class="form-horizontal" action="{{ action('Admin\TeacherController@store') }}">
    {!! csrf_field() !!}
    @include('common.errors')
    <div class="form-group">
        <label class="col-xs-4 control-label">Nomor Induk</label>
        <div class="col-xs-6">
            <input type="text" class="form-control" name="no_induk" placeholder="Masukkan Nomor Induk" value="{{ old('no_induk') }}" required/>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-xs-4 control-label">Nama Guru</label>
        <div class="col-xs-6">
            <input type="text" class="form-control" name="name" placeholder="Masukkan Nama Guru" value="{{ old('name') }}" required />
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-4 control-label">Jenis Kelamin</label>
        <div class="col-xs-6 selectContainer">
            <select class="form-control" name="gender" required>
                <option value="">Pilih Jenis Kelamin</option>
                <?php 
                $genders = ['Laki-laki', 'Perempuan'];
                 ?>
                @foreach($genders as $gender)
                <option value="{{$gender}}" checked>{{$gender}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-4 control-label">Mata Pelajaran</label>
        <div class="col-xs-6 selectContainer">
            <select class="form-control" name="subject" required>
                <option value="">Pilih Mata Pelajaran</option>
                @foreach($subjects as $subject)
                <option value="{{$subject->id}}">{{$subject->name}}</option>
                @endforeach
            </select>
        </div>
    </div>


    <div class="form-group">
        <div class="col-xs-4 col-xs-offset-4">
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">BUAT</button>
        </div>
    </div>

</form>
@endsection