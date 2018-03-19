<?php session_start();?>

<!DOCTYPE html>
<html lang='pl'>
    <?php include_once "header.php"; ?>
<body>
    <div id="container">
        <?php include_once "logo.php"; ?>
        <?php include_once "nav.php"; ?>
        <?php include_once "aside.php"; ?>
        <div id="maincontent">
            <h2>Utwórz nowe konto</h2>
            <div class="log">
               
                <form action="../Controler/controler.php?method=insertUser" method="post">
                    <input type="text" class="login" name="login" placeholder="Login" required autofocus/>
                    <input type="text" class="login" name="name" placeholder="Imie" required autofocus/>
                    <input type="text" class="login" name="surname" placeholder="Nazwisko" required />
                    <input type="text" class="login" name="pesel" placeholder="Pesel" size="11" required autofocus />
                    <input type="email" class="login" name="email" placeholder="Email" required autofocus/>
                    <input type="password" class="login" name="password" placeholder="Hasło" required/> 
                    <input type="password" class="login" name="password2" placeholder="Powtórz hasło" required/> 
                    <input type="submit" class="login" name="submit" value="Utwórz konto"/>
                </form>
            </div>
            <div style="clear: both;"></div>
        </div>
        <?php include_once "footer.php"; ?>
    </div>
    <script src="..\resources\js\jquery-3.2.1.min.js"></script>
	
	<script src="..\resources\js\sticky.js"></script>


</body>
</html>