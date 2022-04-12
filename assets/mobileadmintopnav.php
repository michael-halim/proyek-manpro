<!-- <nav class="navbar navbar-expand-sm bg-dark sticky-top shadow">
        <ul class="nav">
            <li class="nav-item active">
                <a class="nav-link text-white" href="#"> <i class="material-icons">menu</i> </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Renungan</a>
            </li>
        </ul>
    </nav> -->

    <!-- batas coba navbar -->
<script>

  //sidenav
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, options);
  });

  // Initialize collapsible (uncomment the lines below if you use the dropdown variation)
  // var collapsibleElem = document.querySelector('.collapsible');
  // var collapsibleInstance = M.Collapsible.init(collapsibleElem, options);

  // Or with jQuery

  $(document).ready(function(){
    $('.sidenav').sidenav();
  });
  ////////////////////////////////////////////////////////////////////////

  //hide nav
  $(document).ready(function(){
  $(".hdnnav").click(function(){
    $("nav").hide();
  });
  $(".shwnav").click(function(){
    $("nav").show();
  });
});

  /////////////////

  //collpasible
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('.collapsible').collapsible();
  });
///////////////////////////////////////////////////////

  // Toast Alert

  M.toast({html: 'I am a toast!'})


  

  ///////////////////////////////////////////////////////////////
  </script>

  <style>

  </style>

<ul id="slide-out" class="sidenav position-absolute">
  <li><div class="user-view">
    <div class="background">
      <img src="assets/img/cover.png">
    </div>
    <a href="#user"><img class="circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTB6At_WsdMZrn_ImShsz-Wm3yjXRdjZ905U8gLF_XJ3MJMbaEE9BIk_Q-2ALVvEOJXcfY&usqp=CAU"></a>
    <a href="#name"><span class="white-text name"><?= $_SESSION['nama']; ?></span></a>
    <a href="#email"><span class="white-text email"><?= $_SESSION['email']; ?></span></a>
  </div></li>
  <li><a href="mobile_admin_home.php"><i class="material-icons">home</i>Home</a></li>
  <li> <a href="mobile_admin_group.php"><i class="material-icons">group</i>Group List</a></li>
  <li> <a href="mobile_admin_event.php"><i class="material-icons">event_note</i>Event</a></li>
  <li> <a href="mobile_admin_materi.php"><i class="material-icons">book</i>Materi</a></li>
  <li><div class="divider"></div></li>
  <li><a class="subheader">Subheader</a></li>
  <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
  <li> <a href="logout.php"><i class="material-icons">exit_to_app</i>Logout</a></li>
</ul>

<a href="#" data-target="slide-out" class="sidenav-trigger hdnnav"> <i class=" small material-icons py-4 px-2">menu</i> </a> <i class="small py-4 px-2 shwnav" >Renungan</i>
