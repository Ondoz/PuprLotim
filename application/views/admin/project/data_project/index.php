<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <div class="col-sm-12">
                        <h4 class="m-t-0 header-title"><b>Daftar Project</b></h4>
                        <a href="<?= base_url("admin/project") ?>" class="btn btn-xs btn-default waves-effect waves-light m-b-10"><i class=""></i> Kembali</a>

                        <a href="<?= base_url("admin/project/laporan_pdf/" . $id) ?>" class="btn btn-xs btn-danger waves-effect waves-light m-b-10"><i class=""></i> Print</a>
                    </div>

                    <table border="1" class="table table-bordered">
                        <!-- SPK -->
                        <tr>
                            <th width="40%" rowspan="2" style="vertical-align : middle;text-align: center;">SURAT PERINTAH KERJA (SPK)</th>
                            <th colspan="1"> <span style="font-weight:normal"> SATUAN PEKERJA</span> :
                                <br>
                                <?= strtoupper($value->satuan_kerja) ?></th>
                        </tr>
                        <tr>
                            <th colspan="1"><span style="font-weight:normal">NOMER DAN TANGGAL SPK</span>
                                <br>
                                <?= strtoupper($value->no_spk) ?> tanggal <?= date('j F Y', strtotime($value->tgl_spk)) ?>
                            </th>
                        </tr>
                        <!-- peket pekerjaan -->
                        <tr>
                            <th width="40%" rowspan="2" style="vertical-align : middle;text-align: center;">PAKET PEKERJAAN : <?= $value->paket_pekerjaan ?> </th>
                            <th colspan="1"><span style="font-weight:normal">NOMER DAN TANGGAL SURAT UDANGAN PENGADAAN LANGSUNG : </span>
                                <br>
                                <?= strtoupper($value->no_supl) ?> tanggal <?= date('j F Y', strtotime($value->tgl_supl)) ?>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="1"><span style="font-weight:normal">NOMER DAN TANGGAL BERITA ACARA HASIL PENGADAAN LANGSUNG : </span>
                                <br>
                                <?= strtoupper($value->no_bahpl) ?> tanggal <?= date('j F Y', strtotime($value->tgl_bahpl)) ?>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="2">SUMBER DANA : <?= $value->sumber_dana ?></th>
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
                    <br>
                    <div style="vertical-align : middle;text-align: center;">
                        <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#full-width-modal">Tambah Data Nilai Pekerjaan</button>
                    </div>
                    <br>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center" width="10%" style="vertical-align : middle;text-align: center;">NO</th>
                                <th class="text-center" width="30%" style="vertical-align : middle;text-align: center;">URAIAN PEKERJAAN</th>
                                <th class="text-center" width="10%" style="vertical-align : middle;text-align: center;">VOLUME</th>
                                <th class="text-center" width="10%" style="vertical-align : middle;text-align: center;">SAT.</th>
                                <th class="text-center" width="10%" style="vertical-align : middle;text-align: center;">NOMER ANALISA</th>
                                <th class="text-center" width="10%" style="vertical-align : middle;text-align: center;">HARGA SATUAN (PR)</th>
                                <th class="text-center" width="10%" style="vertical-align : middle;text-align: center;">JUMLAH Rp</th>
                                <th class="text-center" width="6%" style="vertical-align : middle;text-align: center;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="8">
                                    <b>PEKERJAAN PERSIAPAN</b>
                                </td>
                            </tr>
                            <!-- Pekerjaan Pesiaapan -->
                        <tbody id="tbl_persiapan">
                            <?php
                            $i = 1;
                            foreach ($data as $key => $value) :
                                if ($value->status == 1) {
                            ?>
                                    <tr>
                                        <td style="vertical-align : middle;text-align: left;"><?= $i++ ?></td>
                                        <td style="vertical-align : middle;text-align: left;"><?= $value->uraian_pekerjaan ?></td>
                                        <td style="vertical-align : middle;text-align: left;"><?= $value->volume ?></td>
                                        <td style="vertical-align : middle;text-align: left;"><?= $value->sat ?></td>
                                        <td style="vertical-align : middle;text-align: left;"><?= $value->no_analisa ?></td>
                                        <td style="vertical-align : middle;text-align: right;"><?= rupiah($value->harga_satuan) ?></td>
                                        <td style="vertical-align : middle;text-align: right;"><?= rupiah($value->volume * $value->harga_satuan) ?></td>
                                        <td>
                                            <a href="<?php echo base_url("admin/project/hpsDtProject/" . $value->id . "/" . $id) ?>" class="btn btn-danger btn-xs" onclick="return confirm('yakin?')"><i class="md  md-clear"></i></a>
                                            <a href="#custom-modal" class="btn menuUbah btn-warning btn-xs waves-effect waves-light " data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a" data-id="<?= $value->id ?>"><i class="md md-edit"></i></a>
                                        </td>
                                        <input type="hidden" class="valPer" value="<?= $value->volume * $value->harga_satuan ?>">
                                    </tr>
                            <?php }
                            endforeach ?>
                        </tbody>
                        <tr>
                            <td colspan=" 5">

                            </td>
                            <td>
                                <b>SUB TOTAL</b>
                            </td>
                            <td style="vertical-align : middle;text-align: right;" id="perTotal">

                            </td>
                            <td></td>
                        </tr>
                        <!-- end Pekerjaan Persiapan -->

                        <!-- Pekerjaan Talud -->
                        <tr>
                            <td colspan="8">
                                <b>PEKERJAAN TALUD</b>
                            </td>
                        </tr>
                        <tbody id="tbl_talud">
                            <?php
                            $i = 1;
                            foreach ($data as $key => $value) :
                                if ($value->status == 2) {
                            ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $value->uraian_pekerjaan ?></td>
                                        <td><?= $value->volume ?></td>
                                        <td><?= $value->sat ?></td>
                                        <td><?= $value->no_analisa ?></td>
                                        <td style="vertical-align : middle;text-align: right;"><?= rupiah($value->harga_satuan) ?></td>
                                        <td style="vertical-align : middle;text-align: right;"><?= rupiah($value->volume * $value->harga_satuan) ?></td>
                                        <td>
                                            <a href="<?php echo base_url("admin/project/hpsDtProject/" . $value->id . "/" . $id) ?>" class="btn btn-danger btn-xs" onclick="return confirm('yakin?')"><i class="md  md-clear"></i></a>
                                            <a href="#custom-modal" class="btn menuUbah btn-warning btn-xs waves-effect waves-light " data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a" data-id="<?= $value->id ?>"><i class="md md-edit"></i></a>
                                        </td>
                                        <input type="hidden" class="valTal" value="<?= $value->volume * $value->harga_satuan ?>">
                                    </tr>
                            <?php }
                            endforeach ?>
                        </tbody>
                        <tr>
                            <td colspan="5">

                            </td>
                            <td>
                                <b>SUB TOTAL</b>
                            </td>
                            <td style="vertical-align : middle;text-align: right;" id="talTotal">

                            </td>
                            <td></td>
                        </tr>

                        <tr>
                            <td colspan="1">
                            </td>
                            <td colspan="3" style="vertical-align : middle;text-align: center;">
                                <b>JUMLAH </b>
                            </td>
                            <td colspan="3" style="vertical-align : middle;text-align: right;" id="jumlah">
                                RP.
                            </td>
                            <td></td>
                        </tr>
                        </tbody>
                        <!-- end pekerjaan Talud -->
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal tambagh-->
<div id="full-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="full-width-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-full">
        <form action="<?= base_url('admin/project/addDtProject/' . $id) ?>" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="full-width-modalLabel">Tambah Data Nilai</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center" width="30%" style="vertical-align : middle;text-align: center;">URAIAN PEKERJAAN</th>
                                <th class="text-center" width="10%" style="vertical-align : middle;text-align: center;">VOLUME</th>
                                <th class="text-center" width="10%" style="vertical-align : middle;text-align: center;">SAT.</th>
                                <th class="text-center" width="10%" style="vertical-align : middle;text-align: center;">NOMER ANALISA</th>
                                <th class="text-center" width="10%" style="vertical-align : middle;text-align: center;">HARGA SATUAN (PR)</th>
                                <th class="text-center" width="3%" style="vertical-align : middle;text-align: center;">AKSI</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="5">
                                    PEKERJAAN PERSIAPAN
                                <th>
                                    <button type="button" class="btn btn-block btn-primary tbhPekerjaan " style="vertical-align : middle;text-align: center; width:auto; float:center; margin-bottom:10px;" data-id=" 0"> + </button>
                                </th>
                                </td>
                            </tr>
                            <!-- pekerjaan pesiaapan -->
                        <tbody class="persiapan" id="customFields">

                        </tbody>

                        <tr>
                            <td colspan="5">
                                PEKERJAAN TALUD
                            <th>
                                <button type="button" class="btn btn-block btn-primary tbhTalud " style="vertical-align : middle;text-align: center; width:auto; float:center; margin-bottom:10px;" data-id=" 0"> + </button>
                            </th>
                            </td>
                        </tr>
                        <tbody class="talud" id="customField">

                        </tbody>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal edit-->
