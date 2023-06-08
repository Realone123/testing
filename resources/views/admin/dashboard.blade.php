@extends('layouts.admin.layout')
@section('title')
<title>{{ $websiteLang->where('lang_key','dashboard')->first()->custom_text }}</title>
@endsection
@section('admin-content')
 

    <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">My Dashboard</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active">My Dashboard</li>
                            </ol>
                          </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Info box -->
                <!-- ============================================================== -->

                <div class="row m-t-20">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white">{{ $activeInvestments->count()}}</h1>
                                <h6 class="text-white">Active Investments</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card">
                            <div class="box bg-primary text-center">
                                <h1 class="font-light text-white">${{ $activeInvestments->sum('investment_amount')}}</h1>
                                <h6 class="text-white">Total Active Investments</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white">${{ $pendingInvestments->sum('investment_amount')}} </h1>
                                <h6 class="text-white">Pending Investments</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card">
                            <div class="box bg-dark text-center">
                                <h1 class="font-light text-white">$0</h1>
                                <h6 class="text-white">Total Distributions</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
              
                <!-- .row -->
                <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                        <h5 class="card-title text-uppercase">Leads</h5>
                                    <div class="d-flex  m-b-20 ">
                                            <div class="table-responsive m-t-20">
                                                    <table id="" class="myTable display nowrap table table-hover table-striped border"
                                                        cellspacing="0" >
                                                        <thead>
                                                            <tr>
                                                                    <th>Name</th>
                                                                    <th>Status</th>
                                                                    <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                      
                                                        <tbody>
                                                             @foreach ($leads as $index => $item)
                                                               <tr>
                                                                      <td>{{ $item->name }}</td>
                                                                       <td><span> 
                                                                            <label class="switch">
                                                                           <input type="checkbox" name="verification" id="verification-{{$item->id}}" @if($item->status ==1) checked @endif onclick="userStatus({{$item->id}});">
                                                                                               <span class="slider round-1"></span>
                                                                         </label> </span> </td>
                                                                        <td><a href="leadsview/{{$item->id}}"><i class="fas fa-eye"></i> </a>
                                                                        <a href="{{ route('admin.email.create') }}"><i class="far fa-envelope"></i> </a>
                                                                        </td>
                                                                    </tr>

                                                               @endforeach     
                                                       
                                                        </tbody>
                                                    </table>
                                                </div>
                                          
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                               <div class="card ">
                                        <div class="card-body">
                                            <h5 class="card-title text-uppercase">Top Investors</h5>
                                            <div class="d-flex m-b-20 ">
                                                    <div class="table-responsive m-t-20">
                                                            <table id="" class=" myTable display nowrap table table-hover table-striped border"
                                                                cellspacing="0" width="100%">
                                                                <thead>
                                                                    <tr>
                                                                            <th>Name</th>
                                                                            <th>Invested Value</th>
                                                                            <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                              
                                                                <tbody>
                                                                      @foreach ($topinvestments as $index => $item)
                                                                        <tr>
                                                                                <td>{{ $item->name }}</td>  
                                                                                <td>{{ $item->investment_amount }} </td>
                                                                                <td><a href="{{ route('admin.investorsview',$item->user_id) }}"><i class="fas fa-eye"></i> </a>
                                                                                 <a href="{{ route('admin.email.create') }}"><i class="far fa-envelope"></i> </a></td>
                                                                            </tr>
                                                                       @endforeach       
                                                               
                                                                </tbody>
                                                            </table>
                                                        </div>
                                               </div>
                                        </div>
                                    </div>
                               
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row m-t-20">
                        <!-- Column -->
                        <div class="col-md-6 col-lg-4 col-xlg-4">
                            <div class="card">
                                <div class="box bg-info text-center">
                                    <h1 class="font-light text-white">{{ $allinvestments}}</h1>
                                    <h6 class="text-white">Total Investors</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-6 col-lg-4 col-xlg-4">
                            <div class="card">
                                <div class="box bg-primary text-center">
                                    <h1 class="font-light text-white">{{ count($properties)}}</h1>
                                    <h6 class="text-white">Total Properties</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-6 col-lg-4 col-xlg-4">
                            <div class="card">
                                <div class="box bg-dark text-center">
                                    <h1 class="font-light text-white">{{ count($totalinvestments)}}</h1>
                                    <h6 class="text-white">Total Investments</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                      
                        <!-- Column -->
                    </div>
            
                    <!--end -->

                    <div class="row m-t-20">
                        <!-- Column -->
                        <div class="col-md-6 col-lg-4 col-xlg-4">
                            <div class="card">
                                <div class="box bg-success  text-center">
                                    <h1 class="font-light text-white">{{ count($openproperties)}}</h1>
                                    <h6 class="text-white">Open Offerings</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-6 col-lg-4 col-xlg-4">
                            <div class="card">
                                <div class="box bg-info  text-center" style="background-color:#dd1f5d !important">
                                    <h1 class="font-light text-white">{{ count($fullproperties)}}</h1>
                                    <h6 class="text-white">Fully Funded Offerings</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-6 col-lg-4 col-xlg-4">
                            <div class="card">
                                <div class="box bg-primary text-center" style="background-color:#acbccd ! important">
                                    <h1 class="font-light text-white">{{ count($closedproperties)}}</h1>
                                    <h6 class="text-white">Closed Offerings</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                      
                        <!-- Column -->
                    </div>
            
                    <!--end -->
                    
           
                    <!-- /.row -->
                <!-- ============================================================== -->
                <!-- Over Visitor, Our income , slaes different and  sales prediction -->
                <!-- ============================================================== -->


                <!-- .row -->
                <div class="row">
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-body">
                                    <!--<h4 class="card-title">My Investments</h4>-->
                                    <!--<ul class="list-inline text-end">-->
                                    <!--    <li>-->
                                    <!--        <h5><i class="fa fa-circle m-r-5 text-inverse"></i>Construction</h5>-->
                                    <!--    </li>-->
                                    <!--    <li>-->
                                    <!--        <h5><i class="fa fa-circle m-r-5 text-info"></i>Cashflow</h5>-->
                                    <!--    </li>-->
                                    <!--    <li>-->
                                    <!--        <h5><i class="fa fa-circle m-r-5 text-success"></i>Land</h5>-->
                                    <!--    </li>-->
                                    <!--    <li>-->
                                    <!--            <h5><i class="fa fa-circle m-r-5 text-primary"></i> Muliti Family</h5>-->
                                    <!--        </li>-->
                                    <!--</ul>-->
                                
                                    <!--<script src="{{asset('dist/js/list-group/line-group.js')}}"></script>-->
                                    <!--<div id='myDiv'></div>           -->
                                   
    <script src="{{asset('dist/js/bar-group/Chart.min.js')}}"></script>
    
      <main class="container">
                    <div class="heading">
                            <h5 class="card-title "><span class="text-uppercase">My Investments</span> (Amount in <span style="color:#f17f29;font-weight:200px;">Dollars $)</span></h5>
                                         
                       
                        </div>
                <div>
                    <canvas id="barChart" style="margin :10px 10px;"></canvas>
                    </div>
                </main>
              <!--<ul class="list-inline " style="margin:0px;text-align:center">-->
              <!--          <li>-->
              <!--              <h6 style="margin:0px;padding:4px;"> Amount in <strong style="color:#f17f29"> Dollars($)</strong></h6>-->
              <!--          </li>-->
              <!--       </ul>-->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card ">
                                    <div class="card-body">
                                        <h5 class="card-title "><span class="text-uppercase">Sectors</span> (Amount in <span style="color:#f17f29;font-weight:200px;">Dollars $)</span></h5>
                                         <div class="row">
                                                <div id="main-content">
                                                       
                                                        <pie-chart id="pieChart" style="display:block;height:100%;width:100%;position:relative;">
                                                            @if(count($property_type_count)>0)
                                                              @foreach($property_type_count as $item)
                                                            <pchart-element name="{{$item->type}}" value="@if(($item->investment_amount)>0){{ $item->investment_amount}} @else "0" @endif" colour="{{$item->color}}">
                                                                
                                                           
                                                            @endforeach
                                                            
                                                            @else
                                                             <pchart-element name="Construction" value="0" colour="#4f5467">
                                                            <pchart-element name="Cashflow" value="0" colour="#7460ee">
                                                            <pchart-element name="Land" value="0" colour="#009efb">
                                                            <pchart-element name="Muliti Family" value="0" colour="#26c6da"> 
                                                           @endif
                                                        </pie-chart>
                                                    </div>
                                              
                                            </div>
                                            
                                         <div class="row  padd-0">
                                            <div class="col-12 m-t-10 padd0">
                                                <h5 class="card-title text-uppercase"></h5>
                                               </div>
                                          </div>
                                           @if(count($property_type_count)>0)
                                         @foreach($property_type_count as $item)
                                          <div class="row m-t-5 br-bottom">
                                                <div class="col-8 padd0">
                                                    <h6 class="">{{$item->type}}</h6>
                                                   </div>
                                                   <div class="col-4 padd0">
                                                     <h6 class="align-view">${{$item->investment_amount}}</h6>
                                                       </div>

                                              </div>
                                              @endforeach
                                               @else
                                                   <div class="row  padd-0">
                                            <div class="col-12 m-t-10 padd0">
                                                <h5 class="card-title text-uppercase"></h5>
                                               </div>
                                          </div>

                                          <div class="row m-t-5 br-bottom">
                                                <div class="col-8 padd0">
                                                    <h6 class="">Constructions</h6>
                                                   </div>
                                                   <div class="col-4 padd0">
                                                     <h6 class="align-view">$0</h6>
                                                       </div>

                                              </div>
                                              <div class="row m-t-5 br-bottom">
                                                    <div class="col-8 padd0">
                                                            <h6 class="">Cashflow</h6>
                                                           </div>
                                                           <div class="col-4 padd0">
                                                             <h6 class="align-view">$0</h6>
                                                            </div>
                                                  </div>
                                                  <div class="row m-t-15 br-bottom">
                                                        <div class="col-8 padd0">
                                                                <h6 class="">Land</h6>
                                                               </div>
                                                               <div class="col-4 padd0">
                                                                  <h6 class="align-view"> $0</h6>
                                                                </div>
                                                      </div>
                                                      <div class="row m-t-15 br-bottom">
                                                            <div class="col-8 padd0">
                                                                    <h6 class="">Muliti Family</h6>
                                                                   </div>
                                                                   <div class="col-4 padd0">
                                                                     <h6 class="align-view">$0</h6>
                                                                    </div>
                                                          </div>
                                                @endif
                                      
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
               
                <!-- /.row -->
 

                  <!-- .row -->
                  <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                        <h5 class="card-title text-uppercase">Active Offerings</h5>
                                    <div class="d-flex m-b-20 ">
                                            <div class="table-responsive m-t-20">
                                                    <table id="" class=" myTable display nowrap table table-hover table-striped border"
                                                        cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                    <th>S no</th>
                                                                    <th>Offering Name</th>
                                                                    <th>Location</th>
                                                                    <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                      
                                                        <tbody>
                                                             @foreach ($activeproperties as $index => $item)
                                                                <tr>
                                                                        <td>{{ $index+1 }}</td>  
                                                                        <td>{{ $item->title }} </td>
                                                                        <td>{{ $item->address }} </td>
                                                                       <td><a href="property-view-details/{{$item->id}}"><i class="fas fa-eye"></i> </a>
                                                                        <a href="{{ route('admin.property.edit',$item->id) }}"> <i class=" fas fa-edit"></i> </a></td>
                                                                   
                                                                        </tr>
                                                              @endforeach     
                                                       
                                                        </tbody>
                                                    </table>
                                                </div>
                                          
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                                     <div class="card ">
                                        <div class="card-body">
                                            <h5 class="card-title text-uppercase">Closed Funded</h5>
                                            <div class="d-flex m-b-20 ">
                                                    <div class="table-responsive m-t-20">
                                                            <table id="" class="myTable display nowrap table table-hover table-striped border"
                                                                cellspacing="0" width="100%">
                                                                <thead>
                                                                    <tr>
                                                                            <th>S no</th>
                                                                            <th>Name</th>
                                                                            <th>Location</th>
                                                                            <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                              
                                                                <tbody>
                                                                        @foreach ($closedproperties as $index => $item)
                                                                <tr>
                                                                        <td>{{ $index+1 }}</td>  
                                                                        <td>{{ $item->title }} </td>
                                                                        <td>{{ $item->address }} </td>
                                                                        <td><a href="property-view-details/{{$item->id}}"><i class="fas fa-eye"></i> </a>
                                                                         <a href="{{ route('admin.property.edit',$item->id) }}"> <i class=" fas fa-edit"></i> </a></td>
                                                                    </tr>
                                                              @endforeach 
                                                                            
                                                               
                                                                </tbody>
                                                            </table>
                                                        </div>
                                               </div>
                                        </div>
                                    </div>
                               
                        </div>
                    </div>
                    <!-- /.row -->
              
                  
             
              
             
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->

