<?php $this->load->view("admin/header") ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Categories</h1>
                        </div><!-- /.col -->
                        
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/category/index'?>">Categories</a></li>
                            <li class="breadcrumb-item active">Edit new Category</li>
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
                            <div class="card card-primay">
                                <div class="card-header">
                                    <div class="card-title">
                                        Edit new category.
                                    </div>
                                </div>

                                <div class="card-body">
                                  <form name="categoryform" id="categoryform" method="post" action="<?php echo base_url().'admin/category/edit/'. $category['id']?>" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" id="name" value="<?php echo set_value('name', $category['name']) ?>" class="form-control">
                                            
                                            <?php echo form_error('name'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Image</label><br>
                                            <input type="file" name="image" id="image">

                                            <?php echo (!empty($errorImageUpload)) ? $errorImageUpload : ''; ?>

                                            <?php if($category['image'] != "" && file_exists('./public/uploads/category/'.$category['image'])){ ?>
                                                <img width="200" src="<?php echo base_url() .'public/uploads/category/'.$category['image'] ?>">
                                            <?php }else{ ?>
                                                <img width="200" src="<?php echo base_url() .'public/uploads/category/no_img.jpg' ?>">    
                                            <?php } ?>
                                        </div>

                        
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="active" <?php echo ($category['status'] == 1) ? 'checked' : ''; ?>>
                                            <label class="form-check-label">Active</label>
                                        </div>

                                        
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="block" <?php echo ($category['status'] == 0) ? 'checked' : ''; ?>>
                                            <label class="form-check-label">block</label>
                                        </div>

                                    <div class="crad-footer">
                                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                        <a href="<?php echo base_url().'admin/category/index'?>" class="btn btn-secondary">Back</a>
                                    </div>

                                  </form>
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