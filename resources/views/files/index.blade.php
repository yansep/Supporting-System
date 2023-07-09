@extends('layouts.master')

@section('content-header')

    {{-- <form action="{{ route('files.index') }}" method="GET">
        @csrf
        <input type="date" name="start_date" placeholder="Start Date">
        <input type="date" name="end_date" placeholder="End Date">
        <input type="text" name="keyword" placeholder="Search by file name">

        <button type="submit">Search</button>
    </form> --}}

    {{-- <form class="row row-cols-lg-auto g-1">
        <div class="col">
            <select class="form-control select2" style="width: 100%;" aria-label="Default select example"
            name="lokasi_estate_id">
                <option value="">All Estate</option>
                @foreach ($lokasi_estates as $lokasi_estate)
                @if ($lokasi_estate_id==$lokasi_estate->id)
                    <option value="{{ $lokasi_estate->id }}" selected>{{ $lokasi_estate->nama }}</option>
                @else
                    <option value="{{ $lokasi_estate->id }}">{{ $lokasi_estate->nama }}</option>
                @endif
                @endforeach
            </select>
        </div>

        <div class="col">
            <input class="form-control" type="date" name="start" value="{{ $start }}"/>
        </div>

        <div class="col">
            <input class="form-control" type="date" name="end" value="{{ $end }}"/>
        </div><br>

        <div class="col">
            <input type="text" class="form-control"  name="q" placeholder="Search .." value="{{ $q }}" />
        </div>

        <div class="col">
            <button class="btn btn-success">Refresh</button>
       </div>
    </form> --}}



    <div class="card-body">
        <form class="row row-cols-lg-auto g-1" action="{{ route('files.index') }}" method="GET">
            @if (auth()->user()->FA() || auth()->user()->isAdmin())
                <div class="col">
                    <select name="lokasi_estate_id" class="form-control select2" style="width: 100%;" aria-label="Default select example">
                        <option value="">All Roles</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}"{{ $searchRole == $role->id ? ' selected' : '' }}>
                                {{ $role->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <input class="form-control" type="date" name="startDate" placeholder="Pilih tanggal awal">
                </div>

                <div class="col">
                    <input class="form-control" type="date" name="endDate" placeholder="Pilih tanggal akhir">
                </div>

                <div class="col">
                    <input class="form-control" type="text" name="query" value="{{ $query }}" placeholder="Search by name">
                </div>
            @else
                <div class="col">
                    <input class="form-control" type="date" name="startDate" placeholder="Pilih tanggal awal">
                </div>

                <div class="col">
                    <input class="form-control" type="date" name="endDate" placeholder="Pilih tanggal akhir">
                </div>

                <div class="col">
                    <input class="form-control" type="text" name="query" value="{{ $query }}" placeholder="Search by name">
                </div>
            @endif

                <button class="btn btn-success" type="submit">Cari</button>

        </form>
        <div class="divider"></div>
            @if ($files->isEmpty())
                <p>No files found.</p>
            @else
            <table id="example1" class="table table-bordered table-striped" style = text-align:center role="table" aria-busy="false" aria-colcount="14">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th>Nama PT</th>
                            <th>Nama Estate</th>
                            <th>Tanggal</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($files as $file)
                        <tr>
                            <td style = text-align:left>{{ $file->title }}</td>
                            <td>{{ $file->lokasi->nama }}</td>
                            <td>{{ $file->lokasi_estate->nama }}</td>
                            <td>{{ $file->tanggal }}</td>
                            <td><a href="{{ route('files.download', $file) }}"><i class="fa fa-download"></i></a></td>
                            @if (auth()->user()->FA() || auth()->user()->isAdmin())
                                <td><form action="{{ route('files.destroy', $file->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="border-0"><i class="fa fa-trash-alt fa-lg" style="color: rgb(255, 0, 21)"
                                    onclick="return confirm('Yakin Data ini di hapus?')"></i></button>
                                </form></td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
            </table>
            @endif
    </div>
    {{ $files->links('pagination::bootstrap-5') }}

        <form action="{{ route('files.downloadSelected') }}" method="POST">
            @csrf
            <button type="submit">Download Selected</button>
        </form>

@endsection
