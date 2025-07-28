<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Accueil | eShop Manager </title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
        tailwind.config = {
            theme: {-
                extend: {
                    colors: {
                        primary: '#2563eb',
                        secondary: '#3b82f6',
                        'electric-blue': '#0066ff',
                        'cyber-green': '#00ff88',
                        'tech-orange': '#ff6600',
                    }
                }
            }
        }
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
      2
    </style>
</head>
<body class="font-sans text-gray-800 scroll-smooth">
  <!-- Navbar -->
  <header class="fixed top-0 w-full bg-white shadow z-50">
    <nav class="max-w-7xl mx-auto flex items-center justify-between px-4 py-4">
        <div class="flex items-center space-x-2">
            <img src="./images/Logo1.png" class="w-14 h-14" alt=""/>
        </div>
      
      <ul class="flex space-x-6">
        <li><a href="#home" class="hover:text-blue-600">Accueil</a></li>
        <li><a href="#features" class="hover:text-blue-600">Fonctionnalités</a></li>
        <li><a href="#pricing" class="hover:text-blue-600">Abonnements</a></li>
        <li><a href="#contact" class="hover:text-blue-600">Contact</a></li>
        <li><a href="#" class="hover:text-blue-600">Se connecter</a></li>
      </ul>
    </nav>
  </header>

  <!-- Hero Section -->
  <section class="pt-24 pb-16 bg-gradient-to-br from-primary/10 to-secondary/10 dark:from-primary/20 dark:to-secondary/20">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold mb-6">
                    Gérez votre boutique électronique
                    <span class="text-primary">en toute simplicité</span>
                </h1>
                <p class="text-xl sm:text-2xl text-gray-600 dark:text-gray-300 mb-8 max-w-3xl mx-auto">
                    EzStore est la solution complète pour optimiser la gestion de votre boutique électronique : stocks, ventes, factures et bien plus encore.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button class="bg-primary hover:bg-primary/90 text-black px-8 py-4 rounded-lg text-lg font-semibold transition-colors shadow-lg hover:shadow-xl">
                        <i class="fas fa-rocket mr-2"></i>
                        Démarrer gratuitement
                    </button>
                    <button class="border-2 border-primary text-primary hover:bg-primary hover:text-white px-8 py-4 rounded-lg text-lg font-semibold transition-colors">
                        <i class="fas fa-play mr-2"></i>
                        Voir la démo
                    </button>
                </div>
            </div>
        </div>
    </section>

  <!-- Fonctionnalités -->
  <section id="features" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
      <h3 class="text-3xl font-bold text-center text-blue-600 mb-10">Fonctionnalités principales</h3>
        <h4 class="text-xl text-gray-600  max-w-2xl mx-auto">
            Tout ce dont vous avez besoin pour gérer efficacement votre boutique électronique
        </h4>
      <div class="grid md:grid-cols-3 gap-8">
        <div class="bg-white p-6 rounded shadow hover:shadow-lg transition">
            <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-4">
                <i class="fas fa-boxes text-primary text-xl"></i>
            </div>
            
            
            <h4 class="text-xl font-semibold mb-2">Gestion des stocks</h4>
            <p>Suivi en temps réel des entrées et sorties de produits électroniques dans chaque boutique.</p>
        </div>
        <div class="bg-white p-6 rounded shadow hover:shadow-lg transition">
            <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-4">
                <i class="fas fa-receipt  text-primary text-xl"></i>
            </div>
          <h4 class="text-xl font-semibold mb-2">Facturation automatisée</h4>
          <p>Générez des factures rapidement pour vos ventes avec export en PDF.</p>
        </div>
        <div class="bg-gray p-6 rounded shadow hover:shadow-lg transition">
            <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-4">
                <i class="fas fa-store-alt text-primary text-xl"></i>
            </div>
          <h4 class="text-xl font-semibold mb-2">Multi-boutiques</h4>
          <p>Gérez plusieurs points de vente avec des utilisateurs différents par boutique.</p>
        </div>
        <div class="bg-white p-6 rounded shadow hover:shadow-lg transition">
            <div class="w-12 h-12 bg-purple-500/20 rounded-lg flex items-center justify-center mb-4 " style="box-shadow: 0 0 15px rgba(138, 43, 226, 0.3);">
                <i class="fas fa-users-cog text-primary text-xl"></i>
            </div>
          <h4 class="text-xl font-semibold mb-2">Gestion du personnel</h4>
          <p>Attribuez des rôles et suivez l’activité de votre équipe par boutique.</p>
        </div>
        <div class="bg-white p-6 rounded shadow hover:shadow-lg transition">
            <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-chart-line text-primary text-xl"></i>
                </div>
          <h4 class="text-xl font-semibold mb-2">Statistiques & rapports</h4>
          <p>Visualisez les performances commerciales à travers des tableaux de bord dynamiques.</p>
        </div>
        <div class="bg-white p-6 rounded shadow hover:shadow-lg transition">
            <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-lock text-primary text-xl"></i>
                </div>
          <h4 class="text-xl font-semibold mb-2">Accès sécurisé</h4>
          <p>Connexion sécurisée avec gestion des droits utilisateurs selon les profils.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Abonnements -->
  <section id="pricing" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
      <h3 class="text-3xl font-bold text-center text-blue-600 mb-10">Nos offres d'abonnement</h3>
      <div class="grid md:grid-cols-3 gap-8">
        <div class="border p-6 rounded shadow text-center">
          <h4 class="text-xl font-semibold text-gray-700 mb-2">Basique</h4>
          <p class="text-2xl font-bold mb-4">5 000 FCFA / mois</p>
          <p>1 boutique, 1 utilisateur, gestion stock & factures.</p>
        </div>
        <div class="border p-6 rounded shadow text-center bg-blue-50">
          <h4 class="text-xl font-semibold text-gray-700 mb-2">Standard</h4>
          <p class="text-2xl font-bold mb-4">15 000 FCFA / mois</p>
          <p>3 boutiques, jusqu'à 5 utilisateurs, statistiques incluses.</p>
        </div>
        <div class="border p-6 rounded shadow text-center">
          <h4 class="text-xl font-semibold text-gray-700 mb-2">Premium</h4>
          <p class="text-2xl font-bold mb-4">30 000 FCFA / mois</p>
          <p>Boutiques illimitées, équipe illimitée, support prioritaire.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact -->
  <section id="contact" class="py-20 bg-gray-100">
    <div class="max-w-3xl mx-auto px-4 text-center">
      <h3 class="text-3xl font-bold text-blue-600 mb-6">Contactez-nous</h3>
      <p class="mb-4">Une question, une demande ? Laissez-nous un message !</p>
      <form class="space-y-4">
        <input type="text" placeholder="Nom" class="w-full p-3 border rounded">
        <input type="email" placeholder="Email" class="w-full p-3 border rounded">
        <textarea placeholder="Message" class="w-full p-3 border rounded h-32"></textarea>
        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Envoyer</button>
      </form>
    </div>
  </section>

<footer class="bg-gray-800 text-white py-8">
    <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-3 gap-8 text-center md:text-left">
      <div>
        <h4 class="font-semibold text-lg mb-2">EzStore</h4>
        <p>Solution de gestion de boutique pour professionnels de l'électronique.</p>
      </div>
      <div>
        <h4 class="font-semibold text-lg mb-2">Navigation</h4>
        <ul>
          <li><a href="#home" class="hover:underline">Accueil</a></li>
          <li><a href="#features" class="hover:underline">Fonctionnalités</a></li>
          <li><a href="#pricing" class="hover:underline">Abonnements</a></li>
          <li><a href="#contact" class="hover:underline">Contact</a></li>
        </ul>
      </div>
      <div>
        <h4 class="font-semibold text-lg mb-2">Contact</h4>
        <p>Email : angebangue1@gmail.com</p>
        <p>Téléphone : +237 6 52 56 56 06</p>
      </div>
    </div>
    <div class="text-center text-sm mt-8">&copy; 2025 EzStore. Tous droits réservés.</div>
  </footer>

</body>
</html>