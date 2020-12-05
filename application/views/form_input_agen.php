<div class="container pt-2">
    <?= $this->session->flashdata('msg');?>
    <div class="row">
        <div class="col-sm-8">
            <h3>Form Input Agen</h3>
            <form action="<?= base_url('form/form_action')?>" method="post">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">No. Lisensi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="no_lisensi">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nama agen</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_agen">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Level agen</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="level_agen">
                            <option value=""></option>
                            <?php foreach($level_agent->result() as $row){ ?>
                                <option value="<?= $row->id?>"><?= $row->level?></option>
                            <?php }?>
                            
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Wilayah kerja</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="wilayah_kerja">
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