        <!-- sidebar  -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <!-- Logo and Brand Name Here -->
                    <li class="nav-header">
                        <div class="dropdown logo-text">
                            <a  href="#">
                                <span class="font-bold">Cherry Han</span>
                            </a>
                        </div>
                        <div class="logo-element">
                            <!-- Small Logo Here -->
                            <img alt="image" class="rounded-circle brand-image" src="{{ asset('images/logo/ch-sm-logo.jpg')}}"/>
                        </div>
                    </li>
                    <!-- Logo and Brand Name End -->

                    <!-- Dashboard -->
                    <!-- @canany(['home.show']); -->
                        <li class="{{ (Request::is('home*') ) ? 'active':''}}">
                            <a href="{{ route('home') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
                        </li>
                    <!-- @endcanany -->
                    <!-- Dashboard End -->

                    <!-- All Orders -->
                    <!-- @canany(['all-order.show']); -->
                        <li class="{{ (Request::is('all-orders*') ) ? 'active':''}}">
                            <a href="{{ route('home') }}"><i class="fa fa-th-list"></i> <span class="nav-label">All Order</span></a>
                        </li>
                    <!-- @endcanany -->
                    <!-- All Orders End -->

                    <!-- Messages -->
                    <!-- @canany(['message.show']); -->
                    <li class="{{ (Request::is('users*') ) ? 'active':''}}">
                        <a href="#" aria-expanded="{{ (Request::is('users*')) ? 'true':'false'}}"><i class="fa fa-envelope"></i> <span class="nav-label">Messages</span><span class="label label-danger float-right">16</span></a>
                        <ul class="nav nav-second-level {{ (Request::is('users*') ) ? 'collapse in':'collapse'}}" aria-expanded="true">
                            <li class="{{ (Request::is('users*') ) ? 'active':''}}"><a href="{{route('userIndex')}}">Inbox</a></li>
                            <li><a href="mail_detail.html">Email view</a></li>
                            <li><a href="mail_compose.html">Compose email</a></li>
                            <li><a href="email_template.html">Email templates</a></li>
                        </ul>
                    </li>
                    <!-- @endcanany -->
                    <!-- Messages End -->

                    <!-- @canany(['category.show', 'sub_category.show', 'sub_sub_category.show']); -->
                    <!-- @endcanany -->

                    <!-- Delivery Service -->
                    <!--  @canany(['delivery.show']); -->
                    <li class="{{ (Request::is('delivery*') ) ? 'active':''}}">
                        <a href="#" aria-expanded="{{ (Request::is('delivery*')) ? 'true':'false'}}"><i class="fa fa-envelope"></i> <span class="nav-label">Delivery Service</span><span class="label label-warning float-right">16</span></a>
                        <ul class="nav nav-second-level {{ (Request::is('delivery*') ) ? 'collapse in':'collapse'}}" aria-expanded="{{ (Request::is('delivery*') ) ? 'true':'false'}}">
                            <li class="{{ (Request::is('delivery*') ) ? 'active':''}}"><a href="{{route('deliveryIndex')}}">Delivery Service</a></li>
                        </ul>
                    </li>
                    <!-- @endcanany -->
                    <!-- Delivery Service End -->

                    <!-- Bus Tickets Service -->
                    <!-- @canany(['bus.show', 'bus-booking.show', 'sub_sub_category.show']); -->
                    <li class="{{ (Request::is('bus-ticket*') || Request::is('bus-ticket-booking*') ) ? 'active':''}}">
                        <a href="#" aria-expanded="{{ (Request::is('bus-ticket*') || Request::is('bus-ticket-booking*')) ? 'true':'false'}}"><i class="fa fa-flask"></i> <span class="nav-label">Bus Tickets</span><span class="label label-warning float-right">16</span></a>
                        <ul class="nav nav-second-level {{ (Request::is('bus-ticket*') || Request::is('bus-ticket-booking*') ) ? 'collapse in':'collapse'}}" aria-expanded="{{ (Request::is('bus-ticket*') || Request::is('bus-ticket-booking*') ) ? 'true':'false'}}">
                            <li class="{{ (Request::is('bus-ticket*') ) ? 'active':''}}"><a href="{{route('busTicketIndex')}}">Bus Tickets</a></li>
                            <li class="{{ (Request::is('bus-ticket-booking*') ) ? 'active':''}}"><a href="{{route('busTicketBookingIndex')}}">Booking<span class="label label-info float-right">62</span></a></li>
                        </ul>
                    </li>
                    <!-- @endcanany -->
                    <!-- Bus Tickets Service End -->
                    
                    <!-- Travel & Tour Service -->
                    <!-- @canany(['tours.show', 'tours-booking']); -->
                    <li class="{{ (Request::is('tours*') || Request::is('tours-booking') ) ? 'active':''}}">
                        <a href="#" aria-expanded="{{ (Request::is('tours*') || Request::is('tours-booking*')) ? 'true':'false'}}"><i class="fa fa-files-o"></i> <span class="nav-label">Travel & Tour</span><span class="label label-warning float-right">16</span></a>
                        <ul class="nav nav-second-level {{ (Request::is('tours*') || Request::is('tours-booking') ) ? 'collapse in':'collapse'}}" aria-expanded="{{ (Request::is('tours*') || Request::is('tours-booking') ) ? 'true':'false'}}">
                            <li class="{{ (Request::is('tour*') ) ? 'active':''}}"><a href="{{route('tourIndex')}}">Travel & Tour</a></li>
                            <li><a href="{{route('tourBookingIndex')}}">Booking<span class="label label-info float-right">62</span></a></li>
                        </ul>
                    </li>
                    <!-- @endcanany -->
                    <!-- Travel & Tours End -->

                    <!-- Accommodation -->
                    <!-- @canany(['hotel.show', 'hotel-booking.show']); -->
                    <li class="{{ (Request::is('hotel*') || Request::is('hotel-booking*') ) ? 'active':''}}">
                        <a href="#" aria-expanded="{{ (Request::is('hotel*') || Request::is('hotel-booking*')) ? 'true':'false'}}"><i class="fa fa-files-o"></i> <span class="nav-label">Accommodation</span><span class="label label-warning float-right">16</span></a>
                        <ul class="nav nav-second-level {{ (Request::is('hotel*') || Request::is('hotel-booking') ) ? 'collapse in':'collapse'}}" aria-expanded="{{ (Request::is('hotel*') || Request::is('hotel-booking') ) ? 'true':'false'}}">
                            <li class="{{ (Request::is('hotel*') ) ? 'active':''}}"><a href="{{route('hotelIndex')}}">Accommodation</a></li>
                            <li class="{{ (Request::is('hotel-booking*') ) ? 'active':''}}"><a href="{{route('hotelBookingIndex')}}">Booking<span class="label label-info float-right">62</span></a></li>
                        </ul>
                    </li>
                    <!-- @endcanany -->

                    <!-- Cars Rental Service -->
                    <!-- @canany(['car.show', 'car-booking.show']); -->
                    <li class="{{ (Request::is('cars*') || Request::is('cars-booking')) ? 'active':''}}">
                        <a href="#" aria-expanded="{{ (Request::is('cars*') || Request::is('cars-booking*')) ? 'true':'false'}}"><i class="fa fa-flask"></i> <span class="nav-label">Cars Rental</span><span class="label label-warning float-right">16</span></a>
                        <ul class="nav nav-second-level {{ (Request::is('cars*') || Request::is('cars-booking')) ? 'collapse in':'collapse'}}" aria-expanded="{{ (Request::is('cars*') || Request::is('cars-booking')) ? 'true':'false'}}">
                            <li class="{{ (Request::is('cars*') ) ? 'active':''}}"><a href="{{route('carsIndex')}}">Cars Rental</a></li>
                            <li class="{{ (Request::is('cars-booking*') ) ? 'active':''}}"><a href="{{route('carsBookingIndex')}}">Booking<span class="label label-info float-right">62</span></a></li>
                        </ul>
                    </li>
                    <!-- @endcanany -->
                    <!-- Cars Rental Service End -->

                    <!-- Cargo Service -->
                    <!-- @canany(['cargo.show', 'cargo-booking.show']); -->
                    <li class="{{ (Request::is('cargo*') || Request::is('cargo-booking') ) ? 'active':''}}">
                        <a href="#" aria-expanded="{{ (Request::is('cargo*') || Request::is('cargo-booking*')) ? 'true':'false'}}"><i class="fa fa-table"></i> <span class="nav-label">Cargo Service</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level {{ (Request::is('cargo*') || Request::is('cargo-booking*')) ? 'collapse in':'collapse'}}" aria-expanded="{{ (Request::is('cargo*') || Request::is('cargo-booking*')) ? 'true':'false'}}">
                            <li class="{{ (Request::is('cargo*') ) ? 'active':''}}"><a href="{{route('cargoIndex')}}">Cargo Service</a></li>
                            <li><a href="{{route('cargoBookingIndex')}}">Booking</a><span class="label label-info float-right">10</span></li>
                        </ul>
                    </li>
                    <!-- @endcanany -->
                    <!-- Cargo Service End -->

                    <!-- Container Service -->
                    <!-- @canany(['container.show', 'container-booking.show']); -->
                    <li class="{{ (Request::is('container*') || Request::is('container-booking') ) ? 'active':''}}">
                        <a href="#" aria-expanded="{{ (Request::is('container*') || Request::is('container-booking*')) ? 'true':'false'}}"><i class="fa fa-table"></i> <span class="nav-label">Container Service</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level {{ (Request::is('container*') || Request::is('container-booking')) ? 'collapse in':'collapse'}}" aria-expanded="{{ (Request::is('container*') || Request::is('container-booking*')) ? 'true':'false'}}">
                            <li class="{{ (Request::is('container*') ) ? 'active':''}}"><a href="{{route('containerIndex')}}">Container Service</a></li>
                            <li class="{{(Request::is('container-booking*'))}}"><a href="{{route('containerBookingIndex')}}">Booking</a><span class="label label-info float-right">10</span></li>
                        </ul>
                    </li>
                    <!-- @endcanany -->
                    <!-- Container Service End -->

                    <!-- Customers & Agents -->
                    <!--  @canany(['customer.show', 'agent.show']); -->
                    <li class="{{ (Request::is('api-user*') ) ? 'active':''}}">
                        <a href="#" aria-expanded="{{ (Request::is('api-user*')) ? 'true':'false'}}"><i class="fa fa-users"></i> <span class="nav-label">Application Users</span></a>
                        <ul class="nav nav-second-level {{ (Request::is('api-users*') ) ? 'collapse in':'collapse'}}" aria-expanded="{{ (Request::is('api-users*') ) ? 'true':'false'}}" >
                            <li class="{{ (Request::is('api-users*') ) ? 'active':''}}"><a href="{{route('api-userIndex')}}">Customers</a></li>
                            <li class="{{ (Request::is('api-users*') ) ? 'active':''}}"><a href="{{route('api-userIndex')}}">Agents</a></li>
                        </ul>
                    </li>
                    <!-- @endcanany -->
                    <!-- Customers & Agents End -->

                    <!-- Owners & Driver -->
                    <!--  @canany(['owner.show', 'driver.show']); -->
                    <li class="{{ (Request::is('owner*') || Request::is('driver*')) ? 'active':''}}">
                        <a href="#" aria-expanded="{{ (Request::is('owner*') || Request::is('driver*')) ? 'true':'false'}}"><i class="fa fa-envelope"></i> <span class="nav-label">Owners & Drivers</span></a>
                        <ul class="nav nav-second-level {{ (Request::is('owner*') || Request::is('driver*')) ? 'collapse in':'collapse'}}" aria-expanded="{{ (Request::is('owner*') || Request::is('driver*'))?'true':'false'}}">
                            <li class="{{(Request::is('owner*'))? 'active': ''}}">
                                <a href="#">Owners List</a>
                            </li>
                            <li class="{{(Request::is('driver*'))? 'active': ''}}">
                                <a href="#">Drivers List</a>
                            </li>
                        </ul>
                    </li>
                    <!-- @endcanany -->
                    <!-- Owners & Driver End -->

                    <!-- Business Setting -->
                    <!--  @canany(['category.show', 'sub-category.show', 'child-categoy.show']); -->
                    <li class="{{ (Request::is('category*') || Request::is('sub-category*') || Request::is('child-category')) ? 'active':''}}">
                        <a href="#" aria-expanded="{{ (Request::is('category*') || Request::is('sub-category*') || Request::is('child-category') ) ? 'true':'false'}}"><i class="fa fa-gears"></i> <span class="nav-label">Business Setting</span></a>
                        <ul class="nav nav-second-level {{ (Request::is('category*') || Request::is('sub-category*') || Request::is('child-category')) ? 'collapse in':'collapse'}}" aria-expanded="{{ (Request::is('category*') || Request::is('sub-category*') || Request::is('child-category')) ? 'true':'false'}}">
                            <li class="{{ (Request::is('category*')) ? 'active':''}}">
                                <a href="{{route('categoryIndex')}}">Category</a>
                            </li>
                            <li class="{{ (Request::is('sub-category*')) ? 'active':''}}">
                                <a href="{{route('sub_categoryIndex')}}">Sub Category</a>
                            </li>
                            <li class="{{ (Request::is('child-category*')) ? 'active':''}}">
                                <a href="{{route('sub_sub_categoryIndex')}}">Child Category</a>
                            </li>
                        </ul>
                    </li>
                    <!-- @endcanany -->
                    <!-- Owners & Driver End -->
                    <!-- Business Setting End -->

                    <!-- Setting -->
                    <!--  @canany(['roles.show', 'permissions.show']); -->
                    <li class="{{ (Request::is('roles*') || Request::is('permissions*')) ? 'active':''}}" >
                        <a href="#" aria-expanded="{{ (Request::is('roles*') || Request::is('permissions*')) ? 'true':'false'}}"><i class="fa fa-gears"></i> <span class="nav-label">Setting</span></a>
                        <ul class="nav nav-second-level {{ (Request::is('roles*') || Request::is('permissions*')) ? 'collapse in':'collapse'}}" aria-expanded="{{ (Request::is('roles*') || Request::is('permissions*')) ? 'true':'false'}}">
                            <li class="{{(Request::is('roles*'))? 'active': ''}}">
                                <a href="{{route('roleIndex')}}">Roles</a>
                            </li>
                            <li class="{{(Request::is('permissions*'))? 'active': ''}}">
                                <a href="{{route('permissionIndex')}}">Permission</a>
                            </li>
                        </ul>
                    </li>
                    <!-- @endcanany -->
                    <!-- Owners & Driver End -->
                </ul>

            </div>
        </nav>
        <!-- sidebar End -->