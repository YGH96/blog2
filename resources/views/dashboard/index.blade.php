@extends('layouts.app')
@section('title', 'الرئيسية')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>مقالاتي</h3>
    <a href="{{ route('posts.create') }}" class="btn btn-primary px-4">+ مقال جديد</a>
</div>

<div class="card overflow-hidden">
    <table class="table table-hover mb-0">
        <thead class="table-light">
            <tr>
                <th class="ps-4">العنوان</th>
                <th>التاريخ</th>
                <th class="text-center">العمليات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr class="align-middle">
                <td class="ps-4 fw-bold">{{ $post->title }}</td>
                <td>{{ $post->created_at->format('Y-m-d') }}</td>
                <td class="text-center">
                    <div class="btn-group gap-2">
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-outline-info">عرض</a>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-outline-warning">تعديل</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('حذف؟')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">حذف</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection