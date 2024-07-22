<?php $this->load->view('front/header.php') ?>

    <!-- blog list -->
    <div class="container">
        <div class="mt-5 mb-5 p-2">
            <h3 class="">Blog List</h3>
    
            <?php foreach($artical as $row) { ?>
                
                <div class="row mt-5">
                    <div class="col-md-4">
                        <?php if(!empty($row['image'])) { ?> 
                            <img class="card-img-top rounded" height="200px" src="<?php echo base_url().'public/uploads/artical/thumb/'. $row['image']; ?>" alt="Card image cap">
                        <?php } else { ?>
                            <img class="card-img-top rounded" height="200px" src="<?php echo base_url().'public/uploads/no_image.jpg'; ?>" alt="Card image cap">                          
                        <?php } ?>
    
                    </div>
                    
                    <div class="col-md-8 bg-light ">
                        <div class="row">
                            <p>Categories Name : <?php echo $row['categories_name']; ?></p>
                            <p><?php echo $row['title']; ?></p>
                            <p><span class="text-uppercase" >AUTHOR : </span><?php echo $row['author']; ?></p>
                            <p><?php echo word_limiter(strip_tags($row['description']), 35); ?></p>
                        </div>
                    </div>
                </div>
                
            <?php } ?>
        </div>

    </div>


<?php $this->load->view('front/footer.php') ?>