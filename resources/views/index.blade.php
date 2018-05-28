@extends('search.template.app')
@section('title','Trang chủ, tìm kiếm việc làm')
@section('content')
    <div class="banner">
        <div class="container">
            <div class="banner-caption">
                <div class="col-md-12 col-sm-12 banner-text">
                    <h1>7,000+ Browse Jobs</h1>
                    <form class="form-horizontal" method="get" action="{{ route('home.search') }}">
                        <div class="col-md-7 no-padd">
                            <div class="input-group">
                                <input name="kw" type="text" class="form-control right-bor"
                                       placeholder="Skills, Designations, Companies"></div>
                        </div>
                        <div class="col-md-3 no-padd">
                            <div class="input-group">
                                <select class="form-control" name="address">
                                    @foreach($address as $address)
                                        <option value="{{ $address->thanhpho_id }}">{{ $address->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 no-padd">
                            <div class="input-group">
                                <button type="submit" class="btn btn-primary">Search Job</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <section class="first-feature">
        <div class="container">
            <div class="all-features">
                <div class="col-md-3 col-sm-6 small-padding">
                    <div class="job-feature">
                        <div class="feature-icon"><i class="fa fa-desktop"></i></div>
                        <div class="feature-caption">
                            <h5>Web Developer</h5>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 small-padding">
                    <div class="job-feature">
                        <div class="feature-icon"><i class="fa fa-mobile"></i></div>
                        <div class="feature-caption">
                            <h5>Mobile Developer</h5>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 small-padding">
                    <div class="job-feature">
                        <div class="feature-icon"><i class="fa fa-lightbulb-o"></i></div>
                        <div class="feature-caption">
                            <h5>Creative Designer</h5>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 small-padding">
                    <div class="job-feature">
                        <div class="feature-icon"><i class="fa fa-file-text"></i></div>
                        <div class="feature-caption">
                            <h5>Content Writer</h5>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 small-padding">
                    <div class="job-feature">
                        <div class="feature-icon"><i class="fa fa-hdd-o"></i></div>
                        <div class="feature-caption">
                            <h5>Manager</h5>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 small-padding">
                    <div class="job-feature">
                        <div class="feature-icon"><i class="fa fa-bullhorn"></i></div>
                        <div class="feature-caption">
                            <h5>Sales & Marketing</h5>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 small-padding">
                    <div class="job-feature">
                        <div class="feature-icon"><i class="fa fa-credit-card"></i></div>
                        <div class="feature-caption">
                            <h5>Accountant</h5>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 small-padding">
                    <div class="job-feature">
                        <div class="feature-icon"><i class="fa fa-user"></i></div>
                        <div class="feature-caption">
                            <h5>Management / HR</h5>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <div class="clearfix"></div>
    <section class="wp-process">
        <div class="container">
            <div class="row">
                <div class="main-heading">
                    <p>How We Work</p>
                    <h2>Our Work <span>Process</span></h2></div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="work-process">
                    <div class="work-process-icon"><span class="icon-search"></span></div>
                    <div class="work-process-caption">
                        <h4>Search Job</h4>
                        <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum congue
                            posuere lacus</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="work-process">
                    <div class="work-process-icon"><span class="icon-mobile"></span></div>
                    <div class="work-process-caption">
                        <h4>Find Job</h4>
                        <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum congue
                            posuere lacus</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="work-process">
                    <div class="work-process-icon"><span class="icon-profile-male"></span></div>
                    <div class="work-process-caption">
                        <h4>Hire Employee</h4>
                        <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum congue
                            posuere lacus</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="work-process">
                    <div class="work-process-icon"><span class="icon-layers"></span></div>
                    <div class="work-process-caption">
                        <h4>Start Work</h4>
                        <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum congue
                            posuere lacus</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="work-process">
                    <div class="work-process-icon"><span class="icon-wallet"></span></div>
                    <div class="work-process-caption">
                        <h4>Pay Money</h4>
                        <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum congue
                            posuere lacus</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="work-process">
                    <div class="work-process-icon"><span class="icon-happy"></span></div>
                    <div class="work-process-caption">
                        <h4>Happy</h4>
                        <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum congue
                            posuere lacus</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection