<!--Antonis Savvides AFT:17007-->
<!--Charalambos Christofi AFT:14792 -->
<!--Dimitris Ioannou AFT:14423 -->
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="styles/styles.css">
    <title>Landing Page</title>
</head>

<body>
    <div class="box">
        <div>
            <h1>Member Login</h1>
        </div>
        <form action="backend/login.php" method="post">
            <div class="control-group">
                <input type="text" class="login-field" value="" placeholder="E-mail" id="login-name" name="email" required>
                <label class="login-field-icon fui-user" for="login-name"></label>
            </div>

            <div class="control-group">
                <input type="password" class="login-field" value="" placeholder="Password" id="login-pass" name="password" required>
                <label class="login-field-icon fui-lock" for="login-pass"></label>
            </div>


        <button class="btn" type="submit">Login</button>
        </form>










    </div>

</body>

</html>