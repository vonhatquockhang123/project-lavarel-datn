@extends('layouts')

@section('content')

<div class="card" style="margin-top: 50px;">
    <div class="card-body">
        <h3>THÊM MỚI KHÁCH HÀNG</h3>
        <form action="{{ route('khach-hang.xu-ly-them-moi') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="ten_dang_nhap" class="form-label">Tên đăng nhập</label>
                <input type="text" class="form-control" id="ten_dang_nhap" name="ten_dang_nhap" value="{{ old('ten_dang_nhap') }}">
            </div>
            <div class="mb-3">
                <label for="mat_khau" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" id="mat_khau" name="mat_khau">
            </div>
            <div class="mb-3">
                <label for="ten_khach_hang" class="form-label">Tên khách hàng</label>
                <input type="text" class="form-control" id="ten_khach_hang" name="ten_khach_hang" value="{{ old('ten_khach_hang') }}">
            </div>
            <div class="mb-3">
                <label for="so_dien_thoai" class="form-label">Số điện thoại</label>
                <input type="text" class="form-control" id="so_dien_thoai" name="so_dien_thoai" value="{{ old('so_dien_thoai') }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            </div>
            <div class="mb-3">
                <label for="dia_chi" class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" id="dia_chi" name="dia_chi" value="{{ old('dia_chi') }}">
            </div>
            <div class="mb-3">
                <label for="anh_dai_dien" class="form-label">Ảnh đại diện</label>
                <input type="file" class="form-control file" id="anh_dai_dien" name="anh_dai_dien">
            </div>
            <div class="mb-3">
                <label for="trang_thai" class="form-label">Trạng thái</label>
                <select class="form-select" id="trang_thai" name="trang_thai">
                    <option value="1">Hoạt động</option>
                    <option value="0">Không hoạt động</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Thêm mới</button>
        </form>
    </div>
</div>

@endsection