@extends('layouts')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h2 class="h2">THÊM ĐƠN HÀNG MỚI</h2>
</div>
<form method="POST" action="{{ route('don-hang.xu-ly-them-moi') }}">
  @csrf
  <div class="row mt-3">
    <div class="col-md-6">
      <label for="id" class="form-label">ID</label>
      <input type="text" class="form-control" id="id" name="id" required>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col-md-6">
      <label for="khach_hang_ten_dang_nhap" class="form-label">Khách hàng</label>
      <input type="text" class="form-control" id="khach_hang_ten_dang_nhap" name="khach_hang_ten_dang_nhap" required>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col-md-6">
      <label for="ten-don-hang" class="form-label">Tên đơn hàng:</label>
      <input type="text" class="form-control" id="ten-don-hang" name="ten_don_hang" required>
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-md-6">
      <label for="so-dien-thoai" class="form-label">Số điện thoại:</label>
      <input type="text" class="form-control" id="so-dien-thoai" name="so_dien_thoai">
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-md-6">
      <label for="dia-chi" class="form-label">Địa chỉ:</label>
      <input type="text" class="form-control" id="dia-chi" name="dia_chi">
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-md-6">
      <label for="tong-tien" class="form-label">Tổng tiền:</label>
      <input type="number" class="form-control" id="tong-tien" name="tong_tien" step="0.01" required>
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-md-6">
      <label for="khu-vuc-giao-hang" class="form-label">Khu vực giao hàng:</label>
      <input type="text" class="form-control" id="khu-vuc-giao-hang" name="khu_vuc_giao_hang">
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-md-6">
      <label for="phi-van-chuyen" class="form-label">Phí vận chuyển:</label>
      <input type="number" class="form-control" id="phi-van-chuyen" name="phi_van_chuyen" step="0.01">
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-md-6">
      <label for="tong-tien-thanh-toan" class="form-label">Tổng tiền thanh toán:</label>
      <input type="number" class="form-control" id="tong-tien-thanh-toan" name="tong_tien_thanh_toan" step="0.01" required>
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-md-6">
      <label for="ghi-chu" class="form-label">Ghi chú:</label>
      <textarea class="form-control" id="ghi-chu" name="ghi_chu" rows="3"></textarea>
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-md-6">
      <label for="trang-thai" class="form-label">Trạng thái:</label>
      <select name="trang_thai" class="form-select" id="trang-thai">
        <option value="1">Đang xử lý</option>
        <option value="2">Đang giao</option>
        <option value="3">Đã hoàn thành</option>
        <option value="4">Đã hủy</option>
      </select>
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-md-6">
      <label for="phuong-thuc-thanh-toan" class="form-label">Phương thức thanh toán:</label>
      <select name="phuong_thuc_thanh_toan" class="form-select" id="phuong-thuc-thanh-toan">
        <option value="1">Tiền mặt</option>
        <option value="2">Chuyển khoản</option>
        <option value="3">Thẻ ngân hàng</option>
        <option value="4">Ví điện tử</option>
      </select>
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-md-6">
      <label for="trang-thai-thanh-toan" class="form-label">Trạng thái thanh toán:</label>
      <select name="trang_thai_thanh_toan" class="form-select" id="trang-thai-thanh-toan">
        <option value="1">Đã thanh toán</option>
        <option value="2">Chưa thanh toán</option>
      </select>
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-md-6">
      <button type="submit" class="btn btn-primary"><span data-feather="save"></span> Lưu đơn hàng</button>
    </div>
  </div>

</form>

@endsection