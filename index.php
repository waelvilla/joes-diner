<?php 
echo   $_SERVER['PROJECT_ROOT'];
include 'dashboard/db.php';
include 'dashboard/header.php';
include 'dashboard/home-nav.php';
$db_menu=$db -> query("SELECT * FROM food");
$db_categories=$db->query("SELECT * FROM categories ORDER BY id");
$categs=array();
$menu=array();
$active="";
$fade="";
while($item = $db_menu-> fetch_assoc()){
  array_push($menu,$item);
}
while($category = $db_categories->fetch_assoc()){
  array_push($categs,$category);
}
foreach($categs as $c){
  foreach($menu as $i){
    if($i['category']==$c['category']){
      // echo $i['title'] . "<br>";
    }
  }
}
// foreach($categs as $x){
//   while($z = $menu ->fetch_assoc()){
//     if($z['category']==$x){
//       echo $z['title'];
//     }
//   }
// }
?>


  <!-- Full Page Intro -->
  <div class="view" style="background-image: url('img/katlyn-giberson-185277-unsplash.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
    <!-- Mask & flexbox options-->
    <div class="mask rgba-gradient d-flex justify-content-center align-items-center">
      <!-- Content -->
      <div class="container">
        <!--Grid row-->
        <div class="row">
          <!--Grid column-->
          <div class="col-md-6 white-text text-center text-md-left mt-xl-5 mb-5 wow fadeInLeft" data-wow-delay="0.3s">
            <h1 class="h1-responsive font-weight-bold mt-sm-5">Food We Enjoy Making, and You Enjoy Eating</h1>
            <hr class="hr-light">
            <h6 class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem repellendus quasi
              fuga nesciunt
              dolorum nulla magnam veniam sapiente, fugiat! Commodi sequi non animi ea dolor molestiae
              iste.</h6>
            <a class="btn btn-white js-scroll-trigger" href="#reservation">Reserve a Table</a>
            <a class="btn btn-outline-white js-scroll-trigger" href="#menu">View Menu</a>
          </div>
          <!--Grid column-->
          <!--Grid column-->
<!--           <div class="col-md-6 col-xl-5 mt-xl-5 wow fadeInRight" data-wow-delay="0.3s">
            <img src="https://mdbootstrap.com/img/Mockups/Transparent/Small/admin-new.png" alt="" class="img-fluid">
          </div> -->
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </div>
      <!-- Content -->
    </div>
    <!-- Mask & flexbox options-->
  </div>
  <!-- Full Page Intro -->

<!-- Main navigation -->

<!-- ABOUT -->
    <section id="about" class="bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h2>About Joe's Diner</h2>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut optio velit inventore, expedita quo laboriosam possimus ea consequatur vitae, doloribus consequuntur ex. Nemo assumenda laborum vel, labore ut velit dignissimos.</p>
          </div>
        </div>
      </div>
    </section>



    <!------------- MENU ------------->
  <section id="menu">
    <div class="container">
    <h2>Food We Offer</h2>
    <br>
    <!-- Nav pills -->
    <ul class="nav nav-pills" role="tablist">
      <?php for($index=0;$index<count($categs); $index++){
        $active= $index? " " : "active" ; 
        ?>
      <li class="nav-item">
        <a class="nav-link <?php echo $active ?>" data-toggle="pill" href="#<?php echo $categs[$index]['category'];?>"><?php echo $categs[$index]['category'];?>s</a>
      </li>
      <?php } ?>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <?php for($index=0;$index<count($categs); $index++){
        $active= $index? "fade" : "active" ;
        ?>
      <div id="<?php echo $categs[$index]['category'];?>" class="container tab-pane <?php echo $active ?>"><br>
        <div class="row">
        <?php foreach($menu as $item){ 
          if($item['category']==$categs[$index]['category']){ ?>
            <div class="card col-md-5 m-2">
              <div class="row no-gutters">
                <div class="col-auto">
                  <img src="img/items/<?php echo $item['image_name'] ?>" class="img-thumbnail menu-img" >
                </div>
                <div class="col">
                  <div class="card-block px-2">
                    <h4 class="card-title"><?php echo $item['title']?></h4>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat incidunt</p>
                    <hr class="w-75 float-left mr-3">
                    <h6>$<?php echo $item['price'];?></h6>
                    <a href="#" class="btn btn-primary">View</a>
                  </div>
                </div>
              </div>
            </div>

        <?php }} ?>
        </div>   
      </div>
      <?php } ?>

      </div>
    </div>
  </section>

<!-- Today Special -->
<section id="today-special" class="bg-dark text-white">
      <div class="container">
        <h2>Plate of the Day</h2>
        <div class="row">
            <div class="card  m-2 bg-dark">
              <div class="row no-gutters">
                <div class="col-auto">
                  <img src="img/items/tortilla-lasagna.jpg" class="img-fluid" >
                </div>
                <div class="col">
                  <div class="card-block px-2">
                    <h4 class="card-title">Tortilla Lasagna</h4>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat incidunt Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi, corporis voluptatum soluta nostrum exercitationem non voluptates! Eum ab, ipsum voluptate, vero facilis repudiandae culpa aut, corporis unde doloribus voluptatibus temporibus. </p>
                    <a href="#" class="btn btn-primary">View</a>
                  </div>
                </div>
              </div>
            </div>

        </div>
      </div>
    </section>


