@section('nav')
        <li class="nav-item">
          <a class="nav-link" href="/paketwisata">
            <i class="mdi mdi-barley menu-icon"></i>
            <span class="menu-title">Create Travel Packages</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/destination-category">
            <i class="mdi mdi-apple-safari menu-icon"></i>
            <span class="menu-title">Destination Category</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/data-booking">
            <i class="mdi mdi-wallet-travel menu-icon"></i>
            <span class="menu-title">Data Booking</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/blogadmin">
            <i class="mdi mdi-blogger menu-icon"></i>
            <span class="menu-title">Blog</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/rating">
            <i class="mdi mdi-account-star menu-icon"></i>
            <span class="menu-title">Rating</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/bahasa">
            <i class="mdi mdi-google-translate menu-icon"></i>
            <span class="menu-title">Bahasa</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/background/change">
            <i class="mdi mdi-collage menu-icon"></i>
            <span class="menu-title">Change Background</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/season">
            <i class="mdi mdi mdi-google-maps
             menu-icon"></i>
            <span class="menu-title">Theme</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/currency/currency">
            <i class=" mdi mdi-currency-usd menu-icon"></i>
            <span class="menu-title">Custom Currency</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <i class=" mdi mdi-email-outline  menu-icon"></i>
            <span class="menu-title">Message</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="/message/message">Message</a></li>
              <li class="nav-item"> <a class="nav-link" href="/message/corporate">Corporate discount</a></li>
              <li class="nav-item"> <a class="nav-link" href="/message/influencer">Influencer</a></li>
              <li class="nav-item"> <a class="nav-link" href="/message/travelagent">Travel Agent</a></li>
            </ul>
          </div>
        </li>

@endsection