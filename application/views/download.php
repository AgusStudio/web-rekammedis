<?php // Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=lap$tglawal-$tglakhir.xls");
?>
<table border="1">
    <thead>
    	<tr>
            <th colspan="21" style="font-family: arial;font-weight: bold;font-size: 14px;">Laporan Kunjungan Pasien Periode : <?php echo date('d/m/Y', strtotime($tglawal))." - ".date('d/m/Y', strtotime($tglakhir));?></th>
        </tr>
        <tr>
			<th>No</th>
			<th>No Check Up</th>
			<th>Tgl</th>
			<th>Kode Pasien</th>
			<th>Nama</th>
            <th>KTP</th>
            <th>Jenis Kelamin</th>
            <th>Status Perkawinan</th>
            <th>Gol Darah</th>
            <th>TTL</th>
            <th>Usia</th>
            <th>Agama</th>
            <th>TLP</th>
            <th>Alamat</th>
            <th>Pekerjaan</th>
            <th>Asuransi</th>
            <th>No Asuransi</th>
            <th>Kode Dokter</th>
            <th>Nama Dokter</th>
            <th>Poli</th>
            <th>Diagnosa</th>
		</tr>	
    </thead>
    <tbody style="font-family: arial;">
    	<?php $no=1; foreach ($laporan as $laporan) : ?>
		<tr>
			<td><?php echo $no++;?></td>
			<td><?php echo $laporan->id_berobat;?></td>
			<td><?php echo date('d/m/Y', strtotime($laporan->tgl_berobat));?></td>
			<td><?php echo "P-".$laporan->id_pasien;?></td>
			<td><?php echo $laporan->nama_pasien;?></td>
            <td><?php echo $laporan->ktp_pasien;?></td>
            <td><?php echo $laporan->jk_pasien;?></td>
            <td><?php echo $laporan->status_nikah;?></td>
            <td><?php echo $laporan->gol_darah;?></td>
            <td><?php echo $laporan->tempat_lahir_pasien.",".date('d/m/Y', strtotime($laporan->tgl_lahir_pasien));?></td>
            <td><?php $thn = date('Y', strtotime($laporan->tgl_lahir_pasien)); $u = date('Y'); echo $u-$thn;?></td>
            <td><?php echo $laporan->agama_pasien;?></td>
            <td><?php echo $laporan->tlp_pasien;?></td>
            <td><?php echo $laporan->alamat_pasien;?></td>
            <td><?php echo $laporan->pekerjaan_pasien;?></td>
            <td><?php echo $laporan->asuransi;?></td>
            <td><?php echo $laporan->no_asuransi;?></td>
            <td><?php echo $laporan->kode_dokter;?></td>
            <td><?php echo $laporan->nama_dokter;?></td>
            <td><?php echo $laporan->nama_poli;?></td>
            <td><?php $riwayat_diagnosa = $this->Model_rekammedis->rekam_diagnosa($laporan->id_berobat);
            foreach ($riwayat_diagnosa as $diagnosa) :
            echo $diagnosa->kode_icd." | ".$diagnosa->nama_icd."( ".$diagnosa->keterangan_icd." ) <br/>";
        	endforeach; ?>
            </td>
		</tr>
	<?php endforeach;?>
	</tbody>
    <tfoot>
    	<tr>
            <th colspan="20" style="font-family: arial;font-weight: bold;font-size: 14px;">Total Kunjungan</th>
            <th style="font-family: arial;font-weight: bold;font-size: 14px;"><?php echo $tot_kunjungan;?></th>
        </tr>
    </tfoot>
</table>
                        