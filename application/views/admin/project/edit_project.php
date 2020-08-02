<div class="wrapper">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Form elements</h4>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?= base_url("admin/project") ?>"">Project</a>
                    </li>
                    <li class=" active">
                            Edit Project
                    </li>
                </ol>
            </div>
        </div>
        <div class="row">

            <div class="card-box">
                <h4 class="m-t-0 header-title"><b>Input Types</b></h4>
                <p class="text-muted m-b-30 font-13">
                </p>
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-denger" role="alert">
                        <?= validation_errors() ?>
                    </div>
                <?php endif ?>
                <form action="<?= base_url('admin/project/updateProject') ?>" method="post">
                    <input type="hidden" name="id" value="<?= $value->id ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Satuan Kerja</label>
                                    <input type="text" class="form-control" name="satuan_kerja" placeholder="ex: Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Lombok Timur" value="<?= $value->satuan_kerja ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nomor SPK</label>
                                    <input type="text" class="form-control" name="no_spk" placeholder="" value="<?= $value->no_spk ?>" readonly="true">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tanggal SPK</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" placeholder="" name="tgl_spk" id="" value="<?= $value->tgl_spk ?>">
                                        <span class="input-group-addon   "></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Paket Pekerjaan / Nama Project</label>
                                    <input type="text" class="form-control" name="paket_pekerjaan" placeholder="ex: Pembuatan Bendungan Sakra Barat" value="<?= $value->paket_pekerjaan ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nomor Surat Undaganan Pengadaan Langsung</label>
                                    <input type="text" class="form-control" name="no_supl" value="<?= $value->no_supl ?>" placeholder="" readonly="true">
                                </div>
                            </div>

                            <div class=" col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tanggal Surat Undaganan Pengadaan Langsung</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" placeholder="" name="tgl_supl" id="" value="<?= $value->tgl_supl ?>">
                                        <span class="input-group-addon   "></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nomor Berita Acara Hasil Pengadaan Langsung</label>
                                    <input type="text" class="form-control" name="no_bahpl" placeholder="" value="<?= $value->no_bahpl ?>" readonly=" true">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tanggal Berita Acara Hasil Pengadaan Langsung</label>
                                    <div class="input-group">
                                        <input type="date" class=" form-control" placeholder="" name="tgl_bahpl" id="" value="<?= $value->tgl_bahpl ?>">
                                        <span class="input-group-addon   "></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sumber Dana</label>
                                    <textarea name="sumber_dana" class="form-control" id="" cols="30" rows="10"><?= $value->sumber_dana ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Jumlah HK(Pekerja)</label>
                                    <input type="text" class="form-control" name="jumlah_hk" placeholder="" value="<?= $value->jumlah_hk ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tanggal Mulai</label>
                                    <div class="input-group">
                                        <input type="date" class=" form-control" placeholder="" name="tgl_mulai" id="" value="<?= $value->tgl_mulai ?>">
                                        <span class="input-group-addon   "></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="exampleInputEmail1">Tanggal Selesai</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="date" class=" form-control" placeholder="" name="tgl_selesai" id="" value="<?= $value->tgl_selesai ?>">
                                        <span class="input-group-addon   "></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-default btn-md waves-effect waves-light m-b-30">Update Data</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>