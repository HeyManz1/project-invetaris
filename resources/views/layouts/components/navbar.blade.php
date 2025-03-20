<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="/" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Home</a>
      </li>
    </ul>
    <!-- End Left navbar links -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <form action="/logout" method="post">
          @csrf
          @method('POST')
          <button type="submit" class="btn btn-sm btn-outline-danger" >
            Logout
          </button>
      </form>
    </ul>
    <!-- End Right navbar links -->
  </nav>