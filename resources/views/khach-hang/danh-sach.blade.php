@extends('layouts')

@section('content')

<div class="card" style="margin-top: 50px;">
    <div class="card-body">
        <h3>Danh sách khách hàng</h3>
        <a href="{{ route('khach-hang.them-moi') }}" class="btn btn-primary">Thêm mới</a>
        <div class="clearfix mb-3">
            <form action="{{ route('khach-hang.tim-kiem') }}" method="GET" class="form-inline float-right">
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
                    <th>Tên đăng nhập</th>
                    <th>Tên khách hàng</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Ảnh đại diện</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dskhachHang as $khachHang)
                <tr>
                    <td>{{ $khachHang->ten_dang_nhap }}</td>
                    <td>{{ $khachHang->ten_khach_hang }}</td>
                    <td>{{ $khachHang->so_dien_thoai }}</td>
                    <td>{{ $khachHang->email }}</td>
                    <td>{{ $khachHang->dia_chi }}</td>
                    <td><img src="{{ asset('storage/' . $khachHang->anh_dai_dien) }}" alt="Avatar" style="width: 100px;"></td>
                    <td>{{ $khachHang->trang_thai ? 'Hoạt động' : 'Không hoạt động' }}</td>
                    <td>
                        @if ($khachHang->ten_dang_nhap)
                            <a href="{{ route('khach-hang.cap-nhat', ['ten_dang_nhap' => $khachHang->ten_dang_nhap]) }}" class="btn btn-primary">Cập nhật</a>
                            <form action="{{ route('khach-hang.xoa', ['ten_dang_nhap' => $khachHang->ten_dang_nhap]) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa khách hàng này không?')">Xóa</button>
                            </form>
                        @else
                            <span class="text-danger">Lỗi: Không tìm thấy ID</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">Không có kết quả tìm kiếm</td>
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