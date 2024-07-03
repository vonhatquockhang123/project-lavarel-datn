@extends('layouts')

@section('content')
<div class="card" style="margin-top: 50px;">
    <div class="card-body">
        <h3>CẬP NHẬT LOẠI SÁCH</h3>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('loai-sach.xu-ly-cap-nhat', ['id' => $loaiSach->id]) }}" method="POST">
            @csrf
            <div class="form-group">
                <div class="mb-3">
                    <label for="ten_loai_sach">Tên loại sách</label>
                    <input type="text" class="form-control" id="ten_loai_sach" name="ten_loai_sach" value="{{ old('ten_loai_sach', $loaiSach->ten_loai_sach) }}" required>
                </div>
                <div class="mb-3">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $loaiSach->slug) }}" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
</div>
@endsection