<!-- Modal -->
<div id="custom-modal" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title" id="modalMenu">Update Data</h4>
    <div class="custom-modal-text text-left">
        <form role="form" action="<?= base_url('admin/project/updateDtProject/') . $id ?>" method="post">
            <input type="hidden" name="id" id="id">
            <div class="form-group">
                <label for="">Uraian Pekerjaan </label>
                <input type="text" class="form-control" name="uraian_pekerjaan" id="uraian_pekerjaan" required placeholder="ex: pembangunan">
            </div>
            <div class="form-group">
                <label for="">Volume</label>
                <input type="text" class="form-control" name="volume" id="volume" required placeholder="Volume">
            </div>
            <div class="form-group">
                <label for="">Sat.</label>
                <input type="text" class="form-control" name="sat" id="sat" required placeholder="ex: Set, m3">
            </div>
            <div class="form-group">
                <label for="">No Analisa</label>
                <input type="text" class="form-control" name="no_analisa" id="no_analisa" required placeholder="ex: Ls, A.1.2.3">
            </div>
            <div class="form-group">
                <label for="">Harga Satuan</label>
                <input type="text" class="form-control" name="harga_satuan" id="harga_satuan" required placeholder="Harga Satuan">
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <select class="form-control" name="status" id="status">
                    <option value="1">Persiapan Pekerjaan</option>
                    <option value="2">Pekerjaan Talud</option>
                </select>
            </div>
            <div class="form-group">
                <label for=""></label>
                <input type="hidden" class="form-control" name="project_id" id="status" value="<?= $id ?>">
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-default waves-effect waves-light">Update</button>
                <button type="button" class="btn btn-danger waves-effect waves-light m-l-10">Cancel</button>
            </div>
        </form>
    </div>
