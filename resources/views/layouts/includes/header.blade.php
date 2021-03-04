<!-- header -->
<div class="container-fluid">
    <div class="row top-menu bg-theme">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <a href="tel:+918171227799" class="mr-3 font-12"> <i class="fas fa-phone flip-180 text-yellow"></i> <span class="mobile-hidden"> +91 8171 227 799</span></a>
                    <a href="mailto:info@upswale.com" class="font-12"> <i class="far fa-envelope text-yellow"></i> <span class="mobile-hidden"> info@upswale.com</span></a>
                </div>
                <div class="col-6 text-right">                    
                    
                    @guest
                        <a href="{{ route('login') }}" class="mobile-hidden font-12 mr-2">
                            <i class="fas fa-sign-in-alt text-yellow"></i>
                            <abbr title="Login to access your dashboard">LOGIN</abbr>
                        </a>
                    @else
                        <a href="{{ route('user.dashboard') }}" class="font-12 mr-2"> 
                            <i class="fas fa-home text-yellow"></i>
                            <span class="mobile-hidden">
                                {{ Auth::user()->firstname }}
                            </span>
                        </a>
                    @endguest

                    <a target="_blank" href="https://www.facebook.com/www.upswale.com/" class="font-12 mr-1 "><i class="fab fa-facebook-f text-yellow"></i></a>
                    <a target="_blank" href="https://www.linkedin.com/company/2441877?trk=vsrp_companies_cluster_name&trkInfo=VSRPsearchId%3A3010989751466250855849%2CVSRPtargetId%3A2441877%2CVSRPcmpt%3Acompanies_cluster" class="font-12 mr-1 "><i class="fab fa-linkedin-in text-yellow"></i></a>
                    <a target="_blank" href="https://twitter.com/jdmtechnologies" class="font-12 mr-1 "><i class="fab fa-twitter text-yellow"></i></a>
                    <a target="_blank" href="https://plus.google.com/u/0/115666356069414156261/about?_ga=1.99873496.751522366.1451285151" class="font-12 mr-1 "><i class="fab fa-google-plus-g text-yellow"></i></a>
                    <a target="_blank" href="https://youtube.com/" class="font-12 mr-1 "><i class="fab fa-youtube text-yellow"></i></a>
                    <a target="_blank" href="#" class="font-12 mr-1 "><i class="fas fa-rss text-yellow"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Menu  -->
