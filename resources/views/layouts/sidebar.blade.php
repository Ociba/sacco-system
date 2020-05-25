<div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="{{ asset('images/profile_pictures/'.auth()->user()->getLoggedInUserLogo()) }}" alt="User Image" class="iimg-circle elevation-2" style="border-radius:100%; width:55px;height:60px;">
          {{--<img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">--}}
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->name}}</a>
          <a href="#" class="d-block">{{ auth()->user()->displayRoleInSidebar() }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @if(in_array('Can view dashboard', auth()->user()->getUserPermisions()))    
          <li class="nav-item has-treeview menu-open" @if(\Request::route()->getName() == "home")class="active" @endif>
            <a href="/home-dash" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Home
               </p>
               </a>
          </li>
         @endif
         @if(in_array('Can view users', auth()->user()->getUserPermisions()))
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                Users 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
           
            @if(in_array('Can view registered users', auth()->user()->getUserPermisions()))
            <ul class="nav nav-treeview"           
             @if(\Request::route()->getName() == "Registered Users")class="active" @endif>
            <li class="nav-item">
                <a href="/all_users" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>My Details</p>
                </a>
              </li>
              
              @endif
              @if(in_array('Can view staff', auth()->user()->getUserPermisions()))
              
              <li class="nav-item" @if(\Request::route()->getName() == "Staff")class="active" @endif>
                <a href="/staff" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Staff</p>
                </a>
              </li>
              
              @endif
              @if(in_array('Can view all users', auth()->user()->getUserPermisions()))
              
              <li class="nav-item" @if(\Request::route()->getName() == "All Users")class="active" @endif>
                <a href="/display-users" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Users</p>
                </a>
              </li>
              
              @endif
              @if(in_array('Can view members', auth()->user()->getUserPermisions()))
              
              <li class="nav-item" @if(\Request::route()->getName() == "Registered Members")class="active" @endif>
                <a href="/members-details" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Members Details</p>
                </a>
              </li>
              @endif
            </ul> 
          </li>
          @endif
          @if(in_array('Can view next of kin', auth()->user()->getUserPermisions()))
          <li class="nav-item has-treeview" @if(\Request::route()->getName() == "NextOfKin")class="active" @endif>
            <a href="/display-next-of-kin-details" class="nav-link">
              <i class="nav-icon fa fa-user-plus"></i>
              <p>
                Next of Kin 
                {{--<i class="fas fa-angle-left right"></i>--}}
              </p>
            </a>
          </li>
          @endif
          <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
              <i class="nav-icon fa fa-save"></i>
              <p>
                Savings 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            @if(in_array('Can view all savings', auth()->user()->getUserPermisions()))
            <li class="nav-item" @if(\Request::route()->getName() == "View All Savings")class="active" @endif>
            <a href="/all-savings" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                View All Savings 
              </p>
            </a>
            </li>
            
            @endif
            @if(in_array('Can view my savings', auth()->user()->getUserPermisions()))
          
            <li class="nav-item" @if(\Request::route()->getName() == "My Savings")class="active" @endif>
            <a href="/display-savings" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                My Savings 
              </p>
            </a>
            </li>
            @endif
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Loans
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
           @if(in_array('Can view all loans', auth()->user()->getUserPermisions()))
            <li class="nav-item" @if(\Request::route()->getName() == "View All Loans")class="active" @endif>
                <a href="/all-loans" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View All Loans</p>
                </a>
              </li>
              
              @endif
              @if(in_array('Can view my loan', auth()->user()->getUserPermisions()))
              
              <li class="nav-item" @if(\Request::route()->getName() == "My Loan")class="active" @endif>
                <a href="/loan-active" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>My Loan</p>
                </a>
              </li>
              
              @endif
              @if(in_array('Can view my loan payments', auth()->user()->getUserPermisions()))
              
              <li class="nav-item" @if(\Request::route()->getName() == "My Loan")class="active" @endif>
                <a href="/display-payments" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>My Loan Payments</p>
                </a>
              </li>
              
              @endif
              @if(in_array('Can view my all loan payments', auth()->user()->getUserPermisions()))
              
              <li class="nav-item" @if(\Request::route()->getName() == "My Loan")class="active" @endif>
                <a href="/display-all-payments" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Loan Payments</p>
                </a>
              </li>
              
              @endif
              @if(in_array('Can view cleared loan', auth()->user()->getUserPermisions()))
              
              <li class="nav-item" @if(\Request::route()->getName() == "Cleared Loans")class="active" @endif>
                <a href="/loan-cleared" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cleared Loans</p>
                </a>
              </li>
              @endif
            </ul>
          </li>
          @if(in_array('Can view benefits', auth()->user()->getUserPermisions()))
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-money"></i>
              <p>
                Benefits
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            @if(in_array('Can view all benefits', auth()->user()->getUserPermisions()))
            <li class="nav-item"  @if(\Request::route()->getName() == "All Benefits")class="active" @endif>
                <a href="/View-all-benefits" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Benefits</p>
                </a>
              </li>
              
              @endif
              @if(in_array('Can view accepted benefits', auth()->user()->getUserPermisions()))
              
              <li class="nav-item" @if(\Request::route()->getName() == "Accepted Benefits")class="active" @endif>
                <a href="/accepted-benefit" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Accepted Benefits</p>
                </a>
              </li>
              
              @endif
              @if(in_array('Can view unaccepted benefit', auth()->user()->getUserPermisions()))
          
              <li class="nav-item" @if(\Request::route()->getName() == "Unaccepted Benefit")class="active" @endif>
                <a href="/unaccepted-benefit" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unaccepted Benefit</p>
                </a>
              </li>
              @endif
            </ul>
          </li>
          @endif
          @if(in_array('Can view expenses', auth()->user()->getUserPermisions()))
          <li class="nav-item has-treeview" @if(\Request::route()->getName() == "Expenses")class="active" @endif>
            <a href="/display-expenses" class="nav-link">
              <i class="nav-icon fa fa-credit-card"></i>
              <p>
                Expenses
                {{--<i class="fas fa-angle-left right"></i>--}}
              </p>
            </a>
          </li>
          @endif
          @if(in_array('Can view mails', auth()->user()->getUserPermisions()))
          <li class="nav-item has-treeview" @if(\Request::route()->getName() == "Mails")class="active" @endif>
            <a href="/display-mailbox" class="nav-link">
              <i class="nav-icon fa fa-envelope-o"></i>
              <p>
                Mails
              </p>
            </a>
          </li>
          @endif
          @if(in_array('Can view pages', auth()->user()->getUserPermisions()))
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-pagelines"></i>
              <p>
                Pages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
          @if(in_array('Can view messages', auth()->user()->getUserPermisions()))
          <li class="nav-item">" @if(\Request::route()->getName() == "Messages")class="active" @endif>
            <a href="/display-message" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Messages               
              </p>
            </a>
          </li>
          @endif
          @if(in_array('Can view projects', auth()->user()->getUserPermisions()))
          <li class="nav-item has-treeview" @if(\Request::route()->getName() == "Projects")class="active" @endif>
            <a href="/display-project" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Projects
              </p>
            </a>
          </li>
          @endif
          @if(in_array('Can view approve testimony', auth()->user()->getUserPermisions()))
          <li class="nav-item" @if(\Request::route()->getName() == "Projects")class="active" @endif>
            <a href="/display-unappoved" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Approve Testimony
              </p>
            </a>
          </li>
          @endif
          @if(in_array('Can view calls', auth()->user()->getUserPermisions()))
          <li class="nav-item" @if(\Request::route()->getName() == "Projects")class="active" @endif>
            <a href="/display-callback" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Call Backs
              </p>
            </a>
          </li>
          @endif
          @if(in_array('Can view Hstory', auth()->user()->getUserPermisions()))
          <li class="nav-item" @if(\Request::route()->getName() == "Projects")class="active" @endif>
            <a href="/display-history" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                History
              </p>
            </a>
          </li>
          @endif
          @if(in_array('Can view awards', auth()->user()->getUserPermisions()))
          <li class="nav-item" @if(\Request::route()->getName() == "Projects")class="active" @endif>
            <a href="/display-awards" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Awards
              </p>
            </a>
          </li>
          @endif
          @if(in_array('Can view subcription', auth()->user()->getUserPermisions()))
          <li class="nav-item" @if(\Request::route()->getName() == "Projects")class="active" @endif>
            <a href="/display-subscription" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
               Subscription
              </p>
            </a>
          </li>
          @endif
          @if(in_array('Can view coming soon table', auth()->user()->getUserPermisions()))
          <li class="nav-item" @if(\Request::route()->getName() == "Projects")class="active" @endif>
            <a href="/display-coming-soon" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
               Coming Soon
              </p>
            </a>
          </li>
          @endif
          </ul>
          </li>
          @endif
          @if(in_array('Can view Profile', auth()->user()->getUserPermisions()))
          <li class="nav-item has-treeview" @if(\Request::route()->getName() == "Projects")class="active" @endif>
            <a href="/display-profile" class="nav-link">
              <i class="nav-icon fa fa-image"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
          @endif
          @if(in_array('Can user accounts setting', auth()->user()->getUserPermisions()))
          <li class="nav-item has-treeview" @if(\Request::route()->getName() == "User Accounts")class="active" @endif>
            <a href="/roles" class="nav-link">
              <i class="nav-icon fa fa-key"></i>
              <p>
                User Accounts
              </p>
            </a>
          </li>
          @endif
         @if(in_array('Can view register user', auth()->user()->getUserPermisions()))
          <li class="nav-item has-treeview" @if(\Request::route()->getName() == "Register User")class="active" @endif>
            <a href="/capture-user" class="nav-link">
              <i class="nav-icon fa fa-registered"></i>
              <p>
                Register User
              </p>
            </a>
          </li>
          
          @endif
          @if(in_array('Can change password', auth()->user()->getUserPermisions()))
          
          <li class="nav-item has-treeview" @if(\Request::route()->getName() == "Change Password")class="active" @endif>
            <a href="/change-passwords" class="nav-link">
              <i class="nav-icon fa fa-lock"></i>
              <p>
                Change Password
              </p>
            </a>
          </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>