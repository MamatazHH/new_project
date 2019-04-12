<?php
include_once "config.php";
?>

<html>

<head>
    <title>
        reCAPTCHA
    </title>
    <script src='https://www.google.com/recaptcha/api.js?render=<?php echo SITE_KEY; ?>'></script>

</head>
<body>
<form action="contact.php" method="post">
    <input type="text" name="name"/>
    <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response"/>
    <input type="submit" value="submit"/>
</form>
<script>
    grecaptcha.ready(function()
    {
        grecaptcha.execute('<?php echo SITE_KEY; ?>',{action:'homepage'})
            .then(function(token) {
             console.log(token);
             document.getElementById('g-recaptcha-response').value=token;
            });
    });
</script>
</body>
</html>
