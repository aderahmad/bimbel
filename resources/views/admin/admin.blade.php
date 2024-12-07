@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" style="background-color:#9900cc;color:white;">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{route('admin.form-input')}}"><button class="btn btn-primary">Buat Pesanan</button></a><br />
                    <table class="table table-hover">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Paket Bimbel</th>
                            <th>kategori Pelajaran</th>
                            <th>Aksi</th>
                        </tr>
                        
                            @php $no=1 @endphp
                            @foreach ($pesanan as $row)
                            <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->paket }}</td>
                            <td>{{ $row->kategori }}</td>
                            <td>
                            <a href="{{ route('admin.form-edit', $row->id) }}"><button class="btn btn-success">Edit</button></a>
                            <a href="{{ route('admin.delete', $row->id) }}"><button class="btn btn-danger" onClick="return confirm('Hapus pesanan user?')">Delete</button></a>
                            </td>
                            </tr>
                            @endforeach
                            
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
