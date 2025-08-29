@extends('layouts\layout_proprio')


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
        .create-shop-card {
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
        

  </style>



  <div class="main-content">
    <div class="container-fluid">
    <div class="d-flex align-items-center bg-white rounded-3 shadow-sm p-3 mb-4">
      <div class="more d-flex align-items-center">
        <div class="me-1">
            <i class="fas fa-cog text-primary fs-4"></i>
        </div>
        <div>
          <h4 class="mb-0 fw-bold text-dark ">Paramètres</h4>
          
          <small class="text-muted">Vue d'ensemble de vos produits</small>
        </div>
      </div>
      <div class="ps-3 mb-4">
        <form action="{{ route('dashboard') }}" method="GET" id="boutiqueFilterForm">
          <select name="boutique_id" id="boutiqueSelect" class="form-select text-danger bg-danger bg-opacity-10 border rounded px-3 py-2">
              @if($shop)
                  <option value="{{ $shop->id }}"
                      {{ request('shop_id') == $shop->id ? 'selected' : '' }}>
                      {{ $shop->nom }}
                  </option>
              @endif
          </select>             
        </form>
      </div>
    </div>
    <div class="row g-4">
            <!-- Shop 1 -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="shop-card">
                    <span class="status-badge status-active">Actif</span>
                    <div class="shop-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3 class="shop-name">TechStore Pro</h3>
                    <p class="shop-description">Boutique spécialisée dans les produits électroniques et accessoires high-tech.</p>
                    
                    <div class="shop-stats">
                        <div class="stat-item">
                            <span class="stat-value">248</span>
                            <span class="stat-label">Produits</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value">156</span>
                            <span class="stat-label">Ventes</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value">4.8</span>
                            <span class="stat-label">Note</span>
                        </div>
                    </div>

                    <div class="shop-actions">
                        <button class="btn btn-access">
                            <i class="fas fa-arrow-right me-2"></i>Accéder
                        </button>
                        <button class="btn btn-manage">
                            <i class="fas fa-cog"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-12">
                <div class="create-shop-card">
                    <div class="create-icon">
                        <i class="fas fa-plus"></i>
                    </div>
                    <h3 class="create-title">Créer une nouvelle boutique</h3>
                    <p class="create-subtitle">Lancez votre nouvelle boutique en ligne en quelques clics</p>
                </div>
            </div>
    
            
    </div>
  

@endsection