@extends('layouts.dashboard')

@section('title')
Dashboard Guru
@endsection

@section('content')
<h1 class="text-center" style="color: #343C47; font-weight: bold;">INFORMASI TEST
<br><small style="color: #343C47;">(Isikan kolom berikut dengan benar)</small></h1><br>

<form id="productForm" action="teacher/submitexam" method="post" class="form-horizontal">


    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! csrf_field() !!}
    <div class="form-group">
        <label class="col-xs-3 control-label">Kode Test</label>
        <div class="col-xs-7">
            <input type="text" class="form-control" name="code_test" placeholder="Kode Test Random" />
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-xs-3 control-label">Nama Test</label>
        <div class="col-xs-7">
            <input type="text" class="form-control" name="name_test" placeholder="Masukkan Nama Test" required />
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-3 control-label">Mata Pelajaran</label>
        <div class="col-xs-7 selectContainer">
            <select class="form-control" name="subject">
                <option value="">Pilih Mata Pelajaran</option>
                <option value="{{{Auth::user()->teacher->subject->id}}}">{{{Auth::user()->teacher->subject->name}}}</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-3 control-label">Tipe Test</label>
        <div class="col-xs-7 selectContainer">
            <select class="form-control" name="type">
                <option value="">Pilih Tipe Test</option>
                <option value="essay">Essay</option>
                <option value="multiple_choice">Pilihan ganda</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-3 control-label">Durasi</label>
        <div class="col-xs-7 selectContainer">
            <select class="form-control" name="duration">
                <option value="">Durasi Test</option>
                <option value="30">30 Menit</option>
                <option value="60">60 Menit</option>
                <option value="90">90 Menit</option>
                <option value="120">120 Menit</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-7 col-xs-offset-3">
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">BUAT</button>
        </div>
    </div>
</form>

@endsection
