<?php
include('functions/userfunctions.php'); 
include('includes/header.php'); 

if(isset($_GET['category']))
{

$category_slug = $_GET['category'];
$category_data = getSlugActive("categories", $category_slug);  
$category = mysqli_fetch_array($category_data);

if($category)
{
$cid = $category['id'];

?> 

<div class="py-3 shadow">
    <div class="container">
        <h4 class="text-white">
        <a class="" href="categories.php">
            Home / 
        </a>
            <a class="" href="categories.php">
            Collections / 
            </a>
            <?= $category['name']; ?></h4>
    </div>
</div>

    <div class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2><i><b><?= $category['name']; ?></b></i></h2>
                <hr>
                            <div class="row">
                            <?php 
                            $products = getprodByCategory($cid);

                            if(mysqli_num_rows($products) > 0)
                            {
                                foreach($products as $item)
                                {
                                    ?>
                                    <div class="col-md-3 mb-4">
                                        <a href="product-view.php?product=<?= $item['slug']; ?>">
                                        <div class="card shadow h-100">
                                            <div class="card-body">
                                                <img src="uploads/<?= $item['image']; ?>" alt="Product image" class="w-100">
                                            <h4 class="text-center"><?= $item['name']; ?></h4>
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
    <?php 
    }
}

else
{
    echo "Something went wrong!!";
}
    include('includes/footer.php'); ?> 

    