<style>
      #main-content {
          /*  position: absolute;*/
            color: black;
            left: 0;
          /*  top:4.8%;*/
            height:95.2%;
            width:500px;
        }
    </style>
    
      

    
 <script>
        window.onresize = function() {
            var c = document.getElementById("pieChart");
            c.resize();
        }
    </script>
    
    <script>
        class PChartElement extends HTMLElement {
    connectedCallback() {
    }
}

class PChart extends HTMLElement {
    shorten_text = function (text, max_chars) {
        var return_val = ""
        if (text.length > max_chars) {
            return text.substr(0,max_chars) + "...";
        } else {
            return text
        }
    }

    totalFunc = function (total, num) {
        return total + num;
    }  

    getPoint = function (c1,c2,radius,angle){
        return [c1+Math.cos(angle)*radius,c2+Math.sin(angle)*radius];
    }
    getAngle = function(x_coord,y_coord,x_origin,y_origin) {
        var radius = Math.sqrt(Math.pow(Math.abs(x_coord-x_origin),2) + Math.pow(Math.abs(y_coord-y_origin),2));
        if (Math.acos(Math.abs(x_coord-x_origin)/radius).toFixed(6) == Math.asin(Math.abs(y_coord-y_origin)/radius).toFixed(6) && radius <=this.radius)
        {
            var theta = Math.acos(Math.abs(x_coord-x_origin)/radius);
            if (x_coord - x_origin > 0 && y_coord - y_origin < 0) {
                return (2 * Math.PI) - theta;
            }
            if (x_coord - x_origin < 0 && y_coord - y_origin < 0) {
                return (Math.PI) + theta;
            }
            if (x_coord - x_origin < 0 && y_coord - y_origin > 0) {
                return (Math.PI) - theta;
            }
            if (x_coord - x_origin > 0 && y_coord - y_origin > 0) {
                return theta;
            }
        } else {
            return null;
        }
    }
    drawChart = function() {
        this.arcs = [] 
        var elements = this.getElementsByTagName("pchart-element");
        this.names = [];
        this.vals = [];
        this.colours = [];
        for (i = 0; i < elements.length; i++)
        {
            this.names.push(elements[i].getAttribute("name"));
            this.vals.push(parseFloat(elements[i].getAttribute("value")));
            this.colours.push(elements[i].getAttribute("colour"))
        }
        var shadow = this.shadowRoot;
        var c = this.shadowRoot.querySelector("canvas");
        var positionInfo = this.getBoundingClientRect();
        var height = positionInfo.height;
        var width = positionInfo.width;
        c.width  = width;
        c.height = height;
        var ctx = c.getContext("2d");

        var font_size = parseInt(width * 0.03166847);

        var max_font_size = 28;

        if (font_size > max_font_size) {
            font_size = max_font_size;
        }


        this.y_origin = height * 0.5;
        this.x_origin = c.width * 0.4;
        this.radius = c.width * 1.6;
        var max_radius = c.height * 0.35;
        if (this.radius > max_radius) {
            this.radius = max_radius;
        }

        var share_percentage = [];

        var x = c.width - parseInt(c.width * 0.13019231) * 1.95;
        var y = font_size;

        ctx.beginPath();
        var rect_height = (this.names.length * font_size) + 15;
        ctx.rect(x, y+10, parseInt(c.width * 0.24019231), rect_height);
        ctx.stroke();
        y += 15;
        for (var i=0;i<this.names.length;i++)
        {
            var percentage = this.vals[i] / this.vals.reduce(this.totalFunc);
            share_percentage.push(percentage);

            y += font_size;
            ctx.beginPath();
            ctx.fillStyle = this.colours[i];
            ctx.fillRect(x + 5, y-font_size/2, 5, 5);

            ctx.font = String(font_size) + "px Arial";
            var shorten = 0;
            if (ctx.measureText(this.names[i]).width > parseInt(c.width * 0.24019231)-15) {
                while(ctx.measureText(this.shorten_text(this.names[i],this.names[i].length - shorten)).width > (parseInt(c.width * 0.12019231)-15) && this.names[i].length - shorten>0) {
                    shorten++;
                }
            }
            ctx.fillText(this.shorten_text(this.names[i],this.names[i].length - shorten), x + 15, y);
            ctx.closePath();
        }
        for (var i = 0; i < share_percentage.length; i++)
        {
            if (i == 0)
            {
                start = 0;
            } else {
                var start = share_percentage.slice(0,i).reduce(this.totalFunc);
            }
            var end = (start + share_percentage[i]);
            ctx.beginPath();
            ctx.arc(this.x_origin, this.y_origin, this.radius, start * 2 * Math.PI, end * 2 * Math.PI);
            var arc_start = this.getPoint(this.x_origin,this.y_origin,this.radius,start * 2 * Math.PI);
            var arc_end = this.getPoint(this.x_origin,this.y_origin,this.radius,end * 2 * Math.PI);
            this.arcs.push([start * 2 * Math.PI, end * 2 * Math.PI]);
            var arc_middle = this.getPoint(this.x_origin,this.y_origin,this.radius+10,((start + end)) * Math.PI);
            ctx.lineTo(this.x_origin,this.y_origin);
            ctx.lineTo(arc_start[0],arc_start[1]);
            ctx.fillStyle = this.colours[i];
            ctx.fill();
            ctx.fillStyle = this.colours[i];
            if (arc_middle[0].toFixed(0) < this.x_origin)
            {
                ctx.textAlign = "end";
            } else {
                if (arc_middle[0].toFixed(0) == this.x_origin)
                {
                    ctx.textAlign = "left";
                } else {
                    ctx.textAlign = "start";
                }
            }
            if (arc_middle[1] > this.y_origin)
            {
                arc_middle = this.getPoint(this.x_origin,this.y_origin,this.radius+25,((start + end)) * Math.PI);
            }
            ctx.moveTo(arc_middle[0],arc_middle[1]);
            ctx.fillText(this.vals[i].toFixed(0), arc_middle[0], arc_middle[1]);
            ctx.closePath();
        }
    }
    resize = function() {
        var c = this.shadowRoot.querySelector("canvas");
        var positionInfo = this.getBoundingClientRect();
        var height = positionInfo.height;
        var width = positionInfo.width;
        c.width  = width;
        c.height = height;
        this.drawChart();
    }
    getPos = function(e){
        var mouse_x = e.clientX - this.getBoundingClientRect().left;
        var mouse_y = e.clientY - this.getBoundingClientRect().top;
        var mouse_angle = this.getAngle(mouse_x,mouse_y,this.x_origin, this.y_origin);
        if (mouse_angle != null)
        {
            //console.log(mouse_angle);
            //console.log(this.arcs);
            for (var i = 0; i < this.arcs.length; i++)
            {
                if (mouse_angle > this.arcs[i][0] && mouse_angle < this.arcs[i][1])
                {
                    if (!this.shadowRoot.querySelector("#Mouse_Point_Div"))
                    {
                        var c = this.shadowRoot.querySelector("canvas");
                        var ctx = c.getContext("2d");
                        var div = document.createElement("div");
                        div.setAttribute("id","Mouse_Point_Div");
                        div.style.position = "absolute";
                        div.style.left = "0px";
                        div.style.top = "0px";
                        div.style.padding = "10px";
                        //div.style.height = "20px";
                        div.style.backgroundColor = "white";
                        div.style.border = "thin";
                        div.style.borderColor = "black";
                        div.style.borderStyle = "solid";
                        // div.style.boxShadow = "4px 4px 2px -2px rgba(0,0,0,0.9)";
                        //div.style.outline = "solid";
                        //div.style.outlineColor = "black"
                        div.style.color = "black";
                        this.shadowRoot.appendChild(div);
                    } else {
                        var div = this.shadowRoot.querySelector("#Mouse_Point_Div");
                        div.style.display = "block";
                        div.innerHTML = "Title: " + this.names[i] + "<br>" + "Value: $" + this.vals[i];
                        div.style.left = mouse_x + 'px';
                        div.style.top = mouse_y + 'px';
                        //console.log("Divider Position:", div.style.left);
                    }
                    //console.log(mouse_x + 'px');
                    //div.style.left = mouse_x + 'px';
                    //div.style.right = mouse_y + 'px';
                    //console.log(this.names[i]);
                }
            }
            //console.log(this.names[this.arcs.indexOf(closest)]);
        } else {
            if (this.shadowRoot.querySelector("#Mouse_Point_Div"))
            {
                var div = this.shadowRoot.querySelector("#Mouse_Point_Div");
                div.style.display = "none"
            }
        }
    }
    mouseOver = function(e){
        this.mouse_track = true;
    }
    mouseLeave = function(e) {
        this.mouse_track = false;
    }
    connectedCallback() {
        var shadow = this.attachShadow({mode: 'open'});
        var c = document.createElement('canvas');
        shadow.appendChild(c);
        this.drawChart();
        this.addEventListener("mouseover",this.mouseOver);
        this.addEventListener("mouseleave",this.mouseLeave);
        this.addEventListener("mousemove",this.getPos);
        this.mouse_track = false;
    }
}

