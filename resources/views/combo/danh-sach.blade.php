@extends('layouts')

@section('content')

<div class="card mt-4">
    <div class="card-body">
        <h3>Danh sách Combo</h3>
        <a href="{{ route('combo.them-moi') }}" class="btn btn-secondary">Thêm mới</a>
        <div class="clearfix mb-3">
            <form action="{{ route('combo.tim-kiem') }}" method="GET" class="form-inline float-right">
                <div class="input-group">
                    <input type="text" name="search_name" class="form-control" placeholder="Tìm kiếm..." value="{{ request('search_name') }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" style="padding: 0.375rem 0.5rem;">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        @if (session('thong_bao'))
            <div class="alert alert-success">{{ session('thong_bao') }}</div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên combo</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Hình ảnh</th>
                    <th>Mô tả</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($DSCombo as $combo)
                <tr>
                    <td>{{ $combo->id }}</td>
                    <td>{{ $combo->ten_combo }}</td>
                    <td>{{ $combo->gia }}</td>
                    <td>{{ $combo->so_luong }}</td>
                    <td><img src="{{ asset('storage/' . $combo->hinh_anh) }}" alt="Hình ảnh combo" style="width: 100px;"></td>
                    <td>{{ $combo->mo_ta }}</td>
                    <td>
                        <a href="{{ route('combo.cap-nhat', ['id' => $combo->id]) }}" class="btn btn-primary">Cập nhật</a>
                        <form action="{{ route('combo.xoa', ['id' => $combo->id]) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa combo này không?')">Xóa</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Không có kết quả tìm kiếm</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<style>
    .input-group .form-control {
        width: 200px; 
    }

    .input-group-append .btn {
        padding: 0.375rem 0.5rem;
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