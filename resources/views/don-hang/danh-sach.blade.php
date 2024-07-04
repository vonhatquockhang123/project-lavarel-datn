@extends('layouts')

@section('content')

<div class="card" style="margin-top: 50px;">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Danh sách Đơn Hàng</h3>
            <div class="d-flex align-items-center">
                <form action="{{ route('don-hang.tim-kiem') }}" method="GET" class="form-inline mr-2">
                    <div class="input-group">
                        <input type="text" name="search_name" class="form-control" placeholder="Tìm kiếm..." value="{{ $search ?? '' }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit"><span data-feather="search"></span></button>
                        </div>
                    </div>
                </form>
                <a href="{{ route('don-hang.them-moi') }}" class="btn btn-success"><span data-feather="plus-circle"></span> Thêm mới</a>
            </div>
        </div>
        @if(session('thong_bao'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session('thong_bao') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Khách hàng</th>
                        <th>Admin</th>
                        <th>Tên đơn hàng</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Tổng tiền</th>
                        <th>Khu vực giao hàng</th>
                        <th>Phí vận chuyển</th>
                        <th>Tổng tiền thanh toán</th>
                        <th>Ghi chú</th>
                        <th>Trạng thái</th>
                        <th>Phương thức thanh toán</th>
                        <th>Trạng thái thanh toán</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dsDonHang as $donHang)
                    <tr>
                        <td>{{ $donHang->id }}</td>
                        <td>{{ $donHang->khach_hang_ten_dang_nhap }}</td>
                        <td>{{ $donHang->admin->ten_admin }}</td>
                        <td>{{ $donHang->ten_don_hang }}</td>
                        <td>{{ $donHang->so_dien_thoai }}</td>
                        <td>{{ $donHang->dia_chi }}</td>
                        <td>{{ $donHang->tong_tien }}</td>
                        <td>{{ $donHang->khu_vuc_giao_hang }}</td>
                        <td>{{ $donHang->phi_van_chuyen }}</td>
                        <td>{{ $donHang->tong_tien_thanh_toan }}</td>
                        <td>{{ $donHang->ghi_chu }}</td>
                        <td>
                            @if ($donHang->trang_thai == 1)
                            Đang xử lý
                            @elseif ($donHang->trang_thai == 2)
                            Đang giao
                            @elseif ($donHang->trang_thai == 3)
                            Đã hoàn thành
                            @elseif ($donHang->trang_thai == 4)
                            Đã hủy
                            @endif
                        </td>
                        <td>
                            @if($donHang->phuong_thuc_thanh_toan==1)
                            Tiền Mặt
                            @elseif($donHang->phuong_thuc_thanh_toan==2)
                            Chuyển Khoản
                            @elseif($donHang->phuong_thuc_thanh_toan==3)
                            Thẻ Ngân Hàng
                            @elseif($donHang->phuong_thuc_thanh_toan==4)
                            Ví Điện tử
                            @endif
                        </td>
                        <td>
                            @if ($donHang->trang_thai_thanh_toan == 1)
                            Đã thanh toán
                            @elseif ($donHang->trang_thai_thanh_toan == 2)
                            Chưa thanh toán
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('don-hang.chi-tiet', ['id' => $donHang->id]) }}" class="btn btn-outline-info btn-sm"><span data-feather="chevrons-right"></span> Chi tiết</a>
                            <a href="{{ route('don-hang.xoa', ['id' => $donHang->id]) }}" class="btn btn-outline-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?');"><span data-feather="trash-2"></span> Xóa</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection