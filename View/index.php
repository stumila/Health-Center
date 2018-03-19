<?php session_start();?>
<?php include_once "../Config/database.php"; ?>
<?php include_once "../Model/User.php"; ?>


<!DOCTYPE html>
<html lang='pl'>
    <?php include_once "header.php"; ?>
<body>
    <div id="container">
        <?php include_once "logo.php"; ?>
        <?php if(isset($_SESSION['logged'])  && ($_SESSION['logged']==true)){
            include_once "nav_log.php";
        }
        else include_once "nav.php"; ?>
        <?php include_once "aside.php"; ?>
        <div id="maincontent">
            <h1>Larmed</h1>
           <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eget nibh id ex dapibus euismod. Etiam facilisis sit amet felis vitae vestibulum. Nullam risus nunc, mattis a orci a, sagittis imperdiet est. Donec quis fringilla sapien. Nam suscipit enim vel ex dictum vehicula. Duis placerat odio ex, quis vestibulum tortor tincidunt a. Maecenas lobortis facilisis lorem id suscipit. Mauris ut ipsum et mauris rhoncus sagittis non eget ipsum.</p>

           <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eget nibh id ex dapibus euismod. Etiam facilisis sit amet felis vitae vestibulum. Nullam risus nunc, mattis a orci a, sagittis imperdiet est. Donec quis fringilla sapien. Nam suscipit enim vel ex dictum vehicula. Duis placerat odio ex, quis vestibulum tortor tincidunt a. Maecenas lobortis facilisis lorem id suscipit. Mauris ut ipsum et mauris rhoncus sagittis non eget ipsum.</p>
           <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eget nibh id ex dapibus euismod. Etiam facilisis sit amet felis vitae vestibulum. Nullam risus nunc, mattis a orci a, sagittis imperdiet est. Donec quis fringilla sapien. Nam suscipit enim vel ex dictum vehicula. Duis placerat odio ex, quis vestibulum tortor tincidunt a. Maecenas lobortis facilisis lorem id suscipit. Mauris ut ipsum et mauris rhoncus sagittis non eget ipsum.</p>
           <p>Ut quis purus volutpat, rhoncus ligula vitae, rutrum lectus. Pellentesque vehicula dui sit amet magna ornare aliquet. Ut tempus id diam eget tempor. Etiam nec tellus egestas, tincidunt enim in, commodo ex. Ut libero ante, convallis eget urna vitae, efficitur tempus nulla. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent nec est molestie, porta orci eget, rutrum elit. Suspendisse malesuada viverra ante, quis molestie nibh ultricies in. Donec semper diam quis mi posuere, nec aliquam tortor auctor. Suspendisse ac est urna. Donec non dui rhoncus, venenatis nibh vitae, tristique magna. Mauris a sapien cursus, pretium ante at, euismod velit. Nulla placerat urna ut ipsum sodales, eu tincidunt nibh finibus. Morbi sed rhoncus tortor, quis pellentesque dui. Vestibulum ornare facilisis varius.

           <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eget nibh id ex dapibus euismod. Etiam facilisis sit amet felis vitae vestibulum. Nullam risus nunc, mattis a orci a, sagittis imperdiet est. Donec quis fringilla sapien. Nam suscipit enim vel ex dictum vehicula. Duis placerat odio ex, quis vestibulum tortor tincidunt a. Maecenas lobortis facilisis lorem id suscipit. Mauris ut ipsum et mauris rhoncus sagittis non eget ipsum.</p>
           <p>Vivamus nec molestie elit. Suspendisse euismod metus quis purus auctor ultrices. In aliquam ut nunc in consectetur. Integer sagittis ullamcorper velit quis vestibulum. Phasellus non elementum mi, in blandit nisi. Integer scelerisque at urna eget pellentesque. Praesent euismod quis magna non tincidunt. Nulla dapibus lectus vitae vehicula accumsan. Integer sed mi sit amet diam blandit gravida a id tortor. Vivamus eleifend luctus quam, et fringilla eros vestibulum eu. Nunc vitae nibh justo.
          
        </div>
        <?php include_once "footer.php"; ?>
    </div>
    <script src="..\resources\js\jquery-3.2.1.min.js"></script>
	
	<script src="..\resources\js\sticky.js"></script>


</body>
</html>