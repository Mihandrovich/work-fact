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
            <a href="/pages/admin/adpanel.php" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Главная</p>
            </a>
        </li>        
        <li class="nav-item">
            <a href="/pages/admin/seo.php" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>SEO</p>
            </a>
        </li>       
        <li class="nav-item">
            <a href="/pages/admin/news.php" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Новости</p>
            </a>
        </li>       
        <li class="nav-item">
            <a href="/pages/admin/report.php" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Отчеты</p>
            </a>
        </li>        
        <li class="nav-item">
            <a href="/pages/admin/add-news.php" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Добавить новость</p>
            </a>
        </li>        
        <li class="nav-item">
            <a href="/pages/admin/add-order.php" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Добавить задание</p>
            </a>
        </li>         
        <li class="nav-item">
            <a href="/pages/parse.php" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>ПАРСЕР</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/pages/admin/user.php" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Пользователи</p>
            </a>
          </li>
        <li class="nav-item">
            <a href="/pages/admin/admin.php" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Администраторы</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>