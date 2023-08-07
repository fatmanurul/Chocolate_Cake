<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{Request::is('admin/dashboard')? 'active' : '' }}" aria-current="page" href="/admin/dashboard">
              <span data-feather="home"></span>
              Dasbor
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{Request::is('admin/categories*')? 'active' : '' }}" href="/admin/categories">
              <span data-feather="grid"></span>
              Kategori
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{Request::is('admin/articles*')? 'active' : '' }}" href="/admin/articles">
              <span data-feather="file-text"></span>
              Artikel
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{Request::is('admin/comments*')? 'active' : '' }}" href="/admin/comments">
              <span data-feather="message-square"></span>
              komentar
            </a>
          </li>
        </ul>
      </div>
    </nav>
   
   