@extends('layouts.layout_proprio')

@section('content')
<!-- En-tête META et CSS -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

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
        <!-- En-tête de la page -->
        <div class="sales-header p-4 mb-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h4 class="mb-3">Gestion des ventes</h4>
                    <div class="search-container">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" id="searchProduct" class="form-control search-input" placeholder="Rechercher un produit...">
                    </div>
                </div>
            </div>
        </div>

        <!-- Message aucun produit -->
        <div id="noProductsMessage" class="alert alert-info d-none">
            Aucun produit ne correspond à votre recherche.
        </div>

        <!-- Contenu principal -->
        <div class="row g-4">
            <!-- Liste des produits -->
            <div class="col-8">
                <div class="row g-4">
                    @foreach($prods as $prod)
                    <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="card-style-1 product-card animate-fade-in" data-product-id="{{ $prod->id }}">
                            <div class="p-3">
                                <div class="product-image mb-3">
                                    @if($prod->image)
                                        <img src="{{ asset('storage/' . $prod->image) }}" alt="{{ $prod->nom }}" class="img-fluid">
                                    @else
                                        <div class="no-image">
                                            <i class="fas fa-box fa-2x"></i>
                                        </div>
                                    @endif
                                </div>
                                <h6 class="product-name">{{ $prod->nom }}</h6>
                                <div class="product-price">{{ number_format($prod->prix, 0, ',', ' ') }} FCFA</div>
                                <span class="product-stock {{ $prod->quantite > 10 ? 'stock-high' : ($prod->quantite > 0 ? 'stock-low' : 'stock-out') }}">
                                    <i class="fas fa-circle fs-6"></i>
                                    {{ $prod->quantite }} en stock
                                </span>
                                <button class="btn-select-product" onclick="addToCart({{ $prod->id }}, '{{ $prod->nom }}', {{ $prod->prix }}, {{ $prod->quantite }})"
                                    {{ $prod->quantite <= 0 ? 'disabled' : '' }}>
                                    <i class="fas fa-plus me-2"></i>Ajouter
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Panier -->
            <div class="col-4 panier">
                <div class="card-style-1 sticky-top" style="top: 20px;">
                    <div class="p-3">
                        <span class="product-stock stock-high text-center fs-5 mb-3 d-block">
                            <i class="fas fa-shopping-cart me-2"></i>Panier
                        </span>
                        <div id="cart-items" class="mb-3">
                            <!-- Les éléments du panier seront injectés ici -->
                        </div>
                        <div class="border-top pt-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="fw-bold">Total:</span>
                                <span class="fw-bold text-primary" id="cart-total">0 FCFA</span>
                            </div>
                            <button class="btn-add w-100" onclick="processSale()" id="process-sale-btn" disabled>
                                <i class="fas fa-check me-2"></i>Valider la vente
                            </button>
                        </div>
                    </div>
                </div>
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
        if (productName.includes(searchTerm)) {
            card.style.display = '';
            hasVisibleProducts = true;
        } else {
            card.style.display = 'none';
        }
    });
    
    if (hasVisibleProducts || searchTerm === '') {
        noProductsMessage.classList.add('d-none');
    } else {
        noProductsMessage.classList.remove('d-none');
    }
});

// Animation au chargement
document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.animate-fade-in');
    if (cards) {
        cards.forEach((card, index) => {
            setTimeout(() => {
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, index * 100);
        });
    }
});

// Initialisation du panier
let cart = [];
const MAX_QUANTITY = 99;

// Fonction pour ajouter un produit au panier
function addToCart(id, nom, prix, quantite_max) {
    const existingItem = cart.find(item => item.id === id);
    
    if (existingItem) {
        if (existingItem.quantite < Math.min(quantite_max, MAX_QUANTITY)) {
            existingItem.quantite++;
            updateCartDisplay();
        } else {
            alert('Quantité maximum atteinte pour ce produit');
        }
    } else {
        cart.push({
            id: id,
            nom: nom,
            prix: prix,
            quantite: 1,
            quantite_max: quantite_max
        });
        updateCartDisplay();
    }
}

// Fonction pour retirer un produit du panier
function removeFromCart(id) {
    cart = cart.filter(item => item.id !== id);
    updateCartDisplay();
}

// Fonction pour modifier la quantité d'un produit
function updateQuantity(id, delta) {
    const item = cart.find(item => item.id === id);
    if (item) {
        const newQuantity = item.quantite + delta;
        if (newQuantity > 0 && newQuantity <= Math.min(item.quantite_max, MAX_QUANTITY)) {
            item.quantite = newQuantity;
            updateCartDisplay();
        }
    }
}

// Fonction pour mettre à jour l'affichage du panier
function updateCartDisplay() {
    const cartContainer = document.getElementById('cart-items');
    const total = cart.reduce((sum, item) => sum + (item.prix * item.quantite), 0);
    
    cartContainer.innerHTML = cart.map(item => `
        <div class="cart-item mb-3 pb-3 border-bottom">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h6 class="product-name mb-0">${item.nom}</h6>
                <button class="btn btn-sm text-danger" onclick="removeFromCart(${item.id})">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <div class="quantity-controls">
                    <button class="btn btn-sm btn-outline-secondary" onclick="updateQuantity(${item.id}, -1)">-</button>
                    <span class="mx-2">${item.quantite}</span>
                    <button class="btn btn-sm btn-outline-secondary" onclick="updateQuantity(${item.id}, 1)">+</button>
                </div>
                <div class="text-primary fw-bold">
                    ${(item.prix * item.quantite).toLocaleString()} FCFA
                </div>
            </div>
        </div>
    `).join('');

    document.getElementById('cart-total').textContent = `${total.toLocaleString()} FCFA`;
    document.getElementById('process-sale-btn').disabled = cart.length === 0;
}

// Fonction pour traiter la vente
function processSale() {
    if (cart.length === 0) return;

    // Préparer les données de la vente
    const saleData = {
        items: cart.map(item => ({
            product_id: item.id,
            quantite: item.quantite,
            prix: item.prix
        }))
    };

    // Envoyer la requête au serveur
    fetch('/api/sales', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify(saleData)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Vente effectuée avec succès !');
            cart = [];
            updateCartDisplay();
            // Recharger la page pour mettre à jour les stocks
            window.location.reload();
        } else {
            alert('Erreur lors de la vente : ' + data.message);
        }
    })
    .catch(error => {
        console.error('Erreur:', error);
        alert('Une erreur est survenue lors du traitement de la vente');
    });
}
</script>

@endsection