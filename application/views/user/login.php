<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="/css/bootstrap.css" title="" type="text/css" />
    <title>Login</title>
</head>
<body>
    <form class="well span4 offset4" method="post" action="">
        <h1>Login</h1>
        <pre>
            <?php print_r($errors); ?>
            <?php 
                $hash_link = Session::get('hash_link');
                echo $hash_link; 
            ?>
        </pre>
        <label for="username">Username</label>
        <input class="span4" type="text" name="email" id="email" placeholder="Type email here ..." value="" /><br />
        <label for="password">Password</label>
        <input class="span4" type="password" name="password" id="password" placeholder="Type password here ..." value="" /><br />
        <label class="checkbox" for="confirm">Remember Me
            <input type="checkbox" name="remember" id="remember" value="" />
        </label>
        <div class="pull-right">
            <button class="btn btn-primary" type="submit">Login</button>
        </div>
    </form>
    <script src="/js/bootstrap.js"></script>
</body>
</html>
