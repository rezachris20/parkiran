<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>
<style>
	* {
		font-family:monospace;
	}

	@media print{
		input.noPrint{
			display: none;
		}
	}
</style>
<center><h4 style="text-decoration:underline; ">STRUK PARKIR</h4></center>

<center><table>

	<tr>
		<td style="text-align: center;">BOTANI SQUARE MALL</td>
	</tr>	

	<tr>
		<td style="text-align: center">JL. RAYA PAJAJARAN NO.32 TEGALEGA BOGOR SELATAN</td>
	</tr>


</table></center>
<td><hr></td>

<table>

	<?php
	foreach ($parkir as $p)
	?>
	
	<tr>
		<td>Operator  &nbsp&nbsp</td>
		<td>:&nbsp&nbsp <?php echo $this->session->userdata('nama'); ?></td>
	</tr>

	<tr>
		<td>Nomor Parkir &nbsp&nbsp</td>
		<td>:&nbsp&nbsp <?php echo $p->id_parkir; ?></td>
	</tr>
	
	<tr>
		<td>Nama Pelanggan &nbsp&nbsp</td>
		<td>:&nbsp&nbsp <?php echo $p->nama_pelanggan; ?></td>
	</tr>

	<tr>
		<td>Kode Pelanggan &nbsp&nbsp</td>
		<td>:&nbsp&nbsp <?php echo $p->kode_pelanggan; ?></td>
	</tr>

	<tr>
		<td>Tanggal Masuk &nbsp&nbsp</td>
		<td>:&nbsp&nbsp <?php echo $p->masuk; ?></td>
	</tr>

	<tr>
		<td>Tanggal Keluar &nbsp&nbsp</td>
		<td>:&nbsp&nbsp <?php echo $p->keluar; ?></td>
	</tr>

	<tr>
		<td>Lama Parkir &nbsp&nbsp</td>
		<td>:&nbsp&nbsp <?php echo $p->lama_parkir." Jam" ?></td>
	</tr>

	<tr>
		<td>Biaya Parkir &nbsp&nbsp</td>
		<td>:&nbsp&nbsp <?php echo "Rp. ".number_format($p->bayar); ?></td>
	</tr>
</table>
<hr>

	<!--<tr>
		<td>Pelanggan &nbsp&nbsp</td>
		<td>:&nbsp&nbsp <?php echo $s->nama; ?></td>
	</tr>

</table>

	<td><hr></td>
	
<table>
	<thead>
		<tr>
			<th style="text-align:left;">#</th>
			<th style="text-align:left;">Nama Barang</th>
			<th style="text-align:center;">Bruto</th>
			<th style="text-align:right;">Qty</th>
			<th style="text-align:center;">Diskon</th>
			<th style="text-align:center;">Netto</th>
		</tr>
	</thead>
	<tbody>
		<?php
			foreach ($struk as $st){
			$no = 1;  
		?>
			<tr>
				<td><?php echo  $no++ .'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'?></td>
				<td style="text-align:left;"><?php echo $st->nama_barang; ?></td>
				<td style="text-align:right;"><?php echo '&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'."Rp.".number_format($st->harga_jual).',-' ?></td>

				<td><?php echo '&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.$st->jumlah ?></td>
				<td style="text-align:right;"><?php echo '&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'."Rp.".number_format($st->diskon).',-' ?></td>

				<td style="text-align:right;"><?php echo '&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'."Rp.".number_format($st->total).',-'; ?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>

<td><hr></td>
<center>
<table >
	<tr >
		<th style="text-align:left;">Bruto</th>
		<td>:</td>
		<td>Rp.</td>
		<td style="text-align: right;"><?php echo number_format($st->sub_total).",-"; ?></td>
	</tr>

	<tr>
		<th style="text-align:left;">Diskon</th>
		<td>:</td>
		<td>Rp.</td>
		<td style="text-align: right;"><?php echo number_format($st->total_diskon).",-"; ?></td>
	</tr>

	<tr>
		<th style="text-align:left;">Netto</th>
		<td>:</td>
		<td>Rp.</td>
		<td style="text-align: right;"><?php echo number_format($st->total_all).",-"; ?></td>
	</tr>

	<tr>
		<th style="text-align:left;">Bayar</th>
		<td>:</td>
		<td>Rp.</td>
		<td style="text-align: right;"><?php echo number_format($st->total_bayar).",-"; ?></td>
	</tr>

	<tr>
		<th style="text-align:left;">Kembali</th>
		<td>:</td>
		<td>Rp.</td>
		<td style="text-align: right;"><?php echo number_format($st->total_kembali).",-"; ?></td>
	</tr>
</table>
</center>

<hr>-->
<center>
	<table>
		<p>TERIMAKASIH ATAS KUNJUNGANNYA</p>
		<P>SECURE PARKING</P>
		<p>BOTANI SQUARE MALL</p>
		<p>Jl. Raya Pajajaran No. 23 Tegalega Bogor Selatan</p>
	</table>
</center>
	


<br>

<input type="button" class="noPrint" value="Print" onclick="window.print()"></input>