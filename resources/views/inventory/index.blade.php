@extends('template.layout')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Inventory</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID Inventory</th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Stock</th>
                                <th>Created By</th>
                                <th>Updated By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inventorys as $inventory)
                                <tr>
                                    <td>{{ $inventory->id_inventory }}</td>
                                    <td>{{ $inventory->nama_barang }}</td>
                                    <td>{{ $inventory->harga }}</td>
                                    <td>{{ $inventory->stock }}</td>
                                    <td>{{ $inventory->CreatedBy->name }}</td>
                                    <td>{{ $inventory->UpdatedBy->name }}</td>
                                    <td>
                                        <a href="{{ route('inventory.edit', $inventory->id) }}"
                                            class="btn btn-primary">Edit</a>
                                        <form action="{{ route('inventory.destroy', $inventory->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <a href="/inventory/create" class="btn btn-primary"> Add a new Inventory</a>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
