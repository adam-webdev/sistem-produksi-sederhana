@extends('layouts.layout')
@section('title', 'Jadwal Produksi')
@section('content')
    @include('sweetalert::alert')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Jadwal Produksi </h1>
        <!-- Button trigger modal -->
        @role('Admin')
            <a href="{{ route('jadwal-produksi.create') }}">
                <button type="button" class="btn btn-primary">
                    + Tambah
                </button>
            </a>
        @endrole

    </div>





    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-str6iped table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th>Kode Jadwal Produksi </th>
                            <th>Nama FG </th>
                            <th>Tanggal</th>
                            <th>Jenis Warna Barang </th>
                            <th>Target </th>
                            <th>Satuan </th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $b)
                            <tr align="center">
                                <td>{{ $b->kode_jadwalproduksi }}</td>
                                <td>{{ $b->finishgood->nama_fg }}</td>
                                <td>{{ $b->tanggal }}</td>
                                <td>{{ $b->finishgood->jeniswarna_fg }}</td>
                                <td>{{ $b->jumlah_barang }}</td>
                                <td>{{ $b->finishgood->satuan_fg }}</td>
                                <td align="center" width="10%">
                                    @role('Admin')
                                        <a href="{{ route('jadwal-produksi.edit', [$b->id]) }}" data-toggle="tooltip"
                                            title="Edit" class="d-none  d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                            <i class="fas fa-edit fa-sm text-white-50"></i>
                                        </a>
                                        <a href="/jadwal-produksi/hapus/{{ $b->id }}" data-toggle="tooltip"
                                            title="Hapus" onclick="return confirm('Yakin Ingin menghapus data?')"
                                            class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                            <i class="fas fa-trash-alt fa-sm text-white-50"></i>
                                        </a>
                                    @endrole
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.select').select2({
                tags: true,
                width: 'resolve'
            });

        });
        $(add).on('click', function() {
            $('.add-data').append(`<div class="form-group px-3 mt-2 row child              align-items-center">
                            <div class="col-md-6">
                                <label for="barang">Finish Good :</label>
                                <select style="width:100%" name="finishgood_id[]" id="barang" class="form-control "
                                    required>
                                    <option selected disabled value="">-- Pilih Finish Good --</option>
                                    @foreach ($finishgoods as $fg)
                                        <option value="{{ $fg->id }}">{{ $fg->nama_fg }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="barang">Target Produksi :</label>
                                <input type="number" name="target[]" class="form-control" id="barang" required>
                            </div>
                            <div class="col-md-2 add">
                                <label>Aksi :</label>
                                <button type="button" class="btn btn-sm  delete-child btn-danger">Delete</button>
                            </div>
                        </div>
                         `)
        })
        $(document).on('click', '.delete-child', function() {
            $(this).parents('.child').remove()
        })
    </script>
@endsection
