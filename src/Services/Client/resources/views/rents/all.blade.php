@extends("client::layouts.app")

@section("content")
    <section id="top">
        <div class="container py-3">
            <div class="row">
                <h2><a href="/rent" class="text-dark"> Rent</a></h2>
                <span class="accountant ml-auto btn btn-accountant">
                    <a href="" class="btn-accountant">
                        <img src="https://res.cloudinary.com/samuelweke/image/upload/v1527079189/profile.png"> Accountant
                    </a>
                </span>
            </div>
        </div>
    </section>

    <section>
        <div class="container mt-3">
            <div class="bg-white p-4">
                <form action="" method="post">
                    <div class="form row py-3">
                        <div class="col-md-4">
                            <div class="p-3 bg-white text-muted" id="topp">
                                <h5 class="h5">Total Rental Properties</h5>
                                <h2 class="">&#8358;{{ number_format($total, 2) }}</h2>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 bg-grey text-dark" id="topp">
                                <h5 class="h5">Total Used Rent</h5>
                                <h2 class="">&#8358;{{ number_format($total_used_rent, 2) }}</h2>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 bg-green text-white" id="topp">
                                <h5 class="h5 ">Total Unused Rent</h5>
                                <h2 class="">&#8358;{{ number_format($total - $total_used_rent, 2) }}</h2>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="row">
                    <div class="col-md-10 col-6">
                        <div class="input-group mt-2">
                            <input type="text" class="form-control" placeholder="&#xF002; Search" style="font-family:Arial, FontAwesome" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text vat-input px-5 py-2" id="basic-addon2">Search</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-6">
                        <div id="" class="mt-2 float-right" onclick="">
                            <button style="" class="btn btn-filter">Filter <i class="fa fa-filter"></i></button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="sale-table">
        <div class="container">

            <div class="bg-white p-4">

                <div class="table-responsive table-responsive-sm">
                    <!-- Rents Table -->
                   @include('client::rents._rents_table')
                </div>
            </div>

        </div>
    </section>

    <section id="pagination">
        <div class="container py-3">
            <div class="row">
                <div class="col-md-7">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </div>
                <div class="col-md-5">
                    <span>Go to page:</span>

                </div>
            </div>
        </div>
    </section>

@endsection