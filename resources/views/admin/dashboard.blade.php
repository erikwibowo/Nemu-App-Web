@extends('admin.layout.master')
@section('content')
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                <h5 class="text-white op-7 mb-2">Premium Bootstrap 4 Admin Dashboard</h5>
            </div>
            <div class="ml-md-auto py-2 py-md-0">
                <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
                <a href="#" class="btn btn-secondary btn-round">Add Customer</a>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-6">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title">Overall statistics</div>
                    <div class="card-category">Daily information about statistics in system</div>
                    <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-1"></div>
                            <h6 class="fw-bold mt-3 mb-0">New Users</h6>
                        </div>
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-2"></div>
                            <h6 class="fw-bold mt-3 mb-0">Sales</h6>
                        </div>
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-3"></div>
                            <h6 class="fw-bold mt-3 mb-0">Subscribers</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title">Total income & spend statistics</div>
                    <div class="row py-3">
                        <div class="col-md-4 d-flex flex-column justify-content-around">
                            <div>
                                <h6 class="fw-bold text-uppercase text-success op-8">Total Income</h6>
                                <h3 class="fw-bold">$9.782</h3>
                            </div>
                            <div>
                                <h6 class="fw-bold text-uppercase text-danger op-8">Total Spend</h6>
                                <h3 class="fw-bold">$1,248</h3>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div id="chart-container">
                                <canvas id="totalIncomeChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title fw-mediumbold">Suggested People</div>
                    <div class="card-list">
                        <div class="item-list">
                            <div class="avatar">
                                <img src="../assets/img/jm_denis.jpg" alt="..." class="avatar-img rounded-circle">
                            </div>
                            <div class="info-user ml-3">
                                <div class="username">Jimmy Denis</div>
                                <div class="status">Graphic Designer</div>
                            </div>
                            <button class="btn btn-icon btn-primary btn-round btn-xs">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <div class="item-list">
                            <div class="avatar">
                                <img src="../assets/img/chadengle.jpg" alt="..." class="avatar-img rounded-circle">
                            </div>
                            <div class="info-user ml-3">
                                <div class="username">Chad</div>
                                <div class="status">CEO Zeleaf</div>
                            </div>
                            <button class="btn btn-icon btn-primary btn-round btn-xs">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <div class="item-list">
                            <div class="avatar">
                                <img src="../assets/img/talha.jpg" alt="..." class="avatar-img rounded-circle">
                            </div>
                            <div class="info-user ml-3">
                                <div class="username">Talha</div>
                                <div class="status">Front End Designer</div>
                            </div>
                            <button class="btn btn-icon btn-primary btn-round btn-xs">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <div class="item-list">
                            <div class="avatar">
                                <img src="../assets/img/mlane.jpg" alt="..." class="avatar-img rounded-circle">
                            </div>
                            <div class="info-user ml-3">
                                <div class="username">John Doe</div>
                                <div class="status">Back End Developer</div>
                            </div>
                            <button class="btn btn-icon btn-primary btn-round btn-xs">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <div class="item-list">
                            <div class="avatar">
                                <img src="../assets/img/talha.jpg" alt="..." class="avatar-img rounded-circle">
                            </div>
                            <div class="info-user ml-3">
                                <div class="username">Talha</div>
                                <div class="status">Front End Designer</div>
                            </div>
                            <button class="btn btn-icon btn-primary btn-round btn-xs">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <div class="item-list">
                            <div class="avatar">
                                <img src="../assets/img/jm_denis.jpg" alt="..." class="avatar-img rounded-circle">
                            </div>
                            <div class="info-user ml-3">
                                <div class="username">Jimmy Denis</div>
                                <div class="status">Graphic Designer</div>
                            </div>
                            <button class="btn btn-icon btn-primary btn-round btn-xs">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card full-height">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Support Tickets</div>
                        <div class="card-tools">
                            <ul class="nav nav-pills nav-secondary nav-pills-no-bd nav-sm" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-today" data-toggle="pill" href="#pills-today" role="tab" aria-selected="true">Today</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-week" data-toggle="pill" href="#pills-week" role="tab" aria-selected="false">Week</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-month" data-toggle="pill" href="#pills-month" role="tab" aria-selected="false">Month</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex">
                        <div class="avatar avatar-online">
                            <span class="avatar-title rounded-circle border border-white bg-info">J</span>
                        </div>
                        <div class="flex-1 ml-3 pt-1">
                            <h6 class="text-uppercase fw-bold mb-1">Joko Subianto <span class="text-warning pl-3">pending</span></h6>
                            <span class="text-muted">I am facing some trouble with my viewport. When i start my</span>
                        </div>
                        <div class="float-right pt-1">
                            <small class="text-muted">8:40 PM</small>
                        </div>
                    </div>
                    <div class="separator-dashed"></div>
                    <div class="d-flex">
                        <div class="avatar avatar-offline">
                            <span class="avatar-title rounded-circle border border-white bg-secondary">P</span>
                        </div>
                        <div class="flex-1 ml-3 pt-1">
                            <h6 class="text-uppercase fw-bold mb-1">Prabowo Widodo <span class="text-success pl-3">open</span></h6>
                            <span class="text-muted">I have some query regarding the license issue.</span>
                        </div>
                        <div class="float-right pt-1">
                            <small class="text-muted">1 Day Ago</small>
                        </div>
                    </div>
                    <div class="separator-dashed"></div>
                    <div class="d-flex">
                        <div class="avatar avatar-away">
                            <span class="avatar-title rounded-circle border border-white bg-danger">L</span>
                        </div>
                        <div class="flex-1 ml-3 pt-1">
                            <h6 class="text-uppercase fw-bold mb-1">Lee Chong Wei <span class="text-muted pl-3">closed</span></h6>
                            <span class="text-muted">Is there any update plan for RTL version near future?</span>
                        </div>
                        <div class="float-right pt-1">
                            <small class="text-muted">2 Days Ago</small>
                        </div>
                    </div>
                    <div class="separator-dashed"></div>
                    <div class="d-flex">
                        <div class="avatar avatar-offline">
                            <span class="avatar-title rounded-circle border border-white bg-secondary">P</span>
                        </div>
                        <div class="flex-1 ml-3 pt-1">
                            <h6 class="text-uppercase fw-bold mb-1">Peter Parker <span class="text-success pl-3">open</span></h6>
                            <span class="text-muted">I have some query regarding the license issue.</span>
                        </div>
                        <div class="float-right pt-1">
                            <small class="text-muted">2 Day Ago</small>
                        </div>
                    </div>
                    <div class="separator-dashed"></div>
                    <div class="d-flex">
                        <div class="avatar avatar-away">
                            <span class="avatar-title rounded-circle border border-white bg-danger">L</span>
                        </div>
                        <div class="flex-1 ml-3 pt-1">
                            <h6 class="text-uppercase fw-bold mb-1">Logan Paul <span class="text-muted pl-3">closed</span></h6>
                            <span class="text-muted">Is there any update plan for RTL version near future?</span>
                        </div>
                        <div class="float-right pt-1">
                            <small class="text-muted">2 Days Ago</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection