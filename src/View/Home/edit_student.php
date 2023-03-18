<div class="container mt-3">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4>
                        <?= $model['title'] ?>
                    </h4>
                    <a href="/" class="btn btn-danger float-end">BACK</a>
                </div>
                <div class="card-body">
                    <form action="/student/edit/<?= $model['student']->id ?>" method="post">
                        <div class="mb-3">
                            <label>Id</label>
                            <input type="number" name="id" class="form-control" disabled value="<?= $model['student']->id ?>">
                        </div>
                        <div class="mb-3">
                            <label>Nim</label>
                            <input type="number" name="nim" class="form-control" value="<?= $model['student']->nim ?>">
                        </div>
                        <div class="mb-3">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="<?= $model['student']->nama ?>">
                        </div>
                        <div class="mb-3">
                            <label>Jurusan</label>
                            <input type="text" name="jurusan" class="form-control" value="<?= $model['student']->jurusan ?>">
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" name="edit_student" type="submit">Save
                                changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>