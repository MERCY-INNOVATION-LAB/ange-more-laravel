<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Stylisée - EzStore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-blue: #2563eb;
            --primary-blue-dark: #1d4ed8;
            --primary-blue-light: #3b82f6;
            --sidebar-width: 280px;
        }

        body {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: var(--sidebar-width);
            background: linear-gradient(180deg, var(--primary-blue) 0%, var(--primary-blue-dark) 100%);
            color: white;
            transform: translateX(-100%);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1050;
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.15);
            overflow-y: auto;
        }

        .sidebar.show {
            transform: translateX(0);
        }

        .sidebar-header {
            padding: 2rem 1.5rem 1.5rem;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
        }
        
        .sidebar-nav {
            padding: 1.5rem 0 2rem;
            flex: 1;
        }

        .nav-section {
            margin-bottom: 2rem;
        }

        .nav-section-title {
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.6);
            padding: 0 1.5rem;
            margin-bottom: 1rem;
            letter-spacing: 0.05em;
        }

        .sidebar-nav .nav-link {
            color: rgba(255, 255, 255, 0.9);
            padding: 1rem 1.5rem;
            margin: 0.25rem 1rem;
            border-radius: 12px;
            transition: all 0.3s ease;
            border: none;
            display: flex;
            align-items: center;
            text-decoration: none;
            position: relative;
            overflow: hidden;
        }

        .sidebar-nav .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.5s;
        }

        .sidebar-nav .nav-link:hover::before {
            left: 100%;
        }

        .sidebar-nav .nav-link:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            transform: translateX(8px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .sidebar-nav .nav-link.active {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transform: translateX(4px);
        }

        .sidebar-nav .nav-link.active::after {
            content: '';
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 50%;
            background: white;
            border-radius: 2px 0 0 2px;
        }

        .sidebar-nav .nav-link i {
            width: 24px;
            height: 24px;
            margin-right: 1rem;
            text-align: center;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .sidebar-nav .nav-link:hover i,
        .sidebar-nav .nav-link.active i {
            background: rgba(255, 255, 255, 0.2);
            transform: scale(1.1);
        }

        .sidebar-nav .nav-link span {
            font-weight: 500;
            font-size: 0.95rem;
        }

        .nav-badge {
            background: #ef4444;
            color: white;
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
            border-radius: 10px;
            margin-left: auto;
            font-weight: 600;
        }

        /* Footer Sidebar */
        .sidebar-footer {
            padding: 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(0, 0, 0, 0.1);
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            margin-bottom: 1rem;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
        }

        .user-details h6 {
            margin: 0;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .user-details small {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.75rem;
        }

        .sidebar-version {
            text-align: center;
            font-size: 0.75rem;
            color: rgba(255, 255, 255, 0.5);
        }

        /* Toggle Button */
        .sidebar-toggle {
            position: fixed;
            top: 1.5rem;
            left: 1.5rem;
            z-index: 1060;
            background: var(--primary-blue);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 0.75rem;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
            transition: all 0.3s ease;
        }

        .sidebar-toggle:hover {
            background: var(--primary-blue-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.4);
        }

        /* Overlay */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1040;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .overlay.show {
            opacity: 1;
            visibility: visible;
        }

        /* Main Content */
        .main-content {
            margin-left: 0;
            transition: margin-left 0.3s ease;
            min-height: 100vh;
            padding: 2rem;
        }

        .main-content.sidebar-open {
            margin-left: var(--sidebar-width);
        }

        .content-card {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 4px 25px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        /* Responsive */
        @media (min-width: 992px) {
            .sidebar {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: var(--sidebar-width);
            }
            
            .sidebar-toggle {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
            }
            
            .main-content.sidebar-open {
                margin-left: 0;
            }
        }

        
        @keyframes slideInFromLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .sidebar-nav .nav-link {
            animation: slideInFromLeft 0.3s ease-out;
        }

        .sidebar-nav .nav-link:nth-child(1) { animation-delay: 0.1s; }
        .sidebar-nav .nav-link:nth-child(2) { animation-delay: 0.2s; }
        .sidebar-nav .nav-link:nth-child(3) { animation-delay: 0.3s; }
        .sidebar-nav .nav-link:nth-child(4) { animation-delay: 0.4s; }
        .sidebar-nav .nav-link:nth-child(5) { animation-delay: 0.5s; }
        .sidebar-nav .nav-link:nth-child(6) { animation-delay: 0.6s; }
        .sidebar-nav .nav-link:nth-child(7) { animation-delay: 0.7s; }
    </style>
</head>
<body>

    <button class="sidebar-toggle" id="sidebarToggle">
        <i class="fas fa-bars"></i>
    </button>

    
    <div class="sidebar" id="sidebar">
        
        <div class="sidebar-header">
            <a href="#" class="sidebar-logo">
                <i class="fas fa-store"></i>
                <span>EzStore</span>
            </a>
            <div class="sidebar-subtitle">Tableau de bord</div>
        </div>

        
        <nav class="sidebar-nav">
            <div class="nav-section">
                <div class="nav-section-title">Menu Principal</div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#" data-section="dashboard">
                            <i class="fas fa-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-section="produits">
                            <i class="fas fa-box"></i>
                            <span>Produits</span>
                            <span class="nav-badge">248</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-section="ventes">
                            <i class="fas fa-shopping-cart"></i>
                            <span>Ventes</span>
                            <span class="nav-badge">12</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-section="clients">
                            <i class="fas fa-users"></i>
                            <span>Clients</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="nav-section">
                <div class="nav-section-title">Rapports & Analyses</div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-section="historique">
                            <i class="fas fa-history"></i>
                            <span>Historique</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-section="statistiques">
                            <i class="fas fa-chart-bar"></i>
                            <span>Statistiques</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-section="parametres">
                            <i class="fas fa-cog"></i>
                            <span>Paramètres</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="sidebar-footer">
            <div class="user-info">
                <div class="user-avatar">
                    <i class="fas fa-user"></i>
                </div>
                <div class="user-details">
                    <h6>Administrateur</h6>
                    <small>admin@ezstore.com</small>
                </div>
            </div>
            <div class="sidebar-version">
                EzStore v2.1.0
            </div>
        </div>
    </div>

    <div class="overlay" id="overlay"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>
