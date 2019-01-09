
@extends('layouts.app')
<style>
label {display: block; padding: 5px; position: relative; padding-left: 10px;}
label input {display: none;}
label span {border: 1px solid #ccc; width: 17px; height: 17px; position: absolute; overflow: hidden; line-height: 1; text-align: center; border-radius: 100%; font-size: 10pt; left: 0; top: 50%; margin-top: -7.5px;}
input:checked + span {background: #ccf; border-color: #ccf;}

input {
    border: none;
    background: transparent;
}

.modal.left .modal-dialog {
	position: fixed;
	margin: auto;
	width: 300px;
	height: 100%;
	-webkit-transform: translate3d(0%, 0, 0);
	-ms-transform: translate3d(0%, 0, 0);
	-o-transform: translate3d(0%, 0, 0);
	transform: translate3d(0%, 0, 0);
}

.modal.left .modal-content {
	height: 100%;
	overflow-y: auto;
}

.modal.left .modal-body {
	padding: 15px 15px 80px;
}

.modal.left.fade .modal-dialog {
	right: -320px;
	-webkit-transition: opacity 0.3s linear, left 0.3s ease-out;
	-moz-transition: opacity 0.3s linear, left 0.3s ease-out;
	-o-transition: opacity 0.3s linear, left 0.3s ease-out;
	transition: opacity 0.3s linear, left 0.3s ease-out;
}

.modal.left.fade.show .modal-dialog {
	right: 0;
}



</style>
@section('content')

{{-- heading section --}}
    <section id="top">
        <div class="container p-2">
            <div class="row p-3">
                <h2>Sales</h2>
                <span class="accountant ml-auto btn btn-accountant">
                <a href="" class="btn-accountant">
                    <img src="https://res.cloudinary.com/samuelweke/image/upload/v1527079189/profile.png"> Accountant
                </a>                
                </span>
            </div>
        </div>
    </section>
{{-- end of heading section --}}

{{-- sales chart --}}
    <section id ="">
        <div class = "container">
            <div class="row mt-4">
                <div class="col-md-8">
                    <div class="bg-white px-3 py-4 introduction" id="topp"> 
                            <a href='http://example.com/' data-intro='Hello step one! View your History'></a>
                        <div class="row">
                            <div class="col-md-3">
                                    <h5 class="h5">Monthly sales</h5>
                            </div>
                            <div class="col-md-3">
                                    <div class="form-check form-check-inline">
                                        <label><input type="radio" name="select" /><span>D</span></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label><input type="radio" name="select" /><span>W</span></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label><input type="radio" name="select" /><span>M</span></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label><input type="radio" name="select" /><span>Y</span></label>
                                    </div>
                                            
                            </div>
                            <div class="col-md-6 row">
                                <div class="form-group col">
                                    <select id="inputState" class="form-control btn-loginn">
                                        <option selected>Start Date</option>
                                        <option>January</option>
                                        <option>Feburary</option>
                                        <option>March</option>
                                        <option>April</option>
                                        <option>May</option>
                                        <option>June</option>
                                        
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <select id="inputState" class="form-control btn-loginn">
                                        <option selected class>End Date</option>
                                        <option>January</option>
                                        <option>Feburary</option>
                                        <option>March</option>
                                        <option>April</option>
                                        <option>May</option>
                                        <option>June</option>  
                                    </select>
                                </div>
                            </div>
                        </div>
                            <canvas id="canvasSale"  height="100"></canvas>
                    </div>
                </div>

                {{-- top sales --}}
                <div class="col-md-4">
                    <div class="bg-white p-2 " id="topp"  data-step="2" data-intro="Here is your performance" data-position='right' data-scrollTo='tooltip'>
                        <div class="row my-1">
                            <div class="col mt-1">
                                <h5 class="h5">Top Sales</h5>
                            </div>
                            <div class="col">
                                <div class="dropdown show">
                                    <a class="btn btn-filter pull-right" href="#" role="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Filter <i class="fa fa-filter"></i>                                    
                                    </a>                                   
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="#" class="text-green">By Quantity</a>
                                        <a class="dropdown-item" href="#" class="text-green">By Amount</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="all-scroll">
                            <table class="table table-striped table-hover" id="table">
                                <thead class="sale-head">
                                  <tr>
                                    <th scope="col">Products</th>
                                    <th scope="col">Number sold</th>
                                    <th scope="col">Amount</th>
                                  </tr>
                                </thead>
                                <tbody>
                                {{--{{ dd($topFiveSales) }}--}}
                                    @foreach($topFiveItems as $t5s)
                                          <tr class="right-modal" data-toggle="modal" data-target="#exampleModal">
                                            <td>{{ $t5s->inventory->name }}</td>
                                            <td>{{ $t5s->quantity }}</td>
                                            <td>{{ $t5s->quantity * $t5s->inventory->sales_price }}</td>
                                          </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                        <div class="text-center p-1">
                                <a href="" class="view-more">View More Analytics</a> 
                            </div>
                    </div>
                </div>
            </div>
{{-- end of sales chart --}}
        </div>
    </section>

    <section id="sale-table">
        <div class="container mt-4">
                        
                    <div class="bg-white p-4">
                            <div class="row py-3">
                                    <div class="col-md-4">
                                        <a href="/addSales" class="btn btn-addSale"  data-step="3" data-intro="Want your transaction? Here is it."  data-position='left' >Add Sales</a>            
                                    </div>
                
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input type="text" @keydown.enter="searchSale()" v-model="saleSearchQuery" class="form-control" placeholder="&#xF002; Type Something to Search" style="font-family:Arial, FontAwesome" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <span class="input-group-text vat-input px-5 py-2" id="basic-addon2" style="height: calc(2.19rem + 2px);">Search</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 float-right">
                                        <div class="dropdown show float-right">
                                                <a class="btn btn-filter" href="#" role="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Filter <i class="fa fa-filter"></i>                                    
                                                </a>                                   
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" href="#" class="text-green">By Quantity</a>
                                                    <a class="dropdown-item" href="#" class="text-green">By Amount</a>
                                                </div>
                                        </div>
                                    </div>
                            </div>


                @include('client::components.loading-container')
                <div v-show="!appLoading" class="table-responsive table-responsive-sm">
                    <table class="table table-striped table-hover" id="dataTable">
                        <thead class="p-3">
                          <tr class="tab">
                            <th scope="col">Date</th>
                            <th scope="col">Invoice</th>
                            <th scope="col">QTY sold</th>
                            <th scope="col">Sales Price (&#8358;)</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Channel</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($sales as $key => $sale)
                          <tr>
                              <td >
                                {{ $sale->created_at->diffForHumans() }}
                              </td>
                            <td>
                                <a href="" data-toggle="modal" data-target="#exampleModalCenter">{{ $sale->invoice_number }}</a>
                            </td>
                            <td>
                            {{ $sale->saleItems->count() }}
                            </td>
                            <td>
                            {{ $sale->total_amount }}
                            </td>
                            <td>
                            {{ $sale->customer->name }}
                            </td>
                            <td>
                            {{ $sale->saleChannel->name }}
                            </td>
                          </tr>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                    <hr class="mt-0">
                    <div class="text-center pb-3">
                        <a href="/view-sale" class="view-more">View More</a> 
                    </div>
            </div>
        </div>
    </section>
    @include("client::components.invoice-modal")
    @include("client::components.top-sale-modal")
@endsection

@section("other_js")
    <script>
        window.salesList = @json($sales);
    </script>
@endsection
