<?php
// include database connection file
include("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	$id = $_POST['id_pembeli'];
	
	$id_pembeli=$_POST['id_pembeli'];
	$nama_pembeli=$_POST['nama_pembeli'];
	$no_telp=$_POST['no_telp'];
		
	// update user data
	$result = mysqli_query($conn, 
	"UPDATE pembeli SET id_pembeli='$id_pembeli',nama_pembeli='$nama_pembeli',no_telp='$no_telp' WHERE id_pembeli=$id");
	
	// Redirect to homepage to display updated user in list
	header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM pembeli WHERE id_pembeli=$id");
 
while($user_data = mysqli_fetch_array($result))
{
	$id_pembeli = $user_data['id_pembeli'];
	$nama_pembeli = $user_data['nama_pembeli'];
	$no_telp = $user_data['no_telp'];
}
?>
<?php include('header.php');?>
 
<body>

	<br/><br/>
	<div class="form">
	<form name="update_user" style="text-align:center;" method="post" action="edit_pembeli.php">
		<table border="0">
			<tr> 
				<td>ID Pembeli</td>
				<td><input type="text" class="input" name="id_pembeli" value=<?php echo $id_pembeli;?> readonly></td>
			</tr>
			<tr> 
				<td>Nama Pembeli</td>
				<td><input type="text" class="input" name="nama_pembeli" value=<?php echo $nama_pembeli;?>></td>
			</tr>
			<tr> 
				<td>No Telp/day</td>
				<td><input type="text" class="input" name="no_telp" value=<?php echo $no_telp;?>></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
<?php include('footer.php');?>