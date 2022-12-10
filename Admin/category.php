<?php 
include('../middleware/adminMiddleware.php');
include('includes/header.php');

 ?>

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="card-header">
                <h4>Categories</h4>
            </div>
            <div class="card-body" id="category_table">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $category = getAll("categories");
                        if(mysqli_num_rows($category) > 0){
                            foreach($category as $item){
                                ?>
                        <tr>
                                <td> <?= $item['id']; ?></td>
                                <td> <?= $item['name']; ?></td>
                                <td>
                                    <img src="../uploads/<?= $item['image']; ?>" width="70px" height="70px" alt="<?= $item['name']; ?>">
                                </td>
                                <td> 
                                    <?= $item['status'] == '0'? "Visible":"Hidden" ?>
                                </td>
                                <td>
                                    
                                    <a href="edit-category.php?id=<?= $item['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                            </td>
                            <td>
                                    <button type="button" class="btn btn-sm btn-danger delete_category_btn" value="<?= $item['id']; ?>" >Delete</button> 
                                </td>
                                
                        </tr>
                                <?php
                            }
                        }
                        else{
                            echo "No records found!";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>