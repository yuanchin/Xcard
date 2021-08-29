<ul class="navbar-nav m-auto">
  <li class="nav-item  {{ active_class(if_route('topics.index')) }}">
    <a class="nav-link" href="{{ route('topics.index') }}">
      <div class="sidebar-item">
        <div><i class="fas fa-home"></i></div>
        <div>話題</div>
      </div>
      
    </a>
  </li>
    
  <li class="nav-item  {{ category_nav_active(1) }}">
    <a class="nav-link" href="{{ route('categories.show', 1) }}">
      <div class="sidebar-item">
        <div><i class="far fa-comments"></i></div>
        <div>八卦</div>
      </div> 
    </a>
  </li>

  <li class="nav-item  {{ category_nav_active(2) }}">
    <a class="nav-link" href="{{ route('categories.show', 2) }}">
      <div class="sidebar-item">
        <div><i class="fas fa-chart-area"></i></div>
        <div>股票</div>
      </div>
    </a> 
  </li>  

  <li class="nav-item  {{ category_nav_active(3) }}">
    <a class="nav-link" href="{{ route('categories.show', 3) }}">
      <div class="sidebar-item">
        <div><i class="far fa-address-card"></i></div>
        <div>工作</div>
      </div>
    </a>
  </li>

  <li class="nav-item  {{ category_nav_active(4) }}">
    <a class="nav-link" href="{{ route('categories.show', 4) }}">
      <div class="sidebar-item">
        <div><i class="fab fa-codepen"></i></div>
        <div>軟體工程師</div>
      </div>
    </a>
  </li>
</ul>