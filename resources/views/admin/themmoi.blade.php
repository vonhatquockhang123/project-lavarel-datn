@extends('layouts')

@section('content')

<div class="card">
    <div class="card-body">
        <h3>THÊM MỚI ADMIN</h3>
        <form action="{{ route('xuly.themmoi') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Tên đăng nhập</label>
                        <input type="text" class="form-control" name="ten_dang_nhap">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Mật khẩu</label>
                        <input type="text" class="form-control" name="mat_khau">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Tên admin</label>
                        <input type="text" class="form-control" name="ten_admin">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="inputPhoneNumber" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" name="so_dien_thoai">
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email">
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="inputAddress" class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control" name="dia_chi">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="trang_thai" class="form-label">Trạng thái</label>
                        <select class="form-select" id="trang_thai" name="trang_thai">
                            <option value="1">Hoạt động</option>
                            <option value="0">Không hoạt động</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="inputAvatar" class="form-label">Ảnh đại diện</label>
                        <input type="file" class="form-control" name="anh_dai_dien">
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection