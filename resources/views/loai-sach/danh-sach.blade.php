@extends('layouts')

@section('content')

<div class="card" style="margin-top: 50px;">
    <div class="card-body">
        <h3>Danh sách loại sách</h3>
        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('loai-sach.them-moi') }}" class="btn btn-primary">Thêm mới</a>
            <form action="{{ route('loai-sach.tim-kiem') }}" method="GET" class="form-inline">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Tìm kiếm" value="{{ request()->search }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="fa fa-search text-secondary"></i> 
                    </button>
                </div>
                </div>
            </form>
        </div>

        @if (session('thong_bao'))
            <div class="alert alert-success">{{ session('thong_bao') }}</div>
        @endif

        @if (isset($errorMessage))
            <div class="alert alert-danger">{{ $errorMessage }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên loại sách</th>
                    <th>Slug</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dsLoaiSach as $loaiSach)
                <tr>
                    <td>{{ $loaiSach->id }}</td>
                    <td>{{ $loaiSach->ten_loai_sach }}</td>
                    <td>{{ $loaiSach->slug }}</td>
                    <td>
                        <a href="{{ route('loai-sach.cap-nhat', ['id' => $loaiSach->id]) }}" class="btn btn-primary">Cập nhật</a>
                        <a href="{{ route('loai-sach.xoa', ['id' => $loaiSach->id]) }}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa loại sách này không?')">Xóa</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $dsLoaiSach->links() }} 

    </div>
</div>

<style>
    .input-group .form-control {
        width: 200px;
    }

    .input-group-append .btn {
        padding: 0.375rem 0.75rem;
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }

    .input-group-append .btn i {
        font-size: 1rem;
        color: #6c757d;
    }

    .input-group-append .btn:hover i {
        color: #6c757d;
    }
</style>

@endsection