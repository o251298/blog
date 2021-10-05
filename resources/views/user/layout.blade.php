<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>@yield('title')</title>
</head>
<body>
<style>
    body {
        background: #18191a;
    }
    a {
        color: #b0b3b8;
        text-decoration: none;

    }
    a.user {
        color: #e4e5d8;
        text-decoration: none;
        font-weight: bold;
        font-size: 20px;
    }
    a.nav-link {
        color: white;
    }
    ul.pagination{
        padding: 40px;
    }
    ul.pagination li {
        padding: 5px;
        background: #242526;
        color: white;

    }
    li.page-item a {
        background: #242526;
        border: red;
        color: white;
    }
    .page-item.active .page-link {
        background-color: #b0b3b8;
        border-color: #b0b3b8;
    }
    .page-item.disabled .page-link {
        background-color: #242526;
    }


</style>
@yield('content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>

</body>
</html>
