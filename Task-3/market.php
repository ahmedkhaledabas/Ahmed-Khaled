<?php
$tittle = 'market';
include_once 'header.php';
$username = $_POST['username'] ?? "";

?>



  <div class="container">
    <div class="row offset-6">
      <div class="col-12 ">
        <h2 class="mt-3 text-danger">Market</h2>
        <form action="" method="post">
          <h3 class="mt-3 text-info">User Name</h3>
          <input class="mt-3 form-control" type="text" name="username" value="<?= $username ?>">
          <h3 class="mt-3 text-info">City</h3>
          <select class="mt-3 form-control" name="city" id="" value="">
           <option value="Cairo" <?php if($_POST){ if($_POST['city']=='Cairo'){echo 'selected';}} ?> >Cairo</option>
           <option value="Giza" <?php if($_POST){ if($_POST['city']=='Giza'){echo 'selected';}} ?> >Giza</option>
           <option value="Alex" <?php if($_POST){ if($_POST['city']=='Alex'){echo 'selected';}} ?> >Alex</option>
           <option value="Other" <?php if($_POST){ if($_POST['city']=='Other'){echo 'selected';}} ?> >Other</option>

          <?php
              if($_POST){
                if($_POST['city']=='Cairo'){
                  $delivery=0;
                }elseif($_POST['city']=='Giza'){
                  $delivery=30;
                }elseif($_POST['city']=='Alex'){
                  $delivery=50;
                }else{
                  $delivery=100;
                }
              }
          ?>

          </select>
          <h3 class="mt-3 text-info">Number Of Product</h3>
          <input class="mt-3 form-control" type="number" name="numberofproduct" value="<?= $_POST['numberofproduct'] ?? "" ?>">
          <br>
          <button class="btn btn-primary mt-3 form-control">Enter Product</button>
          <br>
          <br>
          <?php
          if ($_POST['numberofproduct'] ?? "" > 0) {
            echo "<div class='col-12'>
                  <table class='table table-dark table-striped'>
                      <thead>
                        <tr>
                          <th>Product Name</th>
                          <th>Price</th>
                          <th>Quantity</th>
                        
                        </tr>
                      </thead>
                      <tbody>";
            $total = 0;
            for ($i = 0; $i < $_POST['numberofproduct']; $i++) {

          ?>
              <tr>
                <td><input type="text" name="productname[]" value="<?= $_POST['productname'][$i] ?? "" ?>"></td>
                <td><input type="number" name="price[]" value="<?= $_POST['price'][$i] ?? "" ?>"></td>
                <td><input type="number" name="quantity[]" value="<?= $_POST['quantity'][$i] ?? "" ?>"></td>
              </tr>

          <?php

              if (isset($_POST['price'][$i])) {

                $subTotal = $_POST['price'][$i] * $_POST['quantity'][$i];
                $total += $subTotal;
                if ($total < 1000) {
                  $discount = 0;
                  $totalAfterDiscount = $total + $discount;
                } elseif ($total > 1000 && $total < 3000) {
                  $discount = 0.10;
                  $totalAfterDiscount = $total - ($total * $discount);
                } elseif ($total > 3000 && $total < 4500) {
                  $discount = 0.15;
                  $totalAfterDiscount = $total - ($total * $discount);
                } else {
                  $discount = 0.20;
                  $totalAfterDiscount = $total - ($total * $discount);
                }
              }
            }
          }

          ?>

          </tbody>
          </table>
          <?php
          if ($_POST['numberofproduct'] ?? "" > 0) {

            echo " <button class='btn btn-primary mb-4 mt-2 form-control'>Enter</button>
              <br>";
          }
          if (isset($total) && $total > 0) {
          ?>

            <div class="col-12 alert alert-success">
              <h3>Client Name : <?= $_POST['username'] ?? "" ?> .</h3>
              <h3>City : <?= $_POST['city'] ?? "" ?> .</h3>
              <h3>Total All Product : <?= $total ?? "" ?> EG .</h3>
              <h3>Your Discount : <?= $discount * 100 ?> % . </h3>
              <h3>Total After Discount : <?= $totalAfterDiscount ?? "" ?> EG .</h3>
              <h3>Delivery : <?= $delivery ?? "" ?> EG .</h3>
              <h3>Net Total : <?= $totalAfterDiscount + $delivery ?? "" ?> EG .</h3>
            </div>

          <?php
          } ?>





      </div>
      </form>




    </div>
  </div>
  </div>

  <?php
  include_once('footer.php')
  ?>