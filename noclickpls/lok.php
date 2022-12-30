<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/lok.css">
        <title>Account connection</title>
    </head>
    <body>
        <header>
        <div class="navigator">
            <div class="col-div-6">
                <p class="logo"><span>Personal</span>-Journal</p>
            </div>
            <div class="col-div-7">
                <ul class="nav">
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="#">Latest</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="login.html">Log-in</a> </li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </header>
    <div class="container" >
            <div class="login-container">
                <input id="item-1" type="radio" name="item" class="sign-in" checked><label for="item-1" class="item">Sign In</label>
                <input id="item-2" type="radio" name="item" class="sign-up"><label for="item-2" class="item">Sign Up</label>
                <div class="login-form" >
                    <form class="sign-in-htm" action="nice.php" method="post">
                        <div class="group">
                            <input placeholder="Username" id="si-user" type="text" class="input" name="li-name">
                        </div>
                        <div class="group">
                            <input placeholder="Password" id="si-pass" type="password" class="input" data-type="password" name="li-pass">
                        </div>
                        <div class="group">
                            <input type="submit" class="button" value="Sign In" onclick="Signing_in()">
                        </div>
                        <div class="hr"></div>
                        <!--<div class="footer">
                            <a href="#forgot">Forgot Password?</a>
                        </div>-->
                    </form>
                    <form class="sign-up-htm" action="nice.php" method="post">
                        <div class="group">
                            <input placeholder="Username" id="su-user" type="text" class="input" name="su-name">
                        </div>

                        <div class="group">
                            <input placeholder="Email adress" id="su-email" type="email" class="input" name="su-email">
                        </div>

                        <div class="group">
                            <input placeholder="Password" id="su-pass" type="password" class="input" data-type="password" name="su-pass">
                        </div>
                        <div class="group">
                            <input type="submit" class="button" value="Sign Up" onclick="Signing_up()">
                        </div>
                        <div class="hr"></div>
                        <!--<div class="footer">
                            <label for="item-1">Already have an account?</a>
                        </form>-->
                </div>
            </div>
        </div> 
        <script>
            function Signing_in()
            {
                <?php
                $name = $_GET['li-name'];
                $pass = $_GET['li-pass'];
                $conn = new mysqli('localhost', 'root', '', 'assignment');
                if($conn -> connect_error)
                {
                die('Connection Failed : ' . $conn->connect_error);
                }
                else
                {
                    $stmt = $conn->prepare("select * from account where NAME=?  and PASSWORD = ?");
                    $stmt->bind_param("ss", $Name,$pass);
                    $stmt->execute();
                    $stmt_res = $stmt->get_result();
                    if($stmt_res->num_rows > 0)
                    {
                        $data = $stmt_res->fetch_assoc();
                        echo "<h2>zail2 psda</h2>";
                    }
                    else{
                        echo "<h2>Bolsonguee</h2>";
                    }
                    $stmt->close();
                    $conn->close();
                }
                ?>
            }
            function Signing_up()
            {
                <?php
                $Name = $_POST['su-name'];
                $Email = $_POST['su-email'];
                $pass = $_POST['su-pass'];

                $conn = new mysqli('localhost', 'root', '', 'assignment');
                if($conn -> connect_error)
                {
                die('Connection Failed : ' . $conn->connect_error);
                }
                else
                {
                    $stmt = $conn->prepare("insert into account(name,email,password) values(?,?,?)");
                    $stmt->bind_param("sss", $Name, $Email, $pass);
                    $stmt->execute();
                    $stmt->close();
                    $conn->close();
                }
                ?>
            }
        </script>
    </body>
</html>