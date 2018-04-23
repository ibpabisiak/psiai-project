<!doctype html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PSIAI 2018</title>

    <!-- Bootstrap core CSS -->
    <link href="application/views/_common/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="application/views/_common/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php">Company Manager</a>
      
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
			<?php if(Functions::GetUserSession()->IsEntitledToRead("login"))
				echo " <a class=\"nav-link\" href=\"index.php?module=login&page=logout\">Wyloguj się</a>"; ?>		
         
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
				
		

			
			<?php if(Functions::GetUserSession()->IsEntitledToRead("attendance"))
				echo "              <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"index.php?module=attendance\">
                  <span data-feather=\"users\"></span>
                  System obecności
                </a>
              </li>"; ?>
			
			<?php if(Functions::GetUserSession()->IsEntitledToRead("invoices"))
				echo "              <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"index.php?module=invoices\">
                  <span data-feather=\"shopping-cart\"></span>
                  Faktury sprzedaży
                </a>
              </li>"; ?>
			
			<?php if(Functions::GetUserSession()->IsEntitledToRead("invoices"))
				echo "              <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"index.php?module=invoices\">
                  <span data-feather=\"shopping-cart\"></span>
                  Faktury kupna
                </a>
              </li>"; ?>
			
			<?php if(Functions::GetUserSession()->IsEntitledToRead("invoicescatalog"))
				echo "              <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"index.php?module=invoicescatalog\">
                  <span data-feather=\"shopping-cart\"></span>
                  Katalog faktur
                </a>
              </li>"; ?>
			
			<?php if(Functions::GetUserSession()->IsEntitledToRead("documents"))
				echo "              <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"index.php?module=documents\">
                  <span data-feather=\"file\"></span>
                  Dokumenty
                </a>
              </li>"; ?>
			
			<?php if(Functions::GetUserSession()->IsEntitledToRead("equipment"))
				echo "              <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"index.php?module=equipment\">
                  <span data-feather=\"layers\"></span>
                  Sprzęt
                </a>
              </li>"; ?>
			
			<?php if(Functions::GetUserSession()->IsEntitledToRead("licenses"))
				echo "              <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"index.php?module=licenses\">
                  <span data-feather=\"layers\"></span>
                  Licencje
                </a>
              </li>"; ?>
			  
            </ul>

          </div>
        </nav>


	
	
	
	
	
	