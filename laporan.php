<?php include("config.php");?>

			<?php include("header.php"); ?>
	
		<div class='container' style='margin-top:70px'>
			<div class='row' style='min-height:520px'>
				<div class='col-md-12'>
					<div class='panel panel-success'>					
						<div class='panel-heading'>
            </div>
						
						<a class='btn btn-danger' href='print.php' target="_blank">
						<i class="glyphicon glyphicon-print"></i> print</a>
						
						<div class='panel-body'>
							<center>
								<h3></h3>
								<h3>Laporan Data Transaksi </h3>
								<p>&nbsp;</p>
							</center>

							<table class="table table-hover table-bordered">
							  <thead>
								<tr>
								  <th>No</th>
								  <th>ID Transaksi</th>
								  <th>Nama Pembeli</th>
								  <th>NO Telp</th>
								  <th>Nama Produk </th>
								  
								  <th>Harga</th>
                                  <th>Kategori</th>
                                  <th>Tanggal Bayar</th>
								  <th>Total Harga</th>
								</tr>
							  </thead>
							  <tbody> 
<?php
$query=mysqli_query($conn, "SELECT id_transaksi,nama_pembeli,no_telp,nama_produk,kategori,harga,tgl_bayar,total_bayar 
FROM transaksi
CROSS JOIN produk ON transaksi.id_produk = produk.id_produk 
CROSS JOIN pembeli ON transaksi.id_pembeli = pembeli.id_pembeli")or die (mysqli_error($conn)); 


$j=0; 
while ($row=mysqli_fetch_array($query)) {     
    echo "<tr><td align='left' bgcolor='#657FFF'>";
    echo $j+1;
    echo"</font>";
    echo"</td>";     
    echo "<td align='left' bgcolor='#E8D3DF'>";
    echo $row["id_transaksi"];
    echo"</font>";
    echo"</td>";  
    echo "<td align='left' bgcolor='#E8D3DF'>";
    echo $row["nama_pembeli"];
    echo"</font>";
    echo"</td>";     
    echo"<td align='left' bgcolor='#E8D3DF'>";
    echo $row["no_telp"];
    echo"</font>";
    echo"</td>";     
    echo"<td align='left' bgcolor='#E8D3DF'>";
    echo $row["nama_produk"];
    echo"</font>";
    echo"</td>";     
    echo"<td align='left' bgcolor='#E8D3DF'>";
    echo $row["kategori"];
    echo"</font>";
    echo"</td>";     
    echo"<td align='left' bgcolor='#E8D3DF'>";
    echo $row["harga"];
    echo"</font>";
    echo"</td>";     
    echo"<td align='left' bgcolor='#E8D3DF'>";
    echo $row["tgl_bayar"];
    echo"</font>";
    echo"</td>";     
    echo"<td align='left' bgcolor='#E8D3DF'>";
    echo $row["total_bayar"];
    echo"</font>";
    echo"</td>";     
     $j++;
} ?>
</tbody>
</table><br>
<div class='pull-right'>
							<center>Cikarang Pusat, 20 juli 2021</center> <br>
							<b><center>Manager Marketing</center></b>
							<p>&nbsp;</p>
							<p>&nbsp;</p>
                            <p>&nbsp;</p>
							<b><center>Muhammad Hasbi</center></b>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php include('footer.php');?>