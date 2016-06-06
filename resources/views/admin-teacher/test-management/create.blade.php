@extends('layouts.dashboard')

@section('title')
Dashboard Guru
@endsection

@section('content')
<h3 class="text-center" style="color: #343C47; font-weight: bold;">TAMBAHKAN UJIAN
<br><small style="color: #343C47;">(Isikan kolom berikut dengan benar)</small></h3><br>

<form id="productForm" action="{{ action('Make\TestController@store') }}" method="post" class="form-horizontal">


    @include('common.errors')

    {!! csrf_field() !!}
    <div class="form-group">
        <label class="col-xs-3 control-label">Kode Test</label>
        <div class="col-xs-7">
            <input type="text" class="form-control" name="code" value="{{ old('code') }}"  placeholder="Masukkan Kode Test" />
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
                @if(auth()->user()->role == 'teacher')
                <option value="{{{Auth::user()->teacher->subject->id}}}" selected>{{{Auth::user()->teacher->subject->name}}}</option>
                @endif
                @if(auth()->user()->role == 'admin')
                @foreach($subjects as $subject)
                <option value="{{$subject->id}}">{{ $subject->name }}</option>
                @endforeach
                @endif
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-3 control-label">Tipe Test</label>
        <div class="col-xs-7 selectContainer">
            <select class="form-control" name="type">
                <option value="">Pilih Tipe Test</option>
                <!-- <option value="essay">Essay</option> -->
                <option value="multiple_choice">Pilihan ganda</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-3 control-label">Durasi (menit)</label>
        <div class="col-xs-7 selectContainer">
            <input type="number" class="form-control" name="duration" placeholder="Masukkan Menit" required />
        </div>
    </div>


    <div class="form-group">
        <div class="col-xs-7 col-xs-offset-3">
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">BUAT</button>
        </div>
    </div>
</form>

@endsection
