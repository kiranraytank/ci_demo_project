<?php 
  $this->load->view("front/header.php");
?>

    <!-- silder code start -->
    <!-- <div class="container"> -->
    <div class="">
      <div id="carouselExampleControls" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" height="350px" src="<?php echo base_url('./public/images/slide1.jpg'); ?>" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" height="350px" src="<?php echo base_url('./public/images/slide2.jpg'); ?>" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" height="350px" src="<?php echo base_url('./public/images/slide3.jpg'); ?>" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>

    <div class="container pt-4 pb-4">
      <h3 class="pb-2">About Compny</h3>
      
      <p class="text-muted">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
      </p>

      <p class="text-muted">
        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.
      </p>

    </div>

    <!-- Our service -->
    <div class="container">
      <div class="bg-light">
          <h3 class="pb-2 pt-10">Our service Compny</h3>

          <div class="row">

            <div class="col-md-3">
              <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="<?php echo base_url('./public/images/box4.jpg'); ?>" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
            </div>
            
            <div class="col-md-3">
              <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="<?php echo base_url('./public/images/box1.jpg'); ?>" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
            </div>
            
            <div class="col-md-3">
              <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="<?php echo base_url('./public/images/box2.jpg'); ?>" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
            </div>
            
            <div class="col-md-3">
              <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="<?php echo base_url('./public/images/box3.jpg'); ?>" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
            </div>

          </div>
      </div>
    </div>

    
    <!-- New Blog -->
    <div class="container">
      <div class="bg-light mb-5">
          <h3 class="pb-2 pt-10 mt-5">New Blog</h3>

          <div class="row">
              <?php
                foreach ($articals as $row) { ?>

                  <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
                    
                      <?php if(!empty($row['image'])) { ?> 
                          <img class="card-img-top" height="250px" src="<?php echo base_url().'public/uploads/artical/thumb/'. $row['image']; ?>" alt="Card image cap">
                      <?php } else { ?>
                          <img class="card-img-top" height="250px" src="<?php echo base_url().'public/uploads/no_image.jpg'; ?>" alt="Card image cap">                          
                      <?php } ?>

                      <div class="card-body">
                        <p class="card-text"><?php echo $row['description']; ?></p>
                      </div>
                    </div>
                  </div>

              <?php } ?>
          </div>
      </div>
    </div>

    <?php 
      $this->load->view('front/footer.php');
    ?>