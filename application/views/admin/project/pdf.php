<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= base_url('assets/images/favicon_1.ico') ?>">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> -->
    <title>Document</title>
    <style>
        body {
            font-size: 12px;
            font-family: Arial, Helvetica, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table,
        th,
        td {
            padding: 5px, 0px, 5px, 0px;
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <table style="border-collapse:collapse; border:none">
        <tr style="border:none">
            <td rowspan="2" style="border:none;padding:0px;">
				<!-- <img src="assets/images/logo.pn?>" height="100px"> -->
				<!-- <img src="<?= base_url('assets/images/logo.png')?>"/> -->
				<img src="<?= base_url('assets/image/logo.png')?>"/>
			</td>
            <td colspan="1" style="border:none;padding:0px; vertical-align : middle;text-align: center;">
                <span style="font-size:18px;"><b>PEMERINTAH KABUPATEN LOMBOK TIMUR</b></span><br>
                <span style="font-size:22px"><b>DINAS PEKERJAAN UMUM DAN PENATAAN RUANG</b></span><br>
            </td>
        </tr>
        <tr>
            <td colspan="1" style="border:none;vertical-align : middle;text-align: right;"><span style="font-weight:normal;">
				<span style="font-size:12px;"><b>Alamat: jalan TGKH. Muhammad Zainuddin Abdul Majid No.162 - 164 Selong 83612</b></span><br>
				<span style="font-size:12px;"><b>Telpon (0376) 21425, 22691 Exrtension (0376) 21726,22690) or (0376) 22715</b></span><br>
				<span style="font-size:12px;"><b>Website: www.lomboktimurkab.go.id</b></span><br>
            </td>
        </tr>
    </table>


    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <table border="1" class="table table-bordered">
                            <!-- SPK -->
                            <tr>
                                <th width="40%" rowspan="2" style="vertical-align : middle;text-align: center;">SURAT PERINTAH KERJA (SPK)</th>
                                <th colspan="1" style="vertical-align : middle;text-align: left;"> <span style="font-weight:normal"> SATUAN PEKERJA</span> :
                                    <br>
                                    <?= strtoupper($value->satuan_kerja) ?></th>
                            </tr>
                            <tr>
                                <th colspan="1" style="vertical-align : middle;text-align: left;"><span style="font-weight:normal;">NOMER DAN TANGGAL SPK</span>
                                    <br>
                                    <?= strtoupper($value->no_spk) ?> tanggal <?= date('j F Y', strtotime($value->tgl_spk)) ?>
                                </th>
                            </tr>
                            <!-- peket pekerjaan -->
                            <tr>
                                <th width="40%" rowspan="2" style="vertical-align : middle;text-align: center;">PAKET PEKERJAAN : <?= $value->paket_pekerjaan ?> </th>
                                <th colspan="1" style="vertical-align : middle;text-align: left;"><span style="font-weight:normal; ">NOMER DAN TANGGAL SURAT UDANGAN PENGADAAN LANGSUNG : </span>
                                    <br>
                                    <?= strtoupper($value->no_supl) ?> tanggal <?= date('j F Y', strtotime($value->tgl_supl)) ?>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="1" style="vertical-align : middle;text-align: left;"><span style="font-weight:normal">NOMER DAN TANGGAL BERITA ACARA HASIL PENGADAAN LANGSUNG : </span>
                                    <br>
                                    <?= strtoupper($value->no_bahpl) ?> tanggal <?= date('j F Y', strtotime($value->tgl_bahpl)) ?>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="2" style="vertical-align : middle;text-align: left;">SUMBER DANA : <?= $value->sumber_dana ?></th>
                            </tr>
                            <tr>
                                <th width="40%" rowspan="2" style="vertical-align : middle;text-align: center;">WAKTU PELAKSANAAN PEKERJAAN</th>
                                <th colspan="1"> <span style="font-weight:normal">JUMLAH PEKERJA:</span>
                                    <br>
                                    <?= $value->jumlah_hk ?> Orang</th>
                            </tr>
                            <tr>
                                <th colspan="1"> <span style="font-weight:normal">Mulai Tanggal <?= date('j F Y', strtotime($value->tgl_mulai)) ?> s/d Tanggal <?= date('j F Y', strtotime($value->tgl_selesai)) ?> </span></th>
                            </tr>
                        </table>
                        <table>
                            <tr></tr>
                        </table>
                        <table>

                            <tr>
                                <th class="text-center" width="3%" style="vertical-align : middle;text-align: center;">NO</th>
                                <th class="text-center" width="30%" style="vertical-align : middle;text-align: center;">URAIAN PEKERJAAN</th>
                                <th class="text-center" width="10%" style="vertical-align : middle;text-align: center;">VOLUME</th>
                                <th class="text-center" width="5%" style="vertical-align : middle;text-align: center;">SAT.</th>
                                <th class="text-center" width="10%" style="vertical-align : middle;text-align: center;">NOMER ANALISA</th>
                                <th class="text-center" width="15%" style="vertical-align : middle;text-align: center;">HARGA SATUAN (PR)</th>
                                <th class="text-center" width="15%" style="vertical-align : middle;text-align: center;">JUMLAH Rp</th>
                            </tr>

                            <tbody>
                                <tr>
                                    <td colspan="7">
                                        <b>PEKERJAAN PERSIAPAN</b>
                                    </td>
                                </tr>
                                <!-- Pekerjaan Pesiaapan -->
                            <tbody id="tbl_persiapan">
                                <?php
                                $i = 1;
                                $sumPer = 0;
                                foreach ($data as $key => $value) :
                                    if ($value->status == 1) {
                                ?>
                                        <tr>
                                            <td style="vertical-align : middle;text-align: left;"><?= $i++ ?></td>
                                            <td style="vertical-align : middle;text-align: left; text-transform: capitalize; "><?= $value->uraian_pekerjaan ?></td>
                                            <td style="vertical-align : middle;text-align: center;"><?= $value->volume ?></td>
                                            <td style="vertical-align : middle;text-align: center; text-transform: capitalize;"><?= $value->sat ?></td>
                                            <td style="vertical-align : middle;text-align: center;"><?= $value->no_analisa ?></td>
                                            <td style="vertical-align : middle;text-align: right;"><?= rupiah($value->harga_satuan) ?></td>
                                            <td style="vertical-align : middle;text-align: right;"><?= rupiah($value->volume * $value->harga_satuan) ?></td>
                                            <input type="hidden" class="valPer" value="<?= $value->volume * $value->harga_satuan ?>">
                                        </tr>
                                <?php
                                        $sumPer += $value->volume * $value->harga_satuan;
                                    }
                                endforeach ?>
                            </tbody>
                            <tr>
                                <td colspan=" 5">
                                </td>
                                <td>
                                    <b>SUB TOTAL</b>
                                </td>
                                <td style="vertical-align : middle;text-align: right;" id="perTotal">
                                    Rp. <?= rupiah($sumPer) ?>
                                </td>
                            </tr>
                            <!-- end Pekerjaan Persiapan -->

                            <!-- Pekerjaan Talud -->
                            <tr>
                                <td colspan="7">
                                    <b>PEKERJAAN TALUD</b>
                                </td>
                            </tr>
                            <tbody id="tbl_talud">
                                <?php
                                $i = 1;
                                $sumTal = 0;
                                $total = 0;
                                foreach ($data as $key => $value) :
                                    if ($value->status == 2) {
                                ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td style="text-transform: capitalize;"><?= $value->uraian_pekerjaan ?></td>
                                            <td style="text-align: center;"><?= $value->volume ?></td>
                                            <td style=" text-align: center;text-transform: capitalize;"><?= $value->sat ?></td>
                                            <td style="text-align: center;"><?= $value->no_analisa ?></td>
                                            <td style="vertical-align : middle;text-align: right;"><?= rupiah($value->harga_satuan) ?></td>
                                            <td style="vertical-align : middle;text-align: right;"><?= rupiah($value->volume * $value->harga_satuan) ?></td>
                                            <input type="hidden" class="valTal" value="<?= $value->volume * $value->harga_satuan ?>">
                                        </tr>
                                <?php
                                        $sumTal += $value->volume * $value->harga_satuan;
                                    }
                                    $total += $value->volume * $value->harga_satuan;
                                endforeach ?>
                            </tbody>
                            <tr>
                                <td colspan="5">

                                </td>
                                <td>
                                    <b>SUB TOTAL</b>
                                </td>
                                <td style="vertical-align : middle;text-align: right;" id="talTotal">
                                    Rp. <?=
                                            rupiah($sumTal);
                                        ?>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="1">
                                </td>
                                <td colspan="3" style="vertical-align : middle;text-align: center;">
                                    <b>JUMLAH </b>
                                </td>
                                <td colspan="3" style="vertical-align : middle;text-align: right;" id="jumlah">
                                    Rp. <?=
                                            rupiah($total);
                                        ?>
                                </td>
                            </tr>
                            </tbody>
                            <!-- end pekerjaan Talud -->
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" integrity="sha384-1CmrxMRARb6aLqgBO7yyAxTOQE2AKb9GfXnEo760AUcUmFx3ibVJJAzGytlQcNXd" crossorigin="anonymous"></script>
    <script>
        //subTotal Persiapan 
        var $sumPer = 0;

        $('.valPer').each(function() {
            var $value = $(this).val();
            $sumPer += parseFloat($value);
        });
        $("#perTotal").html('Rp. ' + $sumPer.toLocaleString());

        // subTotal talud
        var $sumTal = 0;
        $('.valTal').each(function() {
            var $value = $(this).val();
            $sumTal += parseFloat($value);
        });
        $("#talTotal").html('Rp. ' + $sumTal.toLocaleString());

        $("#jumlah").html('Rp. ' + parseFloat($sumPer + $sumTal).toLocaleString());
        $sum = $sumPer + $sumTal;
        $("#bulat").html('Rp. ' + Math.round(($sum / 100) * 100).toLocaleString());
    </script>
</body>

</html>
