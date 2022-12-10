<?php
include('functions/userfunctions.php'); 
include('includes/header.php'); 
    
?> 

<div class="py-3 shadow">
    <div class="container">
        <h4 class="text-white">Home / Collections</h4>
    </div>
</div>

    <div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><i><b>Our Collections</b></i></h1>
                <hr>
                            <div class="row">
                            <?php 
                            $categories = getAllActive("categories");

                            if(mysqli_num_rows($categories) > 0)
                            {
                                foreach($categories as $item)
                                {
                                    ?>
                                    <div class="col-md-3 mb-4">
                                        <a href="products.php?category=<?= $item['slug']; ?>">
                                        <div class="card shadow h-100">
                                            <div class="card-body">
                                                <img src="uploads/<?= $item['image']; ?>" alt="category image" class="w-100">
                                           <i> <h3 class="text-center"><?= $item['name']; ?></h3></i>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    <?php
                                }
                            }
                            else{
                                echo "No data available";
                            }
                            ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php include('includes/footer.php'); ?> 

    