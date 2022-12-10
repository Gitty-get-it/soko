<?php 
include('../middleware/adminMiddleware.php');
include('includes/header.php');

 ?>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Add Product</h4>
            </div>
            <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                    <div class="col-md-12">
                    <label for="">Select Category</label>
                    <select name="category_id" class="form-select">
                    <option selected>Select Category</option>                    
                        <?php 
                            $categories = getAll("categories");
                             if(mysqli_num_rows($categories) > 0)
                             {
                            foreach($categories as $item) {
                                ?>
                                  <option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
                                <?php
                                }
                            }       
                            
                            else{
                                echo "No category available!";
                            }
                        ?>
                    </select>
                    </div>
                    <div class="col-md-6">
                    <label for="">Name</label>
                     <input type="text" name="name" placeholder="Enter product name" class="form-control mb-2">
                    </div>
                    <div class="col-md-6">
                    <label for="">Slug</label>
                     <input type="text" name="slug" placeholder="Enter slug" class="form-control mb-2">
                    </div>
                    <div class="col-md-12">
                    <label for="">Small Description</label>
                     <input type="text" name="description" placeholder="Enter Description" class="form-control mb-2">
                    </div>
                    <div class="col-md-12">
                    <label for="">Description</label>
                     <input type="text" name="small_description" placeholder="Enter Small Description" class="form-control mb-2">
                    </div>
                    <div class="col-md-6">
                    <label for="">Original Price</label>
                     <input type="text" name="original_price" placeholder="Enter original price" class="form-control mb-2">
                    </div>
                    <div class="col-md-6">
                    <label for="">Selling Price</label>
                     <input type="text" name="selling_price" placeholder="Selling price" class="form-control mb-2">
                    </div>
                    <div class="col-md-12">
                    <label for="">Upload Image</label>
                     <input type="file" name="image" class="form-control mb-2">
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                            <label for="">Quantity</label>
                            <input type="number" name="qty" placeholder="Enter quantity" class="form-control mb-2">
                    </div>
                            <div class="col-md-3">
                            <label for="">Status</label>
                            <input type="checkbox" name="status">
                            </div>
                            <div class="col-md-3">
                            <label for="">Trending</label>
                            <input type="checkbox" name="trending">
                            </div>
                    </div>
                    <div class="col-md-12">
                    <label for="">Meta Title</label>
                     <input type="text" name="meta_title" placeholder="Enter meta title" class="form-control mb-2">
                    </div>
                    <div class="col-md-12">
                    <label for="">Meta Description</label>
                     <input type="text" name="meta_description" placeholder="Enter Meta description" class="form-control mb-2">
                    </div>
                    <div class="col-md-12">
                    <label for="">Meta Keywords</label>
                     <input type="text" name="meta_keywords" placeholder="Enter meta keywords" class="form-control mb-4">
                    </div>  
                   
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" name="add_product_btn">Save</button>
                    </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>