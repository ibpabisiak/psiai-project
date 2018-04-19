<?php
	$servername = "localhost";
	$username = "";
	$password = "";
	$dbname = "";
	$MAX = 3;

	$conn = new mysqli($servername, $username, $password, $dbname);

	if (!$conn)
		die("Connection failed: " . mysqli_connect_error());
	
	
	$textSearch = $_GET['textSearch'];
	
	$tablica_slow = explode(' ',$textSearch);
	$where = implode("%' OR surname LIKE '%", $tablica_slow);
		
	if (isset($_GET['str'])) 
		$str = $_GET['str'];
	else 
		$str = 1;

	$pomin = ($str - 1) * $MAX;
	
	$sql2 = "SELECT *
			FROM psiai_db
			WHERE surname LIKE '%".$where."%'";
	$result2 = mysqli_query($conn, $sql2);
	$rowcount = mysqli_num_rows($result2);
	
	$sql = "SELECT *
			FROM psiai_db
			WHERE surname LIKE '%".$where."%'
			LIMIT $pomin, $MAX";
			
	$result = mysqli_query($conn, $sql);
	
	$num_rows = mysqli_num_rows($result);
	
	$pageSTR = ceil($rowcount / $MAX);
	
	//echo $sql2;
	//echo $num_rows;
	
	if($num_rows > 0 && $textSearch != " " && $textSearch != "")
	{
	?>
		<table style="border: 1px solid black;">
			<tr>
				<td style="border: 1px solid black;"><b><center>ID:</center></b></td>
				<td style="border: 1px solid black;"><b><center>File_id:</center></b></td>
				<td style="border: 1px solid black;"><b><center>Type:</center></b></td>
				<td style="border: 1px solid black;"><b><center>Title:</center></b></td>
				<td style="border: 1px solid black;"><b><center>Invoice_number</center></b></td>
				<td style="border: 1px solid black;"><b><center>Contractor_name:</center></b></td>
				<td style="border: 1px solid black;"><b><center>Amount_netto</center></b></td>
				<td style="border: 1px solid black;"><b><center>Amount_brutto</center></b></td>
				<td style="border: 1px solid black;"><b><center>Amount_vat_tax</center></b></td>
				
			</tr>
		<?php
		while($row = mysqli_fetch_assoc($result))
			echo "
				<tr>
				<td style=\"border: 1px solid black;\">".$row["id"]."</td>
				<td style=\"border: 1px solid black;\">".$row["file_id"]."</td>
				<td style=\"border: 1px solid black;\">".$row["type"]."</td>
				<td style=\"border: 1px solid black;\">".$row["title"]."</td>
				<td style=\"border: 1px solid black;\">".$row["invoice_number"]."</td>
				<td style=\"border: 1px solid black;\">".$row["contractor_name"]."</td>
				<td style=\"border: 1px solid black;\">".$row["amount_netto"]."</td>
				<td style=\"border: 1px solid black;\">".$row["amount_brutto"]."</td>
				<td style=\"border: 1px solid black;\">".$row["amount_vat_tax]."</td>
			
				</tr>";
		?>
		</table>
		<?php
		$linki=' ';
		if ($str>1)
			$linki=$linki. '<a href="'.$_SERVER['PHP_SELF'].'?textSearch='.$textSearch.'&searchD=Szukaj&str='.($str-1).'"><-</a>';
		else
			$linki=$linki. '<-';
		
		for($i=1; $i<=$pageSTR; $i++)
		{
			if ($str==$i)
				$linki=$linki.' '.$i;
			else
				$linki=$linki. '<a href="'.$_SERVER['PHP_SELF'].'?textSearch='.$textSearch.'&searchD=Szukaj&str='.$i.'">'.$i.'</a>';
		}
		
		if ($str<$pageSTR)
			$linki=$linki. '<a href="'.$_SERVER['PHP_SELF'].'?textSearch='.$textSearch.'&searchD=Szukaj&str='.($str+1).'">-></a>';
		else 
			$linki=$linki. '->';
		
		echo $linki;
	}
	else
		echo "Brak w bazie danych";
	mysqli_close($conn);
?>