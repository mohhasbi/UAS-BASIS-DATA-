<?php include('header.php');?>

<?php

	include 'config.php';
 

	$q = mysqli_query($conn, "SELECT max(id_pembeli) as idTerbesar FROM pembeli");
	$data = mysqli_fetch_array($q);
	$kodeBarang = $data['idTerbesar'];
 
	
	$urutan = (int) substr($kodeBarang, 3, 3);
 
	
	$urutan++;
 
	
	$huruf = "CS";
	$kodeBarang = $huruf . sprintf("%04s", $urutan);
	?>
 <div class="form">
	<form action="add_pembeli.php" method="post" name="form1" style="text-align:center;">
				<label>ID Pembeli</label><br>
				<input type="text" class="input" name="id_pembeli" required="required" value="<?php echo $kodeBarang ?>" readonly>
				<br>
				<label>Nama Pembeli</label><br>
				<input type="text" class="input" name="nama_pembeli" required="required">
				<br>
				<label>No Telp</label><br>
				<input type="text" class="input" name="no_telp" required="required">
				<br>
				<br>
				<input type="submit" class="btn btn-success" name="Submit" value="Tambah pembeli">
</from>


<?php
 
 // Check If form submitted, insert form data into users table.
 if(isset($_POST['Submit'])) {
	 $id_pembeli = $_POST['id_pembeli'];
	 $nama_pembeli = $_POST['nama_pembeli'];
	 $no_telp = $_POST['no_telp'];
	 
	 // include database connection file
	 include("config.php");
			 
	 // Insert user data into table
	 $result = mysqli_query($conn, "INSERT INTO pembeli(id_pembeli,nama_pembeli,no_telp) 
	 VALUES('$id_pembeli','$nama_pembeli','$no_telp')");
	 
	 // Show message when user added
	 echo "User added successfully. <a href='index.php'>View Users</a>";
 }
 ?>
	
</body><br>
<?php include('footer.php');?>