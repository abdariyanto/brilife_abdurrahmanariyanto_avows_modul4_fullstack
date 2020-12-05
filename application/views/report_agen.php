<div class="container">
    <div class="row">
        <div class="col-md-12 pt-2">
            <form action="<?= base_url('form/report_agen') ?>" method="get" class="form-inline">
                <div class="form-group row">
                    <label for="staticEmail" class="col-md-4 col-form-label">Wilayah Kerja</label>
                    <div class="col-md-6">
                        <select class="form-control" name="wilayah_kerja">
                            <option value=""></option>
                            <?php foreach ($wilayah_kerja->result() as $row) { ?>
                                <option value="<?= $row->wilayah_kerja ?>"><?= $row->wilayah_kerja ?></option>
                            <?php } ?>

                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-md-4 col-form-label">Status</label>
                    <div class="col-md-6">
                        <input class="form-check-input" type="checkbox" name="status" value="1">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mb-2">View</button>
            </form>
        </div>
        <div class="col-md-12">
            <div class="card ">
                <div class="card-title">
                    <h2 class="text-center">AGEN LEVEL BERDASARKAN WILAYAH KERJA</h2>
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center " rowspan="2">NO</th>
                                    <th class="text-center" rowspan="2">WILAYAH</th>
                                    <th class="text-center" colspan="5">LEVEL AGEN</th>
                                </tr>
                                <tr>

                                    <th class="text-center">RM</th>
                                    <th class="text-center">SM</th>
                                    <th class="text-center">UM</th>
                                    <th class="text-center">FU</th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($query->result() as $row) { ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td class="text-center"><?= $row->wilayah_kerja ?></td>
                                        <td class="text-center"><?php if ($row->id_agen_level == '4') {
                                                                    echo $row->nama_agen;
                                                                } ?></td>
                                        <td class="text-center"><?php if ($row->id_agen_level == '3') {
                                                                    echo $row->nama_agen;
                                                                } ?></td>
                                        <td class="text-center"><?php if ($row->id_agen_level == '2') {
                                                                    echo $row->nama_agen;
                                                                } ?></td>
                                        <td class="text-center"><?php if ($row->id_agen_level == '1') {
                                                                    echo $row->nama_agen;
                                                                } ?></td>
                                    </tr>
                                    <tr>

                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>