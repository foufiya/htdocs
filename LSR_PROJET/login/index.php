<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>News WEB Site</title>
      <link rel="stylesheet" href="nv.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body>
      <nav>
         <div class="menu-icon">
            <span class="fas fa-bars"></span>
         </div>
         <div class="logo">
            BUBBLE
         </div>
         <div class="nav-items">
            <li><a onclick="location.href='home.html'">Home</a></li>
            <li><aonclick="location.href='AboutUs.html'">About</a></li>
            <li><a href="#">Blogs</a></li>
            <li><a href="#">Feedback</a></li>
            <li><a onclick="location.href='new_post.php'">My blocks</a></li>
         </div>

         
         <div class="search-icon">
            <span class="fas fa-search"></span>
         </div>
         <div class="cancel-icon">
            <span class="fas fa-times"></span>
         </div>
         <form action="#">
            <input type="search" class="search-data" placeholder="Search" required>
            <button type="submit" class="fas fa-search"></button>
         </form>
      </nav>
         <header style="font-size: 50PX ;">About us</header><hr><br>
         <div style="border: 40px; margin: 40px;" class="container">
            <h2 style="border-left: 10px;">Introduction:</h2>
            <!--<img style="font-size: small;" src="sunsetnew.jpg">-->
            <p style="margin-top: 20px;">  Notre site web d'articles est une plateforme en ligne dédiée à la publication de contenus de qualité sur une variété de sujets. Nous sommes passionnés par la création de contenu intéressant et informatif pour nos lecteurs, et nous travaillons dur pour offrir une expérience de lecture agréable et engageante. Que vous cherchiez des conseils pratiques, des analyses approfondies ou des histoires inspirantes, notre équipe de rédacteurs expérimentés est là pour vous fournir des articles de qualité supérieure. Nous espérons que notre site vous inspirera et vous informera, et nous sommes impatients de partager notre passion pour l'écriture avec vous.</p2>
         </div>
         
         

      <script>
         const menuBtn = document.querySelector(".menu-icon span");
         const searchBtn = document.querySelector(".search-icon");
         const cancelBtn = document.querySelector(".cancel-icon");
         const items = document.querySelector(".nav-items");
         const form = document.querySelector("form");
         menuBtn.onclick = ()=>{
           items.classList.add("active");
           menuBtn.classList.add("hide");
           searchBtn.classList.add("hide");
           cancelBtn.classList.add("show");
         }
         cancelBtn.onclick = ()=>{
           items.classList.remove("active");
           menuBtn.classList.remove("hide");
           searchBtn.classList.remove("hide");
           cancelBtn.classList.remove("show");
           form.classList.remove("active");
           cancelBtn.style.color = "#ff3d00";
         }
         searchBtn.onclick = ()=>{
           form.classList.add("active");
           searchBtn.classList.add("hide");
           cancelBtn.classList.add("show");
         }
      </script>


     


   </body>
</html>