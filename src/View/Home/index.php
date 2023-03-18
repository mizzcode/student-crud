<!-- MODAL ADD STUDENT -->
<div class="modal" tabindex="-1" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/" method="post">
                    <div class="mb-3">
                        <label>Nim</label>
                        <input type="number" name="nim" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Jurusan</label>
                        <input type="text" name="jurusan" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" name="save_student" type="submit">Save
                            changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <?php

    if (isset($model['error']) || isset($model['notice'])) { ?>

    <div class="alert alert-danger" role="alert">
        <?= $model['error'] ?? $model['notice'] ?>
    </div>

    <?php } ?>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4>Student Management</h4>
                    <a href="#add" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#add">Add
                        Student</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NIM</th>
                                <th>NAMA</th>
                                <th>JURUSAN</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($model['students'] as $student) { ?>
                            <tr>
                                <td> <?= $student['id'] ?> </td>
                                <td> <?= $student['nim'] ?> </td>
                                <td> <?= $student['nama'] ?> </td>
                                <td> <?= $student['jurusan'] ?> </td>
                                <td>
                                    <a href="/student/edit/<?= $student['id'] ?>" class="btn btn-primary">Edit</a>
                                    <form action="/student/delete" method="post" class="d-inline">
                                        <button type="submit" name="delete_student" value="<?= $student['id'] ?>"
                                            class="btn btn-danger btn-md">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>