@extends('backend.panels.main')
@section('title')
    Back office
@endsection
@section('content')
    <div class="app-content content ">
        <div class="content-overlay">
        </div>
        <div class="header-navbar-shadow">
        </div>
        <div class="content-wrapper">
            @include('backend.panels.inc.flash')
            @include('backend.panels.inc.flash_admin')
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                    <div class="row match-height">

                        <!-- Statistics Card -->
                        <div class="col-xl-12 col-md-6 col-12">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <h4 class="card-title">Statistics</h4>
                                    <div class="d-flex align-items-center">
                                        <p class="card-text font-small-2 mr-25 mb-0">A la date du {{date('d-M-Y')}}</p>
                                    </div>
                                </div>
                                <div class="card-body statistics-body">
                                    <div class="row">
                                        <div class="col-xl-2 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <div class="media">
                                                <div class="avatar bg-light-default mr-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="trending-up" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">{{$totalNonAssociation}}</h4>
                                                    <p class="card-text font-small-3 mb-0">Total Associations</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <div class="media">
                                                <div class="avatar bg-light-warning mr-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="trending-up" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">{{$totalInscrits}}</h4>
                                                    <p class="card-text font-small-3 mb-0">Total inscrits</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <div class="media">
                                                <div class="avatar bg-light-info mr-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="users" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">{{$totalHomme}}</h4>
                                                    <p class="card-text font-small-3 mb-0">Total hommes</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-sm-6 col-12 mb-2 mb-sm-0">
                                            <div class="media">
                                                <div class="avatar bg-light-danger mr-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="users" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">{{$totalFemme}}</h4>
                                                    <p class="card-text font-small-3 mb-0">Total femmes</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-sm-6 col-12 mb-2 mb-sm-0">
                                            <div class="media">
                                                <div class="avatar bg-light-success mr-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="user" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">{{$totalHandicap}}</h4>
                                                    <p class="card-text font-small-3 mb-0">Total handicapés</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-sm-6 col-12">
                                            <div class="media">
                                                <div class="avatar bg-light-primary mr-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="user" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">{{$totalNonHandicap}}</h4>
                                                    <p class="card-text font-small-3 mb-0">Total non handicapés</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Statistics Card -->
                    </div>

                
                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
    </div>

@endsection
