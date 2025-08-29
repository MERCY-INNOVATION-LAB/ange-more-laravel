
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

     .dropdown-menu {
       display: none;
       position: absolute;
       z-index: 1000;
       min-width: 10rem;
       padding: 0.5rem 0;
       margin: 0;
       font-size: 1rem;
       color: #212529;
       text-align: left;
       list-style: none;
       background-color: #fff;
       background-clip: padding-box;
       border: 1px solid rgba(0, 0, 0, 0.15);
       border-radius: 0.375rem;
     }

     .dropdown-menu.show {
       display: block;
     }

     .dropdown-item {
       display: block;
       width: 100%;
       padding: 0.25rem 1rem;
       clear: both;
       font-weight: 400;
       color: #212529;
       text-align: inherit;
       text-decoration: none;
       white-space: nowrap;
       background-color: transparent;
       border: 0;
     }

     .dropdown-item:hover {
       color: #1e2125;
       background-color: #e9ecef;
     }

     /* Styles pour le dropdown personnalisé */
     .custom-dropdown {
       position: relative;
       display: inline-block;
     }

     .custom-dropdown-menu {
       display: none;
       position: absolute;
       top: 100%;
       left: 0;
       z-index: 1000;
       min-width: 200px;
       padding: 0.5rem 0;
       margin: 0;
       font-size: 1rem;
       color: #212529;
       text-align: left;
       list-style: none;
       background-clip: padding-box;

       border: 1px solid rgba(0, 0, 0, 0.15);
       border-radius: 0.375rem;
       box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
     }

     .custom-dropdown-menu.show {
       display: block;
     }

     .custom-dropdown-item {
       display: block;
       width: 100%;
       padding: 0.5rem 1rem;
       clear: both;
       font-weight: 400;
       color: #212529;
       text-align: inherit;
       text-decoration: none;
       white-space: nowrap;
       background-color: #fff;
       border: 0;
       cursor: pointer;
     }

     .custom-dropdown-item:hover {
       color: #1e2125;
       background-color: #e9ecef;
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
               <div class="d-flex justify-content-between align-items-center">
                 <div class="more">
                    <h4 class="mb-0 fw-bold text-dark">Tableau de bord</h4>
                    <small class="text-muted">Vue d'ensemble de votre activité</small>
                 </div>
                 <div class="flex justify-end mb-4">
                  <form action="{{ route('dashboard') }}" method="GET" id="boutiqueFilterForm">
                      <select name="boutique_id" id="boutiqueSelect" class="form-select border rounded px-3 py-2">
                          @if($shop)
                              <option value="{{ $shop->id }}" 
                                  {{ request('shop_id') == $shop->id ? 'selected' : '' }}>
                                  {{ $shop->nom }}
                              </option>
                          @endif
                      </select>                  </form>
              </div>
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


  
     <script>
     // Fonction pour sélectionner une boutique
     function selectShop(shopId, shopName) {
       // Mettre à jour le texte du bouton dropdown
       const selectedShopNameElement = document.getElementById('selected-shop-name');
       if (selectedShopNameElement) {
         selectedShopNameElement.textContent = shopName;
       }
       
       // Fermer le dropdown
       toggleShopDropdown();
       
       // Stocker la boutique sélectionnée dans le localStorage (optionnel)
       localStorage.setItem('selectedShopId', shopId);
       localStorage.setItem('selectedShopName', shopName);
       
       // Ici vous pouvez ajouter du code pour recharger les données spécifiques à la boutique
       // Par exemple, faire une requête AJAX pour mettre à jour les statistiques
       console.log('Boutique sélectionnée:', shopName, 'ID:', shopId);
       
       // Optionnel : Recharger la page avec le paramètre de boutique
       // window.location.href = window.location.pathname + '?shop_id=' + shopId;
     }
     
     // Fonction pour basculer le dropdown des boutiques
     function toggleShopDropdown() {
       const dropdownMenu = document.getElementById('shop-dropdown-menu');
       if (dropdownMenu) {
         dropdownMenu.classList.toggle('show');
         console.log('Dropdown toggled');
       }
     }
     
     // Fermer le dropdown quand on clique ailleurs
     document.addEventListener('click', function(event) {
       const dropdown = document.querySelector('.custom-dropdown');
       const dropdownMenu = document.getElementById('shop-dropdown-menu');
       
       if (dropdown && dropdownMenu) {
         if (!dropdown.contains(event.target)) {
           dropdownMenu.classList.remove('show');
         }
       }
     });
     
     // Initialiser au chargement de la page
     document.addEventListener('DOMContentLoaded', function() {
       console.log('DOM chargé');
       
       // Charger la boutique sélectionnée
       const selectedShopName = localStorage.getItem('selectedShopName');
       if (selectedShopName) {
         const selectedShopNameElement = document.getElementById('selected-shop-name');
         if (selectedShopNameElement) {
           selectedShopNameElement.textContent = selectedShopName;
         }
       }
       
       console.log('Dropdown personnalisé initialisé');
     });
   </script>

@endsection
