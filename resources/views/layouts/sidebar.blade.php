@push('css')
  <style>
    .sidebar-box {
      box-shadow: 1px 1px 1px #eee, -1px -1px 1px #eee;
    }
    .categories {
      padding:10px;
    }
    .text-dark {
      color:#343a40 !important
    }
  </style>
@endpush

<div class="sidebar-box">
  <form action="{{ route('experiences') }}" class="search-form" method="get">
    <div class="form-group">
      <span class="icon fa fa-search"></span>
      <input type="text" class="form-control"
      title="" name="title" value="{{old('title')}}"
      placeholder="اكتب كلمة ودوس enter">
    </div>
  </form>
</div>

<div class="sidebar-box">
  <div class="categories text-right">
    <h3>الاقسام</h3>
    <li><a class="text-dark" href="{{route('experiences')}}">
      <span style="left:0;right:100%;"></span>
      <i class="fa fa-globe"></i>
      الكل</a></li>
    @foreach($sections as $section)
      <li><a class="text-dark" href="{{route('experiences')}}?SEARCH_BOX=1&section_id={{$section->id}}"><span style="left:0;right:100%;">({{ count($section->experience) }})</span>
        {!!  $section->icon !!} {{$section->name }} </a></li>
    @endforeach
  </div>
</div>

<div class="sidebar-box text-center">
  <h3 class="text-black text-center" >هل لديك تجربة مؤثرة ؟</h3>
  <p class="text-center">
      الحياة عبارة عن تجارب منها المفيد والمضر هدفنا
      عرض التجارب المفيدة لكي يخطوا الناس خطوها ويستفيدو منها
      وعرض التجارب الضارة لكي يتجنبها الناس ويحذروها .
  .</p>
  <a href="#" class="btn btn-primary btn-white">شارك الان</a>
</div>
