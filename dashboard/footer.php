
    <!-- Footer -->
    <footer class="py-5 bg-dark <?php echo $isadmin ?>">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Joe's Diner  2019</p>
        <p class="text-center text-white">Developed By Wael Tech</p>
      </div>
      <!-- /.container -->
    </footer>

  <!-- JQuery -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.6.0/js/mdb.min.js"></script>
  <script src="js/main.js"></script>
  <?php 

  if($isadmin){ ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
  <script src="../js/dashboard.js"></script>
  <?php } ?>

</body>
</html>