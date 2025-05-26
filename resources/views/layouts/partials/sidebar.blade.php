<!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

            <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('dashboard1') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard 1</span>
        </a>
      </li><!-- End Dashboard Nav -->

            <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('dashboard2') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard 2</span>
        </a>
      </li><!-- End Dashboard Nav -->

            <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('predict') }}">
          <i class="bi bi-grid"></i>
          <span>Prediction Churn</span>
        </a>
      </li><!-- End Dashboard Nav -->

      @can('is-Admin')

      <li class="nav-heading">Administration</li>
      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Gestion des utilisateurs</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('users.index') }}">
              <i class="bi bi-circle"></i><span>Liste des utilisateurs</span>
            </a>
          </li>
          <li>
            <a href="{{ route('users.create') }}">
              <i class="bi bi-circle"></i><span>Nouvel utilisateur</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('profile.edit') }}">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.html">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->
      @endcan

    </ul>

  </aside>
<!-- End Sidebar-->