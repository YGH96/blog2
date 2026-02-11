<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

  <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
    <h3 class="text-center mb-4">Login</h3>

    <form action="{{ route('login') }}" method="POST">
      @csrf

      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" placeholder="Enter email" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Enter password" required>
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
    </form>

    <p class="text-center mt-3 mb-0">
      Don’t have an account? <a href="#">Register</a>
    </p>
  </div>

</body>
</html>