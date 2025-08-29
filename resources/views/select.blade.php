
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Boutiques - EzStore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-blue: #2563eb;
            --primary-blue-light: #3b82f6;
            --primary-blue-dark: #1d4ed8;
            --bg-light: #f8fafc;
        }

        body {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
        }

        /* Header */
        .header-section {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            border-left: 4px solid var(--primary-blue);
        }

        .welcome-title {
            font-size: 2rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .welcome-title i {
            color: var(--primary-blue);
        }

        .welcome-subtitle {
            color: #64748b;
            font-size: 1.1rem;
            margin: 0;
        }

        .shop-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .shop-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-blue), var(--primary-blue-light));
        }

        .shop-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(37, 99, 235, 0.15);
            border-color: var(--primary-blue);
        }

        .shop-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary-blue), var(--primary-blue-light));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .shop-name {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 0.5rem;
        }

        .shop-description {
            color: #64748b;
            font-size: 0.9rem;
            margin-bottom: 1rem;
            line-height: 1.5;
        }

        .shop-stats {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .stat-item {
            text-align: center;
            flex: 1;
        }

        .stat-value {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--primary-blue);
            display: block;
        }

        .stat-label {
            font-size: 0.75rem;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .shop-actions {
            display: flex;
            gap: 0.75rem;
        }

        .btn-access {
            flex: 1;
            background: var(--primary-blue);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 0.75rem 1rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-access:hover {
            background: var(--primary-blue-dark);
            color: white;
            transform: translateY(-1px);
        }

       

        /*.create-shop-card {
            background: linear-gradient(135deg, #f8fafc, #e2e8f0);
            border: 2px dashed #cbd5e1;
            border-radius: 12px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 280px;
            cursor: pointer;
        }

        .create-shop-card:hover {
            border-color: var(--primary-blue);
            background: linear-gradient(135deg, #dbeafe, #bfdbfe);
            transform: translateY(-2px);
        }

        .create-icon {
            width: 80px;
            height: 80px;
            background: var(--primary-blue);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
        }

        .create-shop-card:hover .create-icon {
            transform: scale(1.1);
        }

        .create-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 0.5rem;
        }

        .create-subtitle {
            color: #64748b;
            font-size: 0.9rem;
        }
            */

        .status-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .status-active {
            background: #dcfce7;
            color: #166534;
        }

        .status-inactive {
            background: #fee2e2;
            color: #991b1b;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 3rem 2rem;
            color: #64748b;
        }

        .empty-state i {
            font-size: 4rem;
            color: #cbd5e1;
            margin-bottom: 1rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header-section {
                padding: 1.5rem;
                margin-bottom: 1.5rem;
            }

            .welcome-title {
                font-size: 1.5rem;
            }

            .shop-card {
                padding: 1.25rem;
            }

            .shop-stats {
                flex-direction: column;
                gap: 0.5rem;
            }

            .shop-actions {
                flex-direction: column;
            }
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

        .shop-card {
            animation: fadeInUp 0.6s ease-out;
        }

        .shop-card:nth-child(1) { animation-delay: 0.1s; }
        .shop-card:nth-child(2) { animation-delay: 0.2s; }
        .shop-card:nth-child(3) { animation-delay: 0.3s; }
        .shop-card:nth-child(4) { animation-delay: 0.4s; }
    </style>
</head>
<body>
    <div class="container py-5">
        <!-- Header Section -->
        <div class="header-section">
            <h1 class="welcome-title">
                <i class="fas fa-store"></i>
                Mes Boutiques
            </h1>
            <p class="welcome-subtitle">Gérez et accédez à toutes vos boutiques en ligne depuis un seul endroit.</p>
        </div>

        <div class="row g-4">
            @forelse($shops as $shop)
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="shop-card">
                        <span class="status-badge status-active">Actif</span>
                        <div class="shop-icon">
                            <i class="fas fa-store"></i>
                        </div>
                        <h3 class="shop-name">{{ $shop->nom }}</h3>
                        <p class="shop-description">{{ $shop->description ?? 'Aucune description' }}</p>
                        
                        <div class="shop-stats">
                            <div class="stat-item">
                                <span class="stat-value"></span>
                                <span class="stat-label">Produits</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value"></span>
                                <span class="stat-label">Ventes</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value"></span>
                                <span class="stat-label">Note</span>
                            </div>
                        </div>

                        <div class="shop-actions">
                            <form action="{{ route('shop-selected', $shop->id)  }}" method="POST">
                                @csrf
                                <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                                <button class="btn btn-access" type="submit">
                                    <i class="fas fa-arrow-right me-2"></i>Accéder
                                </button>
                            </form>
                            <button class="btn btn-manage">
                                <i class="fas fa-cog"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="empty-state">
                    <i class="fas fa-store-slash"></i>
                    <h4>Aucune boutique trouvée</h4>
                    <p>Créez votre première boutique pour commencer à vendre.</p>
                    <a href="{{ route('shop.create') }}" class="btn btn-primary mt-3">
                        <i class="fas fa-plus"></i> Créer une boutique
                    </a>
                </div>
            @endforelse
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
