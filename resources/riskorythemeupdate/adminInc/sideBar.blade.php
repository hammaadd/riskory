@section('adminSidebar')
    
   
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{URL::route('admin')}}">
          <div class="sidebar-brand-icon rotate-n-15">
            {{-- <i class="fas fa-laugh-wink"></i> --}}
          </div>
          <div class="sidebar-brand-text mx-3">
            <img src="{{asset('assets/images/Riskory-1.png')}}" class="admin-logo" alt="Riskory logo">
          </div>
        </a>
  
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
  
        <!-- Nav Item - Dashboard -->
      <li class="nav-item {{Request::is('admin') ? 'active' : ''}}">
        <a class="nav-link" href="{{URL::route('admin')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>
  
        <!-- Divider -->
        <hr class="sidebar-divider">
  
        <!-- Heading -->
        <div class="sidebar-heading">
          Control
        </div>
  
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{Request::is('admin/control/industry/*') ? 'active' : ''}} {{Request::is('admin/control/industry') ? 'active' : ''}}">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-industry"></i>
            <span>Industry</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
            <a class="collapse-item" href="{{route('control.index',['type'=>'industry'])}}">All industries</a>
              <a class="collapse-item" href="{{route('control.create',['type'=>'industry'])}}">Add industry</a>
            </div>
          </div>
        </li>

        <li class="nav-item {{Request::is('admin/control/bprocess/*') ? 'active' : ''}} {{Request::is('admin/control/bprocess') ? 'active' : ''}}">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBP" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-sync-alt"></i>
            <span>Business process</span>
          </a>
          <div id="collapseBP" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
            <a class="collapse-item" href="{{route('control.index',['type'=>'bprocess'])}}">All b processes</a>
            <a class="collapse-item" href="{{route('control.create',['type'=>'bprocess'])}}">Add b process</a>
            </div>
          </div>
        </li>

        <li class="nav-item {{Request::is('admin/control/bframework/*') ? 'active' : ''}} {{Request::is('admin/control/bframework') ? 'active' : ''}}">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBF" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Business framework</span>
          </a>
          <div id="collapseBF" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
            <a class="collapse-item" href="{{route('control.index',['type'=>'bframework'])}}">All b frameworks</a>
            <a class="collapse-item" href="{{route('control.create',['type'=>'bframework'])}}">Add b framework</a>
            </div>
          </div>
        </li>

        <li class="nav-item {{Request::is('admin/control/category/*') ? 'active' : ''}} {{Request::is('admin/control/category') ? 'active' : ''}}">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCat" aria-expanded="true" aria-controls="collapseCat">
            <i class="fas fa-fw fa-list-alt"></i>
            <span>Category</span>
          </a>
          <div id="collapseCat" class="collapse" aria-labelledby="collapseCat" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
            <a class="collapse-item" href="{{route('control.index',['type'=>'category'])}}">All categories</a>
            <a class="collapse-item" href="{{route('control.create',['type'=>'category'])}}">Add category</a>
            </div>
          </div>
        </li>

        <li class="nav-item {{Request::is('admin/tag/*') ? 'active' : ''}} {{Request::is('admin/tag') ? 'active' : ''}}">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTag" aria-expanded="true" aria-controls="collapseTag">
            <i class="fas fa-fw fa-tags"></i>
            <span>Tag</span>
          </a>
          <div id="collapseTag" class="collapse" aria-labelledby="collapseTag" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
            <a class="collapse-item" href="{{route('tag.index',['type'=>'category'])}}">All tags</a>
            <a class="collapse-item" href="{{route('tag.create',['type'=>'category'])}}">Add tag</a>
            </div>
          </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
  
        <!-- Heading -->
        <div class="sidebar-heading">
          User Management
        </div>

        <li class="nav-item {{Request::is('admin/rolemanager/*') ? 'active' : ''}} {{Request::is('admin/rolemanager') ? 'active' : ''}}">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-user-tag"></i>
            <span>Role & permission</span>
          </a>
          <div id="collapseUsers" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
              <a  href="{{ route('laratrust.roles-assignment.index' ) }}" class="collapse-item">Role & permission <br> Assignment</a>
            <a class="collapse-item" href="{{URL::route('laratrust.roles.index')}}">Roles</a>
            <a class="collapse-item" href="{{URL::route('laratrust.permissions.index')}}">Permissions</a>
            </div>
          </div>
        </li>

        <li class="nav-item {{Request::is('admin/contributors/*') ? 'active' : ''}} {{Request::is('admin/contributors') ? 'active' : ''}}">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseContributors" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-user-tag"></i>
            <span>User</span>
          </a>
          <div id="collapseContributors" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
            <a  href="{{route('contributor.index')}}" class="collapse-item">All users</a>
            <a  href="{{route('contributor.unverified')}}" class="collapse-item">Unverified users</a>
              
            </div>
          </div>
          
        </li>

        <hr class="sidebar-divider">
  
        <!-- Heading -->
        <div class="sidebar-heading">
          Riskcontrol Management
        </div>

        <li class="nav-item {{Request::is('admin/rolemanager/*') ? 'active' : ''}} {{Request::is('admin/rolemanager') ? 'active' : ''}}">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRcs" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-chalkboard"></i>
            <span>Riskcontrol</span>
          </a>
          <div id="collapseRcs" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
            <a  href="{{route('admin.allRiskControls')}}" class="collapse-item">All riskcontrols</a>
            <a  href="{{route('admin.pending.rcs')}}" class="collapse-item">Pending</a>
            </div>
          </div>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider">
  
        <!-- Heading -->
        <div class="sidebar-heading">
         Content Management
        </div>


        <li class="nav-item {{Request::is('admin/content/*') ? 'active' : ''}} {{Request::is('admin/content') ? 'active' : ''}}">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseContent" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-file"></i>
            <span>Page content</span>
          </a>
          <div id="collapseContent" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('content.index')}}">All contents</a> 
            </div>
          </div>
        </li>

        <li class="nav-item {{Request::is('admin/contact/*') ? 'active' : ''}} {{Request::is('admin/contact') ? 'active' : ''}}">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseContact" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Contact submission</span>
          </a>
          <div id="collapseContact" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('contact.index')}}">All submissions</a> 
            </div>
          </div>
        </li>

        <li class="nav-item {{Request::is('admin/subscriber/*') ? 'active' : ''}} {{Request::is('admin/subscriber') ? 'active' : ''}}">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSubscriber" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-stream"></i>
            <span>Subscriber</span>
          </a>
          <div id="collapseSubscriber" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('subscribers.index')}}">All Subscribers</a> 
            </div>
          </div>
        </li>

        <li class="nav-item {{Request::is('admin/feedback/*') ? 'active' : ''}} {{Request::is('admin/feedback') ? 'active' : ''}}">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFeedback" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-comments"></i>
            <span>Feedback</span>
          </a>
          <div id="collapseFeedback" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('feedback.index')}}">All Feedbacks</a> 
            </div>
          </div>
        </li>


        
        <!-- Divider -->
        {{-- <hr class="sidebar-divider">
  
        <!-- Heading -->
        <div class="sidebar-heading">
         File Management
        </div>


        <li class="nav-item {{Request::is('admin/content/*') ? 'active' : ''}} {{Request::is('admin/content') ? 'active' : ''}}">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFm" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-file"></i>
            <span>File manager</span>
          </a>
          <div id="collapseFm" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('filemanager.index')}}">Filemanager</a> 
            </div>
          </div>
        </li> --}}

       

  
  
       
       
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
  
        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
  
      </ul>
      <!-- End of Sidebar -->
