@extends('layouts.back')

@section('content')
<h2>Tambah Kategori</h2>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">

                <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col mb-3">
                        <label for="name">Nama Kategori</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" />
                        @error('name')
                        <div class="invalid-tooltip">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col mb-3">
                        <label for="fileImage">File Image</label>
                        <input type="file" name="image" id="fileImage">
                        @error('image')
                        <div class="invalid-tooltip">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col">
                        <button class="btn btn-primary btn-block" type="submit">Tambah Kategori</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
