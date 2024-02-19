        <!-- sidebar  -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu nav-metismenu" id="side-menu">
                    <!-- Logo and Brand Name Here -->
                    <li class="nav-header">
                        <div class="dropdown logo-text bg-white">
                            <a  href="javascript:void(0)">
                                <!-- <span class="font-bold">Cherry Han</span> -->
                                <?php 
                                $companysetting=DB::table('general_settings')->where('id', 5)->first();
                                 $logo=$companysetting->value;

                              ?>
                                {{--<span><img alt="image" class="brand-image" src="{{ asset('images/logo/cherryhan-logo.png')}}"/></span>--}}
                                 <span><img alt="image" class="brand-image" src="{{ asset('feature/company/'.$logo)}}"/></span>
                            </a>
                        </div>
                        <div class="logo-element bg-white">
                            <!-- Small Logo Here -->
                            <a  href="javascript:void(0)">
                                <img alt="image" class="rounded-circle brand-image" src="{{ asset('images/logo/ch-sm-logo.jpg')}}"/>
                            </a>
                        </div>
                    </li>
                    <!-- Logo and Brand Name End -->

                    <!-- Dashboard -->
                    <!--  -->
                        <li>
                            <a href="{{ route('home') }}"><i class="fa fa-th-large"></i> <span class="nav-label"><?php echo translate('dashboard') ?></span></a>
                        </li>
                    <!--  -->
                    <!-- Dashboard End -->

                    <!-- All Orders -->
                     @canany(['all-order.show']) 
                        <li>
                            <a href="{{ route('allorderIndex') }}"><i class="fa fa-th-list"></i> <span class="nav-label"><?php echo translate('all_order') ?></span></a>
                        </li>
                     @endcanany 
                    <!-- All Orders End -->

                    <!-- Messages -->
                     @canany(['message.show'])
                    <li>
                        <a href="javascript:void(0)"><i class="fa fa-comment"></i> <span class="nav-label"><?php echo translate('messages') ?></span><span class="label label-cherryhan float-right">16</span></a>
                        <ul class="nav nav-second-level collapse" >
                            <li><a href="{{route('messageAdd')}}"><?php echo translate('compose_message') ?></a></li>
                            <li class="{{ (Request::is('inbox*') ) ? 'active':''}}"><a href="{{route('inboxmessageIndex')}}"><?php echo translate('inbox_message') ?> <span class="label label-cherryhan float-right">16</span></a></li>
                            <li><a href="{{route('messageIndex')}}"><?php echo translate('sent_message') ?></a></li>
                        </ul>
                    </li>
                     @endcanany 
                    <!-- Messages End -->

                    <!-- @canany(['category.show', 'sub_category.show', 'sub_sub_category.show']); -->
                    <!-- @endcanany -->

                    <!-- Delivery Service -->
                      @canany(['delivery-charges.show','delivery-service.show','delivery-message.show'])
                    <li>
                        <a href="javascript:void(0)"><i class="fa fa-tasks"></i> <span class="nav-label"><?php echo translate('delivery_service') ?></span><span class="label label-cherryhan float-right">15</span></a>
                        <ul class="nav nav-second-level collapse" >
                            @can('delivery-message.show')
                            <li class="{{ (Request::is('delivery-message*') ) ? 'active':''}}"><a href="{{route('deliverymessage')}}"><?php echo translate('delivery_message') ?></a></li>
                            @endcan
                            @can('delivery-service.show')
                            <li class="{{ (Request::is('delivery-booking*') ) ? 'active':''}}"><a href="{{route('deliveryservice')}}"><?php echo translate('delivery_service') ?></a></li>
                            @endcan
                            @can('delivery-charges.show')
                            <li class="{{ (Request::is('deliverycharges*') ) ? 'active':''}}"><a href="{{route('deliverychargesIndex')}}"><?php echo translate('delivery_charges') ?></a></li>
                            @endcan
                        </ul>
                    </li>
                     @endcanany 
                    <!-- Delivery Service End -->

                    <!-- Bus Tickets Service -->
                     @canany(['bus-ticket.show', 'bus-ticket-booking.show', 'bus-gate.show','bus-destination.show'])
                    <li>
                        <a href="javascript:void(0)"><i class="fa fa-bus"></i> <span class="nav-label"><?php echo translate('bus_tickets') ?></span><span class="label label-cherryhan float-right">18</span></a>
                        <ul class="nav nav-second-level collapse" >
                            @can('bus-gate.show')
                            <li class="{{ (Request::is('bus-gate*')) ? 'active':''}}">
                                <a href="{{route('busgateIndex')}}"><?php echo translate('bus_gate') ?></a>
                            </li>
                            @endcan
                            @can('bus-destination.show')
                            <li class="{{ (Request::is('bus-destination*')) ? 'active':''}}">
                                <a href="{{route('busdestinationIndex')}}"><?php echo translate('bus_destination') ?></a>
                            </li>
                            @endcan
                            @can('bus-ticket.show')
                            <li class="{{ (Request::is('bus-ticket*') ) ? 'active':''}}"><a href="{{route('busticketIndex')}}"><?php echo translate('bus_tickets') ?></a></li>
                            @endcan
                            @can('bus-ticket-booking.show')
                            <li class="{{ (Request::is('bus-ticket-booking*') ) ? 'active':''}}"><a href="{{route('busticketbookingIndex')}}"><?php echo translate('bus_tickets_booking') ?><span class="label label-cherryhan float-right">62</span></a></li>
                            @endcan
                        </ul>
                    </li>
                     @endcanany 
                    <!-- Bus Tickets Service End -->
                    
                                        <!-- Air Tickets Service -->
                    @canany(['airline.show', 'airline-price.show', 'airline-schedule.show'])
                    <li>
                        <a href="javascript:void(0)"><i class="fa fa-plane"></i> <span class="nav-label"><?php echo translate('air_tickets') ?></span><span class="label label-cherryhan float-right">18</span></a>
                        <ul class="nav nav-second-level collapse" >

                            @can('airline.show')
                            <li class="{{ (Request::is('airlines*') ) ? 'active':''}}"><a href="{{route('airlinesIndex')}}"><?php echo translate('airlines') ?></a></li>
                            @endcan

                            @can('airline-price.show')
                            <!--<li class="{{ (Request::is('airline-price-list*') ) ? 'active':''}}"><a href="{{route('airlinepricelistIndex')}}"><?php echo translate('pricing_list') ?></a></li>-->
                            @endcan

                            @can('air-port.show')
                            <!--<li class="{{ (Request::is('air-port-list*') ) ? 'active':''}}"><a href="{{route('airportlistIndex')}}"><?php echo translate('air_port') ?></a></li>-->
                            @endcan

                            @can('airline-schedule.show')
                            <!--<li class="{{ (Request::is('airline-time-schedule*') ) ? 'active':''}}"><a href="{{route('airlinetimescheduleIndex')}}"><?php echo translate('time_schedule') ?></a></li>-->
                            @endcan

                            @can('airline-booking.show')
                            <!--<li class="{{ (Request::is('bus-ticket-booking*') ) ? 'active':''}}"><a href="{{route('busticketbookingIndex')}}"><?php echo translate('bus_tickets_booking') ?><span class="label label-cherryhan float-right">62</span></a></li>-->
                            @endcan
                        </ul>
                    </li>
                     @endcanany
                    <!-- Air Tickets Service End -->

                    <!-- Travel & Tour Service -->
                     @canany(['tour.show', 'tour-booking.show', 'tour-category.show', 'tour-destination.show','tour-destination-place.show'])
                    <li>
                        <a href="javascript:void(0)"><i class="fa fa-suitcase"></i> <span class="nav-label"><?php echo translate('travel_&_tours'); ?></span><span class="label label-cherryhan float-right">15</span></a>
                        <ul class="nav nav-second-level collapse">
                            @can('tour-category.show')
                            <li><a href="{{route('tourcategoryIndex')}}"><?php echo translate('tour_category') ?></a></li>
                            @endcan
                            @can('tour-destination.show')
                            <li><a href="{{route('tourdestinationIndex')}}"><?php echo translate('tour_destination') ?></a></li>
                            @endcan
                            @can('tour-destination-place.show')
                            <li><a href="{{route('tourdestinationplaceIndex')}}"><?php echo translate('tour_destination_place') ?></a></li>
                            @endcan
                            @can('tour.show')
                            <li><a href="{{route('tourIndex')}}"><?php echo translate('travel_&_tours'); ?></a></li>
                            @endcan
                            @can('tour-booking.show')
                            <li><a href="{{route('tourbookingIndex')}}"><?php echo translate('travel_&_tours_booking') ?><span class="label label-ch
                             float-right">62</span></a></li>
                             @endcan
                        </ul>
                    </li>
                     @endcanany 
                    <!-- Travel & Tours End -->

                    <!-- Accommodation -->
                     @canany(['hotel.show', 'hotel-booking.show'])
                    <li>
                        <a href="javascript:void(0)"><i class="fa fa-hotel"></i> <span class="nav-label"><?php echo translate('accommodation') ?></span><span class="label label-cherryhan float-right">16</span></a>
                        <ul class="nav nav-second-level collapse">
                            @can('hotel.show')
                            <li class="{{ (Request::is('hotel*') ) ? 'active':''}}">
                                <a href="{{route('hotelIndex')}}"><?php echo translate('accommodation') ?></a>
                            </li>
                            @endcan
                            @can('hotel-booking.show')
                            <li class="{{ (Request::is('hotel-booking*') ) ? 'active':''}}">
                                <a href="{{route('hotelbookingIndex')}}"><?php echo translate('accommodation_booking') ?><span class="label label-ch
                             float-right">16</span></a>
                             </li>
                             @endcan
                        </ul>
                    </li>
                     @endcanany 

                    <!-- Cars Rental Service -->
                     @canany(['car.show', 'car-booking.show'])
                    <li >
                        <a href="javascript:void(0)"><i class="fa fa-car"></i> <span class="nav-label"><?php echo translate('cars_rental') ?></span><span class="label label-cherryhan float-right">16</span></a>
                        <ul class="nav nav-second-level collapse">
                            @can('car.show')
                            <li class="{{ (Request::is('cars*') ) ? 'active':''}}">
                                <a href="{{route('carsIndex')}}"><?php echo translate('cars_rental') ?></a>
                            </li>
                            @endcan
                            @can('car-booking.show')
                            <li class="{{ (Request::is('cars-booking*') ) ? 'active':''}}">
                                <a href="{{route('carsbookingIndex')}}"><?php echo translate('cars_rental_booking') ?><span class="label label-ch
                             float-right">62</span></a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                     @endcanany 
                    <!-- Cars Rental Service End -->

                    <!-- Cargo Service -->
                     @canany(['cargo.show', 'cargo-booking.show'])
                    <li>
                        <a href="javascript:void(0)"><i class="fa fa-truck"></i> <span class="nav-label"><?php echo translate('cargo_service') ?></span><span class="label label-cherryhan float-right">16</span></a>
                        <ul class="nav nav-second-level collapse">
                            @can('cargo.show')
                            <li class="{{ (Request::is('cargo*') ) ? 'active':''}}">
                                <a href="{{route('cargoIndex')}}"><?php echo translate('cargo_service') ?></a>
                            </li>
                            @endcan
                            @can('cargo-booking.show')
                            <li>
                                <a href="{{route('cargobookingIndex')}}"><?php echo translate('cargo_service_booking') ?> <span class="label label-ch
                             float-right">10</span></a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                     @endcanany 
                    <!-- Cargo Service End -->

                    <!-- Container Service -->
                     @canany(['container.show', 'container-booking.show','container-destination.show']) 
                    <li>
                        <a href="javascript:void(0)"><i class="fa fa-truck"></i> <span class="nav-label"><?php echo translate('container_service') ?></span><span class="label label-cherryhan float-right">10</span></a>
                        <ul class="nav nav-second-level collapse">
                            @can('container-destination.show')
                            <li class="{{ (Request::is('container-destination*') ) ? 'active':''}}">
                                <a href="{{route('containerdestinationIndex')}}"><?php echo translate('container_destination') ?></a>
                            </li>
                            @endcan
                            @can('container.show')
                            <li class="{{ (Request::is('container*') ) ? 'active':''}}">
                                <a href="{{route('containerIndex')}}"><?php echo translate('container_service') ?></a>
                            </li>
                            @endcan
                            @can('container-booking.show')
                            <li class="{{(Request::is('container-booking*'))}}">
                                <a href="{{route('containerbookingIndex')}}"><?php echo translate('container_service_booking') ?><span class="label label-ch
                             float-right">10</span></a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                     @endcanany 
                    <!-- Container Service End -->

                    <!-- Customers & Agents -->
                      @canany(['customer.show', 'agent.show']) 
                    <li>
                        <a href="javascript:void(0)"><i class="fa fa-user-circle"></i> <span class="nav-label"><?php echo translate('application_users'); ?></a>
                        <ul class="nav nav-second-level collapse">
                            @can('customer.show')
                            <li class="{{ (Request::is('api-users*') ) ? 'active':''}}">
                                <a href="{{route('customerIndex')}}"><?php echo translate('customers') ?></a>
                            </li>
                            @endcan
                            @can('agent.show')
                            <li class="{{ (Request::is('api-users*') ) ? 'active':''}}">
                                <a href="{{route('agentIndex')}}"><?php echo translate('agents') ?></a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                     @endcanany 
                    <!-- Customers & Agents End -->

                    <!-- Owners & Driver -->
                      @canany(['owner.show', 'driver.show']) 
                    <li>
                        <a href="javascript:void(0)"><i class="fa fa-users"></i> <span class="nav-label"><?php echo translate('owners_&_drivers'); ?></span></a>
                        <ul class="nav nav-second-level collapse">
                            @can('car-owner.show')
                            <li class="{{(Request::is('car-owner*'))? 'active': ''}}">
                                <a href="{{route('carownerIndex')}}"><?php echo translate('owners') ?></a>
                            </li>
                            @endcan
                            @can('car-driver.show')
                            <li class="{{(Request::is('car-driver*'))? 'active': ''}}">
                                <a href="{{route('cardriverIndex')}}"><?php echo translate('drivers'); ?></a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                     @endcanany 
                    <!-- Owners & Driver End -->

                    <!-- Owners & Driver -->
                      @canany(['user.show'])
                    <li>
                        <a href="javascript:void(0)"><i class="fa fa-users"></i> <span class="nav-label"><?php echo translate('admin_users'); ?></span></a>
                        <ul class="nav nav-second-level collapse">
                            @can('user.show')
                            <li class="{{(Request::is('user*'))? 'active': ''}}">
                                <a href="{{route('userIndex')}}"><?php echo translate('employee') ?></a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                     @endcanany 
                    <!-- Owners & Driver End -->

                    <!-- Business Setting -->
                      @canany(['banner.show', 'car-type.show', 'car-brand.show', 'car-model.show']) 
                    <li>
                        <a href="javascript:void(0)"><i class="fa fa-bar-chart"></i> <span class="nav-label"><?php echo translate('business_setting') ?></a>
                        <ul class="nav nav-second-level collapse">
                            @can('banner.show')
                            <li class="{{ (Request::is('banner*')) ? 'active':''}}">
                                <a href="{{ route('bannerIndex') }}"><?php echo translate('banner') ?></a>
                            </li>
                            @endcan
                            @can('car-type.show')
                            <li class="{{ (Request::is('cartype*')) ? 'active':''}}">
                                <a href="{{route('cartypeIndex')}}"><?php echo translate('car_type') ?></a>
                            </li>
                            @endcan
                            @can('car-brand.show')
                            <li class="{{ (Request::is('carbarnd*')) ? 'active':''}}">
                                <a href="{{route('carbrandIndex')}}"><?php echo translate('car_brand') ?></a>
                            </li>
                            @endcan
                            @can('car-model.show')
                            <li class="{{ (Request::is('carmodel*')) ? 'active':''}}">
                                <a href="{{route('carmodelIndex')}}"><?php echo translate('car_model') ?></a>
                            </li>
                            @endcan
  
                        </ul>
                    </li>
                     @endcanany 
                    <!-- Business Setting End -->

                    <!-- Setting -->
                      @canany(['roles.show', 'permission.show', 'country.show', 'state.show', 'city.show', 'term.show', 'language.show'])
                    <li>
                        <a  href="javascript:void(0)"><i class="fa fa-cogs"></i> <span class="nav-label"><?php echo translate('setting') ?></a>
                        <ul class="nav nav-second-level collapse">
                            @can('roles.show')
                            <li class="{{(Request::is('roles*'))? 'active': ''}}">
                                <a href="{{route('roleIndex')}}"><?php echo translate('roles') ?></a>
                            </li>
                            @endcan
                            @can('permission.show')
                            <li class="{{(Request::is('permissions*'))? 'active': ''}}">
                                <a href="{{route('permissionIndex')}}"><?php echo translate('permissions') ?></a>
                            </li>
                            @endcan
                            @can('country.show')
                            <li class="{{(Request::is('country*'))? 'active': ''}}">
                                <a href="{{route('countryIndex')}}"><?php echo translate('countries') ?></a>
                            </li>
                            @endcan
                            @can('state.show')
                            <li class="{{(Request::is('state*'))? 'active': ''}}">
                                <a href="{{route('stateIndex')}}"><?php echo translate('states') ?></a>
                            </li>
                            @endcan
                            @can('city.show')
                            <li class="{{(Request::is('city*'))? 'active': ''}}">
                                <a href="{{route('cityIndex')}}"><?php echo translate('cities') ?></a>
                            </li>
                            @endcan
                            @can('term.show')
                            <li class="{{(Request::is('term*'))? 'active': ''}}">
                                <a href="{{route('termIndex')}}"><?php echo translate('term_&_condition') ?></a>
                            </li>
                            @endcan
                            @can('language.show')
                            <li class="{{(Request::is('language*'))? 'active': ''}}">
                                <a href="{{route('languageIndex')}}"><?php echo translate('language') ?></a>
                            </li>
                            @endcan
                            
                        </ul>
                    </li>
                     @endcanany 
                    <!-- Setting End -->
                    @canany(['general-setting.show', 'point-setting.show']) 

                    <li>
                        <a  href="javascript:void(0)"><i class="fa fa-cogs"></i> <span class="nav-label"><?php echo translate('Reward') ?></a>
                        <ul class="nav nav-second-level collapse">
                            @can('general-setting.show')
                            <li class="{{(Request::is('generalsetting*'))? 'active': ''}}">
                                <a href="{{route('generalsettingIndex')}}"><?php echo translate('general_setting') ?></a>
                            </li>
                            @endcan
                            @can('point-setting.show')
                            <li class="{{(Request::is('pointsetting*'))? 'active': ''}}">
                                <a href="{{route('pointsettingIndex')}}"><?php echo translate('reward_list') ?></a>
                            </li>
                           @endcan
                        </ul>
                    </li>
                    @endcanany 
                </ul>

            </div>
        </nav>
        <!-- sidebar End -->
