@extends('layouts.app')
@section('title', 'إضافة مقال')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card p-4">
            <h4 class="mb-4">نشر مقال جديد</h4>
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-bold">العنوان</label>
                    <input type="text" name="title" class="form-control form-control-lg" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">المحتوى</label>
                    <textarea name="content" class="form-control" rows="8" required></textarea>
                </div>
                <div class="d-grid"><button class="btn btn-primary btn-lg">حفظ ونشر</button></div>
            </form>
        </div>
    </div>
</div>
@endsection