<?php
$tittle = 'subscribe';
include_once 'header.php';

if ($_POST) {
    if ($_POST['subscribername'] && $_POST['count']) {
        header('location:games.php');
        $_SESSION['count']=$_POST['count'];
        $_SESSION['subscribername']=$_POST['subscribername'];
    }
}
?>

<div class="container">
    <div class="row mt-5 offset-5">
        <div class="col-12">
            <h2 class="text-info">Clup</h2>
        </div>
        <div class="col-12">
            <form action="" method="post">
                <div class="form-group">
                    <label class="h5 text-primary" for="subscribername">Subscriber Name</label>
                    <input class=" form-control" type="text" name="subscribername" id="subscribername" value="<?= $_POST['subscribername'] ?? "" ?>">
                    <p class="blockquote-footer mb-3 text-secondary">Clup Subscribe Starts With 10,000 LE .</p>
                </div>
                <div class="form-group">
                    <label class="h5 text-primary" for="count">Count Of Family Member</label>
                    <input class=" form-control" type="number" name="count" id="count" value="<?= $_POST['count'] ?? "" ?>">
                    <p class="blockquote-footer mb-3 text-secondary">Costs Of Each Member is 2,500 LE .</p>
                </div>
                <button class="form-control btn btn-primary rounded">Subscribe</button>
            </form>
        </div>
    </div>
</div>

<?php
include_once 'footer.php';
?>