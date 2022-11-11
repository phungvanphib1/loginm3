@extends('master')
@section('content')
    <section class="wrapper">
        <!-- //market-->
        
        <div class="market-updates">
            <div class="col-md-3 market-update-gd">
                <div class="market-update-block clr-block-2">
                    <div class="col-md-4 market-update-right">
                        <i class="fa fa-eye"> </i>
                    </div>
                    <div class="col-md-8 market-update-left">
                        <h4>Visitors</h4>
                        <h3>13,500</h3>
                        <p>Other hand, we denounce</p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="col-md-3 market-update-gd">
                <div class="market-update-block clr-block-1">
                    <div class="col-md-4 market-update-right">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="col-md-8 market-update-left">
                        <h4>Users</h4>
                        <h3>1,250</h3>
                        <p>Other hand, we denounce</p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="col-md-3 market-update-gd">
                <div class="market-update-block clr-block-3">
                    <div class="col-md-4 market-update-right">
                        <i class="fa fa-usd"></i>
                    </div>
                    <div class="col-md-8 market-update-left">
                        <h4>Amount</h4>
                        <h3>1,800</h3>
                        <p>Other hand, we denounce</p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="col-md-3 market-update-gd">
                <div class="market-update-block clr-block-4">
                    <div class="col-md-4 market-update-right">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </div>
                    <div class="col-md-8 market-update-left">
                        <h4>Orders</h4>
                        <h3>1,500</h3>
                        <p>Other hand, we denounce</p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <!-- //market-->
        <div class="row">
            <div class="panel-body">
                <div class="col-md-12 w3ls-graph">
                    <!--agileinfo-grap-->

                    {{-- <div class="agileinfo-grap">
                        <div class="agileits-box">
                            <header class="agileits-box-header clearfix">
                                <h3>Visitor Statistics</h3>
                                    <div class="toolbar">


                                    </div>
                            </header>
                            <div class="agileits-box-body clearfix">
                                <div id="hero-area"></div>
                            </div>
                        </div>
                    </div> --}}
                    <!--//agileinfo-grap-->

                </div>
            </div>
        </div>
        <div class="agil-info-calendar">

            <!-- calendar -->
            <div class="col-md-6 chart_agile_left">
                <div class="chart_agile_top" style=" height: 416px; ">
                    <div class="chart_agile_bottom" style="padding: 10px; ">
                        <div id="graph1"></div>
                        <script>
                            var nReloads = 0;

                            function data(offset) {
                                var ret = [];
                                for (var x = 0; x <= 360; x += 10) {
                                    var v = (offset + x) % 360;
                                    ret.push({
                                        x: x,
                                        y: Math.sin(Math.PI * v / 180).toFixed(4),
                                        z: Math.cos(Math.PI * v / 180).toFixed(4)
                                    });
                                }
                                return ret;
                            }
                            var graph = Morris.Line({
                                element: 'graph1',
                                data: data(0),
                                xkey: 'x',
                                ykeys: ['y', 'z'],
                                labels: ['sin()', 'cos()'],
                                parseTime: false,
                                ymin: -1.0,
                                ymax: 1.0,
                                hideHover: true
                            });

                            function update() {
                                nReloads++;
                                graph.setData(data(1 * nReloads));
                                $('#reloadStatus').text(nReloads + ' reloads');
                            }
                            setInterval(update, 100);
                        </script>

                    </div>
                </div>
            </div>
            <!-- //calendar -->

            <div class="col-md-6 w3agile-notifications">
                <div class="notifications">
                    <!--notification start-->

                    <header class="panel-heading">
                        Notification
                    </header>
                    <div class="notify-w3ls">
                        <div class="alert alert-info clearfix">
                            <span class="alert-icon"><i class="fa fa-envelope-o"></i></span>
                            <div class="notification-info">
                                <ul class="clearfix notification-meta">
                                    <li class="pull-left notification-sender"><span><a href="#">Jonathan
                                                Smith</a></span> send you a mail </li>
                                    <li class="pull-right notification-time">1 min ago</li>
                                </ul>
                                <p>
                                    Urgent meeting for next proposal
                                </p>
                            </div>
                        </div>
                        <div class="alert alert-danger">
                            <span class="alert-icon"><i class="fa fa-facebook"></i></span>
                            <div class="notification-info">
                                <ul class="clearfix notification-meta">
                                    <li class="pull-left notification-sender"><span><a href="#">Jonathan
                                                Smith</a></span> mentioned you in a post </li>
                                    <li class="pull-right notification-time">7 Hours Ago</li>
                                </ul>
                                <p>
                                    Very cool photo jack
                                </p>
                            </div>
                        </div>
                        <div class="alert alert-warning ">
                            <span class="alert-icon"><i class="fa fa-bell-o"></i></span>
                            <div class="notification-info">
                                <ul class="clearfix notification-meta">
                                    <li class="pull-left notification-sender">Domain Renew Deadline 7 days ahead</li>
                                    <li class="pull-right notification-time">5 Days Ago</li>
                                </ul>
                                <p>
                                    Next 5 July Thursday is the last day
                                </p>
                            </div>
                        </div>
                    </div>

                    <!--notification end-->
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <!-- tasks -->
        <div class="agile-last-grids">




        </div>
        <!-- //tasks -->
        <div class="agileits-w3layouts-stats">
            <div class="col-md-4 stats-info widget">
                <div class="stats-info-agileits">
                    <div class="stats-title">
                        <h4 class="title">Browser Stats</h4>
                    </div>
                    <div class="stats-body">
                        <ul class="list-unstyled">
                            <li>GoogleChrome <span class="pull-right">85%</span>
                                <div class="progress progress-striped active progress-right">
                                    <div class="bar green" style="width:85%;"></div>
                                </div>
                            </li>
                            <li>Firefox <span class="pull-right">35%</span>
                                <div class="progress progress-striped active progress-right">
                                    <div class="bar yellow" style="width:35%;"></div>
                                </div>
                            </li>
                            <li>Internet Explorer <span class="pull-right">78%</span>
                                <div class="progress progress-striped active progress-right">
                                    <div class="bar red" style="width:78%;"></div>
                                </div>
                            </li>
                            <li>Safari <span class="pull-right">50%</span>
                                <div class="progress progress-striped active progress-right">
                                    <div class="bar blue" style="width:50%;"></div>
                                </div>
                            </li>
                            <li>Opera <span class="pull-right">80%</span>
                                <div class="progress progress-striped active progress-right">
                                    <div class="bar light-blue" style="width:80%;"></div>
                                </div>
                            </li>
                            <li class="last">Others <span class="pull-right">60%</span>
                                <div class="progress progress-striped active progress-right">
                                    <div class="bar orange" style="width:60%;"></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8 stats-info stats-last widget-shadow">
                <div class="stats-last-agile">

                    <table class="table stats-table ">
                        <thead>
                            <tr>
                                <th>S.NO</th>
                                <th>PRODUCT</th>
                                <th>STATUS</th>
                                <th>PROGRESS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Lorem ipsum</td>
                                <td><span class="label label-success">In progress</span></td>
                                <td>
                                    <h5>85% <i class="fa fa-level-up"></i></h5>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Aliquam</td>
                                <td><span class="label label-warning">New</span></td>
                                <td>
                                    <h5>35% <i class="fa fa-level-up"></i></h5>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Lorem ipsum</td>
                                <td><span class="label label-danger">Overdue</span></td>
                                <td>
                                    <h5 class="down">40% <i class="fa fa-level-down"></i></h5>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>Aliquam</td>
                                <td><span class="label label-info">Out of stock</span></td>
                                <td>
                                    <h5>100% <i class="fa fa-level-up"></i></h5>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>Lorem ipsum</td>
                                <td><span class="label label-success">In progress</span></td>
                                <td>
                                    <h5 class="down">10% <i class="fa fa-level-down"></i></h5>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td>Aliquam</td>
                                <td><span class="label label-warning">New</span></td>
                                <td>
                                    <h5>38% <i class="fa fa-level-up"></i></h5>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </section>
    <video class="video-stream html5-main-video"  autoplay muted loop width="100%" height="500" style="background-color: rgba(0, 0, 0, 0.781)" controls controlslist="nodownload">
       <source  src="{{ asset('assets/video/demoNow.mp4') }}">
    </video>
    {{-- <video tabindex="-1" class="video-stream html5-main-video" webkit-playsinline="" playsinline="" controlslist="nodownload" src="{{ 'blog:https://www.youtube.com/watch?v=4hn3_NuBTuk' }}" width="100%" height="500"></video> --}}
@endsection
