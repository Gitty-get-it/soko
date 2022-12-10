    <?php 
   
   include('functions/userfunctions.php');
    include('includes/header.php');
    include('includes/slider.php');
     
     ?> 
    <div class="py-5">
      <div class="container">
         <div class="row">
              <div class="col-md-12">
                <h4>Trending Products</h4>
                <hr>
                 <div class="underline mb-2"></div>
                    <div class="owl-carousel">
                        <?php
                            $trendingProducts = getAllTrending();
                            if(mysqli_num_rows($trendingProducts) > 0)
                            {
                                foreach ($trendingProducts as $item) {
                                    ?>
                                        <div class="item">
                                            <a href="product-view.php?product=<?= $item['slug']; ?>">
                                                <div class="card shadow h-100">
                                                    <div class="card-body">
                                                        <img src="uploads/<?= $item['image']; ?>" alt="Product image" class="w-100">
                                                            <h6 class="text-center"><?= $item['name']; ?></h6>
                                                     </div>
                                                </div>
                                            </a>
                                        </div>
                                     <?php
                                }
                            }
                        ?>
                    </div>
            
               </div>
         </div>
      </div>
  </div>

  <div class="py-5 bg-f2f2f2">
      <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>About Us</h4>
                <div class="underline mb-2"></div>
                <p>
                With us, you get to add an unlimited number of products.
                <br>
                 Use secure checkout with more compatible payment gateways.
                <br>
                 Track sales and growth trends, easily integrate orders and shipping, and get global tax and currency support. 
                </p>
                
            </div>
        </div>
      </div>
  </div>
   
   
   <div class="py-5 bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h4>Soko E-commerce</h4>
                    <div class="underline mb-2"></div>
                    <a href="index.php"><i class="fa fa-angle-right"></i> HOME</a><br>
                    <a href="#"><i class="fa fa-angle-right"></i> About Us</a><br>
                    <a href="cart.php"><i class="fa fa-angle-right"></i>My Cart</a><br>
                    <a href="categories.php"><i class="fa fa-angle-right"></i>Our Collections</a>
                </div>
                <div class="col-md-3">
                    <h4>Address</h4>
                    <p>
                        #MK24, Ground Floor,
                        2nd Avenue street, 
                        Kanairo street, Nairobi.
                    </p>
                    <a href="tel:+254798765432"><i class="fa fa-phone"></i>+254798765432</a><br>
                    <a href="mailto:soko@gmail.com"><i class="fa fa-envelope"></i>soko@gmail.com</a>
                </div>
            </div>
        </div>
   </div>

    <div class="py-2 bg-danger">
        <div class="text-center">
          <p class="mb-0">Terms And Conditions Apply- <?= date('Y') ?></p>
        </div>
   </div>

    <?php include('includes/footer.php'); ?> 
    <script>

    $(document).ready(function () {
        $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
     }
    })

    });
    </script>
    