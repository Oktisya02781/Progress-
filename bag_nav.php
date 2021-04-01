<?php
echo "
<div class='row'>
<div class='col-sm-3'>

<div id='accordion'>
<div class='card'>
<div class='card-header'>
<a class='card-link' href='../dashboard/index.php'>
Dashboard
</a>
</div>
</div>
<div class='card'>
<div class='card-header'>
<a class='card-link' href='../produk/index.php'>
Produk
</a>
</div>
</div>
<div class='card'>
<div class='card-header'>
<a class='card-link' href='../user/index.php'>
User
</a>
</div>
</div>
<div class='card'>
<div class='card-header'>
<a class='card-link' href='../pelanggan/index.php'>
Pelanggan
</a>
</div>
</div>
<div class='card'>
<div class='card-header'>
<a class='card-link' data-toggle='collapse' href='#'>
Transaksi
</a>
</div>
<div id='c2' class='collapse hide' data-parent='#accordion'>
<div class='card-body'>
<div class='card'>
<div class='card-body'>
<a class='card-link' data-toggle='collapse' href='#'>
Sewa
</a>
</div>
</div>
<div class='card'>
<div class='card-body'>
<a class='card-link' data-toggle='collapse' href='#'>
Pembayaran
</a>
</div>
</div>
<div class='card'>
<div class='card-body'>
<a class='card-link' data-toggle='collapse' href='#'>
Pengembalian Mobil
</a>
</div>
</div>
</div>
</div>
</div>
</div>

</div>";
?>