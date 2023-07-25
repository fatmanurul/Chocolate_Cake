<!-- Navbar start -->
<nav class="navbar navbar-expand-lg bg-body-secondary p-3">
  <div class="container">
    <a class="navbar-brand" href="/"><h2><p style = "font-family:Brush Script MT;">
Chocolate Cake</p></h2></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav"  aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="right navbar-right" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item ">
          <a class="nav-link {{ ($title === "artikels") ? 'active' : '' }}" href="/"><h5><p style = "font-family:Garamond;">Artikel</h5></p></a>
        </li>
        <li class="nav-item">
        <a class="nav-link {{ ($title === "kategori") ? 'active' : '' }}" href="/"><h5><p style = "font-family:Garamond;">Kategori</h5></p></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- navbar end -->