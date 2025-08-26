<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard EzStore</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  

  
</head>
<body>

<section class="">

    
    <!-- sidebar -->

    @include('sidebar')


    {{-- contenu principal --}}

    <div class="">
       <div class="topbar" style="margin-left:280px;">

            <!-- topbar -->

            @include('topbar')

       </div>
        <!-- contenu de la page-->
            <main>
                @yield('content')
            </main>
    </div>

</section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>
</html>