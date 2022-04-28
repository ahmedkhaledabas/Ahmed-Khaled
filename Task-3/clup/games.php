<?php
$tittle = 'games';
include_once '../header.php';

    $_SESSION['games'] = [
      'football' => '300',
      'swimming' => '250',
      'vollyball' => '150',
      'others' => '100'
    ];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function gamestable()
    {
      $games = '
        <h2 > <span class="text-primary">Hello</span> '. $_SESSION['memberName'] . '</h2>';
      for ($i = 1; $i <= $_SESSION['membersCount']; $i++) {
        $games .= '
           <div class="form-group" >
                <label for="subscriberName" class="text-primary h4 mt-4">';
        $games .= 'Member' . $i;
        $games .= '</label>
                <input type="text" name="members[member' . $i . '][subscriberName]" value="" id="subscriberName" class="form-control"
                placeholder="enter subscriber Name">
           </div>';
        foreach ($_SESSION['games'] as $key => $value) {
          $games .= '<div class="form-check">
                <input class="form-check-input" type="checkbox" id="checkbox"
                name="members[member' . $i . '][subscriberGames][' . $key . ']" value="' . $value . '">
                <label class="form-check-label" for="checkbox">' .
            '&nbsp;&nbsp;' . $key . '&nbsp;&nbsp;' . $value . 'LE     
                </label>
            </div>';
        }
      }
    
      return $games;
    }
    
    
      $_SESSION['members'] = $_POST['members'];
      header('location:result.php');
    }
    ?>
    
    
    <div class=" row container offset-2">
      <div class="col-12 h1 my-3 text-center text-primary">Members</div>
      <div class="col-8 offset-2">
        <form method="post">
    
          <?php if($_POST) gamestable()?>
    
          <button class="btn btn-outline-primary form-control mt-3"> Check Price </button>
        </form>
    
    
    
      </div>
    </div>

    <?php


include_once '../footer.php';


?>