@extends('layouts')

@section('content')

<div class="card" style="margin-top: 50px;">
    <div class="card-body">
        <h3>Danh sách tác giả sách</h3>
        <a href="{{ route('tac-gia.them-moi') }}" class="btn btn-primary mb-3">Thêm mới</a>
        <form action="{{ route('tac-gia.tim-kiem') }}" method="GET" class="form-inline mb-3">
            <div class="input-group">
                <input type="text" name="search_name" class="form-control" placeholder="Tìm kiếm" value="{{ request()->input('search_name') }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="fa fa-search text-secondary"></i>
                    </button>
                </div>
            </div>
        </form>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Sách ID</th>
                    <th>Tên tác giả</th>
                    <th>Ngày sinh</th>
                    <th>Quốc tịch</th>
                    <th>Địa chỉ</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($DStacGia as $tacgia)
                <tr>
                    <td>{{ $tacgia->id }}</td>
                    <td>{{ $tacgia->sach_id }}</td>
                    <td>{{ $tacgia->ten_tac_gia }}</td>
                    <td>{{ $tacgia->ngay_sinh }}</td>
                    <td>{{ $tacgia->quoc_tich }}</td>
                    <td>{{ $tacgia->dia_chi }}</td>
                    <td>
                        <a href="{{ route('tac-gia.cap-nhat', ['id' => $tacgia->id]) }}" class="btn btn-primary btn-sm">Sửa</a>
                        <form action="{{ route('tac-gia.xoa', ['id' => $tacgia->id]) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
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

    .mb-3 {
        margin-bottom: 1rem !important;
    }
</style>

@endsection