</div>

<script>
    // update ajax
    $(document).ready(function() {
        $(".menuUbah").on("click", function() {
            const id = $(this).data("id");
            $.ajax({
                url: "<?php echo site_url(); ?>admin/project/editDtProject",
                data: {
                    id: id
                },
                method: "POST",
                dataType: "json",
                success: function(data) {
                    $("#uraian_pekerjaan").val(data.uraian_pekerjaan);
                    $("#volume").val(data.volume);
                    $("#sat").val(data.sat);
                    $("#no_analisa").val(data.no_analisa);
                    $("#harga_satuan").val(data.harga_satuan);
                    $("#status").val(data.status);
                    $("#id").val(data.id);
                }
            });
        });
    });

    // data get
    $('.tbhPekerjaan').click(function() {
        var $id = $(this).attr('data-id');
        $ids = parseInt($id) + 1;

        var $data = `<tr>
       <td><input type="text" class="form-control" name="uraian_pekerjaan[]" id="uraian_pekerjaan" placeholder="ex: pembangunan" required></td>
       <td><input type="text" class="form-control" name="volume[]" id="volume" placeholder="Volume" required></td>
       <td><input type="text" class="form-control" name="sat[]" id="sat" placeholder="ex: Set, m3" required></td>
       <td><input type="text" class="form-control" name="no_analisa[]" id="no_analisa" placeholder="ex: Ls, A.1.2.3" required></td>
       <td><input type="text" class="form-control" name="harga_satuan[]" id="harga_satuan" placeholder="Harga Satuan" required></td>
       <input type="hidden" class="form-control" name="status[]" id="status" value="1">
       <input type="hidden" class="form-control" name="project_id[]" id="status" value="<?= $id ?>">
       <td><button type="button" class="btn btn-block btn-danger hpsPekerjaan" style="vertical-align : middle;text-align: center; width:auto; float:center; margin-bottom:10px;" data-id="0"> - </button></td>
       </tr>;`

        $('.persiapan').append($data);
        $('.tbhPekerjaan').attr('data-id', $ids);

    });

    $('.tbhTalud').click(function() {
        var $id = $(this).attr('data-id');
        $ids = parseInt($id) + 1;

        var $data = `<tr>
       <td><input type="text" class="form-control" name="uraian_pekerjaan[]" id="uraian_pekerjaan" placeholder="ex: Pembangunan" required></td>
       <td><input type="text" class="form-control" name="volume[]" id="volume" placeholder="Volume" required></td>
       <td><input type="text" class="form-control" name="sat[]" id="sat" placeholder="Set, m3" required></td>
       <td><input type="text" class="form-control" name="no_analisa[]" id="no_analisa" placeholder="ex: Ls, A.1.2.3" required></td>
       <td><input type="text" class="form-control" name="harga_satuan[]" id="harga_satuan" placeholder="Harga Satuan" required></td>
       <input type="hidden" class="form-control" name="status[]" id="status" value="2">
       <input type="hidden" class="form-control" name="project_id[]" id="status" value="<?= $id ?>">
       <td><button type="button" class="btn btn-block btn-danger hpsTalud" style="vertical-align : middle;text-align: center; width:auto; float:center; margin-bottom:10px;" data-id="0"> - </button></td>
       </tr>;`

        $('.talud').append($data);
        $('.tbhTalud').attr('data-id', $ids);

    });

    $("#customFields").on('click', '.hpsPekerjaan', function() {
        $(this).parent().parent().remove();
    });

    $("#customField").on('click', '.hpsTalud', function() {
        $(this).parent().parent().remove();
    });

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