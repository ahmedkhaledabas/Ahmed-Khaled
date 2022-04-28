<?php
$tittle = 'subscribe';
include_once '../header.php';
$errors = [];
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
  $_SESSION['memberName'] = $_POST['memberName'];
  $_SESSION['membersCount'] = $_POST['membersCount'];
  header('location:games.php');
}

?>
 

<div class="row container text-primary offset-3">
    
    <div class="col-6 offset-4">
    <div class="col-12 h1 my-3 text-center ">CLUB</div>
      <form method="post">
        <div class="form-group">
          <label for="memberName">Member Name</label>
          <input type="text" name="memberName" id="memberName" class="form-control" placeholder="enter your name" aria-describedby="helpId" required>
          <small id="helpId" class="text-muted">club subscribtion starts with 10.000LE</small>
        </div>
        <div class="form-group">
          <label for="membersCount">Number Family Member</label>
          <input type="text" name="membersCount" id="membersCount" class="form-control" placeholder="enter members number" aria-describedby="helpId" required>
          <small id="helpId" class="text-muted">cost of each member is 2.500</small>

        </div>


        <button class="btn btn-outline-primary"> subscribe </button>
      </form>



    </div>
  </div>

<?php
include_once '../footer.php';
?>