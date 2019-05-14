<?php


?>

<div class="row">

    <div class="col-6">


<form action ="index.php?content=createpassword-script" method ="post">

  <div class="form-group">
    <label for="InputPassword">Wachtwoord</label>
    <input type="password" class="form-control" id="InputPassword" name="password" placeholder="Wachtwoord">
  </div>
  <div class="form-group">
    <label for="InputPassword2">Herhaal Wachtwoord</label>
    <input type="password" class="form-control" id="InputPassword2" name="verify_password" placeholder="Herhaal Wachtwoord">
  </div>
  <input type= "hidden" value="<?php echo $_GET['id']; ?>" name = "id">
  <input type= "hidden" value="<?php echo $_GET['pw']; ?>" name = "pw">
<br>
<button type="submit" class="btn btn-outline-info btn-lg btn-block">Verstuur</button>
</form>

    </div>
    <div class="col-6"> <img src="./img/3.gif" alt="rose"></div>

</div>