@extends('layouts.layout_proprio')

@section('content')

<style>
    :root {
      --primary-blue: #2563eb;
      --primary-blue-dark: #1e40af;
      --primary-blue-light: #3b82f6;
      --sidebar-width: 280px;
    }

    .main-content {
      margin-left: var(--sidebar-width);
      padding: 20px;
      background: #f8fafc;
      min-height: 100vh;
    }

    /* Header personnalisé */
    .sales-header {
        background: linear-gradient(135deg, white 0%, #f0f4ff 100%);
        border: 1px solid rgba(37, 99, 235, 0.1);
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(37, 99, 235, 0.05);
        margin-bottom: 24px;
    }

    /* Barre de recherche personnalisée */
    .search-container {
        position: relative;
        max-width: 400px;
    }

    .search-input {
        border: 2px solid #e2e8f0;
        border-radius: 50px;
        padding-left: 45px;
        height: 45px;
        transition: all 0.3s ease;
        background: white;
    }

    .search-input:focus {
        border-color: var(--primary-blue);
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        outline: none;
    }

    .search-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--primary-blue);
        z-index: 5;
    }

    .user-avatar {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, var(--primary-blue), var(--primary-blue-light));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: bold;
        margin-right: 8px;
    }

    .card-style-1 {
        background: white;
        border-radius: 12px;
        border: 1px solid #e2e8f0;
        transition: all 0.3s ease;
        height: 100%;
        position: relative;
        overflow: hidden;
    }

    .card-style-1::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background: linear-gradient(90deg, var(--primary-blue), var(--primary-blue-light));
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    .card-style-1:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 25px rgba(37, 99, 235, 0.12);
        border-color: rgba(37, 99, 235, 0.2);
    }

    .card-style-1:hover::before {
        transform: scaleX(1);
    }
   

    

    .product-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 25px rgba(37, 99, 235, 0.12);
        border-color: rgba(37, 99, 235, 0.2);
    }

    .product-card:hover::before {
        transform: scaleX(1);
    }

    .product-image {
        width: 100%;
        height: 120px;
        object-fit: cover;
        background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #64748b;
        font-size: 2rem;
    }

    .product-name {
        font-size: 0.95rem;
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 0.5rem;
        line-height: 1.3;
    }

    .product-price {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--primary-blue);
        margin-bottom: 0.5rem;
    }

    .product-stock {
        font-size: 0.8rem;
        padding: 0.25rem 0.5rem;
        border-radius: 20px;
        display: inline-flex;
        align-items: center;
        gap: 0.25rem;
    }

    .stock-high {
        background: rgba(16, 185, 129, 0.1);
        color: #059669;
        border: 1px solid rgba(16, 185, 129, 0.2);
    }

    .stock-low {
        background: rgba(245, 158, 11, 0.1);
        color: #d97706;
        border: 1px solid rgba(245, 158, 11, 0.2);
    }

    .stock-out {
        background: rgba(239, 68, 68, 0.1);
        color: #dc2626;
        border: 1px solid rgba(239, 68, 68, 0.2);
    }

    .btn-select-product {
        width: 100%;
        background: var(--primary-blue);
        border: none;
        color: white;
        padding: 0.5rem;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
        margin-top: 0.75rem;
    }

    .btn-select-product:hover {
        background: var(--primary-blue-dark);
        transform: translateY(-1px);
        color: white;
    }
    .btn-add {
        background: var(--primary-blue);
        border: none;
        color: white;
        padding: 0.5rem;
        border-radius: 8px;
        font-weight: 500;
        font-size: 0.85rem;
        transition: all 0.3s ease;
        width: 100%;
    }

    .btn-add:hover {
        background: var(--primary-blue-dark);
        transform: translateY(-1px);
        color: white;
    }


    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in {
        animation: fadeInUp 0.5s ease-out;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .main-content {
            margin-left: 0;
            padding: 16px;
        }

        .search-container {
            max-width: 100%;
            margin-bottom: 1rem;
        }

        .sales-header .row > div {
            margin-bottom: 1rem;
        }
    }
</style>

