
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ezstore</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"?>
  <style>
    body{
      font-family: 'poppins', sans serif;
      background: linear-gradient(to bottom right, #f0f4ff, #ffffff);

    }
    nav{
      direction:flex;
      align-items:center;
      justify-content:space-between;
      margin-top:9px;
      margin-left:15px;
      margin-right:15px;
      border-radius:30px;

    }
    .navbar-nav .nav-link {
      position: relative;
      font-weight: 500;
      color: #000;
      transition: color 0.3s;
    }

    .navbar-nav .nav-link::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 0;
      height: 2px;
      background-color: #2563eb;
      transition: width 0.3s ease;
    }

    .navbar-nav .nav-link:hover {
      color: #2563eb;
    }

    .navbar-nav .nav-link:hover::after {
      width: 100%;
    }
    img{
      width:140px;
    }
    .glass-navbar {
      background: rgba(255, 255, 255, 0.2); 
      backdrop-filter: blur(5px);          
      -webkit-backdrop-filter: blur(5px);  
      border-bottom: 1px solid rgba(255, 255, 255, 0.2);
       box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.1);
    }

    .hero {
      background: linear-gradient(to bottom right, #2563eb10, #3b82f610);
      padding-top: 6rem;
      padding-bottom: 4rem;
    }
    .btn-outline-custom {
    border: 1px solid #2563eb;   /* Couleur en hex */
    color: #2563eb;
    background-color: transparent;
    transition: 0.3s;
  }

  .btn-outline-custom:hover {
    background-color: #2563eb;
    color: white;
  }

  .btn-reverse {
      padding: 10px 20px;
      font-size: 16px;
      background-color: #2563eb;
      color: white;
      border: 2px solid #2563eb;
      border-radius: 5px;
      transition: 0.3s;
    }

    .btn-reverse:hover {
      background-color: transparent;
      color: #2563eb;
    }
    .feature-card:hover {
      box-shadow: 0 0 25px rgba(0, 0, 0, 0.1);
      transition: 0.3s;
    }
    .mor{
      color: #2563eb;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
   <header>
    <nav class="navbar navbar-expand-lg glass-navbar fixed-top">
      <div class="container">
        <a class="navbar-brand fw-bold" href="#home">
          <img src="./images/Ezstore.png" alt="Ezstore Logo" />
        </a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="mainNavbar">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item mx-3"><a class="nav-link" href="#home">Accueil</a></li>
            <li class="nav-item mx-3"><a class="nav-link" href="#features">Fonctionnalités</a></li>
            <li class="nav-item mx-3"><a class="nav-link" href="#pricing">Abonnements</a></li>
            <li class="nav-item mx-3"><a class="nav-link" href="#contact">Contact</a></li>
          </ul>
          <a href="{{ route('login-register') }}" class="btn btn-outline-custom">Se connecter</a>
        </div>
      </div>
    </nav>
  </header>

  <!-- Hero Section -->
  <!-- <section class="hero text-center d-flex align-items">
    <div class="container">
      
    </div>

    <div class="container">

    <p>bonjour   uwrfw</p>

    </div>
  </section> -->
  <div class="container">
    <div class="row justify-content-between">
     <div class="col-7 mt-5">
      <span class="display-5 fw-bold ">
        Gérez votre boutique électronique
      </span>
       <span class="mor display-5 fw-bold">en toute simplicité</span>
       <br><br>
       <span>
        <p> EzStore est la solution complète pour optimiser la gestion de votre boutique électronique : stocks, ventes, factures et bien plus encore.
        </p>
        <span>
       <span class="mt-6 mx-4">
          <a type="button" href="" class="btn btn-outline-custom"><i class="fas fa-rocket mr-2"></i>
            Démarrer gratuitement
          </a>
        </span>
        <span>
          <a type="button" href="" class="btn btn-reverse"><i class="fas fa-play mr-2"></i>
            Voir la démo
          </a>
        </span>
      </div>
      <div class="col-md">
        <span>
          
          <img src="./images/Work.png" class="w-100 h-100"/>

        </span>

     </div>
    </div>
  </div>

  <!-- Features -->
  <section id="features" class="py-5 bg-light">
   
  </section>

 
  </section>

  <!-- Contact -->
  <section>
  </section>

  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-4">
    <div class="container">
      &copy; 2025 Ezstore. Tous droits réservés.
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


