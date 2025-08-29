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
                <div class="custom-dropdown">
                  <button class="btn btn-outline-danger bg-danger bg-opacity-10 d-flex align-items-center" type="button" onclick="toggleShopDropdown()" style="height:30px; margin-left:5px;">
                    <i class="fas fa-store text-danger fa-md me-2"></i>
                    <span class="text-sm text-danger " id="selected-shop-name">
                      @if($shop)
                        {{ $shop->first()->nom }}
                      @else
                        Aucune boutique
                      @endif
                    </span>
                    <i class="fas fa-chevron-down text-danger ms-2"></i>
                  </button>
                  <ul class="custom-dropdown-menu" id="shop-dropdown-menu">
                    @if($shop)
                      <li><a class="custom-dropdown-item" href="#" onclick="selectShop('{{ $shop->id }}', '{{ $shop->nom }}')">
                        <i class="fas fa-store text-danger me-2"></i>
                        {{ $shop->nom }}
                      </a></li>
                    @endif
                  </ul>
                </div>
                <div class="dropdown" style="margin-left:20px;">
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
        