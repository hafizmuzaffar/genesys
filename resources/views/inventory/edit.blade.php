@extends('template.layout')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Inventory</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Inventory</h6>
            </div>
            <div class="card-body">
                <form action="/inventory/{{ $inventory->id }}" method="post">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" class="@error('nama_barang') is-invalid @enderror form-control" id="nama_barang"
                            name="nama_barang" placeholder="nama_barang"
                            value="{{ old('nama_barang', $inventory->nama_barang) }}">
                        @error('nama_barang')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="harga">Harga Barang</label>
                        <input type="number" class="@error('harga') is-invalid @enderror form-control" id="harga"
                            name="harga" placeholder="" value="{{ old('harga', $inventory->harga) }}">
                        @error('harga')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="stock">Stock</label>
                        <input type="number" class="@error('stock') is-invalid @enderror form-control " id="stock"
                            name="stock" placeholder="" value="{{ old('stock', $inventory->stock) }}">
                        @error('stock')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="created_by">Created By</label>
                        <select class="form-control form-select" id="created_by" name="created_by">
                            @foreach ($users as $CreatedBy)
                                @if (old('created_by') == $CreatedBy->id)
                                    <option value="{{ $CreatedBy->id }}">{{ $CreatedBy->name }}</option>
                                @else
                                    <option value="{{ $CreatedBy->id }}">{{ $CreatedBy->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="updated_by">Updated By</label>
                        <select class="form-control form-select" id="updated_by" name="updated_by">
                            @foreach ($users as $UpdatedBy)
                                @if (old('updated_by') == $UpdatedBy->id)
                                    <option value="{{ $UpdatedBy->id }}">{{ $UpdatedBy->name }}</option>
                                @else
                                    <option value="{{ $UpdatedBy->id }}">{{ $UpdatedBy->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
