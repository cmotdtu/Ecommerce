@extends('admin::layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white text-center">
            <h5 class="mb-0">Chỉnh sửa Giải Thưởng</h5>
        </div>
        <div class="card-body">
            <form id="updatePrizeForm" method="POST" action="{{ route('products.saveditprize', $prize->id) }}">
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- Cột trái: Ảnh giải thưởng -->
                    <div class="col-md-4 text-center">
                        <div class="mb-3">
                            <img src="{{ $prize->description }}" alt="Ảnh giải thưởng" class="img-fluid rounded shadow" style="max-width: 100%; height: auto;">
                        </div>
                    </div>

                    <!-- Cột phải: Thông tin giải thưởng -->
                    <div class="col-md-8">
                        <!-- Tên giải thưởng -->
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Tên giải thưởng</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $prize->name }}" required>
                        </div>

                        <!-- URL ảnh giải thưởng -->
                        <div class="mb-3">
                            <label for="description" class="form-label fw-bold">URL ảnh giải thưởng</label>
                            <input type="text" class="form-control" id="description" name="description" value="{{ $prize->description }}" required>
                        </div>

                        <!-- Số lượng -->
                        <div class="mb-3">
                            <label for="quantity" class="form-label fw-bold">Số lượng</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $prize->quantity }}" min="0" required>
                        </div>

                        <!-- Tỷ lệ trúng thưởng -->
                        <div class="mb-3">
                            <label for="winning_rate" class="form-label fw-bold">Tỷ lệ trúng (%)</label>
                            <input type="number" class="form-control" id="winning_rate" name="winning_rate" 
                                value="{{ $prize->winning_rate }}" step="0.01" min="0" max="100" required>
                        </div>

                        <!-- Trạng thái -->
                        <div class="mb-3">
                            <label for="status" class="form-label fw-bold">Trạng thái</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="active" {{ $prize->status == 'active' ? 'selected' : '' }}>Hoạt động</option>
                                <option value="inactive" {{ $prize->status == 'inactive' ? 'selected' : '' }}>Tạm ngừng</option>
                            </select>
                        </div>

                        <!-- Ngày tạo -->
                        <div class="mb-3">
                            <label for="created_at" class="form-label fw-bold">Ngày tạo</label>
                            <input type="datetime-local" class="form-control" id="created_at" name="created_at" 
                                value="{{ \Carbon\Carbon::parse($prize->created_at)->format('Y-m-d\TH:i') }}" disabled>
                        </div>
                    </div>
                </div>

                <!-- Nút hành động -->
                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary px-4">Cập nhật</button>
                    <button type="button" class="btn btn-danger ms-2 px-4" onclick="clearForm()">Xóa tất cả</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function clearForm() {
        document.getElementById('updatePrizeForm').reset();
    }
</script>
@endsection
