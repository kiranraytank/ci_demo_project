<?php $this->load->view("admin/header") ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Article</h1>
                        </div><!-- /.col -->
                        
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Article</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">

                        <?php if($this->session->flashdata('success') != ""){ ?>
                            <div class="alert alert-success">
                                <?php echo $this->session->flashdata("success"); ?>
                            </div>
                        <?php } ?>

                        
                        <?php if($this->session->flashdata('error') != ""){ ?>
                            <div class="alert alert-danger">
                                <?php echo $this->session->flashdata("error"); ?>
                            </div>
                        <?php } ?>

                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <form class="form-inline ml-3" id="searchFrm" name="searchFrm" method="get" action="">
                                            <div class="input-group input-group-sm">
                                                <input class="form-control form-control-navbar" type="text" value="<?php echo $q; ?>" name="q" placeholder="Search" aria-label="Search">
                                                <div class="input-group-append">
                                                <button class="btn btn-navbar" type="submit">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-tools">
                                        <a href="<?php echo base_url().'admin/artical/create'?>" class="btn btn-primary"><i class="fas fas-plus"></i>Create</a>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <table class="table">
                                        <tr>
                                            <th width="50">#</th>
                                            <th width="50">image</th>
                                            <th>Title</th>
                                            <th>description</th>
                                            <th>Author</th>
                                            <th width="100">Status</th>
                                            <th class="text-center" width="160">Action</th>
                                        </tr>

                                        <?php if(!empty($artical)){ ?>
                                            <?php foreach($artical as $row){ ?>
                                                <tr>
                                                    <td><?php echo $row['id']; ?></td>
                                                    <td>
                                                        <?php 
                                                            $path = './public/uploads/artical/thumb/'.$row['image'];
                                                            // echo file_exists($path);
                                                            // echo '-----';
                                                            // echo $path;
                                                            if(file_exists($path) && $row['image'] != '') {
                                                                ?>
                                                                    <img class="w-100" src="<?php echo base_url().'public/uploads/artical/thumb/'. $row['image']; ?>">
                                                                    <?php
                                                            } else {
                                                                ?>
                                                                    <img class="w-100" src="<?php echo base_url() .'public/uploads/no_image.jpg'; ?>">
                                                                <?php
                                                            }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $row['title']; ?></td>
                                                    <td><?php echo $row['description']; ?></td>
                                                    <td><?php echo $row['author']; ?></td>
                                                    <td>
                                                        <?php if($row['status'] == 1){ ?> 
                                                            <span class="badge  badge-success">Active</span>
                                                        <?php } else { ?> 
                                                            <span class="badge  badge-success">Block</span>
                                                        <?php } ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="<?php echo base_url() .'admin/artical/edit/'.$row['id'] ?>" class="btn btn-primary btn-sm">
                                                            <i class="far fa-edit"></i> Edit</a>
                                                        <a href="javascript:void(0);" onClick="deleteArtical(<?php echo $row['id']; ?>)" class="btn btn-danger btn-sm">
                                                            <i class="far fa-trash-alt"></i> Delete</a>
                                                    </td>
                                                </tr>
        
                                            <?php } ?>
                                        <?php } ?>
                                        
                                    </table>
                                    
                                    <nav>
                                        <?php echo $pagination_link; ?>
                                    </nav>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


<?php $this->load->view("admin/footer") ?>

<script>
    function deleteArtical(id){
        if(confirm('Sure to delete Artical?') == true){
            window.location.href = '<?php echo base_url().'admin/artical/delete/'; ?>' + id;
        }
    }
</script>