<html>
   <head>
      <title>Menampilkan Data Tabel MySQL Dengan mysqli_fetch_array</title>
      <style>
         body {font-family:tahoma, arial}
         table {border-collapse: collapse}
         th, td {font-size: 13px; border: 1px solid #DEDEDE; padding: 3px 5px; color: #303030}
         th {background: #CCCCCC; font-size: 12px; border-color:#B0B0B0}
      </style>
   </head>
   <body>
      <h3>Tabel Nota (mysqli_fetch_array)</h3>
      <table>
         <thead>
            <tr>
               <th>Bon</th>
               <th>Jumlah Harga</th>
               <th>Kasir</th>
               <th>Tanggal</th>  
               <th>Total</th>
            </tr>
         </thead>
         <?php
            include 'koneksi.php';		
            $sql = 'SELECT  * FROM tabel_nota';
            $query = mysqli_query($koneksi, $sql);		
            while ($row = mysqli_fetch_array($query, MYSQLI_NUM))
            {
            	?>
         <tbody>
            <tr>
               <td><?php echo $row[0] ?></td>
               <td><?php echo $row[1] ?></td>
               <td><?php echo $row[2] ?></td>
               <td><?php echo $row[3] ?></td>
               <td><?php echo $row[4] ?></td>
			   </tr>
         </tbody>
         <?php
            }
            ?>
      </table>
      <h3>Tabel Nota (mysqli_fetch_row)</h3>
      <table>
         <thead>
            <tr>
               <th>Bon</th>
               <th>Tanggal</th>
               <th>Jumlah Harga</th>
               <th>Kasir</th>
			   
            </tr>
         </thead>
         <?php
            $sql = 'SELECT  * FROM tabel_nota';
            $query = mysqli_query($koneksi, $sql);		
            while ($row = mysqli_fetch_row($query))
            {
            	?>
         <tbody>
            <tr>
               <td><?php echo $row[0] ?></td>
               <td><?php echo $row[1] ?></td>
               <td><?php echo $row[2] ?></td>
               <td><?php echo $row[3] ?></td>
            </tr>
         </tbody>
         <?php
            }
            ?>
      </table>
      </table>
      <h3>Inner Join (mysqli_fetch_assoc)</h3>
      <h4> (Menampilkan data pembelian dari tabel nota berdasarkan tabel transaksi)</h4>
      <table>
         <thead>
            <tr>
			      <th>Total</th>
               <th>Jumlah Harga</th>
               <th>Kasir</th>
               <th>Nama Barang</th>
            </tr>
         </thead>
         <?php
            $sql = 'SELECT pl.total, jumlah_harga, kasir, nama_barang
            FROM tabel_transaksi pl
            JOIN tabel_nota pn USING(total)';
            $query = mysqli_query($koneksi, $sql);		
            while ($row = mysqli_fetch_assoc($query))
            {
            	?>
         <tbody>
            <tr>
               <td><?php echo $row['total'] ?></td>
               <td><?php echo $row['jumlah_harga'] ?></td>
               <td><?php echo $row['kasir'] ?></td>
               <td><?php echo $row['nama_barang'] ?></td>
            </tr>
         </tbody>
         <?php
            }
            ?>
      </table>
      </table>
      </table>
      <h3>left outer Join </h3>
      <h4> (Menampilkan data transaksi berdasarkan bon )</h4>
      <table>
         <thead>
            <tr>
               <th>Bon</th>
               <th>Tanggal</th>
               <th>Nama Barang</th>
               <th>Kasir</th>
            </tr>
         </thead>
         <?php
            $sql = 'SELECT pl.bon, tanggal, nama_barang, kasir
            FROM tabel_transaksi pl
            LEFT JOIN tabel_nota USING(bon)';
            $query = mysqli_query($koneksi, $sql);		
            while ($row = mysqli_fetch_assoc($query))
            {
            	?>
         <tbody>
            <tr>
               <td><?php echo $row['bon'] ?></td>
               <td><?php echo $row['tanggal'] ?></td>
               <td><?php echo $row['nama_barang'] ?></td>
               <td><?php echo $row['kasir'] ?></td>
            </tr>
         </tbody>
         <?php
            }
            ?>
      </table>
   </body>
</html>