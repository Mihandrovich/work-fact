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
            <a href="/pages/user/panel.php" class="nav-link">
              <i class="fas fa-solar-panel nav-icon"></i>
              <p>Панель</p>
            </a>
        </li>        
        <li class="nav-item">
            <a href="/pages/user/report.php" class="nav-link">
              <i class="fas fa-tasks nav-icon"></i>
              <p>Отчеты</p>
            </a>
        </li>       
        <li class="nav-item">
            <a href="/pages/user/task.php" class="nav-link">
              <i class="fas fa-briefcase nav-icon"></i>
              <p>Задания</p>
            </a>
        </li>        
        <li class="nav-item">
            <a href="/pages/user/profile.php" class="nav-link">
              <i class="far fa-user-circle nav-icon"></i>
              <p>Личный кабинет</p>
            </a>
        </li>         
        <li class="nav-item">
            <a href="/pages/user/finance.php" class="nav-link">
              <i class="fas fa-ruble-sign nav-icon"></i>
              <p>Финансы</p>
            </a>
        </li>
        </ul>
      </nav>
    </div>
  </aside>