<div class="container-fluid main-header">
    <div class="row main-menu pt-1 pb-1 bg-light">
        <div class="container">
            <div class="row p-relative">
                <div class="col-3 logo">
                    <div class="logo-image">
                        <a href="{{ route('index') }}">
                            <img src="{{ asset('public/assets/images/logo/logo.png') }}" class="logo" alt="Upswale.com - Logo">
                        </a>
                    </div>
                </div>
                <div class="col-9 main-menu-outer p-static">
                    <div class="">
                        <div class="col-sm-12 mobile-menu pr-0">
                            <div class="search-bar">
                                <form>
                                    <input type="text" name="q" placeholder="Search Products... ">
                                    <button>
                                        <i class="fas fa-search"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="menu-toggler">
                                <i class="fa fa-bars"></i>
                                <i class="fa fa-times"></i>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-2 main-nav-outer pr-0  p-static">
                            <ul class="main-menu">
                                <li>
                                    <a href="{{ route('index') }}">
                                        <i class="fas fa-house-damage text-muted font-12"></i>
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a class="down-menu" href="javascript: void(0)">
                                        <i class="fas fa-list text-muted font-12"></i>
                                        Products
                                    </a>
                                    <div class="dd-menu mega-menu">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="container pr-5 pl-5 pb-4 pt-lg-4">
                                                    @php
                                                        $menus = menuList();
                                                    @endphp

                                                    @if (count($menus) > 0)
                                                        <ul class="row sub-mega-menu">
                                                            
                                                            @forelse ($menus as $menu)
                                                                <li class="col-sm-3 pt-3 pb-lg-3 heading-menu">
                                                                    <a href="{{ route('product.search').'?category='.$menu->categorycode }}">{{ $menu->categoryname }}</a>
                                                                    @if ($menu->subCategories)
                                                                        <ul class="inner-mega-menu">
                                                                            @forelse ($menu->subCategories as $smenu)                                                                        
                                                                                <li><a href="{{ route('product.search').'?category='.$smenu->categorycode.'&subCategory='.$smenu->subcategorycode }}">{{ $smenu->subcategoryname }}</a></li>
                                                                            @empty
                                                                                <li><a href="{{ route('product.search').'?category='.$menu->categorycode }}">View all {{ strtolower($menu->categoryname) }}</a></li>
                                                                            @endforelse
                                                                        </ul>
                                                                    @endif                                                                
                                                                </li>
                                                            @empty

                                                            @endforelse

                                                        </ul>
                                                    @endif

                                                    <div class="row mt-3">
                                                        <div class="col-sm-12">
                                                            <a href="{{ route('product.search') }}" class="custom-underline d-i-b">
                                                                View all products
                                                                <i class="fas fa-angle-double-right"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a class="down-menu" href="javascript: void(0)">
                                        <i class="fas fa-list text-muted font-12"></i>
                                        Brands
                                    </a>
                                    <div class="dd-menu mega-menu">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="container pr-5 pl-5 pb-4 pt-lg-4">
                                                    @php
                                                        $brandmenus = brandList();
                                                    @endphp

                                                    @if (count($brandmenus) > 0)
                                                        <ul class="row sub-mega-menu">
                                                            
                                                            @forelse ($brandmenus as $brandmenu)
                                                                <li class="col-sm-3 pt-3 pb-lg-3 heading-menu">
                                                                    <a href="{{ route('brands.search').'?brandoem='.$brandmenu->oemcode }}">{{ $brandmenu->oemname }}</a>
                                                                    @if ($brandmenu->brandCategories)
                                                                        <ul class="inner-mega-menu">
                                                                            @forelse ($brandmenu->brandCategories as $sbrandmenu)                                                                        
                                                                                <li>
                                                                                    <a href="{{ route('brands.search').'?brandoem='.$sbrandmenu->oemcode.'&brandcategory='.$sbrandmenu->categorycode }}">{{ $sbrandmenu->categoryname }}</a>
                                                                                    @if ($brandmenu->brandsubcategory)
                                                                                        <ul class="inner-mega-menu">
                                                                                            @forelse ($brandmenu->brandsubcategory as $ssbrandmenu) 
                                                                                                <li><a href="{{ route('brands.search').'?brandoem='.$ssbrandmenu->oemcode.'&brandCategories='.$ssbrandmenu->categorycode.'&brandsubcategory='.$ssbrandmenu->subcategorycode}}">{{ $ssbrandmenu->subcategoryname }}</a></li>
                                                                                            @empty
                                                                                            
                                                                                            @endforelse 
                                                                                        </ul> 
                                                                                    @endif    
                                                                                </li>
                                                                            @empty
                                                                                <li><a href="{{ route('brands.search').'?brandoem='.$brandmenu->oemcode }}">View all {{ strtolower($brandmenu->oemname) }}</a></li>
                                                                            @endforelse
                                                                        </ul>
                                                                    @endif                                                                
                                                                </li>
                                                            @empty

                                                            @endforelse

                                                        </ul>
                                                    @endif

                                                    <div class="row mt-3">
                                                        <div class="col-sm-12">
                                                            <a href="{{ route('brands.search') }}" class="custom-underline d-i-b">
                                                                View all brands
                                                                <i class="fas fa-angle-double-right"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a class="down-menu" href="javascript: void(0)">
                                        <i class="fas fa-headset text-muted font-12"></i>
                                        Support
                                    </a>
                                    <div class="dd-menu mega-menu">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="container pr-5 pl-5 pb-4 pt-lg-4">
                                                    @php
                                                        $supportmenus = supportList();
                                                    @endphp

                                                    @if (count($supportmenus) > 0)
                                                        <ul class="row sub-mega-menu">
                                                            
                                                            @forelse ($supportmenus as $supportmenu)
                                                                <li class="col-sm-3 pt-3 pb-lg-3 heading-menu">
                                                                    <a href="{{ route('support.search').'?supportoem='.$supportmenu->oemcode }}">{{ $supportmenu->oemname }}</a>
                                                                    @if ($supportmenu->supportCategories)
                                                                        <ul class="inner-mega-menu">
                                                                            @forelse ($supportmenu->supportCategories as $ssupportmenu)                                                                        
                                                                                <li>
                                                                                    <a href="{{ route('support.search').'?supportoem='.$ssupportmenu->oemcode.'&supportcategory='.$ssupportmenu->categorycode }}">{{ $ssupportmenu->categoryname }}</a></li>
                                                                            @empty
                                                                                <li><a href="{{ route('support.search').'?supportoem='.$ssupportmenu->oemcode }}">View all {{ strtolower($supportmenu->oemname) }}</a></li>
                                                                            @endforelse
                                                                        </ul>
                                                                    @endif                                                                
                                                                </li>
                                                            @empty

                                                            @endforelse

                                                        </ul>
                                                    @endif

                                                    <div class="row mt-3">
                                                        <div class="col-sm-12">
                                                            <a href="{{ route('support.search') }}" class="custom-underline d-i-b">
                                                                View all support
                                                                <i class="fas fa-angle-double-right"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="{{ route('user.cart') }}">
                                        <i class="fa fa-shopping-cart text-muted font-12" aria-hidden="true"></i>
                                        Cart
                                    </a>
                                </li>
                                {{-- <li>
                                    <a class="down-menu" href="javascript: void(0)">
                                        <i class="fas fa-headset text-muted font-12"></i>
                                        Support
                                    </a>
                                    <div class="dd-menu drop-down-menu">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <ul class="sub-menu">
                                                    <li><a href="{{ route('support.annual_maintenance_contract') }}">Annual maintenance contract</a></li>
                                                    <li><a href="{{ route('support.extended_warranty') }}">Extended warranty</a></li>
                                                    <li><a href="{{ route('support.batteries_replacement') }}">Batteries replacement</a></li>
                                                    <li><a href="{{ route('support.out_of_warranty_support') }}">Out of warranty support</a></li>
                                                    <li><a href="{{ route('support.online_complaints') }}">Online complaints</a></li>
                                                    <li><a href="{{ route('support.ups_on_rent') }}">UPS on rent</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a class="down-menu" href="javascript: void(0)">
                                        <i class="fas fa-users-cog text-muted font-12"></i>
                                        Services
                                    </a>
                                    <div class="dd-menu drop-down-menu">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <ul class="sub-menu">
                                                    <li><a href="{{ route('service.energy_audit') }}">Energy audit</a></li>
                                                    <li><a href="{{ route('service.consulting') }}">Consulting</a></li>
                                                    <li><a href="{{ route('service.electrical_design_and_builds') }}">Electrical design &amp; builds</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li> --}}
                                {{-- <li>
                                    <a href="{{ route('career') }}">
                                        <i class="fas fa-hand-holding-usd text-muted font-12"></i>
                                        Career
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('contact') }}">
                                        <i class="far fa-envelope-open  text-muted font-12 "></i>
                                        Contact
                                    </a>
                                </li> --}}
                                <li>                                
                                    @guest
                                        <a href="{{ route('login') }}">
                                            <i class="fas fa-sign-in-alt text-muted font-12"></i>    
                                            Login
                                        </a>
                                    @else
                                    <a class="down-menu" href="javascript: void(0)">
                                        <i class="fas fa-user font-12 text-muted"></i>
                                        {{ Auth::user()->firstname }}
                                    </a>
                                    <div class="dd-menu drop-down-menu">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <ul class="sub-menu">
                                                    <li><a href="{{ route('user.dashboard') }}">My Account</a></li>
                                                    <li><a href="{{ route('user.cart') }}">Cart ({{ userCart() ?? '0' }}) </a></li>
                                                    <li><a href="{{ route('user.checkout') }}">Checkout</a></li>
                                                    <li>
                                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-header').submit();" class="text-danger">Logout</a>
                                                            <form id="logout-form-header" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                @csrf
                                                            </form>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endguest
                                    
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //header -->