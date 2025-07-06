<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>GameVault - Comércio de Jogos</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

    <!-- Bootstrap icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Core theme CSS (includes Bootstrap) -->
    <link href="css/styles.css" rel="stylesheet" />

    <!-- Estilo personalizado -->
    <style>
        .navbar {
            background-color: #1a001a !important; /* roxo escuro */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6);
        }
        .navbar-brand {
            color: #ffffff !important;
            font-size: 2rem;
            font-weight: bold;
            text-shadow: 2px 2px 5px #660066;
        }
        .navbar-brand img {
            margin-right: 10px;
        }
        .nav-link {
            color: #ccccff !important;
            font-size: 1.1rem;
            font-weight: 500;
        }
        .nav-link:hover {
            color: #ffffff !important;
            text-shadow: 1px 1px 3px #9933ff;
        }
        .dropdown-menu {
            background-color: #2b0033;
        }
        .dropdown-item {
            color: #ffffff;
        }
        .dropdown-item:hover {
            background-color: #440055;
        }
        .btn-outline-light:hover {
            background-color: #cc00ff;
            color: white;
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <img src="assets/logo.png" alt="Logo" width="50" height="50">
                GameVault
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Início</a>
                    </li>

                    <?php
                    if (isset($tipoUsuario) && $tipoUsuario == 'administrador') {
                        echo "
                            <li class='nav-item'>
                                <a class='nav-link' href='formProduto.php'>Cadastrar Produto</a>
                            </li>
                        ";
                    }

                    if (isset($tipoUsuario) && $tipoUsuario == 'cliente') {
                        echo "
                            <li class='nav-item'>
                                <a class='nav-link' href='visualizarPedidos.php'>Visualizar Pedidos</a>
                            </li>
                        ";
                    }
                    ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categorias
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="listarProdutosTabela.php">Produtos Cadastrados</a></li>
                            <li><a class="dropdown-item" href="listarProdutosSELECT.php">Acessórios</a></li>
                            <li><a class="dropdown-item" href="#">Outros</a></li>
                        </ul>
                    </li>

                    <?php
                    if (isset($_SESSION['logado']) && $_SESSION['logado'] === true) {
                        echo "
                            <li class='nav-item'>
                                <a class='nav-link' href='logout.php?pagina=formLogin'>Sair</a>
                            </li>
                            <li class='nav-item'>
                                <a class='nav-link' style='color: #cc99ff;'>Olá, <strong>$primeiroNome</strong>! <i class='bi bi-emoji-smile'></i></a>
                            </li>
                        ";
                    } else {
                        echo "
                            <li class='nav-item'>
                                <a class='nav-link' href='formLogin.php?pagina=formLogin'>Login</a>
                            </li>
                        ";
                    }
                    ?>
                </ul>

                <form class="d-flex">
                    <button class="btn btn-outline-light" type="submit" style="font-size: 1.1rem;">
                        <i class="bi-cart-fill me-1"></i>
                        Carrinho
                        <span class="badge bg-light text-dark ms-1 rounded-pill">0</span>
                    </button>
                </form>
            </div>
        </div>
    </nav>
