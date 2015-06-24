
<aside>
  <div id="sidebar"  class="nav-collapse ">
      <!-- sidebar menu start-->
      <ul class="sidebar-menu" id="nav-accordion">
      
      	  <p class="centered"><a href="#"><img src="{{ asset('assets/img/aiesec_launcher.png') }}" class="img-circle" width="60"></a></p>
      	  <h5 class="centered">AIESEC in Poland</h5>
          
          @if(Auth::check() && Auth::user()->is('mc_member'))
              <li class="sub-menu">
                <a href="javascript:;" class="<?= Request::is('total*') ? 'active' : '' ?>" >
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Admin Settings</span>
                </a>
                <ul class="sub">
                    <li class="<?= Request::is('expa-leads*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/expa-leads">EXPA Leads</a></li>
                    <li class="<?= Request::is('lcs*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/lcs">Local Committees</a></li>
                </ul>
            </li>
          @endif
          <li class="sub-menu">
              <a href="{{URL::to('/')}}/generate-url" >
                  <i class="fa fa-bar-chart-o"></i>
                  <span>URL Generator</span>
              </a>
          </li>
          <li class="sub-menu">
              <a href="javascript:;" class="<?= Request::is('total*') ? 'active' : '' ?>" >
                  <i class="fa fa-bar-chart-o"></i>
                  <span>Total Analysis</span>
              </a>
              <ul class="sub">
                  <li class="<?= Request::is('total/gc*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/total/gc">Global Citizen</a></li>
                  <li class="<?= Request::is('total/gt*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/total/gt">Global Talents</a></li>
                  <li class="<?= Request::is('total/gh*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/total/gh">Global Host</a></li>
                  <li class="<?= Request::is('total/fl*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/total/fl">Future Leaders</a></li>
                  <li class="<?= Request::is('total/au*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/total/au">Aiesec University</a></li>
              </ul>
          </li>

          <li class="sub-menu">
              <a href="javascript:;" class="<?= Request::is('national*') ? 'active' : '' ?>" >
                  <i class="fa fa-bar-chart-o"></i>
                  <span>MC promo</span>
              </a>
              <ul class="sub">
                  <li class="<?= Request::is('national/gc*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/national/gc">Global Citizen</a></li>
                  <li class="<?= Request::is('national/gt*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/national/gt">Global Talents</a></li>
                  <li class="<?= Request::is('national/gh*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/national/gh">Global Host</a></li>
                  <li class="<?= Request::is('national/fl*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/national/fl">Future Leaders</a></li>
                  <li class="<?= Request::is('national/au*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/national/au">Aiesec University</a></li>
              </ul>
          </li>
          
          @foreach (Helpers::getLCs() as $lc)
            <li class="sub-menu">
                <a href="javascript:;" class="<?= Request::is($lc['url_name'].'*') ? 'active' : '' ?>">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>{{ $lc['full_name'] }}</span>
                </a>
                <ul class="sub">
                    <li class="<?= Request::is($lc['url_name'].'/gc*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/{{$lc['url_name']}}/gc">Global Citizen</a></li>
                    <li class="<?= Request::is($lc['url_name'].'/gt*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/{{$lc['url_name']}}/gt">Global Talents</a></li>
                    <li class="<?= Request::is($lc['url_name'].'/gh*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/{{$lc['url_name']}}/gh">Global Host</a></li>
                    <li class="<?= Request::is($lc['url_name'].'/fl*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/{{$lc['url_name']}}/fl">Future Leaders</a></li>
                    <li class="<?= Request::is($lc['url_name'].'/au*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/{{$lc['url_name']}}/au">Aiesec University</a></li>
                </ul>
            </li>
          @endforeach
      </ul>
      <!-- sidebar menu end-->
  </div>
</aside>
