@extends('layouts')

@section('content')

<div class="card" style="margin-top: 50px;">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-start mb-3">
            <div class="d-flex flex-column">
                <h3>Danh sách Nhà Xuất Bản</h3>
                <a href="{{ route('nha-xuat-ban.them-moi') }}">
                    <button type="button" class="btn btn-secondary mt-2">Thêm mới</button>
                </a>
            </div>
            <form action="{{ route('nha-xuat-ban.tim-kiem') }}" method="GET" class="form-inline">
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
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên nhà xuất bản</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Mô tả</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($nhaXuatBans as $nhaXuatBan)
                <tr>
                    <td>{{ $nhaXuatBan->id }}</td>
                    <td>{{ $nhaXuatBan->ten_nha_xuat_ban }}</td>
                    <td>{{ $nhaXuatBan->so_dien_thoai }}</td>
                    <td>{{ $nhaXuatBan->email }}</td>
                    <td>{{ $nhaXuatBan->dia_chi }}</td>
                    <td>{{ $nhaXuatBan->mo_ta }}</td>
                    <td>
                        <a href="{{ route('nha-xuat-ban.cap-nhat', ['id' => $nhaXuatBan->id]) }}">
                            <button type="button" class="btn btn-danger btn-sm">Sửa</button>
                        </a>
                        <form action="{{ route('nha-xuat-ban.xoa', ['id' => $nhaXuatBan->id]) }}" method="POST" style="display:inline;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-warning btn-sm">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

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