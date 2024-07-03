@extends('layouts')

@section('content')

<div class="card" style="margin-top: 50px;">
    <div class="card-body">
        <h3>Danh sách Sách</h3>
        <a href="{{ route('sach.them-moi') }}"><button type="button" class="btn btn-secondary">Thêm mới</button></a>
        <form action="{{ route('sach.tim-kiem') }}" method="GET" class="form-inline">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Tìm kiếm" value="{{ request()->search }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="fa fa-search text-secondary"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Loại sách</th>
                <th>Nhà xuất bản</th>
                <th>Tên sách</th>
                <th>Ngày phát hành</th>
                <th>Giá</th>
                <th>Giá sách điện tử</th>
                <th>Số lượng</th>
                <th>Mô tả</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sachs as $sach)
            <tr>
                <td>{{ $sach->id }}</td>
                <td>{{ isset($sach->loaiSach) ? $sach->loaiSach->ten_loai_sach : 'N/A' }}</td>
                <td>{{ isset($sach->nhaXuatBan) ? $sach->nhaXuatBan->ten_nha_xuat_ban : 'N/A' }}</td>
                <td>{{ $sach->ten_sach }}</td>
                <td>{{ $sach->ngay_phat_hanh }}</td>
                <td>{{ $sach->gia }}</td>
                <td>{{ $sach->gia_sach_dien_tu }}</td>
                <td>{{ $sach->so_luong }}</td>
                <td>{{ $sach->mo_ta }}</td>
                <td>
                    <a href="{{ route('sach.cap-nhat', ['id' => $sach->id]) }}" class="btn btn-danger btn-sm">Sửa</a>
                    <a href="{{route('sach.xoa', ['id'=>$sach->id])}}"><button type="submit" class="btn btn-warning btn-sm">Xóa</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>

<script>
    function confirmDelete(url) {
        if (confirm('Bạn có chắc muốn xóa sách này không?')) {
            window.location.href = url;
        }
    }
</script>

<style>
    .input-group .form-control {
        width: 200px;
    }

    .input-group-append .btn {
        padding: 0.375rem 0.75rem;
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

    .form-inline {
        flex: 1;
        justify-content: flex-end;
    }

    .d-flex.justify-content-between {
        gap: 10px;
    }

    .mt-2 {
        margin-top: 0.5rem !important;
    }
</style>

@endsection