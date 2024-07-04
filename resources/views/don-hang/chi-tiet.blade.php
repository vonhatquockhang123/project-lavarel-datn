@extends('layouts')

@section('content')
<div class="card mt-4">
    <div class="card-body">
        <h3 class="card-title">Thêm chi tiết đơn hàng</h3>
        <form action="{{ route('don-hang.chi-tiet.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" class="form-control" id="id" name="id" required>
            </div>
            
            <div class="form-group">
                <label for="don_hang_id">Mã đơn hàng</label>
                <select class="form-control" id="don_hang_id" name="don_hang_id" required>
                    @foreach($list_of_don_hang as $don_hang)
                        <option value="{{ $don_hang->id }}">{{ $don_hang->id }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
    <label for="sach_id">Tên sách</label>
    <select class="form-control" id="sach_id" name="sach_id" required>
        @foreach($list_of_books as $book)
            <option value="{{ $book->id }}">{{ $book->ten_sach }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="combo_id">Tên combo</label>
    <select class="form-control" id="combo_id" name="combo_id">
        @foreach($list_of_combos as $combo)
            <option value="{{ $combo->id }}">{{ $combo->ten_combo }}</option>
        @endforeach
    </select>
</div>
            
            <div class="form-group">
                <label for="gia">Giá</label>
                <input type="number" class="form-control" id="gia" name="gia" required>
            </div>
            
            <div class="form-group">
                <label for="so_luong">Số lượng</label>
                <input type="number" class="form-control" id="so_luong" name="so_luong" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Thêm chi tiết</button>
        </form>
    </div>
</div>

<div class="card mt-4">
    <div class="card-body">
        <h3 class="card-title">Chi tiết đơn hàng</h3>

        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Mã đơn hàng</th>
                        <th>Tên sách</th>
                        <th>Tên combo</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
    @foreach($donHang->chiTietDonHang as $ctDonHang)
    <tr>
        <td>{{ $ctDonHang->id }}</td>
        <td>{{ $ctDonHang->don_hang_id }}</td>
        <td>{{ optional($ctDonHang->sach)->ten_sach ?? 'N/A' }}</td>
        <td>{{ optional($ctDonHang->combo)->ten_combo ?? 'N/A' }}</td>
        <td>{{ $ctDonHang->gia }}</td>
        <td>{{ $ctDonHang->so_luong }}</td>
        <td>
            <form action="{{ route('don-hang.chi-tiet.xoa', $ctDonHang->id) }}" method="POST">
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
</div>

@endsection