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
    .more-pro-card {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);  
        border: 1px solid #e2e8f0;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
      }

      .more-pro-card:hover {
          transform: translateY(-4px);
          box-shadow: 0 8px 25px rgba(37, 99, 235, 0.15);
          border-color: var(--primary-blue);
      }

      .more-pro-cat {
          font-size: 1.25rem;
          font-weight: 500;
          color:var(--primary-blue);
      }

      .more-pro-nom{
        font-weight:500;
      }
      .more-pro-prix {
          color:var(--primary-blue);
      }

      .more-pro-description {
          color: #64748b;
          font-size: 0.9rem;
          margin-bottom: 1rem;
          line-height: 1.5;
      }

      .badge{

        border-radius:100%;
        background-color:green;
        height:15px;
        width:15px;
      }
      .pro-date {
          color: #64748b;
          font-size: 0.9rem;
          margin-bottom: 1rem;
          line-height: 1.5;
      }
      
    .create-pro-card {
        background: linear-gradient(135deg, #f8fafc, #e2e8f0);
        border: 2px dashed #cbd5e1;
        border-radius: 12px;
        padding: 2rem;
        text-align: center;
        transition: all 0.3s ease;
        height:275px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        min-height: 275px;
        cursor: pointer;
    }

    .create-pro-card:hover {
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

    .create-pro-card:hover .create-icon {
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


  </style>



  <div class="main-content">
    <div class="container-fluid">
    <div class="d-flex align-items-center bg-white rounded-3 shadow-sm p-3 mb-4">
      <div class="more d-flex align-items-center">
        <div class="me-1 mr-2">
            <i class="fas fa-boxes text-primary  fs-4"></i>
        </div>
        <div>
          <h4 class="mb-0 fw-bold text-dark ">Gestion vos produits</h4>
          
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
                <div class="more-pro-card">
                    <h3 class="more-pro-cat">Telephone</h3>

                    <span class=" more-pro-nom text-black fs-5">iphone 15 Pro Max 256GB</span><br>

                    <span class="more-pro-prix fs-4 fw-bold">450 000 FCFA</span><br>
                    <div class="d-flex align-items-center ">
                      <div class="p-2">
                        <span class="badge mt-2">&nbsp</span>
                      </div>
                      <div>
                        <span class="more-pro-qte "> En stock : </span>
                      </div>
                    </div>
                    <div class=" row pro-date d-flex align-items-center justify-content-center mt-2">
                        <div class=" col-md create-item ">
                            <span class="stat-label">Creer le </span>
                        </div>
                        <div class=" col-md update-item">
                            <span class="stat-label">MAJ le </span>
                        </div>
                        
                    </div>

                    <div class="more-pro-actions justify-content-end d-flex">
                      <div>
                        <button class="btn btn-access">
                          <i class="fas fa-edit text-primary me-2"></i>
                        </button>
                      </div>
                      <div>
                        <button class="btn btn-manage">
                          <i class="fas fa-trash text-danger"></i>
                        </button> 
                      </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-12">
                <div class="create-pro-card">
                    <div class="create-icon">
                        <i class="fas fa-plus"></i>
                    </div>
                    <h3 class="create-title">Créer une nouvelle boutique</h3>
                    <p class="create-subtitle">Lancez votre nouvelle boutique en ligne en quelques clics</p>
                </div>
            </div>
            </div>

            </div>

  

@endsection