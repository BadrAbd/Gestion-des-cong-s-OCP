<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Intérim</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        .navbar {
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        }
        .navbar .btn-link {
            padding: 0.375rem;
            border-radius: 0.375rem;
            transition: background-color 0.2s;
        }
        .navbar .btn-link:hover {
            background-color: rgba(0, 0, 0, 0.05);
        }
        .navbar .profile-img {
            border: 2px solid #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    @include('layouts.navbar')
    @yield('content')

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>