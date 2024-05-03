<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="login.css" >
    <title>login</title>
</head>
<body>
<div class="wrapper">
    <nav class="nav">
        <div class="nav-logo">
            <p>LOGO.</p>
        </div>
        <div class="nav-menu">
            <ul>
               <li><a href="#" class="link active">home</li>
                <li><a href="#" class="link">services</li>
                <li><a href="#" class="link">about</li> 
            </ul>
        </div>
        <div class="nav-button" >
            <button class="btn whitw-btn" id="loginBtn" onclick="login()">Sign In</button>
            <button class="btn" id="registerBtn" onclick="register()">Sign Up</button>
        </div>
        <DIV class="nav-menu-btn" >
            <i class="bx bx-menu" onclick="myMenuFunction" ></i>
        </DIV>
    </nav>

    <!-- ................FORM ..............-->
    <div class="form-box">

        <!---------------------------login form--------------------------->
        <div class="login-container" id="register">
            <div class="top" >
                <span>Don't Have an account?<a href="#" onclick="register()" >Sign Up</a></span>
                <header>Login Up</header>
            </div>
            <div class="two-forms" >
                <div class="input-box" >
                    <input type="text"  class="input-field" placeholder="Usename or Email">
                    <i class="bx bx-user" ></i>
                </div>
                <div class="input-box" >
                    <input type="password"  class="input-field" placeholder="Password">
                    <i class="bx bx-lock-alt" ></i>
                </div>
                <div class="input-box" >
                    <input type="submit"  class="submit" value="Sign In" >
                    
                </div>
            </div>
        </div>

        <!---------------------------register form--------------------------->
        <div class="register-container" id="register">
            <div class="top" >
                <span>Have an account?<a href="#" onclick="login()" >Login</a></span>
                <header>Sign Up</header>
            </div>
            <div class="two-forms" >
                <div class="input-box" >
                    <input type="text"  class="input-field" placeholder="Firstname">
                    <i class="bx bx-user" ></i>
                </div>
                <div class="input-box" >
                    <input type="text"  class="input-field" placeholder="Lastname">
                    <i class="bx bx-user" ></i>
                </div>
                <div class="input-box" >
                    <input type="text"  class="input-field" placeholder="Email">
                    <i class="bx bx-envelope" ></i>
                </div>
                <div class="input-box" >
                    <input type="password"  class="input-field" placeholder="Password">
                    <i class="bx bx-lock-alt" ></i>
                </div>
                <div class="input-box" >
                    <input type="submit"  class="submit" value="register" >   
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    var a = document.getElementById("loginBtn");
    var b = document.getElementById("registerBtn");
    var x = document.getElementById("login");
    var y = document.getElementById("register");

    function login(){
        x.style.left='4px';
        y.style.right='-520px';
        a.className="white-btn";
        b.className="btn";
        x.style.opacity= 1;
        y.style.opacity= "-520px";
    }

    function register(){
    
        x.style.left='-520px';
        y.style.right='5px';
        a.className="white-btn";
        b.className="btn";
        x.style.opacity= 0;
        y.style.opacity= 1;

    }
</script>
</body>
</html>