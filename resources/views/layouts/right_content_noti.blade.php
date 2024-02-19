        	<!-- Right Content Noti Header -->        	
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 5px;">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-cherryhan " href="#"><i class="fa fa-bars pt-1"></i> </a>
                        <span class="text-muted minimalize-styl-2 welcome-message">Online General Services System</span>
                        <!-- <img src="{{ asset('back/images/logo/cherryhan-logo.png') }}" alt="Cherry Han Logo" class="brand-image  elevation-3" style="opacity: .8; width:45%; margin-top: 5px;"> -->
                    </div>

                    <ul class="nav navbar-top-links navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-bell icon-20"></i>  <span class="label label-cherryhan">8</span>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <li>
                                    <a href="#" class="dropdown-item">
                                        <div>
                                            <i class="fa fa-envelope"></i> 16 messages
                                            <span class="float-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        <div>
                                            <i class="fa fa-file-archive"></i>3 New Orders
                                            <span class="float-right text-muted small">12 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        <div>
                                            <i class="fa fa-file-text"></i> 5 New Bookings
                                            <span class="float-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="#" class="dropdown-item">
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <img alt="image" class="img-responsive w-flag" src="<?php echo asset('misl/back/img/flag/'.session('locale').'.jpg') ?>" />
                            </a>
                            <ul class="dropdown-menu dropdown-flag">
                                <li>
                                    <a href="/language/mm" class="dropdown-item">
                                        <div>
                                            <img alt="image" class="img-responsive w-flag" src="<?php echo asset('misl/back/img/flag/mm.jpg') ?>" /> <?php echo translate('myanmar') ?>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a href="/language/en" class="dropdown-item">
                                        <div>
                                            <img alt="image" class="img-responsive w-flag" src="<?php echo asset('misl/back/img/flag/en.jpg') ?>" /> <?php echo translate('english') ?>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-user-circle icon-20"></i></i>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <li>
                                    <a href="{{route('userprofileIndex')}}" class="dropdown-item">
                                        <div>
                                            <i class="fa fa-user-circle"></i> <?php echo translate('profile') ?>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a href="{{route('changepasswordIndex')}}" class="dropdown-item">
                                        <div>
                                            <i class="fa fa-lock"></i> <?php echo translate('change_password') ?>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <a href="#" class="dropdown-item" role="button" onclick="
                                    event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        <div>
                                            <i class="fa fa-sign-out"></i> <?php echo translate('sign_out') ?>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- Right Content Noti Header End -->