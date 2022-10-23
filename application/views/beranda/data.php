<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg">

            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <a href="" class="btn  btn-primary mb-3 " data-toggle="modal" data-target="#newModal">Add new data</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Barang</th>
                        <th scope="col">Snis</th>
                        <th scope="col">Tipe</th>
                        <th scope="col">Seri</th>
                        <th scope="col">action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data as $d) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $d['barang']; ?></td>
                            <td><?= $d['snis']; ?></td>
                            <td><?= $d['tipe']; ?></td>
                            <td><?= $d['seri']; ?></td>
                            <td>
                                <a href="<?= base_url('beranda/editdata'); ?>" class="badge badge-success">edit</a>
                                <a href="<?= base_url('beranda/hapus/') . $d['id']; ?>" class="badge badge-danger">delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->


<!-- modal -->

<!-- Modal -->
<div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newModalLabel">Add new menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('beranda/data'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="barang" name="barang" placeholder="Barang">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="snis" name="snis" placeholder="Snis">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="tipe" name="tipe" placeholder="Tipe">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="seri" name="seri" placeholder="Seri">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>