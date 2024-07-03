@extends('layouts')
@section('content')
<div class="card" style="margin-top:50px">
  <div class="card-body">
    <h3>Danh sách Phiếu Nhập Hàng</h3>
    <a href="{{ route('phieu-nhap-hang.them-moi') }}"><button type="button" class="btn btn-secondary">Thêm mới</button></a>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nhà xuất bản</th>
          <th>Tên người nhập hàng</th>
          <th>Tổng tiền</th>
          <th>Ghi chú</th>
          <th>Trạng thái</th>
          <th>Thao tác</th>
        </tr>
      </thead>
      <tbody>
        @foreach($DSPhieuNhapHang as $phieuNhapHang)
        <tr>
          <td>{{ $phieuNhapHang->id }}</td>
          <td>{{ $phieuNhapHang->nha_xuat_ban_id }}</td>
          <td>{{$phieuNhapHang->admin->ten_admin}}</td>
          <td>{{ $phieuNhapHang->tong_tien }}</td>
          <td>{{ $phieuNhapHang->ghi_chu }}</td>
          <td>{{ $phieuNhapHang->trang_thai ? 'Đã xử lý' : 'Chưa xử lý' }}</td>
          <td>
          <a href="{{ route('phieu-nhap-hang.chi-tiet', ['id' => $phieuNhapHang->id]) }}" class="btn btn-outline-info"><span data-feather="chevrons-right"></span>Chi tiết</a>|
            <a href="{{ route('phieu-nhap-hang.xoa', ['id' => $phieuNhapHang->id]) }}"><button type="button" class="btn btn-warning btn-sm">Xóa</button></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{ $DSPhieuNhapHang->links() }}
  </div>
</div>
@endsection