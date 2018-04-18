<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>PSIAI 2018 Project</title>
    <meta name="description" content="Projekt PSIAI">
	
	<style>
		ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
			overflow: hidden;
			background-color: #333333;
		}

		li {
			float: left;
		}

		li a {
			display: block;
			color: white;
			text-align: center;
			padding: 16px;
			text-decoration: none;
		}

		li a:hover {
			background-color: #111111;
		}
		
		h1 {
			padding: 10px;
		}
	</style>	
	
	
</head>
<body style="margin: 0 0 0 0; ">
	<div style="width: 100%; min-height: 100px;">
		<h1>Company Manager</h1>
		
		<ul>
			<?php if(Functions::GetUserSession()->IsEntitledToRead("login"))
				echo "<li><a href=\"index.php?module=login&page=logout\">Wyloguj</a></li>"; ?>
			
			<?php if(Functions::GetUserSession()->IsEntitledToRead("attendance"))
				echo "<li><a href=\"index.php?module=attendance\">attendance</a></li>"; ?>
			
			<?php if(Functions::GetUserSession()->IsEntitledToRead("documents"))
				echo "<li><a href=\"index.php?module=documents\">documents</a></li>"; ?>
			
			<?php if(Functions::GetUserSession()->IsEntitledToRead("equipment"))
				echo "<li><a href=\"index.php?module=equipment\">equipment</a></li>"; ?>
			
			<?php if(Functions::GetUserSession()->IsEntitledToRead("invoices"))
				echo "<li><a href=\"index.php?module=invoices\">invoices</a></li>"; ?>
			
			<?php if(Functions::GetUserSession()->IsEntitledToRead("invoicescatalog"))
				echo "<li><a href=\"index.php?module=invoicescatalog\">invoicescatalog</a></li>"; ?>
			
			<?php if(Functions::GetUserSession()->IsEntitledToRead("licenses"))
				echo "<li><a href=\"index.php?module=licenses\">licenses</a></li>"; ?>
			
		</ul>
		
	</div>
	
	
	
	
	
	
	
	