<?php
// include database connection file
include("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	$id = $_POST['id_produk'];
	
	$id_produk=$_POST['id_produk'];
	$nama_produk=$_POST['nama_produk'];
	$kategori=$_POST['kategori'];
    $harga=$_POST['harga'];
    $stock=$_POST['stock'];
		
	// update user data
	$result = mysqli_query($conn, "UPDATE produk SET id_produk='$id_produk',nama_produk='$nama_produk',kategori='$kategori',harga='$harga',stock='$stock' WHERE id_produk=$id");
	
	// Redirect to homepage to display updated user in list
	header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk=$id");
 
while($user_data = mysqli_fetch_array($result))
{
	$id_produk = $user_data['id_produk'];
	$nama_produk = $user_data['nama_produk'];
	$kategori = $user_data['kategori'];
    $harga = $user_data['harga'];
    $stock = $user_data['stock'];
}
?>
<?php include('header.php');?>
 
<body>

	<br/><br/>
	<div class="form">
	<form name="update_user" method="post" action="edit_produk.php">
		<table border="0">
			<tr> 
				<td>ID Produk</td>
				<td><input type="text" class="input" name="id_produk" value=<?php echo $id_produk;?> readonly></td>
			</tr>
			<tr> 
				<td>Nama produk</td>
				<td><input type="text" class="input" name="nama_produk" value=<?php echo $nama_produk;?>></td>
			</tr>
			<tr> 
				<td>Kategori</td>
				<td><input type="text" class="input" name="kategori" value=<?php echo $kategori;?>></td>
			</tr>
            <tr> 
				<td>Harga</td>
				<td><input type="text" class="input" name="harga" value=<?php echo $harga;?>></td>
			</tr>
            <tr> 
				<td>Stok</td>
				<td><input type="text" class="input" name="stock" value=<?php echo $stock;?>></td>
			</tr>
			<tr>
				<td><input type="hidden" class="input" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit"  name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
<?php include('footer.php');?>