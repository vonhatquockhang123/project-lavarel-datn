@extends('layouts')

@section('content')
<div class="container" style="margin-top:50px">
    <div class="card">
        <div class="card-header">
            <h2>Danh Sách Đánh Giá Sách</h2>
        </div>
        <div class="card-body">
            <a href="{{ route('danh-gia-sach.them-moi') }}" class="btn btn-success mb-3">Thêm Đánh Giá Sách Mới</a>
            @if(session('thong_bao'))
                <div class="alert alert-success">{{ session('thong_bao') }}</div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Khách Hàng</th>
                        <th>Sách</th>
                        <th>Đánh Giá</th>
                        <th>Nội Dung</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($danhGiaSachs as $danhGia)
                        <tr>
                            <td>{{ $danhGia->id }}</td>
                            <td>{{ $danhGia->khachHang->name }}</td>
                            <td>{{ $danhGia->sach->ten }}</td>
                            <td>{{ $danhGia->danh_gia }}</td>
                            <td>{{ $danhGia->noi_dung }}</td>
                            <td>
                                <a href="{{ route('danh-gia-sach.cap-nhat', $danhGia->id) }}" class="btn btn-warning">Sửa</a>
                                <form action="{{ route('danh-gia-sach.xoa', $danhGia->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $danhGiaSachs->links() }}
        </div>
    </div>
</div>
@endsection