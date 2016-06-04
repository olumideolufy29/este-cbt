@extends('layouts.dashboard')

@section('title')
Edit Mata Pelajaran
@endsection

@section('content')
<h3 class="text-center" style="color: #343C47; font-weight: bold;">EDIT DATA MATA PELAJARAN
<br><small style="color: #343C47;">(Isikan kolom berikut dengan benar)</small></h3><br>
<form id="productForm" method="post" class="form-horizontal" action="{{ action('Admin\TeacherController@update', $teacher->id) }}">
    {!! csrf_field() !!}
    {!! method_field('PUT') !!}

    @include('common.errors')

    <div class="form-group">
        <label class="col-xs-4 control-label">Nomor Induk</label>
        <div class="col-xs-6">
            <input type="text" class="form-control" name="no_induk" placeholder="Masukkan Kode Siswa" value="{{ $teacher->user->no_induk or old('no_induk') }}" disabled />
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-xs-4 control-label">Nama Siswa</label>
        <div class="col-xs-6">
            <input type="text" class="form-control" name="name" placeholder="Masukkan Nama Siswa" value="{{ $teacher->user->name or old('name') }}" required />
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-4 control-label">Jenis Kelamin</label>
        <div class="col-xs-6 selectContainer">
            <select class="form-control" name="gender">
                <option value="">Pilih Jenis Kelamin</option>
                <?php 
                $genders = ['Laki-laki', 'Perempuan'];
                 ?>
                @foreach($genders as $gender)
                @if($gender == $teacher->gender)
                <option value="{{$gender}}" selected>{{$gender}}</option>
                @else
                <option value="{{$gender}}">{{$gender}}</option>
                @endif
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-4 control-label">Kelas</label>
        <div class="col-xs-6 selectContainer">
            <select class="form-control" name="subject" required>
                <option value="">Pilih Kelas</option>
                @foreach($subjects as $subject)
                @if($subject->id == $teacher->subject_id)
                <option value="{{$subject->id}}" selected>{{$subject->name}}</option>
                @else
                <option value="{{$subject->id}}">{{$subject->name}}</option>
                @endif
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-4 col-xs-offset-4">
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">SIMPAN</button>
        </div>
    </div>

</form>
@endsection