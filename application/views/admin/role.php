<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $tittle ?></h1>

<div class="row">
    <div class="col-lg-6">
    <!-- pesan error -->
    <?= form_error(
        'menu',
        '<div class="alert-success" roles="alert">
        </div>'
    ); ?>
    <?= $this->session->flashdata('message'); ?>
    <!-- akhir pesan error -->

    <!-- tombol tambah -->
    <a href="" class="btn btn-primary mb-3" class="btn btn-primary" data-toggle="modal"data-target="#Addnewrole"> Add New Role</a>
    <!--Tabel-->

    <table class="table table-hover">
         <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Role</th>
                <th scope="col">action</th>

            </tr>
        </thead>
        <tbody>
        <?php $i = 1; ?>
        <?php foreach ($role as $r) : ?>
            <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $r['role']; ?></td>
                <td>
                    <a href="<?= base_url('admin/roleaccess/') . $r['id'] ?>" class="badge badge-warning">Access</a>
                    <a class="badge badge btn-sm" data-toggle="modal" data-popup="tooltip" data-placement="top" tittle="edit" data-target="#roleedit<?= $r['id']; ?>">Edit</a>
                    <a onclick="hapusRole('<?= base_url('admin/hapusrole/') . $r['id'] ?>')" class="badge badge-danger">Delete</a>
                    
                </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
      </table>
      <!-- akhir tabel -->


      </div>
    </div>

   </div>
   <!-- /.container-fluid -->

   </div>
   <!-- End of Main Content -->




   <!-- button trigger modal -->



   <!-- Modal -->
   <div class="modal fade" id="addnewrole" tabindex="-1" aria-labelledby="AddnewroleLabel" aria-hidden="true">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-tittle" id="newMenuModalLabel">Add new Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('admin/role'); ?>" method="post">
                     <div class="modal-body">
                           <div class="form-group">
                                <input type="text" class="form-control" id="role" name="role" placeholder="Menu Name">
                            </div>
                        </div>

                        <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                             <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


 <!-- Modal edit -->

 <?php foreach ($role as $r) :?>
 <div class="modal fade" id="roleedit<?= $r['id']; ?>" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-tittle" id="newMenuModalLabel">Edit Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('admin/editrole'); ?>" method="post">
                     <div class="modal-body">
                           <div class="form-group">
                                <input type="hidden" name="id" id="id" value="<?= $r['id'] ?>">"
                            </div>

                           <div class="form-group">
                                <input type="text" value="<?= $r['role'] ?>" class="form-control" name="role" id="role" readonly placeholder="Role Name">
                            </div>
                        </div>

                        <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                             <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
<?php endforeach; ?>