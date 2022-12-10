<?php 
     include('../middleware/adminMiddleware.php'); 
     include('includes/header.php');
     
    if(isset($_GET['t']))


    {
        $tracking_no = $_GET['t'];

        $orderData = checkTrackingNoValid($tracking_no);
        if(mysqli_num_rows($orderData) < 0) 
        {
            ?>
            <h4>Something went wrong</h4>
            <?php  
            die();
        }
    }
     else {
        ?>
        <h4>Something went wrong</h4>
        <?php
        die();
    }

     $data = mysqli_fetch_array($orderData);
     ?> 

    <div class="container">
     <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    View Order
                    <a href="orders.php" class="btn btn-warning float-end"><i class="fa fa-reply"></i>Back</a>
                </div>
                <div class="card-body">
                    <div class="row">
                    <div class="col-md-6">
                        <h4>Delivery Details</h4>
                        <hr>
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <label class="fw-bold">Name</label>
                            <div class="border p-1">
                                <?= $data['name']; ?>
                            </div>
                        </div> 
                        <div class="col-md-12 mb-2">
                            <label class="fw-bold">Email</label>
                            <div class="border p-1">
                                <?= $data['email']; ?>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label class="fw-bold">Phone</label>
                            <div class="border p-1">
                                <?= $data['phone']; ?>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label class="fw-bold">Tracking No</label>
                            <div class="border p-1">
                                <?= $data['tracking_no']; ?>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label class="fw-bold">Address</label>
                            <div class="border p-1">
                                <?= $data['address']; ?>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label class="fw-bold">Pin Code</label>
                            <div class="border p-1">
                                <?= $data['pincode']; ?>
                            </div>
                        </div>
                </div>
                    <div class="col-md-6">
                        <h4>Order Details</h4>
                        <hr>
                    </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            $order_query = "SELECT o.id as oid, o.tracking_no, o.user_id, oi.*, p.* FROM orders o, order_items oi,
                                products p WHERE oi.order_id=o.id AND p.id=oi.prod_id 
                                AND o.tracking_no='$tracking_no' ";
                            $order_query_run = mysqli_query($con, $order_query);

                            if(mysqli_num_rows($order_query_run) > 0)
                            {
                                foreach ($order_query_run as $item) {
                                     ?>
                                            <tr>
                                                <td class="align-middle">
                                                    <img src="../uploads/<?= $item['image']; ?> " width="50px" height="50px" alt="<?= $item['name']; ?>">
                                                    <?= $item['name']; ?>
                                                </td>
                                                <td class="align-middle">
                                                    <?= $item['price']; ?>
                                                </td>
                                                
                                            </tr>
                                     <?php
                                }  
                            }
                        ?>
                    </tbody>
                </table>
                <hr>
                   <h5>Total Price : <span class="float-end fw-bold"><?= $data['total_price']; ?> </span></h5>
                    <label class="fw-bold">Payment Mode</label>
                </hr>
                <div class="border p-1 mb-3">
                    <label for="">Payment Mode</label>
                    <?= $data['payment_mode'] ?>
                </div>

                <label class="fw-bold">Status</label>
                <div class="mb-3">

                    <form action="code.php" method="POST">
                        <input type="hidden" name="tracking_no" value="<?= $data['tracking_no'] ?>">
                        <select name="order_status" class="form-select">
                            <option value="0" <?= $data['status'] == 0?"selected":""?>>Under Process</option>
                            <option value="1" <?= $data['status'] == 1?"selected":""?>>Completed</option>
                            <option value="2" <?= $data['status'] == 2?"selected":""?>>Cancelled</option>
                        </select>
                        <button type="submit" name="update_order_btn" class="btn btn-primary mt-2">Update Status </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
 <?php include('includes/footer.php'); ?> 

    