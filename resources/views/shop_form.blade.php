<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer boutique</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: white;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }

        .form-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(37, 99, 235, 0.1);
            border: 2px solid #f8f9fa;
        }

        .form-header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #f8f9fa;
        }

        .form-header h4 {
            color: #2563eb;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .form-header p {
            color: #666;
            margin: 0;
        }

        .form-floating {
            margin-bottom: 25px;
        }

        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 15px 20px;
            font-size: 16px;
            transition: all 0.3s ease;
            background-color: white;
        }

        .form-control:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 0.2rem rgba(37, 99, 235, 0.15);
            background-color: white;
        }

        .form-label {
            color: #495057;
            font-weight: 500;
            padding-left: 5px;
        }

        .btn {
            border-radius: 10px;
            padding: 12px 30px;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
            border: none;
            margin: 5px;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background: #1d4ed8;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(37, 99, 235, 0.3);
        }

        .btn-secondary {
            background: #f8f9fa;
            color: #495057;
            border: 2px solid #e9ecef;
        }

        .btn-secondary:hover {
            background: #e9ecef;
            color: #495057;
            transform: translateY(-2px);
        }

        .alert {
            border-radius: 10px;
            border: none;
            margin-bottom: 25px;
        }

        .alert-success {
            background: #d1fae5;
            color: #065f46;
            border-left: 4px solid #10b981;
        }

        .form-actions {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid #f8f9fa;
        }

        .form-icon {
            color: #2563eb;
            margin-right: 8px;
        }

        .adresse-tel {
            display: flex;
            justify-content: space-between;
            gap: 15px;
        }

        .adresse-tel .form-floating {
            flex: 1;
            margin-bottom: 25px;
        }

        @media (max-width: 768px) {
            .form-container {
                margin: 20px;
                padding: 30px 20px;
            }
            
            .adresse-tel {
                flex-direction: column;
                gap: 0;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <div class="form-header">
                <h4><i class="fas fa-store form-icon"></i>Créer votre boutique</h4>
                <p>Configurez votre première boutique en quelques étapes</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form method="POST" action="/boutique-create">
                @csrf

                <div class="form-floating">
                    <input type="text" class="form-control" name="name" placeholder="Entrer le nom de la boutique" required>
                    <label><i class="fas fa-store form-icon"></i>Nom de la boutique</label>
                </div>

                <div class="form-floating">
                    <textarea class="form-control" name="description" placeholder="Ce que vous vendez..." style="height: 120px" required></textarea>
                    <label><i class="fas fa-align-left form-icon"></i>Description</label>
                </div>

                <div class="adresse-tel flex justify-content-between">

                    <div class="form-floating">
                        <input type="text" class="form-control" name="adresse" placeholder="1757, Deido-Douala" required>
                        <label><i class="fas fa-map-marker-alt form-icon"></i>Adresse</label>
                    </div>

                    <div class="form-floating">
                        <input type="tel" class="form-control" name="telephone" placeholder="+237 XXXXXXXXX" required>
                        <label><i class="fas fa-phone form-icon"></i>Téléphone</label>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-check me-2"></i>Créer la boutique
                    </button>
                    <button type="reset" class="btn btn-secondary">
                        <i class="fas fa-undo me-2"></i>Réinitialiser
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>