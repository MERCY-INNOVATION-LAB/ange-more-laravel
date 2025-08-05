<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sidebar Bootstrap 5</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'poppins', sans serif;
      background: linear-gradient(to bottom right, #f0f4ff, #ffffff);
    }
    .sidebar {
      height: 100vh;
      width: 220px;
      position: fixed;
      top: 0;
      left: 0;
      z-index:1;
      background-color: transparent;
      backdrop-filter:blur(5px);
      padding-top: 20px;
       box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.1);
    }
    .main-content {
      margin-left: 220px;
      padding: 20px;
    }
    
    img{
        width:160px;
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
 
  <div class="container-fluid sidebar">

    <div class="row">

        <div class="col-auto min-vh-100 bg-accent">

            <div class="pt-4 pb-1 px-2 mb-3">
                <a class="" href="#home">
                <img src="./images/Ezstore.png"  class="w-70" alt="Ezstore Logo" />
            </a>
            </div>

            <ul class="nav  flex-column mb-auto">

                <li class="nav-item mb-3">
                    <a class="nav-link active">
                        <i class="fas fa-tachometer-alt"></i>
                        <span class="d-none d-sm-inline">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link ">
                        <i class="fas fa-box"></i>
                        <span class="d-none d-sm-inline">Produits</span>
                    </a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link ">
                        <i class="fas fa-chart-line"></i>
                        <span class="d-none d-sm-inline">Ventes</span>
                    </a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link ">
                        <i class="fas fa-history"></i>
                        <span class="d-none d-sm-inline">Historique</span>
                    </a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link ">
                        <i class="fas fa-chart-bar"></i>
                        <span class="d-none d-sm-inline">Statistiques</span>
                    </a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link ">
                        <i class="fas fa-cog"></i>
                        <span class="d-none d-sm-inline">Parametres</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
