<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sidebar</title>
    <style>
        
    /* Sidebar Styles */
    .sidebar {
      position: fixed;
      top: 0;
      left: 0;
      height: 100vh;
      width: var(--sidebar-width);
      background: linear-gradient(180deg, var(--primary-blue) 0%, var(--primary-blue-dark) 100%);
      color: white;
      z-index: 1000;
      box-shadow: 4px 0 15px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
    }

    .sidebar-header {
      padding: 1.5rem;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
      text-align: center;
    }

    .sidebar-header img {
      width: 150px;
      transition: all 0.3s ease;
    }

    .sidebar-nav {
      padding: 1rem 0;
    }

    .sidebar-nav .nav-link {
      color: rgba(255, 255, 255, 0.8);
      padding: 0.75rem 1.5rem;
      margin: 0.25rem 1rem;
      border-radius: 0.5rem;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
    }

    .sidebar-nav .nav-link:hover {
      background: rgba(255, 255, 255, 0.15);
      color: white;
      transform: translateX(5px);
    }

    .sidebar-nav .nav-link.active {
      background: rgba(255, 255, 255, 0.25);
      color: white;
      font-weight: 500;
    }

    .sidebar-nav .nav-link i {
      width: 20px;
      margin-right: 0.75rem;
      text-align: center;
    }
    
    /* Responsive */
    @media (max-width: 992px) {
      .sidebar {
        transform: translateX(-100%);
      }
      .sidebar.show {
        transform: translateX(0);
      }
      .main-content {
        margin-left: 0;
      }
      .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 999;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
      }
      .overlay.show {
        opacity: 1;
        visibility: visible;
      }
    }
  </style>
</head>
<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <div class="sidebar-header">
      <img src="./images/Ezstore.png" alt="Logo de EzStore">
    </div>
    
    <nav class="sidebar-nav">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link active" href="#" data-section="dashboard">
            <i class="fas fa-home"></i>
            <span>Tableau de bord</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" data-section="sales">
            <i class="fas fa-shopping-cart"></i>
            <span>Ventes</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" data-section="products">
            <i class="fas fa-box-open"></i>
            <span>Produits</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" data-section="history">
            <i class="fas fa-history"></i>
            <span>Historique</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" data-section="stats">
            <i class="fas fa-chart-line"></i>
            <span>Statistiques</span>
          </a>
        </li>
        <li class="nav-item mt-4">
          <a class="nav-link" href="#" data-section="settings">
            <i class="fas fa-cog"></i>
            <span>Paramètres</span>
          </a>
        </li>
        <li class="nav-item mt-4">
          <a class="nav-link text-danger" href="#" data-section="logout">
            <i class="fas fa-sign-out-alt"></i>
            <span>Déconnexion</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>

  
  <div class="overlay"></div>
</body>
</html>