<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>{{ $post->title }}</title>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-body">
                <h1 class="display-4">{{ $post->title }}</h1>
                <p class="text-muted">نُشر في: {{ $post->created_at->format('Y-m-d') }}</p>
                <hr>
                <div class="lead" style="white-space: pre-wrap;">{{ $post->content }}</div>
                <hr>
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">رجوع للداشبورد</a>
            </div>
        </div>
    </div>
</body>
</html>