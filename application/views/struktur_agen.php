<div class="container">
    <div class="row">
        <div class="col-sm-10">
            <?= $this->session->flashdata('msg');?>
            <h3>Form Struktur Agen</h3>
            <form action="<?= base_url('form/struktur_agen_action') ?>" method="post">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Pilih nama agen</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="nama_agen">
                            <option value=""></option>
                            <?php foreach ($nama_agen->result() as $row) { ?>
                                <option value="<?= $row->id ?>"><?= $row->nama_agen ?></option>
                            <?php } ?>

                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nama Atasan</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="atasan">
                            <option value=""></option>
                            <?php foreach ($nama_agen->result() as $row) { ?>
                                <option value="<?= $row->id ?>"><?= $row->nama_agen ?></option>
                            <?php } ?>

                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Mulai Berlaku</label>
                    <div class="col-sm-8">
                        <input type="text" name="berlaku_mulai" id="berlaku_mulai">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Akhir Berlaku</label>
                    <div class="col-sm-8">
                        <input type="text" name="berlaku_akhir" id="berlaku_akhir">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-1 col-form-label">Status</label>
                    <div class="offset-md-2">
                        <input type="checkbox" class="form-check-input" name="status"><span>Aktif</span>
                    </div>
                </div>
                <div class="offset-sm-2">
                    <button type="submit" class="btn btn-primary">Save</button>

                </div>

            </form>
        </div>
    </div>
</div>