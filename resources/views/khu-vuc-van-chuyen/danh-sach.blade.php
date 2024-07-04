@extends('layouts')

@section('content')
<div class="card" style="margin-top: 50px;">
    <div class="card-body">
        <h3>Danh sách Khu vực vận chuyển</h3>
        <div style="margin-bottom: 10px;">
            <a href="{{ route('khu-vuc-van-chuyen.them-moi') }}" class="btn btn-primary">Thêm mới</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Đơn hàng ID</th>
                    <th>Tên khu vực</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dsKhuVuc as $khuVuc)
                <tr>
                    <td>{{ $khuVuc->id }}</td>
                    <td>{{ $khuVuc->don_hang_id }}</td>
                    <td>{{ $khuVuc->ten_khu_vuc }}</td>
                    <!-- <td>
                        {{-- <a href="{{ route('khu-vuc-van-chuyen.chi-tiet', ['id' => $khuVuc->id]) }}" class="btn btn-outline-info"><span data-feather="chevrons-right"></span> Chi tiết</a> |
                        <a href="{{ route('khu-vuc-van-chuyen.xoa', ['id' => $khuVuc->id]) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa khu vực này?');" class="btn btn-warning btn-sm"><span data-feather="trash-2"></span> Xóa</a> --}}
                    </td> -->
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $dsKhuVuc->links() }}
    </div>
</div>
@endsection