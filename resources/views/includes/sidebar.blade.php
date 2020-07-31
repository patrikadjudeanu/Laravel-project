<!-- sidebar nav -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion position-fixed" id="accordionSidebar" style = "left:0">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}">
        <div class="sidebar-brand-text mx-3"><b>{{ Auth::user()->name }}</b></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Operatiuni
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="{{url('proceseVerbale/create')}}">
          <span>Adaugare proces verbal</span>
        </a>
        <a class="nav-link" href="{{url('clienti/create')}}">
          <span>Adaugare client</span>
        </a>
        <a class="nav-link" href="{{url('proceseVerbale')}}">
          <span>Cautare proces verbal </span>
        </a>
        <a class="nav-link" href="{{url('clienti')}}">
          <span>Cautare client</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Setari
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="/">
          <span>Setari cont</span>
        </a>
        
        
       
        <!-- Divider -->
        <hr class="sidebar-divider">

        <a class="nav-link" href="{{url('logout')}}">
          <span>Log Out</span>
        </a>
      </li>  
    </ul>