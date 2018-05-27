@extends('search.template.app')
@section('title','Kết quả tìm kiếm ')
@section('content')
    <section class="brows-job-category">
        <div class="container">
            <div class="row extra-mrg">
                <div class="wrap-search-filter">
                    <form method="get" action="{{ route('home.search') }}">
                        <div class="col-md-7 col-sm-4">
                            <input name="kw" type="text" class="form-control" placeholder="Keyword: Name, Tag"
                                   value="{{ old('kw') }}"></div>
                        <div class="col-md-3 col-sm-3">
                            <select name="address" class="selectpicker form-control">
                                @foreach($address as $address)
                                    <option value="{{ $address->thanhpho_id }}"
                                            @if(old('address') == $address->thanhpho_id) selected @endif>{{ $address->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </form>
                </div>
            </div>
            @foreach($jops as $jop)
                <a href="{{ url('/jop/'.$jop->id) }}" class="item-click">
                    <article>
                        <div class="brows-job-list">
                            <div class="col-md-1 col-sm-2 small-padding">
                                <div class="brows-job-company-img"><img src="{{ asset($jop->employer_info->logo) }}" class="img-responsive" alt=""/>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-5">
                                <div class="brows-job-position">
                                    <h3>{{ $jop->jop_name }}</h3>
                                    <p><span>{{ $jop->position->position_name }}</span><span
                                                class="brows-job-sallery"><i
                                                    class="fa fa-money"></i>{{ $jop->salary_level->salary_level_name }}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="brows-job-location">
                                    <p><i class="fa fa-map-marker"></i>{{ $jop->address->name }}</p>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <div class="brows-job-type"><span class="full-time">Ứng tuyển</span></div>
                            </div>
                        </div>
                        <span class="tg-themetag tg-featuretag">Premium</span></article>
                </a>
            @endforeach
            <div class="row">
                <ul class="pagination">
                    {{ $jops->links() }}
                </ul>
            </div>
        </div>
    </section>
@endsection