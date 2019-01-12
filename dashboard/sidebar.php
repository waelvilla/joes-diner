<?php
$dir=getcwd();
$is_active="";
$href="";

?>
<nav class="col-md-2 d-none d-md-block grey lighten-5 sidebar mr-5">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <?php foreach($sidebar_categories as $i =>$icon){ 
            $is_active=$active == $i? "active" : $active=="" && $i== "Dashboard"? "active" : "";
            $href=$i=="Dashboard" ? "" : $i;
            ?>
          <li class="nav-item">
            <a class="nav-link <?php echo $is_active; ?>" href="index.php?active=<?php echo $href; ?>">
              <span data-feather="<?php echo $icon; ?>"></span>
              <?php echo $i; ?><span class="sr-only">(current)</span>
            </a>
          </li>
        <?php } ?>
        </ul>
    </div>
</nav>

