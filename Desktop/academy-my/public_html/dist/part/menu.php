  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/index.php" class="brand-link">
      <img src="/dist/img/<?echo $server_data[logo];?>" alt="" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><?echo $server_data[sitename];?></span>
    </a>

    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="/index.php" class="nav-link">
                      <i class="fa fa-home" aria-hidden="true"></i>
                  <p>&nbsp;Главная</p>
                </a>
            </li>
             <li class="nav-item">
                <a href="/pages/publikatsii" class="nav-link">
                      <i class="fa fa-globe" aria-hidden="true"></i>
                  <p>&nbsp;Все публикации</p>
                </a>
            </li>
		<?
        $category = mysqli_query($link, "SELECT * FROM `category`");
        While($category_data = mysqli_fetch_array($category)){
            echo'<li class="nav-item">
                <a href="/pages/publikatsii?category='.$category_data[link].'" class="nav-link">
                      <i class="fa fa-'.$category_data[icon].'" aria-hidden="true"></i>
                  <p>&nbsp;'.$category_data[category].'</p>
                </a>
            </li>';
        }
        ?>
        </ul>
      </nav>
    </div>
  </aside>