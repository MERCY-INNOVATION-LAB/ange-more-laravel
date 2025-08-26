
@extends('layouts.layout_proprio')

@section('content')


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
      padding: 5px;
      transition: all 0.3s ease;
    }
    .dashboard-header {
      background: white;
      border-radius: var(--card-radius);
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
      padding: 15px 25px;
      margin-bottom: 25px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
    }

    .welcome-text {
      font-size: 1.5rem;
      font-weight: 600;
      color: var(--primary-color);
      margin: 0;
    }

    .welcome-text span {
      color: var(--secondary-color);
    }

    .search-container {
      position: relative;
      max-width: 400px;
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
      left: 10px;
      
      top: 50%; 
      transform: translateY(-50%);
      color: #a0a0a0;
    }

    .user-profile {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .user-avatar {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background-color: var(--accent-color);
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-weight: bold;
    }

    .first-row{
      height:150px;
      padding-right:2px;
    }


    .navbar-custom {
      background-color: white;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .card {
      border: none;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      width:320px;
    }
    
    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    }

    .card-header-custom{
      background:var(--primary-blue);
    }
    .card-icon {
      font-size: 1.5rem;
      color: var(--primary-blue);
    }

    .stat-card {
      border-left: 4px solid var(--primary-blue);
    }

  </style>

  <!-- Chart.js CDN -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <div class="main-content">
    <div class="container-fluid">
      
             <!-- Topbar améliorée -->
       <div class="dashboard-topbar bg-white rounded-3 shadow-sm p-3 mb-4">
         <div class="row align-items-center">
           <div class="col-md-6">
             <div class="d-flex align-items-center">
               <div class="me-3">
                 <i class="fas fa-chart-line text-primary fs-4"></i>
               </div>
               <div>
                 <h4 class="mb-0 fw-bold text-dark">Tableau de bord</h4>
                 <small class="text-muted">Vue d'ensemble de votre activité</small>
               </div>
             </div>
           </div>
           <div class="col-md-6">
             <div class="d-flex justify-content-end align-items-center gap-3">
               <div class="d-flex align-items-center bg-light rounded-pill px-3 py-2">
                 <i class="fas fa-calendar-alt text-primary me-2"></i>
                 <span class="text-muted small">Aujourd'hui: {{ date('d/m/Y') }}</span>
               </div>
               <div class="d-flex align-items-center bg-light rounded-pill px-3 py-2">
                 <i class="fas fa-clock text-primary me-2"></i>
                 <span class="text-muted small" id="current-time"></span>
               </div>
               <div class="dropdown">
                 <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                   <i class="fas fa-filter me-1"></i>Filtrer
                 </button>
                 <ul class="dropdown-menu">
                   <li><a class="dropdown-item" href="#"><i class="fas fa-calendar-day me-2"></i>Aujourd'hui</a></li>
                   <li><a class="dropdown-item" href="#"><i class="fas fa-calendar-week me-2"></i>Cette semaine</a></li>
                   <li><a class="dropdown-item" href="#"><i class="fas fa-calendar-alt me-2"></i>Ce mois</a></li>
                 </ul>
               </div>
             </div>
           </div>
         </div>
       </div>
      <div class="row mt-3 flex justify-content-between">
        <div class="col-md-4 col-lg-4">
            <div class="card  text-black border-left border-3 border-green shadow-sm border-0  mb-3 p-2">
                <div class="d-flex " >
                  <div class="col-2 bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center " style="width: 35px; height: 35px;">
                    <i class="fas fa-boxes text-primary fa-sm"></i>
                  </div>
                  <span><h6 class="ps-1 text-muted mt-2 " style="font-size:0.9rem;">Nombre de ventes</h6></span>
                </div>
                <div class="d-flex justify-content-between align-items-center" >
                  <span><h6 class="ps-1 fw-bold fs-3 mt-2">+98  <span class="text-primary fw-light fs-6 ">ventes<span> </h6></span>
                  <div class=" bg-primary bg-opacity-10 p-1  d-flex align-items-center justify-content-center text-pimary rounded-4 ">
                    <i class="fas fa-boxes text-primary fa-sm"></i>
                    <span class="text-sm text-primary">+</span>
                    <span class="text-sm text-primary">%27</span>
                  </div>
                </div>
                <div>
                  <p class="text-muted" style="font-size:0.8rem;" >vous avez <span class="text-primary">98 ventes</span> sur vos produit ce mois ci</p>
                </div>
            </div>
          </div>
          <div class="col-md-4 col-lg-4">
            <div class="card  text-black  shadow-sm border-0  mb-3 p-2">
                  <div class="d-flex " >
                    <div class="col-2 bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center " style="width: 35px; height: 35px;">
                      <i class="fas fa-boxes text-success fa-sm"></i>
                    </div>
                    <span><h6 class="ps-1 text-muted mt-2 " style="font-size:0.9rem;">Nombre de ventes</h6></span>
                  </div>
                  <div class="d-flex justify-content-between align-items-center" >
                    <span><h6 class="ps-1 fw-bold fs-3 mt-2">+98  <span class="text-success fw-light fs-6 ">ventes<span> </h6></span>
                    <div class=" bg-success bg-opacity-10 p-1  d-flex align-items-center justify-content-center text-success rounded-4 ">
                      <i class="fas fa-boxes text-success fa-sm"></i>
                      <span class="text-sm text-success">+</span>
                      <span class="text-sm text-success">%27</span>
                    </div>
                  </div>
                  <div>
                    <p class="text-muted" style="font-size:0.8rem;" >vous avez <span class="text-success">98 ventes</span> sur vos produit ce mois ci</p>
                  </div>
              </div>
          </div>
        <div class="col-md-4 col-lg-4">
          <div class="card  text-black border-left border-3 border-green shadow-sm border-0  mb-3 p-2">
                <div class="d-flex " >
                  <div class="col-2 bg-danger bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center " style="width: 35px; height: 35px;">
                    <i class="fas fa-boxes text-danger fa-sm"></i>
                  </div>
                  <span><h6 class="ps-1 text-muted mt-2 " style="font-size:0.9rem;">Nombre de ventes</h6></span>
                </div>
                <div class="d-flex justify-content-between align-items-center" >
                  <span><h6 class="ps-1 fw-bold fs-3 mt-2">+98  <span class="text-danger fw-light fs-6 ">ventes<span> </h6></span>
                  <div class=" bg-danger bg-opacity-10 p-1  d-flex align-items-center justify-content-center text-danger rounded-4 ">
                    <i class="fas fa-boxes text-danger fa-sm"></i>
                    <span class="text-sm text-danger">+</span>
                    <span class="text-sm text-danger">%27</span>
                  </div>
                </div>
                <div>
                  <p class="text-muted" style="font-size:0.8rem;" >vous avez <span class="text-danger">98 ventes</span> sur vos produit ce mois ci</p>
                </div>
              </div>
          </div>
      </div>

      <div class="row flex justify-content-between">
        <div class="col-7"> 
          <div class="card text-black shadow-sm border-0 mb-3 m-0" style="height:450px;width:660px; ">
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-between mb-4">
                <div class="d-flex align-items-center">
                  <i class="fas fa-chart-bar text-primary fs-5 me-2"></i>
                  <h5 class="card-title fw-semibold m-0">Évolution des ventes</h5>
                </div>
                <div class="btn-group btn-group-sm" role="group">
                  <button type="button" class="btn btn-outline-primary active">7j</button>
                  <button type="button" class="btn btn-outline-primary">30j</button>
                  <button type="button" class="btn btn-outline-primary">3m</button>
                </div>
              </div>
              
              <!-- Graphique de ventes -->
              <div class="sales-chart-container" style="height: 250px; position: relative;">
                <canvas id="salesChart" width="400" height="200"></canvas>
                
                <!-- Statistiques en overlay -->
                <div class="position-absolute top-0 end-0 p-3">
                  <div class="text-end">
                    <div class="d-flex align-items-center justify-content-end mb-1">
                      <span class="badge bg-success me-2">+12%</span>
                      <small class="text-muted">vs mois dernier</small>
                    </div>
                    <h6 class="mb-0 text-primary">Total: 1,247 ventes</h6>
                  </div>
                </div>
              </div>
              
              <!-- Légende des données -->
              <div class="row mt-3">
                <div class="col-4 text-center">
                  <div class="d-flex align-items-center justify-content-center">
                    <div class="bg-primary rounded-circle me-2" style="width: 8px; height: 8px;"></div>
                    <small class="text-muted">Ventes</small>
                  </div>
                </div>
                <div class="col-4 text-center">
                  <div class="d-flex align-items-center justify-content-center">
                    <div class="bg-success rounded-circle me-2" style="width: 8px; height: 8px;"></div>
                    <small class="text-muted">Objectif</small>
                  </div>
                </div>
                <div class="col-4 text-center">
                  <div class="d-flex align-items-center justify-content-center">
                    <div class="bg-warning rounded-circle me-2" style="width: 8px; height: 8px;"></div>
                    <small class="text-muted">Prévision</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>  
                 <div class="col-4">
           <div class="card shadow">

               <div class="py-3 card-header-custom d-flex justify-content-center align-items-center">
                 <div class="d-flex align-items-center gap-3">
                   <i class="fas fa-chart-line" style="font-size: 1.5rem; color: white;"></i>
                   <h5 class="mb-0 text-white">Activité Récente</h5>
                 </div>
               </div>

               <div class="card-body p-3">
                 
                 <!-- Activité 1 -->
                 <div class="d-flex align-items-center mb-3 p-2 rounded" style="background-color: #f8f9fa;">
                   <div class="bg-success rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 35px; height: 35px;">
                     <i class="fas fa-shopping-cart text-white fa-sm"></i>
                   </div>
                   <div class="flex-grow-1">
                     <p class="mb-0 fw-semibold" style="font-size: 0.85rem;">Nouvelle vente</p>
                     <p class="mb-0 text-muted" style="font-size: 0.75rem;">Produit "iPhone 15" vendu</p>
                     <small class="text-muted">Il y a 5 min</small>
                   </div>
                 </div>


                 <!-- Bouton Voir tout -->
                 <div class="text-center mt-3">
                   <button class="btn btn-outline-primary btn-sm">
                     <i class="fas fa-eye me-1"></i>Voir toutes les activités
                   </button>
                 </div>
                       
               </div>
           </div>
           </div>
      </div>

      <div class="row flex column bg-white" style="border-radius:5px;">

        <!-- <div class="col-md">
          <div class="p-2" style="margin-left:-1px;">

          </div>

        </div> -->
        <div class="col-md flex">
          <div class="title">
            <i class="fas fa-exclamation-triangle text-warning" style="font-size: 2rem;"></i>
          </div>

          <h4 class="mt-2 mb-3 ps-2 border-start border-4 border-primary">Alertes stock</h4>
            <table class="table table-hover bordered ">
              <thead>

                <th>Id</th>
                <th>Nom du produit</th>
                <th>Categorie</th>
                <th>Prix</th>
                <th>Stock</th>
                <th>Action</th>
              </thead>
              <tbody>
                <td>bangue</td>
                <td>more</td>
                <td>ange</td>
                <td>200000000 Fcfa</td>
                <td>1</td>
                <td><i class="fas fa-eye" style="font-size: 2rem; color: green;"></i></td>

              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>

@endsection

<script>
// Configuration du graphique de ventes
const ctx = document.getElementById('salesChart').getContext('2d');

// Données du graphique
const salesData = {
  labels: ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'],
  datasets: [
    {
      label: 'Ventes réelles',
      data: [45, 52, 38, 67, 89, 76, 54],
      borderColor: '#2563eb',
      backgroundColor: 'rgba(37, 99, 235, 0.1)',
      borderWidth: 3,
      fill: true,
      tension: 0.4,
      pointBackgroundColor: '#2563eb',
      pointBorderColor: '#ffffff',
      pointBorderWidth: 2,
      pointRadius: 6,
      pointHoverRadius: 8
    },
    {
      label: 'Objectif',
      data: [50, 50, 50, 50, 50, 50, 50],
      borderColor: '#10b981',
      backgroundColor: 'rgba(16, 185, 129, 0.05)',
      borderWidth: 2,
      borderDash: [5, 5],
      fill: false,
      tension: 0,
      pointRadius: 0
    },
    {
      label: 'Prévision',
      data: [null, null, null, null, 85, 80, 60],
      borderColor: '#f59e0b',
      backgroundColor: 'rgba(245, 158, 11, 0.1)',
      borderWidth: 2,
      borderDash: [3, 3],
      fill: false,
      tension: 0.4,
      pointRadius: 4,
      pointHoverRadius: 6
    }
  ]
};

// Configuration du graphique
const salesChart = new Chart(ctx, {
  type: 'line',
  data: salesData,
  options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
      legend: {
        display: false
      },
      tooltip: {
        backgroundColor: 'rgba(0, 0, 0, 0.8)',
        titleColor: '#ffffff',
        bodyColor: '#ffffff',
        borderColor: '#2563eb',
        borderWidth: 1,
        cornerRadius: 8,
        displayColors: false,
        callbacks: {
          title: function(context) {
            return 'Jour: ' + context[0].label;
          },
          label: function(context) {
            if (context.dataset.label === 'Ventes réelles') {
              return 'Ventes: ' + context.parsed.y + ' unités';
            } else if (context.dataset.label === 'Objectif') {
              return 'Objectif: ' + context.parsed.y + ' unités';
            } else {
              return 'Prévision: ' + context.parsed.y + ' unités';
            }
          }
        }
      }
    },
    scales: {
      x: {
        grid: {
          display: false
        },
        ticks: {
          color: '#6b7280',
          font: {
            size: 12
          }
        }
      },
      y: {
        grid: {
          color: 'rgba(0, 0, 0, 0.05)',
          drawBorder: false
        },
        ticks: {
          color: '#6b7280',
          font: {
            size: 12
          },
          callback: function(value) {
            return value + 'u';
          }
        }
      }
    },
    interaction: {
      intersect: false,
      mode: 'index'
    },
    elements: {
      point: {
        hoverBackgroundColor: '#2563eb'
      }
    }
  }
});

