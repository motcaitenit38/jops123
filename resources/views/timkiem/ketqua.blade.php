@extends('timkiem.template.ketquatimkiem')
@section('tieudesite','Kết quả tìm kiếm')
@section('noidung')
<section class="bottom-search-form">
    <div class="container bg-blue">
        <form class="bt-form">
            <div class="col-md-3 col-sm-6">
                <input type="text" class="form-control" placeholder="Skills, Designations, Keyword"> </div>
                <div class="col-md-3 col-sm-6">
                    <input type="text" class="form-control" placeholder="Searc By location"> </div>
                    <div class="col-md-3 col-sm-6">
                        <select class="form-control">
                            <option>By Category</option>
                            <option>Information Technology</option>
                            <option>Mechanical</option>
                            <option>Hardware</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <button type="submit" class="btn btn-primary">Search Job</button>
                    </div>
                </form>
            </div>
        </section>
        <section class="brows-job-category gray-bg">
            <div class="container">
                <div class="col-md-9 col-sm-12">
                    <div class="full-card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 small-padd">
                                    <select class="selectpicker form-control" multiple title="Job Type">
                                        <option>Full Time</option>
                                        <option>Part Time</option>
                                        <option>Freelancer</option>
                                        <option>Internship</option>
                                    </select>
                                </div>
                                <div class="col-md-4 col-sm-4 small-padd">
                                    <select class="selectpicker form-control" multiple title="All Categories">
                                        <option>Teacher Jobs</option>
                                        <option>Consultant Jobs</option>
                                        <option>IT Jobs</option>
                                        <option>Sales Jobs</option>
                                        <option>Graphic Designer Jobs</option>
                                    </select>
                                </div>
                                <div class="col-md-4 col-sm-4 small-padd">
                                    <ol class="breadcrumb pull-right">
                                        <li><a href="#"><i class="fa fa-home"></i></a></li>
                                        <li><a href="#">Full Time</a></li>
                                        <li class="active">IT Jobs</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @foreach($congviecs as $congviec)
                            <article class="advance-search-job">
                                <div class="row no-mrg">
                                    <div class="col-md-6 col-sm-6">
                                        <a href="{{ route('home.chitiet',$congviec->id) }}" title="job Detail">
                                            <div class="advance-search-img-box"><img src="img/com-2.jpg" class="img-responsive" alt=""></div>
                                        </a>
                                        <div class="advance-search-caption"><a href="{{ route('home.chitiet',$congviec->id) }}" title="Job Dtail"><h4>{{ $congviec->tencongviec }}</h4></a><span>{{ $tencongty }}</span></div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="advance-search-job-locat">
                                            <p><i class="fa fa-map-marker"></i>@foreach($congviec->nganhnghe as $nganhnghe) {{ $nganhnghe->tennganh }},@endforeach</p>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-2"><a href="javascript:void(0)" data-toggle="modal" data-target="#apply-job" class="btn advance-search" title="apply">Apply</a></div>
                                    </div><span class="tg-themetag tg-featuretag">Premium</span>
                                </article>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <ul class="pagination">
                                {!! $congviecs->links() !!}
                            </ul>
                        </div>
                        <div class="row">
                            <div class="ad-banner"><img src="img/ad-banner-full.jpg" class="img-responsive" alt=""></div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="sidebar right-sidebar">
                            <div class="side-widget">
                                <h2 class="side-widget-title">Job Alert</h2>
                                <div class="job-alert">
                                    <div class="widget-text">
                                        <form>
                                            <input type="text" name="keyword" class="form-control" placeholder="Job Keyword">
                                            <input type="email" name="email" class="form-control" placeholder="Email ID">
                                            <button type="submit" class="btn btn-alrt">Add Alert</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="side-widget">
                                <h2 class="side-widget-title">Advertisment</h2>
                                <div class="widget-text padd-0">
                                    <div class="ad-banner"><img src="img/ad-banner.jpg" class="img-responsive" alt=""></div>
                                </div>
                            </div>
                            <div class="side-widget">
                                <h2 class="side-widget-title">Compensation</h2>
                                <div class="widget-text padd-0">
                                    <ul>
                                        <li><span class="custom-checkbox"><input type="checkbox" id="1"><label for="1"></label></span>Under $10,000<span class="pull-right">102</span></li>
                                        <li><span class="custom-checkbox"><input type="checkbox" id="2"><label for="2"></label></span>$10,000 - $15,000<span class="pull-right">78</span></li>
                                        <li><span class="custom-checkbox"><input type="checkbox" id="3"><label for="3"></label></span>$15,000 - $20,000<span class="pull-right">12</span></li>
                                        <li><span class="custom-checkbox"><input type="checkbox" id="4"><label for="4"></label></span>$20,000 - $30,000<span class="pull-right">85</span></li>
                                        <li><span class="custom-checkbox"><input type="checkbox" id="5"><label for="5"></label></span>$30,000 - $40,000<span class="pull-right">307</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="side-widget">
                                <h2 class="side-widget-title"><a href="#designation" data-toggle="collapse">Designation<i class="pull-right fa fa-angle-double-down" aria-hidden="true"></i></a></h2>
                                <div class="widget-text padd-0 collapse" id="designation">
                                    <ul>
                                        <li><span class="custom-checkbox"><input type="checkbox" id="1"><label for="1"></label></span>Web Designer<span class="pull-right">102</span></li>
                                        <li><span class="custom-checkbox"><input type="checkbox" id="2"><label for="2"></label></span>Php Developer<span class="pull-right">78</span></li>
                                        <li><span class="custom-checkbox"><input type="checkbox" id="3"><label for="3"></label></span>Project Manager<span class="pull-right">12</span></li>
                                        <li><span class="custom-checkbox"><input type="checkbox" id="4"><label for="4"></label></span>Human Resource<span class="pull-right">85</span></li>
                                        <li><span class="custom-checkbox"><input type="checkbox" id="5"><label for="5"></label></span>CMS Developer<span class="pull-right">307</span></li>
                                        <li><span class="custom-checkbox"><input type="checkbox" id="6"><label for="6"></label></span>App Developer<span class="pull-right">256</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="side-widget">
                                <h2 class="side-widget-title"><a href="#job-location" data-toggle="collapse">Location<i class="pull-right fa fa-angle-double-down" aria-hidden="true"></i></a></h2>
                                <div class="widget-text padd-0 collapse" id="job-location">
                                    <ul>
                                        <li><span class="custom-checkbox"><input type="checkbox" id="1"><label for="1"></label></span>Mohali<span class="pull-right">102</span></li>
                                        <li><span class="custom-checkbox"><input type="checkbox" id="2"><label for="2"></label></span>Chandigarh<span class="pull-right">78</span></li>
                                        <li><span class="custom-checkbox"><input type="checkbox" id="3"><label for="3"></label></span>Chennai<span class="pull-right">12</span></li>
                                        <li><span class="custom-checkbox"><input type="checkbox" id="4"><label for="4"></label></span>Delhi<span class="pull-right">85</span></li>
                                        <li><span class="custom-checkbox"><input type="checkbox" id="5"><label for="5"></label></span>Noida<span class="pull-right">307</span></li>
                                        <li><span class="custom-checkbox"><input type="checkbox" id="6"><label for="6"></label></span>Chhatisgarh<span class="pull-right">256</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="side-widget">
                                <h2 class="side-widget-title"><a href="#job-type" data-toggle="collapse">Job type<i class="pull-right fa fa-angle-double-down" aria-hidden="true"></i></a></h2>
                                <div class="widget-text padd-0 collapse" id="job-type">
                                    <ul>
                                        <li><span class="custom-checkbox"><input type="checkbox" id="1"><label for="1"></label></span>Full Time<span class="pull-right">102</span></li>
                                        <li><span class="custom-checkbox"><input type="checkbox" id="2"><label for="2"></label></span>Part Time<span class="pull-right">78</span></li>
                                        <li><span class="custom-checkbox"><input type="checkbox" id="3"><label for="3"></label></span>Internship<span class="pull-right">12</span></li>
                                        <li><span class="custom-checkbox"><input type="checkbox" id="4"><label for="4"></label></span>Freelancer<span class="pull-right">85</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endsection