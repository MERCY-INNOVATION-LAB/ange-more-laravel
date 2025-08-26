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

    .card {
      border: none;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      width:320px;
    }
    
    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    }

    .card-header-custom{
      background:var(--primary-blue);
    }
    .card-icon {
      font-size: 1.5rem;
      color: var(--primary-blue);
    }

    .stat-card {
      border-left: 4px solid var(--primary-blue);
    }

  </style>



  <div class="main-content">
    <div class="container-fluid">
      
      <p>wertyuijhgfasdfn</p>
    </div>
  </div>


  

@endsection