// Gestion des boutons de période
document.querySelectorAll('.btn-group .btn').forEach(button => {
  button.addEventListener('click', function() {
    // Retirer la classe active de tous les boutons
    document.querySelectorAll('.btn-group .btn').forEach(btn => {
      btn.classList.remove('active');
    });
    
    // Ajouter la classe active au bouton cliqué
    this.classList.add('active');
    
    // Ici vous pouvez ajouter la logique pour changer les données selon la période
    const period = this.textContent;
    console.log('Période sélectionnée:', period);
    
    // Exemple de mise à jour des données (à adapter selon vos besoins)
    if (period === '30j') {
      // Données pour 30 jours
      salesChart.data.labels = ['Sem 1', 'Sem 2', 'Sem 3', 'Sem 4'];
      salesChart.data.datasets[0].data = [320, 450, 380, 520];
      salesChart.data.datasets[1].data = [400, 400, 400, 400];
    } else if (period === '3m') {
      // Données pour 3 mois
      salesChart.data.labels = ['Jan', 'Fév', 'Mar'];
      salesChart.data.datasets[0].data = [1200, 1450, 1380];
      salesChart.data.datasets[1].data = [1500, 1500, 1500];
    } else {
      // Données pour 7 jours (par défaut)
      salesChart.data.labels = ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'];
      salesChart.data.datasets[0].data = [45, 52, 38, 67, 89, 76, 54];
      salesChart.data.datasets[1].data = [50, 50, 50, 50, 50, 50, 50];
    }
    
    salesChart.update();
  });
});
</script>