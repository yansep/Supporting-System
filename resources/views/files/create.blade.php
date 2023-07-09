@extends('layouts.master')

@section('content-header')
    <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#menu1"><b>Input DATA</b></a>
                  </li>
            </ul>

            <div class="tab-content">
                <div id="menu1" class="container tab-pane active"><br>
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title"><b>Input Data</b></h3>
                        </div>
                        <div class="card-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="mb-3">
                                        <label for="PT" class="form-label">PT</label>
                                        <select class="form-control select2" style="width: 100%;" aria-label="Default select example"
                                        name="lokasi_id" data-placeholder="Pilih Status PT" required>
                                        <option selected> </option>
                                            @foreach($lokasis as $pos)
                                                <option value="{{$pos->id}}">{{$pos->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="estate" class="form-label">Estate</label>
                                        <select class="form-control select2" style="width: 100%;" aria-label="Default select example"
                                            name="lokasi_estate_id" data-placeholder="Pilih Status estate" required>
                                            <option selected> </option>
                                                @foreach($estates as $pos)
                                                    <option value="{{$pos->id}}">{{$pos->nama}}</option>
                                                @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="tanggal" class="form-label">Tanggal:</label>
                                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal"
                                        required autofocus value="{{ old('tanggal') }}">

                                        @error('tanggal')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="files"class="form-label">Files:</label><br>
                                        <input type="file" name="files[]" id="files" multiple><br><br>
                                        <button type="submit">Upload</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
