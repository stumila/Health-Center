<!DOCTYPE html>
<html lang='pl'>
    <?php include_once "header.php"; ?>
<body>
    <div id="container">
        <?php include_once "logo.php"; ?>
        <?php include_once "nav.php"; ?>
        <?php include_once "aside.php"; ?>
        <div id="maincontent">
            <h1>Logowanie</h1>
            <div class="log">
                <form action="../Controler/controler.php?method=logIn" method="post">
                    <input type="text"  class="login" name="login" placeholder="login"/>
                    <input type="password" class="login" name="password" placeholder="hasło"/> 
                    <input type="submit" class ="login" name="lsubmit" value="Zaloguj się"/>
                </form>
            </div>
            <div class="log">
               Nie masz konta?</br></br>
               <a href="new_account.php" class="button1">Zarejestruj się</a>
                            
            </div>
            <div style="clear: both;"></div>
        </div>
        <?php include_once "footer.php"; ?>
    </div>
    <script src="..\resources\js\jquery-3.2.1.min.js"></script>
	
	<script src="..\resources\js\sticky.js"></script>


</body>
</html>