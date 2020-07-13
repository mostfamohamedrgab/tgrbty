<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset('public/storage/imgs/'. auth('admin')->user()->img ) }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ auth('admin')->user()->name }} </p>
      </div>
    </div>
  <ul class="sidebar-menu">

    <li>
      <a href="{{ route('admin.Admin.index') }}">
        <i class="fa fa-shield"></i> <span>المسؤوليين</span>
        <small class="label pull-right bg-yellow">
          {{ App\Models\Admin::count() }}
        </small>
      </a>
    </li>

    <li>
      <a href="{{ route('admin.User.index') }}">
        <i class="fa fa-users"></i> <span>الاعضاء</span>
        <small class="label pull-right bg-yellow">
          {{ App\User::count() }}
        </small>
      </a>
    </li>

    <li>
      <a href="{{ route('admin.Section.index') }}">
        <i class="fa fa-sitemap"></i> <span>الأقسام</span>
        <small class="label pull-right bg-yellow">
          {{ App\Models\Section::count() }}
        </small>
      </a>
    </li>

    <li>
      <a href="{{ route('admin.Experience.index') }}">
        <i class="fa fa-user"></i> <span>التجارب</span>
        <small class="label pull-right bg-yellow">
          {{ App\Models\Experience::count() }}
        </small>
      </a>
    </li>

    <li>
      <a href="{{ route('admin.Contact.index') }}">
        <i class="fa fa-envelope-o"></i> <span>الرسائل</span>
        <small class="label pull-right bg-yellow">
          {{ App\Models\Contact::count() }}
        </small>
      </a>
    </li>


  </ul>
</section>
<!-- /.sidebar -->
</aside>
