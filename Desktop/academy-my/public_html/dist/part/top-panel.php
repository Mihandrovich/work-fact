  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
          <?if($uid > 0){
          echo '';
          }else{
          echo '<a class="nav-link" href="/pages/login.php">
                    <i class="fas fa-sign-in-alt"></i>
                </a>';
          }?>

      </li>
      <li class="nav-item dropdown">
          <?if($user[access] > 0){
          echo '<a class="nav-link" href="/pages/uslogmin.php">
                    <i class="nav-icon fas fa-briefcase"></i>
                </a>';
            }else{

          }?>

      </li>
      <li class="nav-item dropdown">
          <?if($user[access] > 4){
          echo '<a class="nav-link" href="/pages/admlogmin.php">
                    <i class="nav-icon fas fa-book"></i>
                </a>';
            }else{

          }?>

      </li>
    </ul>
    
  </nav>