<!-- GALLERY -->

    <section class="content-section" id="gallery">
      <div class="container">
        <div class="content-section-heading text-center">
          <h3 class="text-secondary mb-0">Gallery</h3>
          <h2 class="mb-5">A Fine Selection</h2>
        </div>
        <div class="row no-gutters">
          <div class="col-lg-6">
            <a class="gallery-item" href="#">
              <span class="caption">
                <span class="caption-content">
                  <h2>Caviar and Smoked Salmon</h2>
                  <p class="mb-0">A yellow pencil with envelopes on a clean, blue backdrop!</p>
                </span>
              </span>
              <img class="img-fluid" src="img/items/caviar-smoked-salmon.jpg" alt="">
            </a>
          </div>
          <div class="col-lg-6">
            <a class="gallery-item" href="#">
              <span class="caption">
                <span class="caption-content">
                  <h2>Seasoned Steak</h2>
                  <p class="mb-0">A dark blue background with a colored pencil, a clip, and a tiny ice cream cone!</p>
                </span>
              </span>
              <img class="img-fluid" src="img/items/seasoned-steak.jpg" alt="">
            </a>
          </div>
          <div class="col-lg-6">
            <a class="gallery-item" href="#">
              <span class="caption">
                <span class="caption-content">
                  <h2>Cozy Vibes</h2>
                  <p class="mb-0">Strawberries are such a tasty snack, especially with a little sugar on top!</p>
                </span>
              </span>
              <img class="img-fluid" src="img/cozy-restaurant.jpg" alt="">
            </a>
          </div>
          <div class="col-lg-6">
            <a class="gallery-item" href="#">
              <span class="caption">
                <span class="caption-content">
                  <h2>The Kitchen</h2>
                  <p class="mb-0">A yellow workspace with some scissors, pencils, and other objects.</p>
                </span>
              </span>
              <img class="img-fluid" src="img/restaurant-kitchen.jpg" alt="">
            </a>
          </div>
        </div>
      </div>
    </section>

    <section id="reservation" class="bg-light" style="background-image: url('img/reserve-table.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center;">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 card">
            <div class="card-body">
              <h2 class="card-title pb-5">Reserve a table</h2>
              <form action="">
                <div class="form-group row">
                    <label class="col-md-3  col-form-label" for="reserver-name">Name</label>
                    <div class="col-md-9 ">
                      <input id="reserver-name" name="reserver-name" type="text" placeholder="Full Name" class="form-control">
                    </div>
                </div>  
                <div class="form-group row">
                    <label class="col-md-3  col-form-label" for="reserver-email">Email</label>
                    <div class="col-md-9 ">
                      <input id="reserver-name" name="reserver-email" type="email" placeholder="Email" class="form-control">
                    </div>
                </div>  
                <div class="form-group row">
                    <label class="col-md-3  col-form-label" for="reserver-count">Number of guests</label>
                    <div class="col-md-9">
                      <select class="form-control" name="reserver-count" id="reserver-count">
                        <option value="1">1 Person</option>
                        <option value="2">2 People</option>
                        <option value="3">3 People</option>
                        <option value="4">4 People</option>
                        <option value="5">5 People</option>
                        <option value="6">6 People</option>
                        <option value="7">7 People</option>
                        <option value="8">8 People</option>
                        <option value="9">9 People</option>
                        <option value="10">10 People</option>
                      </select>
                    </div>
                </div>  
                <div class="form-group row">
                    <label class="col-md-3  col-form-label" for="reserver-date">Date</label>
                    <div class="col-md-9 ">
                    <input id="reserver-date" name="reserver-date" type="date" class="form-control">
                    </div>
                </div>  
                <div class="form-group row">
                    <label class="col-md-3  col-form-label" for="reserver-time">Time</label>
                    <div class="col-md-9 ">
                    <input id="reserver-time" name="reserver-time" type="time" min="8:00" max="22:00" class="form-control">
                    </div>
                </div>  
                <div class="form-group row">
                  <label class="col-md-3  col-form-label" for="reserver-note">Notes</label>
                  <div class="col-md-9">
                    <textarea id="reserver-note" type="text" rows="4" placeholder="Anything we should know" class="form-control"></textarea>
                  </div>
                </div>
                <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Reserve Table" >
                </div>                  
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>



  <section id="contact" class="stylish-color-dark">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3 card mx-auto">
            <div class="card-body ">
              <form class="form-horizontal" action="" method="post">
                <div class="text-center display-4 pb-3">Contact us</div>
        
                <!-- Name input-->
                <div class="form-group row ">
                  <label class="col-md-2 control-label" for="name">Name</label>
                  <div class="col-md-10 mx-auto">
                    <input id="name" name="name" type="text" placeholder="Your name" class="form-control">
                  </div>
                </div>
        
                <!-- Email input-->
                <div class="form-group row">
                  <label class="col-md-2 control-label" for="email">Email</label>
                  <div class="col-md-10 mx-auto">
                    <input id="email" name="email" type="text" placeholder="Your email" class="form-control">
                  </div>
                </div>
        
                <!-- Message body -->
                <div class="form-group row">
                  <label class="col-md-4 control-label" for="message">Your Message</label>
                  <div class="col-md-12 mx-auto">
                    <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5"></textarea>
                  </div>
                </div>
        
                <!-- Form actions -->
                <div class="form-group">
                  <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                  </div>
                </div>

              </form>
          </div>
        </div>
      </div>
    </div>
  </section>


<?php include 'dashboard/footer.php';?>
