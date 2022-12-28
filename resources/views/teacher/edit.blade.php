@extends('templates.default')

@php
    $title = "Teacher";
    $preTitle = "Edit Data";
@endphp

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('teacher.update', $teacher->id) }}" class="" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name"
                        class="form-control @error('name')
                            is-invalid
                        @enderror"
                        name="example-text-input" placeholder="Isi aja ngab" value="{{ old('name') ?? $teacher->name }}">
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <input type="text" name="address"
                        class="form-control @error('address')
                            is-invalid
                        @enderror"
                        name="example-text-input" placeholder="Isi aja ngab"
                        value="{{ old('address') ?? $teacher->address }}">
                    @error('address')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Nomer Telpon</label>
                    <input type="text" name="phone_number"
                        class="form-control @error('phone_number')
                            is-invalid
                        @enderror"
                        name="example-text-input" placeholder="Isi aja ngab"
                        value="{{ old('phone_number') ?? $teacher->phone_number }}">
                    @error('phone_number')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Kelas</label>
                    <input type="text" name="class"
                        class="form-control @error('class')
                            is-invalid
                        @enderror"
                        name="example-text-input" placeholder="Isi aja ngab" value="{{ old('class') ?? $teacher->class }}">
                    @error('class')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Tombol Simpan -->
                <div class="mb-3">
                    <input type="submit" value="Simpan" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection
