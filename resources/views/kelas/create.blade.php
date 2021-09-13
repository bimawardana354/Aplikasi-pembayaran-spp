@extends('template')
 
@section('title')
<div class="float-left">
    <h2><b>Tabel Kelas</b></h2>
</div>
@endsection

@section('body')
<div class="container">
    <div class="row mt-3 mb-5">
        <div class="col-lg-12 margin-tb">
            <div>
                <a class="btn btn-outline-primary" style="width: 200px;" href="{{ route('kelas.index') }}"> Back</a>
            </div>
            <div class="float-left mt-4">
                <h2><b>Create new Class data !</b></h2>
                <hr>
            </div>
        </div>
    </div>
     
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
 
<form action="{{ route('kelas.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
 
     <div class="row container">
        <div class="container">
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" style="width: 600px;">
                    <input type="text" name="namakelas" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Masukkan Nama Kelas">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" style="width: 600px;">
                    <input type="text" name="walikelas" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Masukkan Wali Kelas">
                </div>
            </div>
            <input type="hidden" name="role" value="kelas">
            <!-- <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" style="width: 300px;">
                    <select class="custom-select form-control-border border-width-2" id="role" name="role">
                        <option value="siswa">Siswa</option>
                      </select>
                </div>
            </div> -->
            <div class="col-xs-12 col-sm-12 col-md-12 mt-5">
                <button type="submit" class="btn btn-primary" style="width: 100%;">Create</button>
            </div>
        </div>
    </div>
 
</form>
@endsection

@section('coba2')
    
@endsection