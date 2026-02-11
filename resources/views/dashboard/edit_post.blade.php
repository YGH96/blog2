@extends('layouts.app')
@section('title', 'تعديل')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card p-4">
            <h4 class="mb-4 text-warning">تعديل: {{ $post->title }}</h4>
            <form action="{{ route('posts.update', $post->id) }}" method="POST">
                @csrf @method('PUT')
                <div class="mb-3">
                    <label class="form-label fw-bold">العنوان الجديد</label>
                    <input type="text" name="title" value="{{ $post->title }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">المحتوى</label>
                    <textarea name="content" class="form-control" rows="8" required>{{ $post->content }}</textarea>
                </div>
                <button class="btn btn-warning w-100">تحديث البيانات</button>
            </form>
        </div>
    </div>
</div>
@endsection