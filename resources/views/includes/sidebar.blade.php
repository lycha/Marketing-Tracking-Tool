
<aside>
  <div id="sidebar"  class="nav-collapse ">
      <!-- sidebar menu start-->
      <ul class="sidebar-menu" id="nav-accordion">
      
      	  <p class="centered"><a href="#"><img src="{{ asset('assets/img/aiesec_launcher.png') }}" class="img-circle" width="60"></a></p>
      	  <h5 class="centered">AIESEC in Poland</h5>
      	  	
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
          
          <li class="sub-menu">
              <a href="javascript:;" class="<?= Request::is('bialystok*') ? 'active' : '' ?>">
                  <i class="fa fa-bar-chart-o"></i>
                  <span>Białystok</span>
              </a>
              <ul class="sub">
                  <li class="<?= Request::is('bialystok/gc*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/bialystok/gc">Global Citizen</a></li>
                  <li class="<?= Request::is('bialystok/gt*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/bialystok/gt">Global Talents</a></li>
                  <li class="<?= Request::is('bialystok/gh*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/bialystok/gh">Global Host</a></li>
                  <li class="<?= Request::is('bialystok/fl*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/bialystok/fl">Future Leaders</a></li>
                  <li class="<?= Request::is('bialystok/au*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/bialystok/au">Aiesec University</a></li>
              </ul>
          </li>
          <li class="sub-menu">
              <a href="javascript:;" class="<?= Request::is('gdansk*') ? 'active' : '' ?>">
                  <i class="fa fa-bar-chart-o"></i>
                  <span>Gdańsk</span>
              </a>
              <ul class="sub">
                  <li class="<?= Request::is('gdansk/gc*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/gdansk/gc">Global Citizen</a></li>
                  <li class="<?= Request::is('gdansk/gt*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/gdansk/gt">Global Talents</a></li>
                  <li class="<?= Request::is('gdansk/gh*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/gdansk/gh">Global Host</a></li>
                  <li class="<?= Request::is('gdansk/fl*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/gdansk/fl">Future Leaders</a></li>
                  <li class="<?= Request::is('gdansk/au*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/gdansk/au">Aiesec University</a></li>
              </ul>
          </li>
          <li class="sub-menu">
              <a href="javascript:;" class="<?= Request::is('katowice*') ? 'active' : '' ?>">
                  <i class="fa fa-bar-chart-o"></i>
                  <span>Katowice</span>
              </a>
              <ul class="sub">
                  <li class="<?= Request::is('katowice/gc*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/katowice/gc">Global Citizen</a></li>
                  <li class="<?= Request::is('katowice/gt*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/katowice/gt">Global Talents</a></li>
                  <li class="<?= Request::is('katowice/gh*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/katowice/gh">Global Host</a></li>
                  <li class="<?= Request::is('katowice/fl*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/katowice/fl">Future Leaders</a></li>
                  <li class="<?= Request::is('katowice/au*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/katowice/au">Aiesec University</a></li>
              </ul>
          </li>

          <li class="sub-menu">
              <a href="javascript:;" class="<?= Request::is('kielce*') ? 'active' : '' ?>">
                  <i class="fa fa-bar-chart-o"></i>
                  <span>Kielce</span>
              </a>
              <ul class="sub">
                  <li class="<?= Request::is('kielce/gc*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/kielce/gc">Global Citizen</a></li>
                  <li class="<?= Request::is('kielce/gt*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/kielce/gt">Global Talents</a></li>
                  <li class="<?= Request::is('kielce/gh*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/kielce/gh">Global Host</a></li>
                  <li class="<?= Request::is('kielce/fl*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/kielce/fl">Future Leaders</a></li>
                  <li class="<?= Request::is('kielce/au*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/kielce/au">Aiesec University</a></li>
              </ul>
          </li>

          <li class="sub-menu">
              <a href="javascript:;" class="<?= Request::is('krakow*') ? 'active' : '' ?>">
                  <i class="fa fa-bar-chart-o"></i>
                  <span>Kraków</span>
              </a>
              <ul class="sub">
                  <li class="<?= Request::is('krakow/gc*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/krakow/gc">Global Citizen</a></li>
                  <li class="<?= Request::is('krakow/gt*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/krakow/gt">Global Talents</a></li>
                  <li class="<?= Request::is('krakow/gh*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/krakow/gh">Global Host</a></li>
                  <li class="<?= Request::is('krakow/fl*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/krakow/fl">Future Leaders</a></li>
                  <li class="<?= Request::is('krakow/au*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/krakow/au">Aiesec University</a></li>
              </ul>
          </li>

          <li class="sub-menu">
              <a href="javascript:;" class="<?= Request::is('lublin*') ? 'active' : '' ?>">
                  <i class="fa fa-bar-chart-o"></i>
                  <span>Lublin</span>
              </a>
              <ul class="sub">
                  <li class="<?= Request::is('lublin/gc*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/lublin/gc">Global Citizen</a></li>
                  <li class="<?= Request::is('lublin/gt*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/lublin/gt">Global Talents</a></li>
                  <li class="<?= Request::is('lublin/gh*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/lublin/gh">Global Host</a></li>
                  <li class="<?= Request::is('lublin/fl*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/lublin/fl">Future Leaders</a></li>
                  <li class="<?= Request::is('lublin/au*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/lublin/au">Aiesec University</a></li>
              </ul>
          </li>

          <li class="sub-menu">
              <a href="javascript:;" class="<?= Request::is('lodz*') ? 'active' : '' ?>">
                  <i class="fa fa-bar-chart-o"></i>
                  <span>Łódź</span>
              </a>
              <ul class="sub">
                  <li class="<?= Request::is('lodz/gc*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/lodz/gc">Global Citizen</a></li>
                  <li class="<?= Request::is('lodz/gt*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/lodz/gt">Global Talents</a></li>
                  <li class="<?= Request::is('lodz/gh*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/lodz/gh">Global Host</a></li>
                  <li class="<?= Request::is('lodz/fl*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/lodz/fl">Future Leaders</a></li>
                  <li class="<?= Request::is('lodz/au*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/lodz/au">Aiesec University</a></li>
              </ul>
          </li>

          <li class="sub-menu">
              <a href="javascript:;" class="<?= Request::is('olsztyn*') ? 'active' : '' ?>">
                  <i class="fa fa-bar-chart-o"></i>
                  <span>Olsztyn</span>
              </a>
              <ul class="sub">
                  <li class="<?= Request::is('olsztyn/gc*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/olsztyn/gc">Global Citizen</a></li>
                  <li class="<?= Request::is('olsztyn/gt*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/olsztyn/gt">Global Talents</a></li>
                  <li class="<?= Request::is('olsztyn/gh*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/olsztyn/gh">Global Host</a></li>
                  <li class="<?= Request::is('olsztyn/fl*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/olsztyn/fl">Future Leaders</a></li>
                  <li class="<?= Request::is('olsztyn/au*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/olsztyn/au">Aiesec University</a></li>
              </ul>
          </li>

          <li class="sub-menu">
              <a href="javascript:;" class="<?= Request::is('poznan*') ? 'active' : '' ?>">
                  <i class="fa fa-bar-chart-o"></i>
                  <span>Poznań</span>
              </a>
              <ul class="sub">
                  <li class="<?= Request::is('poznan/gc*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/poznan/gc">Global Citizen</a></li>
                  <li class="<?= Request::is('poznan/gt*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/poznan/gt">Global Talents</a></li>
                  <li class="<?= Request::is('poznan/gh*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/poznan/gh">Global Host</a></li>
                  <li class="<?= Request::is('poznan/fl*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/poznan/fl">Future Leaders</a></li>
                  <li class="<?= Request::is('poznan/au*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/poznan/au">Aiesec University</a></li>
              </ul>
          </li>

          <li class="sub-menu">
              <a href="javascript:;" class="<?= Request::is('rzeszow*') ? 'active' : '' ?>">
                  <i class="fa fa-bar-chart-o"></i>
                  <span>Rzeszów</span>
              </a>
              <ul class="sub">
                  <li class="<?= Request::is('rzeszow/gc*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/rzeszow/gc">Global Citizen</a></li>
                  <li class="<?= Request::is('rzeszow/gt*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/rzeszow/gt">Global Talents</a></li>
                  <li class="<?= Request::is('rzeszow/gh*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/rzeszow/gh">Global Host</a></li>
                  <li class="<?= Request::is('rzeszow/fl*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/rzeszow/fl">Future Leaders</a></li>
                  <li class="<?= Request::is('rzeszow/au*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/rzeszow/au">Aiesec University</a></li>
              </ul>
          </li>

          <li class="sub-menu">
              <a href="javascript:;" class="<?= Request::is('szczecin*') ? 'active' : '' ?>">
                  <i class="fa fa-bar-chart-o"></i>
                  <span>Szczecin</span>
              </a>
              <ul class="sub">
                  <li class="<?= Request::is('szczecin/gc*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/szczecin/gc">Global Citizen</a></li>
                  <li class="<?= Request::is('szczecin/gt*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/szczecin/gt">Global Talents</a></li>
                  <li class="<?= Request::is('szczecin/gh*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/szczecin/gh">Global Host</a></li>
                  <li class="<?= Request::is('szczecin/fl*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/szczecin/fl">Future Leaders</a></li>
                  <li class="<?= Request::is('szczecin/au*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/szczecin/au">Aiesec University</a></li>
              </ul>
          </li>

          <li class="sub-menu">
              <a href="javascript:;" class="<?= Request::is('torun*') ? 'active' : '' ?>">
                  <i class="fa fa-bar-chart-o"></i>
                  <span>Toruń</span>
              </a>
              <ul class="sub">
                  <li class="<?= Request::is('torun/gc*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/torun/gc">Global Citizen</a></li>
                  <li class="<?= Request::is('torun/gt*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/torun/gt">Global Talents</a></li>
                  <li class="<?= Request::is('torun/gh*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/torun/gh">Global Host</a></li>
                  <li class="<?= Request::is('torun/fl*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/torun/fl">Future Leaders</a></li>
                  <li class="<?= Request::is('torun/au*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/torun/au">Aiesec University</a></li>
              </ul>
          </li>

          <li class="sub-menu">
              <a href="javascript:;" class="<?= Request::is('warszawasgh*') ? 'active' : '' ?>">
                  <i class="fa fa-bar-chart-o"></i>
                  <span>Warszawa SGH</span>
              </a>
              <ul class="sub">
                  <li class="<?= Request::is('warszawasgh/gc*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/warszawasgh/gc">Global Citizen</a></li>
                  <li class="<?= Request::is('warszawasgh/gt*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/warszawasgh/gt">Global Talents</a></li>
                  <li class="<?= Request::is('warszawasgh/gh*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/warszawasgh/gh">Global Host</a></li>
                  <li class="<?= Request::is('warszawasgh/fl*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/warszawasgh/fl">Future Leaders</a></li>
                  <li class="<?= Request::is('warszawasgh/au*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/warszawasgh/au">Aiesec University</a></li>
              </ul>
          </li>

          <li class="sub-menu">
              <a href="javascript:;" class="<?= Request::is('warszawauw*') ? 'active' : '' ?>">
                  <i class="fa fa-bar-chart-o"></i>
                  <span>Warszawa UW</span>
              </a>
              <ul class="sub">
                  <li class="<?= Request::is('warszawauw/gc*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/warszawauw/gc">Global Citizen</a></li>
                  <li class="<?= Request::is('warszawauw/gt*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/warszawauw/gt">Global Talents</a></li>
                  <li class="<?= Request::is('warszawauw/gh*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/warszawauw/gh">Global Host</a></li>
                  <li class="<?= Request::is('warszawauw/fl*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/warszawauw/fl">Future Leaders</a></li>
                  <li class="<?= Request::is('warszawauw/au*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/warszawauw/au">Aiesec University</a></li>
              </ul>
          </li>

          <li class="sub-menu">
              <a href="javascript:;" class="<?= Request::is('wroclawue*') ? 'active' : '' ?>">
                  <i class="fa fa-bar-chart-o"></i>
                  <span>Wrocław UE</span>
              </a>
              <ul class="sub">
                  <li class="<?= Request::is('wroclawue/gc*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/wroclawue/gc">Global Citizen</a></li>
                  <li class="<?= Request::is('wroclawue/gt*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/wroclawue/gt">Global Talents</a></li>
                  <li class="<?= Request::is('wroclawue/gh*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/wroclawue/gh">Global Host</a></li>
                  <li class="<?= Request::is('wroclawue/fl*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/wroclawue/fl">Future Leaders</a></li>
                  <li class="<?= Request::is('wroclawue/au*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/wroclawue/au">Aiesec University</a></li>
              </ul>
          </li>
          
          <li class="sub-menu">
              <a href="javascript:;" class="<?= Request::is('wroclawut*') ? 'active' : '' ?>">
                  <i class="fa fa-bar-chart-o"></i>
                  <span>Wrocław UT</span>
              </a>
              <ul class="sub">
                  <li class="<?= Request::is('wroclawut/gc*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/wroclawut/gc">Global Citizen</a></li>
                  <li class="<?= Request::is('wroclawut/gt*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/wroclawut/gt">Global Talents</a></li>
                  <li class="<?= Request::is('wroclawut/gh*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/wroclawut/gh">Global Host</a></li>
                  <li class="<?= Request::is('wroclawut/fl*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/wroclawut/fl">Future Leaders</a></li>
                  <li class="<?= Request::is('wroclawut/au*') ? 'active' : '' ?>"><a  href="{{URL::to('/')}}/wroclawut/au">Aiesec University</a></li>
              </ul>
          </li>
      </ul>
      <!-- sidebar menu end-->
  </div>
</aside>
