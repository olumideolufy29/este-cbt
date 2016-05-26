@extends('layouts.dashboard')

@section('title')
Buat Soal - {{{$exam->name}}}
@endsection

@section('content')
<h1 class="text-center" style="color: #343C47; font-weight: bold;">
Soal Ujian {{{$exam->subject->name}}}
<br><small style="color: #343C47;">(Nama ujian : {{{$exam->name}}})</small>
<br><small style="color: #343C47;">(Kode ujian : {{{$exam->code}}})</small>
<br><small style="color: #343C47;">(Tipe ujian : {{{$exam->type}}})</small>
<br><small style="color: #343C47;">(Durasi ujian : {{{$exam->duration}}} Menit)</small>
</h1>
<br>

@endsection
