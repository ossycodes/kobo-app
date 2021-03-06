@extends("client::layouts.app")

@section("content")
<section id="top">
    <div class="container py-3">
        <div class="row">
                <h2><a href="/client/vendor" class="text-dark"> Vendors</a></h2>
                 @include('client::accountant-button')

        </div>
    </div>
</section>

<section>
    <div class="container px-4 py-3">
        <div class="row py-2">
                <div class="col-md-10 col-6">
                    <div class="input-group">
                        <input v-model="search" @keyup="searchVendor" type="text" class="form-control" placeholder="&#xF002; Search" style="font-family:Arial, FontAwesome" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <a href="#"><span @click.prevent="searchVendor" class="input-group-text vat-input append-border px-5" id="basic-addon2">Search</span></a>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>

<section id="sale-table">
        <div class="container mt-2">

            <div class="bg-white p-4">

                <div class="table-responsive table-responsive-sm">
                    <table class="table table-striped table-hover" id="dataTable">
                        <thead class="p-3">
                          <tr class="tab">
                            <th scope="col">Vendor Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone No</th>
                            <th scope="col">Email</th>
                            <th scope="col">Website</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody v-for="vendor in vendors">
                        <tr>
                            <td >@{{ vendor.name }}</td>
                            <td>@{{ vendor.address }}  </td>
                            <td> @{{ vendor.phone }}</td>
                            <td> @{{ vendor.email }}</td>
                            <td>@{{ vendor.website }}</td>
                            <td><label class="switch">
                                    <input type="checkbox" @click="activateVendor(vendor.id)" type="checkbox" v-bind:checked="vendor.isActive">
                                    <span class="slider round"></span>
                                  </label>
                            </td>
                          </tr>
                        <tr v-if="vendors.length === 0">
                            <td colspan="7" style="text-align: center">No search result found</td>
                        </tr>
                        </tbody>

                    </table>
                </div>
            </div>

        </div>
    </section>

    {{--<section id="pagination">--}}
            {{--<div class="container py-3">--}}
                {{--<div class="row">--}}
                    {{--<div class="col-md-7">--}}
                        {{--<ul class="pagination">--}}
                            {{--<li class="page-item"><a class="page-link" href="#">Previous</a></li>--}}
                            {{--<li class="page-item"><a class="page-link" href="#">1</a></li>--}}
                            {{--<li class="page-item active"><a class="page-link" href="#">2</a></li>--}}
                            {{--<li class="page-item"><a class="page-link" href="#">3</a></li>--}}
                            {{--<li class="page-item"><a class="page-link" href="#">Next</a></li>--}}
                          {{--</ul>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-5">--}}
                        {{--<span>Go to page:</span>--}}

                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</section>--}}



@endsection
@section('other_js')
    <script>
        window.vendors = @json($vendors);
    </script>
@endsection
