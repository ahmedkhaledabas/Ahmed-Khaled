<?php
    $tittle='result';
    include_once '../header.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function clubTable()
    {

       $table = " <table class='table'><thead class='table-dark'>
             <tr>
                <th >Subscriber</th>
                <th>" . $_SESSION['memberName'] . "</th>
             </tr>
          </thead>
          <tbody>";
       $totalgames = 0;
       $culbGames = ['football' => 0, 'swimming' => 0, 'vollyball' => 0, 'others' => 0];
       for ($i = 1; $i <= $_SESSION['membersCount']; $i++) {
          $totalPriceOfMemberGames = 0;
          $table .= "<tr>
                <th>" . $_SESSION['members']['member' . $i]['subscriberName'] . "</th>";
          if (!empty($_SESSION['members']['member' . $i]['subscriberGames'])) {
             foreach ($_SESSION['members']['member' . $i]['subscriberGames'] ?? "" as $key => $value) {
                if ($key == 'football') $culbGames[$key]++;
                elseif ($key == 'swimming') $culbGames[$key]++;
                elseif ($key == 'vollyball') $culbGames[$key]++;
                elseif ($key == 'others') $culbGames[$key]++;
                $totalPriceOfMemberGames += $value;
                $table .=  "<td>" . $key ?? "" . "</td>";
             }
          }
          $table .= "<td>" . $totalPriceOfMemberGames . "&nbsp; EGP</td>
                </tr>";
          $totalgames += $totalPriceOfMemberGames;
       }
       $table .= "<tfoot class='table-dark'><tr>
                   <th colspan='5'>Total</th>
                   <td>" . $totalgames . "&nbsp; EGP</td>
             
                   
                </tr></tfoot>
          </tbody>";
       $table .= " 
       <table class='table table-striped table-dark'>
       <tr> <h2 class='text-center '>S&nbsp;&nbsp;P&nbsp;&nbsp;O&nbsp;&nbsp;R&nbsp;&nbsp;T&nbsp;&nbsp;S</h2></tr>";
       foreach ($_SESSION['games'] as $key => $value) {
          $table .= " 
                   <tr>
                      <th colspan='5'>" . $key . "</th>
                       <td>" . $value * $culbGames[$key] . '&nbsp;EGP' . "</td>
                   </tr>";
       }
       $subscribtion = 10000 + $_SESSION['membersCount'] * 2500;
       $table .= "<tr><th colspan='5'>subscribtion</th> <td>" . $subscribtion . "</td> 
       </tr> <tr><th colspan='5'>totalPrice</th><td>" . $subscribtion + $totalgames . "</td> </tr> 
       </table>";
    
       return $table;
    }} ?>
 
       <section class="container mt-4">
    
          <?php if($_POST) clubTable() ?>
    
    
       </section>
    
    
<?php
    include_once '../footer.php';
?>


