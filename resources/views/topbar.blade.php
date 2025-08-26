<div class="dashboard-header fade-in">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
          <div class="d-flex align-items-center">
            <div class="me-3 d-none d-md-flex align-items-center justify-content-center rounded-circle bg-primary bg-opacity-10" style="width: 40px; height: 40px;">
              <i class="fas fa-wave-square text-primary"></i>
            </div>
            <div>
              <h5 class="mb-0 fw-bold">Bonjour <span class="text-primary">{{ Auth::user()->name ?? 'Utilisateur' }}</span></h5>
              <small class="text-muted">Ravi de vous revoir</small>
            </div>
          </div>
          
          <div class="search-infos d-flex justify-content-between">

            <div class="search-container order-3 order-md-2 flex-grow-1" style="width: 700px;">
                <div class="position-relative">
                    <i class="fas fa-search search-icon"></i>
                    <input class="form-control search-input ps-5" type="text" placeholder="Rechercher produits, ventes, clients...">
                    <span class="position-absolute end-0 top-50 translate-middle-y me-2 d-none d-md-inline text-muted small"></span>
                </div>
            </div> 
            
            <div class="d-flex align-items-center gap-2 order-2 order-md-3">
                <div class="dropdown">
                    <button class="btn btn-light position-relative rounded-circle p-2" title="Notifications" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bell"></i>
                        <span class="position-absolute top-0 end-0 translate-middle badge rounded-pill bg-danger">3</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow">
                        <li class="dropdown-header fw-semibold">Notifications</li>
                        <li><a class="dropdown-item small" href="#"><i class="fas fa-exclamation-circle text-warning me-2"></i>Stock faible: AirPods</a></li>
                        <li><a class="dropdown-item small" href="#"><i class="fas fa-shopping-cart text-success me-2"></i>Nouvelle vente confirmée</a></li>
                        <li><a class="dropdown-item small" href="#"><i class="fas fa-user-plus text-primary me-2"></i>Nouvel utilisateur ajouté</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-center small" href="#">Voir tout</a></li>
                    </ul>
                </div>
                <div class="dropdown" style="margin-left:100px;">
                    <button class="btn btn-light d-flex align-items-center rounded-pill px-2 py-1" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-avatar me-2">{{ strtoupper(substr(Auth::user()->name ?? 'Utilisateur', 0, 1)) }}</div>
                        <span class="d-none d-md-inline small fw-semibold">{{ Auth::user()->name ?? 'Utilisateur' }}</span>
                        <i class="fas fa-chevron-down ms-2 small d-none d-md-inline"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow">
                        <li class="dropdown-header">
                        <div class="fw-semibold">{{ Auth::user()->name ?? 'Utilisateur' }}</div>
                        <small class="text-muted">{{ Auth::user()->email ?? '' }}</small>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Mon profil</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Paramètres</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                        <form method="POST" action="">
                            @csrf
                            <button class="dropdown-item text-danger"><i class="fas fa-sign-out-alt me-2"></i>Se déconnecter</button>
                        </form>
                        </li>
                    </ul>
                </div>
            </div>
          
          </div>
        </div>
      </div>
        