<?php
$tittle = 'games';
include_once 'header.php';




?>
<div class="container">
    <div class="row">
        <div class="col-8 offset-3 h6">
            <form action="" method="post">
            
                <?php
                for($i=0;$i<$_SESSION['count'];$i++){
                    ?>

            
                    <div class="form-group">
                    <label class="h5 text-primary mt-4" for="membername">Member <?=$i+1?> </label>
                    <input class="mb-3 form-control" type="text" name="membername[]"  value="<?= $_POST['membername'][$i] ?? "" ?>">
                    </div>
                    <div class="form-check ">
                        <input class="form-check-input" type="checkbox" name="football[]" value="<?=$_POST['football'][$i] ?? ""?>" id="football">
                        <label class="form-check-lable" for="football">Football 300 LE .</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="swimming[]" value="<?=$_POST['swimming'][$i] ?? ""?>" id="swimming">
                        <label class="form-check-lable" for="swimming">Swimming 250 LE .</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="vollyball[]" value="<?=$_POST['vollyball'][$i] ?? ""?>" id="vollyball">
                        <label class="form-check-lable" for="vollyball">Vollyball 150 LE .</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="others[]" value="<?=$_POST['others'][$i] ?? ""?>" id="others">
                        <label class="form-check-lable" for="others">Others 100 LE .</label>
                    </div>
                    
                
                <?php
            print_r( $_POST['football'][$i] ??"");
            } ?>
                
                <button class="form-control mt-3 btn btn-primary ">Check Price</button>
        </form>
        </div>
    </div>
</div>

<?php

    // if(isset($_POST['membername'][$i])){
    //     header('location:result.php');
    // }
// print_r($_POST['membername']??"");
//  if ($_POST){
//      if(!empty($_POST['membername[]'])){
//     header('location:result.php');
//     // $_SESSION['membername[]']=$_POST['membername[]'];
    
// }}
include_once 'footer.php';


?>