<div class="main-content">
    <div class="container-fluid">
        
        <div class="sales-header p-4 animate-fade-in">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-6 mb-3 mb-lg-0">
                    <div class="d-flex align-items-center">
                        <div class="bg-primary rounded-3 p-3 me-3">
                            <i class="fas fa-shopping-cart text-white fs-4"></i>
                        </div>
                        <div>
                            <h3 class="mb-0 fw-bold text-dark">Gérer vos ventes</h3>
                            <small class="text-muted">Sélectionnez les produits à vendre</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-3 mb-lg-0">
                    <div class="search-container">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" 
                               class="form-control search-input" 
                               placeholder="Rechercher un produit..."
                               id="searchProduct">
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="d-flex align-items-center justify-content-lg-end">
                        <div class="d-flex align-items-center bg-white rounded-pill shadow-sm px-3 py-2 border">
                            <div class="user-avatar">
                                {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
                            </div>
                            <div>
                                <div class="fw-semibold small text-dark">{{ Auth::user()->name ?? 'Utilisateur' }}</div>
                                <div class="text-muted" style="font-size: 0.75rem;">Vendeur</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3 d-flex">
        
            <div class="col-8">
                <div class="row g-3">
                    @foreach($prods as $prod)
                    <div class="col-xxl-2 col-lg-5 col-md-4 col-sm-6">
                        <div class="card-style-1">
                            <div class="p-3">
                                <h6 class="product-name mb-2">{{$prod->nom}}</h6>
                                <span class="text-muted fs-6" style="">{{$prod->description}}</span>
                                <div class="product-price mb-2">{{$prod->prix}} FCFA</div>
                                <span class="product-stock stock-high mb-3 d-block">
                                    <i class="fas fa-circle"></i> {{$prod->quantite}} en stock
                                </span>
                                <div class="mb-3">
                                    <label for="quantity-{{$prod->id}}" class="form-label">Quantité :</label>
                                    <input type="number" id="quantity-{{$prod->id}}" class="form-control" 
                                        value="1" min="1" max="{{$prod->quantite}}">
                                </div>
                                <button class="btn btn-add">
                                    <i class="fas fa-plus me-1"></i>Ajouter
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach 
                </div>
            </div>

            <div class="col-4 panier">
                <div class="card-style-1">
                    <div class="p-3">
                        <span class="product-stock stock-high  text-center fs-5 mb-3 d-block">
                            Panier
                        </span>
                        
                        <!-- <h6 class="product-name mb-2"></h6>
                        <span class="text-muted fs-6" style=""></span>
                        <div class="product-price mb-2"></div> -->
                    </div>
                </div>
            </div>
        </div>
        

        <div class="text-center py-5 d-none" id="noProductsMessage">
            <div class="text-muted">
                <i class="fas fa-search fs-1 mb-3 opacity-50"></i>
                <h5>Aucun produit trouvé</h5>
                <p>Essayez avec d'autres mots-clés</p>
            </div>
        </div>

    </div>
</div>

<script>

// Fonction de recherche
document.getElementById('searchProduct').addEventListener('input', function(e) {
    const searchTerm = e.target.value.toLowerCase();
    const productCards = document.querySelectorAll('.product-card');
    const noProductsMessage = document.getElementById('noProductsMessage');
    let hasVisibleProducts = false;
    
    productCards.forEach(card => {
        const productName = card.querySelector('.product-name').textContent.toLowerCase();
        const parentCol = card.closest('.col-xl-2, .col-lg-3, .col-md-4, .col-sm-6');
        
        if (productName.includes(searchTerm)) {
            parentCol.style.display = 'block';
            hasVisibleProducts = true;
        } else {
            parentCol.style.display = 'none';
        }
    });
    
    // Afficher/masquer le message "aucun produit"
    if (hasVisibleProducts || searchTerm === '') {
        noProductsMessage.classList.add('d-none');
    } else {
        noProductsMessage.classList.remove('d-none');
    }
});


// Animation au chargement
document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.animate-fade-in');
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            card.style.transition = 'all 0.5s ease-out';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 100);
    });
});
</script>

@endsection