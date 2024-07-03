@extends('layouts')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <h3>Thêm mới Phiếu Nhập Hàng</h3>
      <form method="POST" action="{{ route('phieu-nhap-hang.xu-ly-them-moi') }}">
        @csrf
        <div class="form-group">
          <label for="id">ID</label>
          <input type="text" class="form-control" id="id" name="id" required>
        </div>
        <div class="form-group">
          <label for="nha_xuat_ban_id" class="form-label">Nhà Xuất Bản</label>
          <select class="form-select" id="nha_xuat_ban_id" name="nha_xuat_ban_id" required>
            <option value="">Chọn nhà xuất bản</option>
            @foreach($nhaXuatBans as $nhaXuatBan)
            <option value="{{ $nhaXuatBan->id }}">{{ $nhaXuatBan->ten_nha_xuat_ban }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="tong_tien">Tổng tiền</label>
          <input type="number" class="form-control" id="tong_tien" name="tong_tien" required>
        </div>
        <div class="form-group">
          <label for="ghi_chu">Ghi chú</label>
          <textarea class="form-control" id="ghi_chu" name="ghi_chu" rows="3"></textarea>
        </div>
        <div class="form-group">
          <label for="trang_thai">Trạng thái</label>
          <select class="form-control" id="trang_thai" name="trang_thai">
            <option value="0">Chưa xử lý</option>
            <option value="1">Đã xử lý</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Thêm mới</button>
      </form>
      @if ($errors->any())
      <div class="alert alert-danger" style="margin-top: 20px;">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
    </div>
  </div>
</div>
@endsection