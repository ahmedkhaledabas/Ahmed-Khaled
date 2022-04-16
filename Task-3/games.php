<?php
$tittle = 'games';
include_once 'header.php';

if($_POST){
    header('location:result.php');
    
$_SESSION['i']=$i;
$_SESSION['membername']=$_POST['membername'];
$_SESSION['football']=$_POST['football'][$i]??"";
}


?>
<div class="container">
    <div class="row">
        <div class="col-8 offset-3 h6">
            <form action="" method="post">
            
              

            <?php
                for($i=0;$i<$_SESSION['count'];$i++){
                    ?>
                    <div class="form-group">
                    <label class="h5 text-primary mt-4" for="membername">Member<?=$i+1?> </label>
                    <input class="mb-3 form-control" type="text" name="membername[]"  value="<?=$_POST['membername'][$i]??""?>">
                    </div>

                   <div class="form-check ">
                        <input class="form-check-input" type="checkbox" name="football[]" value="football" id="football">
                        <label class="form-check-lable" for="football">Football 300 LE .</label>
                    </div>
                    
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="swimming[]" value="swimming" id="swimming">
                        <label class="form-check-lable" for="swimming">Swimming 250 LE .</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="vollyball[]" value="vollyball" id="vollyball">
                        <label class="form-check-lable" for="vollyball">Vollyball 150 LE .</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="others[]" value="others" id="others">
                        <label class="form-check-lable" for="others">Others 100 LE .</label>
                    </div>

             <?php
                 }
             ?>
                    

                    
                   
                 <button class="form-control mt-3 btn btn-primary ">Check Price</button>
        </form>
        </div>
    </div>
</div>

<?php




 


include_once 'footer.php';


?>