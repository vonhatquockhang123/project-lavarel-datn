@extends('layouts')

@section('content')
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Cập nhật thông tin Admin</h5>
      <form action="{{ route('xuly.capnhat', $admin->ten_dang_nhap) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
          <div class="col-md-6">
            <label for="ten_admin" class="form-label">Tên admin</label>
            <input type="text" class="form-control" id="ten_admin" name="ten_admin" value="{{ $admin->ten_admin }}">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-6">
            <label for="so_dien_thoai" class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" id="so_dien_thoai" name="so_dien_thoai" value="{{ $admin->so_dien_thoai }}">
          </div>
          <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $admin->email }}">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-6">
            <label for="dia_chi" class="form-label">Địa chỉ</label>
            <input type="text" class="form-control" id="dia_chi" name="dia_chi" value="{{ $admin->dia_chi }}">
          </div>
          <div class="col-md-6">
            <label for="anh_dai_dien" class="form-label">Ảnh đại diện</label>
            <input type="file" class="form-control" id="anh_dai_dien" name="anh_dai_dien">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-6">
            <label for="trang_thai" class="form-label">Trạng thái</label>
            <select class="form-select" id="trang_thai" name="trang_thai">
              <option value="1" {{ old('trang_thai', $admin->trang_thai) == 1 ? 'selected' : '' }}>Hoạt động</option>
              <option value="0" {{ old('trang_thai', $admin->trang_thai) == 0 ? 'selected' : '' }}>Không hoạt động</option>
            </select>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
      </form>
    </div>
</div>
@endsection
