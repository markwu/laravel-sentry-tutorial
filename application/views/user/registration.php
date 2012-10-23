<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="/css/bootstrap.css" title="" type="text/css" />
    <title>Registration</title>
</head>
<body>
    <form class="well span4 offset4" method="post" action="">
        <h1>Register</h1>
        <?php
            print_r($errors);
        ?>
        <label for="username">Username</label>
        <input class="span4" type="text" name="email" id="email" placeholder="Type email here ..." value="" /><br />
        <label for="password">Password</label>
        <input class="span4" type="password" name="password" id="password" placeholder="Type password here ..." value="" /><br />
        <label for="confirm">Confirmation</label>
        <input class="span4" type="password" name="password_confirmation" id="password_confirmation" placeholder="Type password again ..." value="" /><br />
        <div class="pull-right">
            <button class="btn btn-primary" type="submit">Register</button>
        </div>
    </form>
    <script src="/js/bootstrap.js"></script>
</body>
</html>
