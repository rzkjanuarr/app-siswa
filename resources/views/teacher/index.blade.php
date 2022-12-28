@extends('templates.default')

@php
    $title = 'Data Guru';
    $preTitle = 'Semua Data';
@endphp

@push('page-action')
    <a href="{{ route('teacher.create') }}" class="btn btn-primary">Tambah Data</a>
@endpush


@section('content')
    <div class="card">
        <div class="table-responsive">
            <table class="table table-vcenter card-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Foto</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Class</th>
                        <th class="w-1"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teacher as $teacher)
                        <tr>
                            <td>{{ $teacher->name }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $teacher->photo) }}" alt="">
                            </td>
                            <td>{{ $teacher->address }}</td>
                            <td>{{ $teacher->phone_number }}</td>
                            <td>{{ $teacher->class }}</td>
                            <td>
                                <a href="{{ route('teacher.edit', $teacher->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('teacher.destroy', $teacher->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Hapus" class="btn btn-danger btn-sm">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
