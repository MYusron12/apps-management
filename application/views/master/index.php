    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

      <div class="row">
        <div class="col-md-3">
          <a href="" class="btn btn-primary mb-3 tambahData" data-toggle="modal" data-target="#newMasterModal">Add New</a>
        </div>
        <div class="col-md-5" style="margin-left: 180px;">
          <form action="<?= base_url('master'); ?>" method="post">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Search Keyword.." name="keyword" autocomplete="off" autofocus>
              <div class="input-group-append">
                <input class="btn btn-primary" type="submit" name="submit">
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-10">

          <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
              <?= validation_errors(); ?>
            </div>
          <?php endif; ?>

          <?= $this->session->flashdata('message') ?>


          <div class="card mb-4 text-white">
            <div class="card-header py-3 bg-primary">
              Total : <?= $total_rows; ?> Data Results
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>

                  </tr>
                </thead>
                <tbody>
                  <?php if (empty($master)) : ?>
                    <tr>
                      <td colspan="4" style="text-align: center;">
                        <div class="alert alert-danger" role="alert">
                          Data not found!
                        </div>
                      </td>
                    </tr>

                  <?php endif; ?>
                  <?php foreach ($master as $mstr) : ?>
                    <tr>
                      <th scope="row"><?= ++$start; ?></th>
                      <td><?= $mstr['name']; ?></td>
                      <td><?= $mstr['phone']; ?></td>
                      <td><?= $mstr['email']; ?></td>
                      <td><?= $mstr['address']; ?></td>
                      <td>
                        <a href="<?= base_url('master/getchangingmaster/') . $mstr['id'] ?>" class="badge badge-success btn-sm tampilModalUbah" data-toggle="modal" data-target="#newMasterModal" data-id="<?= $mstr['id']; ?>">Edit</a>

                        <a href="<?= base_url('master/deletemaster/') . $mstr['id'] ?>" class="badge badge-danger btn-sm" onclick="return confirm('Are you sure ?..');">Delete</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <?= $this->pagination->create_links(); ?>
            </div>
          </div>


        </div>
      </div>


    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Modal -->



    <!-- Modal -->
    <div class="modal fade" id="newMasterModal" tabindex="-1" role="dialog" aria-labelledby="newMasterModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="newMasterModaLabel">Add New</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('master/mastertambah'); ?>" method="post">

              <input type="hidden" id="id" name="id">

              <div class="form-group">
                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="phone" name="phone" placeholder="phone">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="email" name="email" placeholder="email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="address" name="address" placeholder="address">
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