//var pchart_element = Object.create(HTMLElement.prototype);
window.customElements.define('pchart-element',PChartElement);
window.customElements.define('pie-chart',PChart);
        </script>
<!-- end sectors -->

<script>
       var ctx = document.getElementById("barChart").getContext('2d');
var barChart = new Chart(ctx, {
  type: 'bar',
   options: {
    barValueSpacing: 20,
    scales: {
      yAxes: [{
        ticks: {
          min: 0,
          max:<?php echo $total_sum;?>,
        }
      }]
    }
  },
  data: {
    labels: ["2023","2024","2025"],
   
    datasets: [{
      label: 'Contruction',
      data: [
          <?php if($contruction>0){echo $contruction; }else{ echo "0";} ?>
          ],
      backgroundColor: "#379887"
    }, {
      label: 'Cash Flow',
      data: [
           <?php if($cashflow>0){echo $cashflow; }else{ echo "0";} ?>
           
          ],
      backgroundColor: "#f17f29"
    },{
      label: 'Land',
      data: [
          <?php if($land>0){echo $land; }else{ echo "0";} ?>
         
          ],
      backgroundColor: "#05343a"
    },{
      label: 'Multi Family',
      data: [
          <?php if($multifamily>0){echo $multifamily; }else{ echo "0";} ?>
         
          ],
      backgroundColor: "#cd9a60"
    },]
    
  }
});
    </script>
     <script>
    
    
      
        function userStatus(id){
            
            
         let checkbox=document.getElementById("verification-"+id);
  
            
            $.ajax({
                type:"get",
               url:"{{url('/admin/lead-status/')}}"+"/"+id,
                success:function(response){
                   toastr.success(response)
                },
                error:function(err){
                    console.log(err);

                }
            })
        }
        
    </script>
    
    @endsection
 