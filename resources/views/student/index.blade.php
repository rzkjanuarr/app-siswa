@extends('templates.default')

@php
    $title = "Data Siswa";
    $preTitle = "Semua Data";
@endphp

@push('page-action')
    <a href="{{ route('student.create') }}" class="btn btn-primary">Tambah Data</a>
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
                    @foreach ($student as $student)
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $student->photo) }}" alt="">
                            </td>
                            <td>{{ $student->address }}</td>
                            <td>{{ $student->phone_number }}</td>
                            <td>{{ $student->class }}</td>
                            <td>
                                <a href="{{ route('student.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('student.destroy', $student->id) }}" method="post">
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
