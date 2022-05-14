@if( $data['pagination'] > 1)
@php
    $currentPage = $_GET['page'] ?? 1;
    $prevPage = $currentPage > 1 ? $currentPage-1 : false;
    $nextPage = $currentPage < $data['pagination'] ? $currentPage+1 : false;
@endphp
    <div class="content-footer__container">
        <ul class="page-nav">

            @if ($prevPage)
                @php
                    $prevArr = [];
                    if($prevPage > 1){
                        $prevArr['page'] = $prevPage;
                    }
                    if(!empty($data['search'])){
                        $prevArr['search'] = $data['search'];
                    }
                @endphp
                <li class="page-nav__item">
                    <a href="{{ !empty($prevArr) ? '/?'.http_build_query($prevArr) : '/' }}" class="page-nav__item__link"><i class="fa fa-angle-double-left"></i></a>
                </li>
            @endif

            @for ($i = 1; $i <= $data['pagination']; $i++)
                @php
                    $curArr = [];
                    if($i > 1){
                        $curArr['page'] = $i;
                    }
                    if(!empty($data['search'])){
                      $curArr['search'] = $data['search'];
                    }
                @endphp
                <li class="page-nav__item">
                    <a href="{{ !empty($curArr) ? '/?'.http_build_query($curArr) : '/' }}" class="page-nav__item__link">{{ $i }}</a>
                </li>
            @endfor

            @if ($nextPage)
                @php
                    $nextArr = [
                        'page' => $nextPage
                    ];
                    if(!empty($data['search'])){
                      $nextArr['search'] = $data['search'];
                    }
                @endphp
                <li class="page-nav__item">
                    <a href="{{ '/?'.http_build_query($nextArr) }}" class="page-nav__item__link">
                        <i class="fa fa-angle-double-right"></i>
                    </a>
                </li>
            @endif
        </ul>
    </div>
@endif
