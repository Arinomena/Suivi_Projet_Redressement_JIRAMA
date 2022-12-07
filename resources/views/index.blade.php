<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Choosing file</title>

   <!-- CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" >

   <!-- Bootstrap Core Css -->
   <link href={{ URL::asset('plugins/bootstrap/css/bootstrap.css'); }} rel="stylesheet">

   <!-- Waves Effect Css -->
   <link href={{ URL::asset('plugins/node-waves/waves.css'); }} rel="stylesheet" />

   <!-- Animation Css -->
   <link href={{ URL::asset('plugins/animate-css/animate.css'); }} rel="stylesheet" />

   <!-- Morris Chart Css-->
   <link href={{ URL::asset('plugins/morrisjs/morris.css'); }} rel="stylesheet" />

   <!-- Custom Css -->
   <link href={{ URL::asset('css/style.css'); }} rel="stylesheet">

   <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
   <link href={{ URL::asset('css/themes/all-themes.css'); }} rel="stylesheet" />

</head>
<body class="theme-deep-orange">

   <!-- Top Bar -->
   <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">menu choix de la feuille a lire</a>
            </div>
        </div>
   </nav>
    <!-- #Top Bar -->

   <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src={{ URL::asset('images/user.png'); }} width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Role : ...</div>
                </div>
            </div>
            <!-- #User Info -->

            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="index.html">
                            <span>Home</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
   </aside>

<section class="content">
   <div class="row clearfix">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
         <div class="card">
            <div class="header">
               <div class="row clearfix">
                  <div class="container mt-5">

                     <!-- Success message -->
                     @if(Session::has('success'))
                        <div class="alert alert-success">
                           {{ Session::get('success') }}
                        </div>
                     @endif
                     <!-- End of Success message -->

                     <form method='post' action="{{ route('sheet.importdata') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                           <label for="file" class="form-label">File</label>
                           <input type="file" class="form-control" id="file" name="file" value="">
                        </div>

                        <button type="submit" class="btn btn-success">Import</button>
                     </form>

                  </div>
               </div>
            </div> 
         </div>
      </div>
   </div>  
</section>

</body>
</html>