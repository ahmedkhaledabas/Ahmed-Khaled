<?php
for ($i = 1; $i <= 5; $i++) { //normally not 5 but a random number, choose by user
     echo "Numero ";
     echo $i;
?>      
<input type="text" name="number2" id="number2"/>    
<?php
}
?>
</form>
<?php
echo $_POST['number2'];
$my_array=array($_POST['number2']);
    $_SESSION['countnumb']=$my_array;


foreach($_SESSION['countnumb'] as $key=>$value)
{
echo 'The value of $_SESSION['."'".$key."'".'] is '."'".$value."'".' <br />';
}