@extends('search.template.app')
@section('title','Kết quả tìm kiếm ')
@section('content')

 @php
        function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'năm',
        'm' => 'tháng',
        'w' => 'tuần',
        'd' => 'ngày',
        'h' => 'giờ',
        'i' => 'phút',
        's' => 'giây',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' trước' : 'Vừa xong';
}
    @endphp

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
                            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                        </div>
                    </form>
                </div>
            </div>
            @foreach($jops as $jop)
                <a href="{{ route('home.detail', $jop->id) }}" class="item-click">
                    <article>
                        <div class="brows-job-list">
                            <div class="col-md-1 col-sm-2 small-padding">
                                <div class="brows-job-company-img"><img src="{{ asset('/'.$jop->getlogo->logo) }}" class="img-responsive img-circle" alt=""/>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-5">
                                <div class="brows-job-position">
                                    <h3>{{ $jop->ten_cong_viec }}</h3>
                                    <p>Vốn điều lệ: <span>{{ $jop->von_dieu_le }} Triệu</span><span
                                                class="brows-job-sallery"><i
                                                    class="fa fa-money"></i>{{ $jop->thoi_gian_bao_gia }}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="brows-job-location">
                                    <p><i class="fa fa-map-marker"></i>{{ $jop->diadiem->name }}</p>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <div class="brows-job-type"><span class="full-time">Ứng tuyển</span></div>
                            </div>
                        </div>
                        <span class="tg-themetag tg-featuretag">{{time_elapsed_string($jop->created_at)}}</span></article>
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