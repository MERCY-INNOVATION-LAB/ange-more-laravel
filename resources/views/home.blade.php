
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
      border-radius:20px;

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
    border: 1px solid #2563eb;  
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
      border-radius: 5px;
      transition: 0.3s;

    }

    .btn-reverse:hover {
      background-color: transparent;
      color: #2563eb;
      border: 1px solid #2563eb;
      
    }
    .btn-follow-cursor {
      position: relative;
      transition: transform 0.15s ease;
      will-change: transform;
      z-index: 1;
    }

    .feature-card:hover {
      box-shadow: 0 0 25px rgba(0, 0, 0, 0.1);
      transition: 0.3s;
    }
    .mor{
      color: #2563eb;
    }

    .contact,.pricing{
      color:#2563eb;
      font-size:34px;
    }

    textarea{
      width:550px;
      height:200px;
      border-radius:5px;
      border:1px solid gray ;
    }
    .text:focus{
      border-color:#2563eb;
    }

    /* .bg-primary {
    background-color: #2563eb !important;
  } */
  
    .hover-opacity-100:hover {
      opacity: 1 !important;
      text-decoration: underline;
  }
  
    .opacity-75 {
      opacity: 0.75;
  }
  
    footer a {
      transition: all 0.3s ease;
  }
  
    footer i {
      transition: transform 0.3s ease;
  }
  
    footer a:hover i {
      transform: translateY(-3px);
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
  <!-- hero section -->
<section id="home">
  <div class="container mt-5">
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
          <a type="button" href="" class="btn btn-outline-custom btn-follow-cursor"><i class="fas fa-rocket mr-2"></i>
            Démarrer gratuitement
          </a>
        </span>
        <span>
          <a type="button" href="" class="btn btn-reverse btn-follow-cursor"><i class="fas fa-play mr-2"></i>
            Voir la démo
          </a>
        </span>
      </div>
      <div class="col-md col-sm-4">
        <span>
          
          <img src="./images/Work.png" class="w-100 h-100"/>

        </span>

     </div>
    </div>
  </div>
  </section>

  <!-- Features -->
    <section id="features" class="mt-4 py-5 bg-light">
  <div class="container">
    <h3 class="text-center text-primary fw-bold mb-4 fs-2">Fonctionnalités principales</h3>
    <h5 class="text-center text-muted mx-auto mb-5" style="max-width: 700px;">
      Tout ce dont vous avez besoin pour gérer efficacement votre boutique électronique
    </h4>

    <div class="row g-4">
      <div class="col-md-6 col-lg-4">
        <div class="card h-100 shadow-sm border-0">
          <div class="card-body">
            <div class="bg-secondary bg-opacity-10 rounded d-flex align-items-center justify-content-center mb-3" style="width: 50px; height: 50px;">
              <i class="fas fa-boxes text-primary fs-5"></i>
            </div>
            <h5 class="card-title fw-semibold">Gestion des stocks</h5>
            <p class="card-text">Suivi en temps réel des entrées et sorties de produits électroniques dans chaque boutique.</p>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-4">
        <div class="card h-100 shadow-sm border-0">
          <div class="card-body">
            <div class="bg-secondary bg-opacity-10 rounded d-flex align-items-center justify-content-center mb-3" style="width: 50px; height: 50px;">
              <i class="fas fa-receipt text-primary fs-5"></i>
            </div>
            <h5 class="card-title fw-semibold">Facturation automatisée</h5>
            <p class="card-text">Générez des factures rapidement pour vos ventes avec export en PDF.</p>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-4">
        <div class="card h-100 shadow-sm border-0 bg-light">
          <div class="card-body">
            <div class="bg-secondary bg-opacity-10 rounded d-flex align-items-center justify-content-center mb-3" style="width: 50px; height: 50px;">
              <i class="fas fa-store-alt text-primary fs-5"></i>
            </div>
            <h5 class="card-title fw-semibold">Multi-boutiques</h5>
            <p class="card-text">Gérez plusieurs points de vente avec des utilisateurs différents par boutique.</p>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-4">
        <div class="card h-100 shadow-sm border-0">
          <div class="card-body">
            <div class="bg-secondary bg-opacity-10 rounded d-flex align-items-center justify-content-center mb-3" style="width: 50px; height: 50px;">
              <i class="fas fa-users-cog text-primary fs-5"></i>
            </div>
             <h5 class="card-title fw-semibold">Gestion du personnel</h5>
            <p class="card-text">Attribuez des rôles et suivez l’activité de votre équipe par boutique.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="card h-100 shadow-sm border-0">
          <div class="card-body">
            <div class="bg-secondary bg-opacity-10 rounded d-flex align-items-center justify-content-center mb-3" style="width: 50px; height: 50px;">
              <i class="fas fa-chart-line text-primary fs-5"></i>
            </div>
            <h5 class="card-title fw-semibold">Statistiques & rapports</h5>
            <p class="card-text">Visualisez les performances commerciales à travers des tableaux de bord dynamiques.</p>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-4">
        <div class="card h-100 shadow-sm border-0">
          <div class="card-body">
            <div class="bg-secondary bg-opacity-10 rounded d-flex align-items-center justify-content-center mb-3" style="width: 50px; height: 50px;">
              <i class="fas fa-lock text-primary fs-5"></i>
            </div>
            <h5 class="card-title fw-semibold">Accès sécurisé</h5>
            <p class="card-text">Connexion sécurisée avec gestion des droits utilisateurs selon les profils.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


  <!-- Pricing -->
  <section id="pricing" class="py-5">
  <div class="container">
    <div class="row justify-content-center mb-5">

      <div class="col-md text-center ">

        <span class="pricing fw-bold"> Tarifs transparents </span>
        <br>
        <span class="text-muted"> Choisissez le plan qui correspond a vos besoins </span>
      </div>
    </div>
    <div class="row g-4 justify-content-center">

      <div class="col-lg-4 col-md-6">
        <div class="card shadow-lg h-100">
          <div class="card-body p-4">
            <h3 class="h4 fw-semibold mb-3">Basique</h3>
            <div class="display-6 fw-bold text-primary mb-4">
              5000 FCFA
              <span class="fs-6 text-muted">/mois</span>
            </div>
            <ul class="list-unstyled mb-4">
              <li class="d-flex align-items-center mb-2">
                <i class="fas fa-check text-success me-2"></i> Jusqu'à 100 produits
              </li>
              <li class="d-flex align-items-center mb-2">
                <i class="fas fa-check text-success me-2"></i> 1 utilisateur
              </li>
              <li class="d-flex align-items-center mb-2">
                <i class="fas fa-check text-success me-2"></i> Support email
              </li>
              <li class="d-flex align-items-center mb-2">
                <i class="fas fa-check text-success me-2"></i> Rapports de base
              </li>
            </ul>
            <button class="btn btn-outline-custom w-100 py-2 fw-semibold">Commencer</button>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="card shadow-lg h-100 ">
          <div class="card-body p-4">
            <h3 class="h4 fw-semibold mb-3">Standard</h3>
            <div class="display-6 fw-bold text-primary mb-4">
              15 000 FCFA
              <span class="fs-6 text-muted">/mois</span>
            </div>
            <ul class="list-unstyled mb-4">
              <li class="d-flex align-items-center mb-2">
                <i class="fas fa-check text-success me-2"></i> Produits illimités
              </li>
              <li class="d-flex align-items-center mb-2">
                <i class="fas fa-check text-success me-2"></i> 5 utilisateurs
              </li>
              <li class="d-flex align-items-center mb-2">
                <i class="fas fa-check text-success me-2"></i> Support prioritaire
              </li>
              <li class="d-flex align-items-center mb-2">
                <i class="fas fa-check text-success me-2"></i> Analytics avancés
              </li>
              <li class="d-flex align-items-center mb-2">
                <i class="fas fa-check text-success me-2"></i> Accès API
              </li>
            </ul>
            <button class="btn btn-outline-custom w-100 py-2 fw-semibold">Commencer</button>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="card shadow-lg h-100  rounded-1xl">
          <div class="card-body p-4">
            <h3 class="h4 fw-semibold mb-3">Premium</h3>
            <div class="display-6 fw-bold text-primary mb-4">
              30 000 FCFA
              <span class="fs-6 text-muted">/mois</span>
            </div>
            <ul class="list-unstyled mb-4">
              <li class="d-flex align-items-center mb-2">
                <i class="fas fa-check text-success me-2"></i> Tous les avantages Standard
              </li>
              <li class="d-flex align-items-center mb-2">
                <i class="fas fa-check text-success me-2"></i> Comptes équipe illimités
              </li>
              <li class="d-flex align-items-center mb-2">
                <i class="fas fa-check text-success me-2"></i> Support téléphonique 24/7
              </li>
              <li class="d-flex align-items-center mb-2">
                <i class="fas fa-check text-success me-2"></i> Intégration ERP
              </li>
              <li class="d-flex align-items-center mb-2">
                <i class="fas fa-check text-success me-2"></i> Sauvegardes automatiques
              </li>
            </ul>
            <button class="btn btn-outline-custom w-100 py-2 fw-semibold">Commencer</button>
          </div>
        </div>
      </div>

    </div>
  </div>
  
</section>


  <!-- Contact -->
  <section id="contact">

    <div class="container " >

      <div class="row d-flex justify-content-center">

        <div class="col-md">

          <span class="text-center fw-bold ">
            <p class="contact"> Nous contacter</p>
          </span>
          
          <span class="text-center text-gray-600 ">
            <p class="mb-4">Une question, une demande ? Laissez-nous un message !</p>
          </span>
      
        </div>
      </div>
      <div class="row justify-content-center">

        <div class="col-6">

          <div class="form">

            <form>
              <div class="form-group mb-3">

                <input type="text" class="form-control" placeholder="Entrer votre nom"/>

              </div>
              <div class="form-group mb-3">

              <input type="text" class="form-control" placeholder="Entrer votre email"/>

              </div>
              <div class="form-group mb-3">

              <textarea class="form-control">
                Messages
              </textarea>

              </div>
              <a type="submit" class="btn btn-outline-custom text-center">
                Envoyer
              </a>

            </form>
          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
   <footer class="bg-primary text-white py-5 mt-3">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-5 col-md-6">
        <div class="d-flex align-items-center mb-3">
          <img src="./images/Ezstore_blanck.png" alt="EzStore Logo" width="120" class="me-2">
          <!-- <h4 class="mb-0 fw-bold">EzStore</h4> -->
        </div>
        <p class="opacity-75">Solution de gestion de boutique pour professionnels de l'électronique.</p>
        <div class="mt-3">
          <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
          <a href="#" class="text-white me-3"><i class="fab fa-linkedin-in"></i></a>
          <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <h5 class="fw-bold mb-3">Navigation</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2">
            <a href="#home" class="nav-link p-0 text-white opacity-75 hover-opacity-100">Accueil</a>
          </li>
          <li class="nav-item mb-2">
            <a href="#features" class="nav-link p-0 text-white opacity-75 hover-opacity-100">Fonctionnalités</a>
          </li>
          <li class="nav-item mb-2">
            <a href="#pricing" class="nav-link p-0 text-white opacity-75 hover-opacity-100">Abonnements</a>
          </li>
          <li class="nav-item mb-2">
            <a href="#contact" class="nav-link p-0 text-white opacity-75 hover-opacity-100">Contact</a>
          </li>
        </ul>
      </div>

      <div class="col-lg-4 col-md-6">
        <h5 class="fw-bold mb-3">Contact</h5>
        <ul class="list-unstyled">
          <li class="mb-2 d-flex align-items-center">
            <i class="fas fa-envelope me-2"></i>
            <span>angebangue1@gmail.com</span>
          </li>
          <li class="mb-2 d-flex align-items-center">
            <i class="fas fa-phone-alt me-2"></i>
            <span>+237 6 52 56 56 06</span>
          </li>
          <li class="mb-2 d-flex align-items-center">
            <i class="fas fa-map-marker-alt me-2"></i>
            <span>Douala, Cameroun</span>
          </li>
        </ul>
      </div>
    </div>

    <hr class="my-4 opacity-25">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center pt-3">
      <div class="mb-3 mb-md-0">
        &copy; 2025 EzStore. Tous droits réservés.
      </div>
      <div>
        <a href="#" class="text-white text-decoration-none me-3">Conditions d'utilisation</a>
        <a href="#" class="text-white text-decoration-none">Politique de confidentialité</a>
      </div>
    </div>
  </div>
</footer>

<style>
  .bg-primary {
    background-color: #2563eb !important;
  }
  
  .hover-opacity-100:hover {
    opacity: 1 !important;
    text-decoration: underline;
  }
  
  .opacity-75 {
    opacity: 0.75;
  }
  
  footer a {
    transition: all 0.3s ease;
  }
  
  footer i {
    transition: transform 0.3s ease;
  }
  
  footer a:hover i {
    transform: translateY(-3px);
  }
</style>
   <script>
  document.querySelectorAll('.btn-follow-cursor').forEach(button => {
    button.addEventListener('mousemove', (e) => {
      const rect = button.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;
      const centerX = rect.width / 2;
      const centerY = rect.height / 2;

      const moveX = (x - centerX) * 0.2; // ajuster ici la "force"
      const moveY = (y - centerY) * 0.2;

      button.style.transform = `translate(${moveX}px, ${moveY}px)`;
    });

    button.addEventListener('mouseleave', () => {
      button.style.transform = 'translate(0px, 0px)';
    });
  });
</script>
<script>
  document.querySelectorAll('.btn-follow-cursor').forEach(button => {
    button.addEventListener('mousemove', (e) => {
      const rect = button.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;
      const centerX = rect.width / 2;
      const centerY = rect.height / 2;

      const moveX = (x - centerX) * 0.2; // ajuster ici la "force"
      const moveY = (y - centerY) * 0.2;

      button.style.transform = `translate(${moveX}px, ${moveY}px)`;
    });

    button.addEventListener('mouseleave', () => {
      button.style.transform = 'translate(0px, 0px)';
    });
  });
</script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


