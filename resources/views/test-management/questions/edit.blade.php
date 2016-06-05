@extends('layouts.dashboard')

@section('title')
Edit Ujian
@endsection

@section('content')
<h3 class="text-center" style="color: #343C47; font-weight: bold;">EDIT DATA UJIAN
<br><small style="color: #343C47;">(Isikan kolom berikut dengan benar)</small></h3><br>
<form id="productForm" method="post" class="form-horizontal" action="{{ action('Make\TestController@update', $test->id) }}">
    {!! csrf_field() !!}
    {!! method_field('PUT') !!}

    @include('common.errors')
    <div class="form-group">
        <label class="col-xs-3 control-label">Nama Test</label>
        <div class="col-xs-7">
            <input type="text" class="form-control" name="name" placeholder="Masukkan Nama Test" required value="{{ $test->name or old('name') }}" />
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-3 control-label">Mata Pelajaran</label>
        <div class="col-xs-7 selectContainer">
            <select class="form-control" name="subject_id">
                <option value="">Pilih Mata Pelajaran</option>
                @if(auth()->user()->role == 'teacher')
                <option value="{{{Auth::user()->teacher->subject->id}}}" selected>{{{Auth::user()->teacher->subject->name}}}</option>
                @endif
                @if(auth()->user()->role == 'admin')
                @foreach($subjects as $subject)
                @if($subject->id == $test->subject_id)
                <option value="{{$subject->id}}" selected>{{ $subject->name }}</option>
                @else
                <option value="{{$subject->id}}">{{ $subject->name }}</option>
                @endif
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
                <option value="essay">Essay</option>
                <option value="multiple_choice">Pilihan ganda</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-3 control-label">Durasi (menit)</label>
        <div class="col-xs-7 selectContainer">
            <input type="number" class="form-control" name="duration" placeholder="Masukkan Menit" required value="{{ $test->duration or old('duration') }}" />
        </div>
    </div>


    <div class="form-group">
        <div class="col-xs-4 col-xs-offset-4">
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">SIMPAN</button>
        </div>
    </div>

</form>
@endsection