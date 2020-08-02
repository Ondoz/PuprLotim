<div class="wrapper">
    <div class="container">
        <div class="col-sm-4">
            <a href="#custom-modal" class="btn dataAdd  btn-default btn-md waves-effect waves-light m-b-30" data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a"><i class="md md-add"></i> Add Menu</a>

        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">

                    <h4 class="m-t-0 header-title"><b>Data Sungai</b></h4>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode Sungai</th>
                                <th>Nama Sungai</th>
                                <th>Daerah</th>
                                <th>Lebar max(m)</th>
                                <th>max (m3/det)</th>
                                <th>Panjang</th>
                                <th>Ket/Kondisi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1 ?>
                            <?php foreach ($sda as $key => $value) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $value['kode_sungai'] ?></td>
                                    <td style="text-transform: capitalize;"><?= $value['nama_sungai'] ?></td>
                                    <td style="text-transform: capitalize;"><?= $value['wilayah'] ?></td>
                                    <td><?= $value['lebar_max'] ?></td>
                                    <td><?= $value['max_m3'] ?></td>
                                    <td><?= $value['panjang'] ?></td>
                                    <td style="text-transform: capitalize;"><?= $value['ket'] ?></td>
                                    <td>
                                        <a href="<?php echo base_url("admin/sda/delete/" . $value['id']) ?>" class="btn btn-danger btn-xs" onclick="return confirm('yakin?')"><i class="md  md-clear"></i></a>
                                        <a href="#custom-modal" class="btn dataUbah btn-warning btn-xs waves-effect waves-light " data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a" data-id="<?= $value['id'] ?>"><i class="md md-edit"></i></a>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div id="custom-modal" class="modal-demo">
            <button type="button" class="close" onclick="Custombox.close();">
                <span>&times;</span><span class="sr-only">Close</span>
            </button>
            <h4 class="custom-modal-title" id="modalMenu">Add Data</h4>
            <div class="custom-modal-text text-left">
                <form role="form" action="<?= base_url('admin/sda') ?>" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="kode_sungai">Kode Sungai</label>
                        <input type="text" class="form-control" id="kode_sungai" name="kode_sungai" value="<?= $kode ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama_sungai">Nama Sungai</label>
                        <input type="text" class="form-control" id="nama_sungai" placeholder="Nama Sungai" name="nama_sungai" required>
                    </div>
                    <div class="form-group">
                        <label for="wilayah">Wilayah</label>
                        <select class="form-control" name="wilayah" id="wilayah">
                            <option value="" disabled>Pilih Wilayah Kecamatan </option>
                            <?php foreach ($wilayah as $key => $value) { ?>
                                <option value="<?= $value['kecamatan'] ?>"><?= $value['kecamatan'] ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="lebar_max">Lebar Max(m)</label>
                                <input type="text" class="form-control" id="lebar_max" placeholder="Lebar Max" name="lebar_max" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="max_m3">Max(m3/det)</label>
                                <input type="text" class="form-control" id="max_m3" placeholder="Max(m3/det)" name="max_m3" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="panjang">Panjang</label>
                                <input type="text" class="form-control" id="panjang" placeholder="Panjang" name="panjang" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ket">Ket/Kondisi</label>
                        <input type="text" class="form-control" id="ket" placeholder="ex: Bagus" name="ket" required>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default waves-effect waves-light">Save</button>
                        <button type="button" class="btn btn-danger waves-effect waves-light m-l-10">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    //add ajax
    $(document).ready(function() {
        $(".dataAdd").on("click", function() {
            $("#modalMenu").html("Add Menu");
            $(".modal-footer  button[type=submit]").html("Add Add");
            $("#nama_sungai").val("");
            $("#wilayah").val("");
            $("#lebar_max").val("");
            $("#max_m3").val("");
            $("#panjang").val("");
            $("#ket").val("");
        });

        $(".dataUbah").on("click", function() {
            $("#modalMenu").html("Edit Menu");
            $(".modal-footer  button[type=submit]").html("Update Data");
            $(".custom-modal-text form").attr("action", "menu/update");

            const id = $(this).data("id");

            $.ajax({
                url: "sda/Edit",
                data: {
                    id: id
                },
                method: "POST",
                dataType: "json",
                success: function(data) {
                    $("#kode_sungai").val(data.kode_sungai);
                    $("#nama_sungai").val(data.nama_sungai);
                    $("#wilayah").val(data.wilayah);
                    $("#lebar_max").val(data.lebar_max);
                    $("#max_m3").val(data.max_m3);
                    $("#panjang").val(data.panjang);
                    $("#ket").val(data.ket);
                    console.log(data);
                }
            });
        });
    });
</script>