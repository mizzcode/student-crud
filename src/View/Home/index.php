<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student - CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
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

    <!-- MODAL EDIT STUDENT -->
    <div class="modal" tabindex="-1" id="edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL DELETE STUDENT -->
    <div class="modal" tabindex="-1" id="delete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <?php

        if (isset($model['error'])) { ?>

        <div class="alert alert-danger" role="alert">
            <?= $model['error'] ?>
        </div>

        <?php } ?>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>Student Management</h4>
                        <a href="#add" class="btn btn-success float-end" data-bs-toggle="modal"
                            data-bs-target="#add">Add Student</a>
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
                                        <a href="#edit" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#edit">Edit</a>
                                        <a href="#delete" type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete">Delete</a>
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



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>