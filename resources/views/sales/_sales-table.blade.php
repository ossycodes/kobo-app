<section id="sale-table">
    <div class="container mt-4">
        <div class="bg-white">
            <div class="table-editableWTF">
                <table id="tableRow" class="table table-bordered table-responsive-md table-striped text-center">
                    <thead class="p-3">
                    <tr class="tab">
                        <th scope="col" class="tool" data-tip="Add all your inventory here." tabindex="1">
                            Inventory Items
                        </th>
                        <th scope="col" class="tool" data-tip="Provide description of item" tabindex="1">
                            Description
                        </th>

                        <th scope="col" class="tool" data-tip="Include the quantity sold." tabindex="1">
                            QTY sold
                        </th>
                        <th scope="col"class="tool" data-tip="Add price per head of product" tabindex="1">
                            Price of product (&#8358;)
                        </th>
                        <th scope="col" class="tool" data-tip="Add the total price of sales." tabindex="1">
                            Total Price (&#8358;)
                        </th>
                        <th scope="col" class="tool" data-tip="Channel of sale" tabindex="1">
                            Channel
                        </th>
                        <th class="text-center">Action</th>

                    </tr>
                    </thead>
                    <tbody id="salesTable">
                    <tr v-for="item in saleItems">
                        <td>
                            <select v-model="item.inventory_id" class="form-control inventory">
                                <option value="">
                                    Select ...
                                </option>
                                @foreach(auth()->user()->getUserCompany()->inventories as $inventory)
                                    <option value="{{ $inventory->id }}">
                                        {{ $inventory->name }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td><input v-model="item.description" type="text" id="sales_description" class="form-control sales_description "></td>
                        <td><input v-model="item.quantity" type="number"  class="sales_quantity form-control "></td>
                        <td><input v-model="item.sales_price" type="number" class="form-control sales_price"></td>
                        <td><input v-model="item.total_price" type="text" class="form-control sales_total" id="sales_total"></td>
                        <td>
                            <select v-model="item.sale_channel_id" class="form-control search sales_channel">
                                @foreach(auth()->user()->getUserCompany()->saleChannels as $sales_channel)
                                    <option value="{{ $sales_channel->id }}">
                                        {{ $sales_channel->name }}
                                    </option>
                                @endforeach
                            </select>
                        </td>

                        <td id="delete"><i style="color: #da1313;" class="fa fa-trash"></i></td>
                    </tr>
                    </tbody>
                </table>
                <span @click="addNewSaleItemRow()" class="float-right">Add Row <i class="fa fa-plus-square" style="font-size:24px;color:#00C259;"></i></span>
            </div>

            {{-- payment section --}}

            <div class="row p-2 mt-2 ">
                <div class="col-md-6">
                    <div class="bg-grey py-4 px-3" id="topp">
                        <div class="row" >
                            <div class="col-md-5">
                                <h5 class="h6 uppercase">Payment Mode</h5>
                                <div class="dropdown show mt-3 payment_mode">
                                    <a class="btn btn-lg btn-payment dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Select
                                    </a>
                                    <div class="dropdown-menu payment_mode_id" name="payment_method" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" value="gtb1" href="#">GTB 1</a>
                                        <a class="dropdown-item" value="gtb2" href="#">GTB 2</a>
                                        <a class="dropdown-item" value="skype" href="#">Skye Bank</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <h5 class="h6 uppercase">Amount</h5>
                                <div class="show input-group input-group-lg mt-3">
                                    <input type="text" style="height: 39px;" class="form-control" aria-label="Sizing example input" aria-describedby="" placeholder="500,000">
                                </div>
                            </div>

                            <div class="col-md-2"></div>
                        </div>


                        <div class="row">
                            <div class="col-md-5">
                                <div class="dropdown show mt-3">
                                    <a class="btn btn-lg btn-payment dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Cash
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="#">ATM</a>
                                        <a class="dropdown-item" href="#">GTB 2</a>
                                        <a class="dropdown-item" href="#">Skye Bank</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="show input-group input-group-lg mt-3">
                                    <input type="text" style="height: 39px;" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="750,000">
                                </div>
                            </div>

                            <div class="col-md-2 mt-4 ">
                                <span class=""><i class="fa fa-plus-square" style="font-size:32px;color:#00C259;"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end of current payment --}}
                {{-- total sum section --}}
                @include('sales._payment')
            </div>
        </div>
    </div>
</section>
