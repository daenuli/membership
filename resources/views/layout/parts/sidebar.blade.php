<section class="sidebar">
  <!-- Sidebar user panel -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="{{asset("AdminLTE-2.4.18/dist/img/user2-160x160.jpg")}}" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p>{{ Auth::user()->name }}</p>
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>
  <!-- search form -->
  <form action="#" method="get" class="sidebar-form">
    <div class="input-group">
      <input type="text" name="q" class="form-control" placeholder="Search...">
      <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
    </div>
  </form>
  <!-- /.search form -->
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li class="{{($urlactive == 'transaction') ? 'active' : ''}}">
      <a href="{{url('home')}}">
        <i class="fa fa-home"></i> <span>Dashboard</span>
      </a>
    </li>
    <li class="{{($urlactive == 'members') ? 'active' : ''}}">
      <a href="{{url('members')}}">
        <i class="fa fa-users"></i> <span>Kader</span>
      </a>
    </li>
    <!-- @if(auth()->user()->role == 'admin')
    <li class="{{($urlactive == 'user') ? 'active' : ''}}">
      <a href="">
        <i class="fa fa-users"></i> <span>User</span>
      </a>
    </li>
    @endif -->
  </ul>
</section>
