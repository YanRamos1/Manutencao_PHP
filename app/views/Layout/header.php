<?php
namespace App\Views\Layout;
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
<div class="container">
    <div class="jumbotron bg-dark d-flex flex-wrap">
        <a href="/">
            <h1 class="text-white">App Manutenção</h1>
        </a>
        <div class="ml-auto d-flex align-self-center justify-content-center">
            <a class="m-2" href="App/Cliente/index.php">
                <button class="btn btn-outline-warning">
                    Clientes
                </button>
            </a>
            <a class="m-2">
                <button class="btn btn-outline-warning">
                    <i class="fas fa-plus"></i>
                    Produtos
                </button>
            </a>
            <a class="m-2">
                <button class="btn btn-outline-warning">
                    <i class="fas fa-plus"></i>
                    Serviços
                </button>
            </a>
        </div>
    </div>
