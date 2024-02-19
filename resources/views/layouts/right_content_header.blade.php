        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>
                    <?php
                        $services = ['cars', 'cargo', 'container', 'deliveries', 'hotel', 'tour', 'bus-ticket'];
                        $segment1 = Request::segment(1);
                        $segment2 = Request::segment(2);
                        $segment3 = Request::segment(3);

                        $seg1 = explode("-",$segment1);
                        $seg1_route = '';
                        for($i=0; $i < count($seg1); $i++){
                            $seg1_route .= ($i == 0)?$seg1[$i]:strtolower($seg1[$i]); 
                        }
                        $serviceText = (in_array($segment1, $services))? ' Service': '';
                       echo ($segment1 == 'home')?"Dashboard": (($segment1 =='allorder')? ucwords($segment1):ucwords($segment1).$serviceText); ?>

                </h2>
                <ol class="breadcrumb">
                    <?php if($segment1=='home'){ ?>
                        <li class="breadcrumb-item">
                            <strong>Home</strong>
                        </li>
                    <?php }else{ ?>

                        <li class="breadcrumb-item">
                            <a href="{{route('home')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route($seg1_route.'Index')}}">{{ucwords($segment1)}}</a>
                        </li>
                       <!--  <li class="breadcrumb-item">
                            <a href="{{route(str_replace('-','', Request::segment(1)).'Index')}}">{{ucwords($segment2)}}</a>
                        </li> -->
                        <li class="breadcrumb-item active">
                            <strong>{{($segment2=='')? "Lists": ucwords($segment2)}}</strong>
                        </li>
                    <?php } ?>
                </ol>
            </div>
        </div>
