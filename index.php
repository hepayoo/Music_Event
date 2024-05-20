<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MeloMosaic</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>


  <header class="header" id="header">
    <div class="container">
      <div class="header-services">
        <span class="icon">
          <img src="./assets/icon-1.png" alt="" srcset="">
        </span>
        <span class="icon">
          <img src="./assets/icon-2.png" alt="" srcset="">
        </span>
        <span class="icon">
          <img src="./assets/icon-3.png" alt="" srcset="">
        </span>
        <span class="icon">
          <img src="./assets/icon-4.png" alt="" srcset="">
        </span>
      </div>
      <h1 class="header-title">
        MeloMosaic
      </h1>
      <div class="header-trailer">
        
      </div>
      <div class="header-description">
       
        <span class="strong">
          "🎵 Dive into a symphonic journey where melodies paint memories and rhythms stir emotions. Welcome to 'MeloMosaic', where every event becomes a masterpiece  🎶"</span>
       
  
       
      </div>
    </div>

  </header>


  <section class="about" id="about">

    <div class="container">

      <div class="items">
        <div class="item item-l">
          <div class="image">
            <img src="./assets/about-1.jpg" alt="" srcset="">
          </div>
        </div>
        <div class="item item-r">
          <div class="content">
            
            <h1 class="item-title">
              Experience MeloMosaic
            </h1>
            <div class="item-description">
              <p>
                we invite you to discover the magic that awaits around every corner , Don't miss your chance to be part of the excitement and unforgettable memories
              </p>
            </div>
          </div>
        </div>
      </div>


      <div class="items">
        <div class="item item-l">
          <div class="content">
           
            <h1 class="item-title">
              Get ready for some amazing music!
            </h1>
            <div class="item-description">
              <p>
              
Get ready to experience the thrill of a lifetime! 🎉 Join us and let the excitement take you over , prepare to be swept off your feet and into a world of pure exhilaration. Don't miss out on the adventure – secure your spot now and get ready to make memories that will last a lifetime!
              </p>
            </div>
          </div>
        </div>
        <div class="item item-r">
          <div class="image">
            <img src="./assets/about-2.jpg" alt="" srcset="">
          </div>
        </div>

      </div>


    </div>
  </section>



  <section class="latests" id="latests">
    <div class="heading">
      <h5 class="subtitle">Be Present Next time</h5>
      <h1 class="title">Our Latests Events</h1>
      <a href="./create.php" class="btn-explore item-b">add event</a>
    </div>

  


    <div class="container">
      <div class="items">

      <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "event_dp";
            $connection = new mysqli($servername, $username, $password, $database);
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }
            $sql = "SELECT * FROM event";
            $result = $connection->query($sql);
            if (!$result) {
                die("Invalid query: " . $connection->error);
            }
            while ($row = $result->fetch_assoc()) {
                echo '
                <div class="item item-l">
                    <img src="assets/' . htmlspecialchars($row['image']) . '" alt="">
                    <div class="details">
                        <h5 class="d-subtitle item-t">' . htmlspecialchars($row['date']) . '</h5>
                        <h3 class="d-title item-l">"' . htmlspecialchars($row['title']) . '"</h3>
                        <a href="/Events/register.php" class="btn-explore item-b">Save spot</a>
                    </div>
                </div>';
            }
            ?>
<!-- 
  
  container  for music events 

  <div class="item item-r">
          <a href="event.html" class="item-link" target="_blank">

            <img src="./assets/rockstar aesthetic _ rockstar girlfriend aesthetic _ band aesthetic.jpeg" alt="" srcset="">
          </a>

          <div class="details">
            <h5 class="d-subtitle item-t">USA 07 Event</h5>
            <h3 class="d-title item-l">The Light Inside Films</h3>
            <a href="event.html" class="btn-explore item-b">explore more </a>

          </div>
        </div>
      -->
       


      </div>
    </div>

  </section>

  <section class="quote" id="quote">


    <div class="content">
      <div class="description item-t">
        <span class="icon item-t"> <i class="fa-solid fa-quote-left"></i></span>
        <p class="item-b">
          Welcome to your digital stage, where every event becomes a melody. So unlock the symphony of your Events: Where Melodies Meet Moments.
        </p>
      </div>

    </div>
  </section>

  <section class="galliers" id="galliers">
    <div class="heading">
      <h5 class="subtitle">Be in Our Gallery Next time</h5>
      <h1 class="title">Our Events Gallery </h1>
    </div>
    <div class="container">
      <div class="items">

     
        <div class="item item-b">
          <a href="album.html" target="_blank">

          <img src="./assets/gallery-2.jpg" alt="" srcset="">
          

        </a>
        </div>
        <div class="item item-t" target="_blank">
          <a href="event.html">

            <img src="./assets/Catering Software - Disco Aesthetic.jpeg" alt="" srcset="">
            

          </a>
        </div>
        <div class="item item-b" target="_blank">
          <a href="album.html">

          <img src="./assets/gallery-4.jpg" alt="" srcset="">
          

        </a>
        </div>
        <div class="item item-t" target="_blank">
          <a href="album.html">

          <img src="./assets/gallery-5.jpg" alt="" srcset="">
          

        </a>
        </div>
        <div class="item item-b" target="_blank">
          <a href="album.html">

          <img src="./assets/gallery-6.jpg" alt="" srcset="">
          

        </a>
        </div>
        <div class="item item-t">
          <a href="album.html" target="_blank">

          <img src="./assets/téléchargement (3).jpeg" alt="" srcset="">
          
        </a>

        </div>
       
        <div class="item item-b">
          <a href="album.html" target="_blank">

          <img src="./assets/téléchargement (4).jpeg" alt="" srcset="">
         

        </a>
        </div>
        <div class="item item-t">
          <a href="album.html" target="_blank">

          <img src="./assets/17 Ways To Make Your Music Festival Experience Legendary.jpeg" alt="" srcset="">
          
  
</a>
        </div>
      </div>
    </div>

  </section>
  <section class="connected" id="connected">
    <div class="content">
      <h5 class="subtitle item-t">Connect with us</h5>
      <h1 class="title item-b">
        get connected
      </h1>
      <div class="description item-t">
        <span class="icon"> <i class="fab fa-facebook-f"></i></span>
        <span class="icon"> <i class="fab fa-linkedin-in"></i></span>
        <span class="icon"> <i class="fab fa-youtube"></i></span>
        <span class="icon"> <i class="fab fa-instagram"></i></span>
        <span class="icon"> <i class="far fa-heart"></i></span>

      </div>

    </div>
  </section>
  <script src="https://unpkg.com/scrollreveal"></script>
  <script src="./main.js"></script>
</body>

</html>