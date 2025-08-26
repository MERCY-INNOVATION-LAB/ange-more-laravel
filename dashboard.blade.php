<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard - EzStore</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    :root {
      --primary-blue: #2563eb;
      --primary-blue-dark: #1e40af;
      --primary-blue-light: #3b82f6;
      --secondary-color: #3f37c9;
      --accent-color: #4895ef;
      --light-color: #f8f9fa;
      --dark-color: #212529;
      --success-color: #4cc9f0;
      --warning-color: #f72585;
      --sidebar-width: 280px;
      --header-height: 80px;
      --card-radius: 16px;
      --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    }

    .main-content {
      margin-left: var(--sidebar-width);
      padding: 20px;
      transition: all 0.3s ease;
      background-color: #f8f9fa;
      min-height: 100vh;
    }

    .dashboard-header {
      background: white;
      border-radius: var(--card-radius);
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
      padding: 20px 25px;
      margin-bottom: 25px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 15px;
    }

    .welcome-text {
      font-size: 1.5rem;
      font-weight: 600;
      color: var(--primary-blue);
      margin: 0;
    }

    .welcome-text span {
      color: var(--secondary-color);
    }

    .store-selector {
      background: linear-gradient(135deg, var(--primary-blue), var(--secondary-color));
      color: white;
      border: none;
      border-radius: 12px;
      padding: 12px 20px;
      font-weight: 500;
      cursor: pointer;
      transition: var(--transition);
      display: flex;
      align-items: center;
      gap: 10px;
      min-width: 200px;
    }

    .store-selector:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(37, 99, 235, 0.3);
    }

    .search-container {
      position: relative;
      max-width: 300px;
      width: 100%;
    }

    .search-input {
      border-radius: 50px;
      border: 1px solid #e0e0e0;
      height: 45px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
      transition: var(--transition);
    }

    .search-input:focus {
      border-color: var(--accent-color);
      box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
    }

    .search-icon {
      position: absolute;
      left: 15px;
      top: 50%; 
      transform: translateY(-50%);
      color: #a0a0a0;
    }

    .user-profile {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 8px 16px;
      background: rgba(37, 99, 235, 0.05);
      border-radius: 12px;
      border: 1px solid rgba(37, 99, 235, 0.1);
    }

    .user-avatar {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: linear-gradient(135deg, var(--primary-blue), var(--accent-color));
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-weight: bold;
    }

    .stats-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 20px;
      margin-bottom: 30px;
    }

    .stat-card {
      background: white;
      border-radius: var(--card-radius);
      padding: 25px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
      transition: var(--transition);
      border-left: 4px solid var(--primary-blue);
    }

    .stat-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .stat-icon {
      width: 60px;
      height: 60px;
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.5rem;
      margin-bottom: 15px;
    }

    .stat-icon.sales {
      background: linear-gradient(135deg, #4cc9f0, #4895ef);
      color: white;
    }

    .stat-icon.products {
      background: linear-gradient(135deg, #f72585, #7209b7);
      color: white;
    }

    .stat-icon.revenue {
      background: linear-gradient(135deg, #06ffa5, #06d6a0);
      color: white;
    }

    .stat-value {
      font-size: 2rem;
      font-weight: 700;
      color: var(--dark-color);
      margin-bottom: 5px;
    }

    .stat-label {
      color: #6c757d;
      font-weight: 500;
      font-size: 0.9rem;
    }

    .content-grid {
      display: grid;
      grid-template-columns: 2fr 1fr;
      gap: 25px;
      margin-bottom: 30px;
    }

    .chart-card {
      background: white;
      border-radius: var(--card-radius);
      padding: 25px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }

    .activity-card {
      background: white;
      border-radius: var(--card-radius);
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
      overflow: hidden;
    }

    .activity-header {
      background: linear-gradient(135deg, var(--primary-blue), var(--secondary-color));
      color: white;
      padding: 20px;
      text-align: center;
    }

    .activity-body {
      padding: 20px;
    }

    .activity-item {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 12px 0;
      border-bottom: 1px solid #f0f0f0;
    }

    .activity-item:last-child {
      border-bottom: none;
    }

    .activity-icon {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1rem;
    }

    .activity-icon.success {
      background: rgba(76, 201, 240, 0.1);
      color: var(--success-color);
    }

    .activity-icon.warning {
      background: rgba(247, 37, 133, 0.1);
      color: var(--warning-color);
    }

    .alerts-section {
      background: white;
      border-radius: var(--card-radius);
      padding: 25px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }

    .section-header {
      display: flex;
      align-items: center;
      gap: 12px;
      margin-bottom: 20px;
      padding-bottom: 15px;
      border-bottom: 2px solid #f0f0f0;
    }

    .section-icon {
      width: 50px;
      height: 50px;
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.5rem;
      background: linear-gradient(135deg, #f72585, #7209b7);
      color: white;
    }

    .table-custom {
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .table-custom thead th {
      background: linear-gradient(135deg, var(--primary-blue), var(--secondary-color));
      color: white;
      border: none;
      padding: 15px;
      font-weight: 600;
    }

    .table-custom tbody td {
      padding: 15px;
      border-bottom: 1px solid #f0f0f0;
      vertical-align: middle;
    }

    .action-btn {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      background: rgba(76, 201, 240, 0.1);
      color: var(--success-color);
      border: none;
      transition: var(--transition);
    }

    .action-btn:hover {
      background: var(--success-color);
      color: white;
      transform: scale(1.1);
    }

    @media (max-width: 768px) {
      .main-content {
        margin-left: 0;
        padding: 15px;
      }
      
      .dashboard-header {
        flex-direction: column;
        align-items: stretch;
      }
      
      .content-grid {
        grid-template-columns: 1fr;
      }
      
      .stats-grid {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>
<body>

@include('sidebar')
  <div class="main-content">
    <div class="container-fluid">
      
      <!-- Header avec sélecteur de boutique -->
      <div class="dashboard-header">
        <div class="d-flex align-items-center gap-3">
          <h1 class="welcome-text">Bonjour <span>John</span></h1>
          <button class="store-selector" data-bs-toggle="modal" data-bs-target="#storeModal">
            <i class="fas fa-store"></i>
            <span>Ma Boutique Principale</span>
            <i class="fas fa-chevron-down ms-auto"></i>
          </button>
        </div>
        
        <div class="d-flex align-items-center gap-3">
          <div class="search-container">
            <i class="fas fa-search search-icon"></i>
            <input class="form-control search-input" style="padding-left: 45px;" type="text" placeholder="Rechercher...">
          </div>
          
          <div class="user-profile">
            <div class="user-avatar">JD</div>
            <div>
              <div class="fw-semibold">John Doe</div>
              <small class="text-muted">Administrateur</small>
            </div>
          </div>
        </div>
      </div>

      <!-- Statistiques principales -->
      <div class="stats-grid">
        <div class="stat-card">
          <div class="stat-icon sales">
            <i class="fas fa-chart-line"></i>
          </div>
          <div class="stat-value">1,247</div>
          <div class="stat-label">Ventes ce mois</div>
        </div>
        
        <div class="stat-card">
          <div class="stat-icon products">
            <i class="fas fa-boxes"></i>
          </div>
          <div class="stat-value">156</div>
          <div class="stat-label">Produits en stock</div>
        </div>
        
        <div class="stat-card">
          <div class="stat-icon revenue">
            <i class="fas fa-dollar-sign"></i>
          </div>
          <div class="stat-value">2.4M</div>
          <div class="stat-label">Chiffre d'affaires</div>
        </div>
      </div>

      <!-- Graphique et Activités -->
      <div class="content-grid">
        <div class="chart-card">
          <div class="section-header">
            <div class="section-icon">
              <i class="fas fa-chart-area"></i>
            </div>
            <h4 class="mb-0">Évolution des ventes</h4>
          </div>
          <canvas id="salesChart" height="300"></canvas>
        </div>
        
        <div class="activity-card">
          <div class="activity-header">
            <i class="fas fa-bell" style="font-size: 2rem; margin-bottom: 10px;"></i>
            <h4 class="mb-0">Activité récente</h4>
          </div>
          <div class="activity-body">
            <div class="activity-item">
              <div class="activity-icon success">
                <i class="fas fa-check"></i>
              </div>
              <div>
                <div class="fw-semibold">Nouvelle vente</div>
                <small class="text-muted">iPhone 14 Pro vendu</small>
              </div>
            </div>
            
            <div class="activity-item">
              <div class="activity-icon warning">
                <i class="fas fa-exclamation"></i>
              </div>
              <div>
                <div class="fw-semibold">Stock faible</div>
                <small class="text-muted">AirPods Pro - 3 unités</small>
              </div>
            </div>
            
            <div class="activity-item">
              <div class="activity-icon success">
                <i class="fas fa-user-plus"></i>
              </div>
              <div>
                <div class="fw-semibold">Nouveau client</div>
                <small class="text-muted">Marie Dupont inscrite</small>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Alertes stock -->
      <div class="alerts-section">
        <div class="section-header">
          <div class="section-icon">
            <i class="fas fa-exclamation-triangle"></i>
          </div>
          <h4 class="mb-0">Alertes stock</h4>
        </div>
        
        <div class="table-responsive">
          <table class="table table-custom">
            <thead>
              <tr>
                <th>ID</th>
                <th>Produit</th>
                <th>Catégorie</th>
                <th>Prix</th>
                <th>Stock</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>#001</td>
                <td>iPhone 14 Pro</td>
                <td>Smartphones</td>
                <td>850,000 Fcfa</td>
                <td><span class="badge bg-warning">2</span></td>
                <td>
                  <button class="action-btn">
                    <i class="fas fa-eye"></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td>#002</td>
                <td>AirPods Pro</td>
                <td>Audio</td>
                <td>120,000 Fcfa</td>
                <td><span class="badge bg-danger">1</span></td>
                <td>
                  <button class="action-btn">
                    <i class="fas fa-eye"></i>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal de sélection de boutique -->
  <div class="modal fade" id="storeModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Sélectionner une boutique</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active" data-store="boutique1">
              <div class="d-flex w-100 justify-content-between">
                <h6 class="mb-1">Ma Boutique Principale</h6>
                <small>Actif</small>
              </div>
              <p class="mb-1">Boutique principale - Électronique</p>
            </a>
            <a href="#" class="list-group-item list-group-item-action" data-store="boutique2">
              <div class="d-flex w-100 justify-content-between">
                <h6 class="mb-1">Boutique Mode</h6>
                <small>Inactif</small>
              </div>
              <p class="mb-1">Boutique de vêtements et accessoires</p>
            </a>
            <a href="#" class="list-group-item list-group-item-action" data-store="boutique3">
              <div class="d-flex w-100 justify-content-between">
                <h6 class="mb-1">Boutique Sport</h6>
                <small>Inactif</small>
              </div>
              <p class="mb-1">Équipements et vêtements de sport</p>
            </a>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button type="button" class="btn btn-primary">Gérer les boutiques</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
  <script>
    // Graphique des ventes
    const ctx = document.getElementById('salesChart').getContext('2d');
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
        datasets: [{
          label: 'Ventes mensuelles',
          data: [1200, 1900, 3000, 5000, 2000, 3000],
          borderColor: '#2563eb',
          backgroundColor: 'rgba(37, 99, 235, 0.1)',
          tension: 0.4,
          fill: true
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false
          }
        },
        scales: {
          y: {
            beginAtZero: true,
            grid: {
              color: 'rgba(0,0,0,0.05)'
            }
          },
          x: {
            grid: {
              display: false
            }
          }
        }
      }
    });

    // Gestion du sélecteur de boutique
    document.querySelectorAll('[data-store]').forEach(item => {
      item.addEventListener('click', function(e) {
        e.preventDefault();
        const storeName = this.querySelector('h6').textContent;
        document.querySelector('.store-selector span').textContent = storeName;
        
        // Retirer la classe active de tous les éléments
        document.querySelectorAll('[data-store]').forEach(el => {
          el.classList.remove('active');
        });
        
        // Ajouter la classe active à l'élément cliqué
        this.classList.add('active');
        
        // Fermer le modal
        const modal = bootstrap.Modal.getInstance(document.getElementById('storeModal'));
        modal.hide();
        
        // Ici vous pouvez ajouter la logique pour charger les données de la boutique sélectionnée
        console.log('Boutique sélectionnée:', storeName);
      });
    });
  </script>

</body>
</html>
