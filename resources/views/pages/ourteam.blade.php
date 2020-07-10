@extends("cactustmp")

@section("mainContent")
    <div class="breadcrumb-area breadcrumb-bg-3 bg-gray mt-150">
        <div class="container-fluid">
            <div class="breadcrumb-content breadcrumb-content-white text-center">
                <div class="breadcrumb-title">
                    <h2>Our team</h2>
                </div>
                <ul>
                    <li>
                        <a href="/">Home </a>
                    </li>
                    <li class="active"> Our team</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="our-team-area pt-90 pb-100">
        <div class="container-fluid p-0">
            <div class="section-title-paragraph text-center mb-45">
                <p> The smartest solution to any challenge is often a simple one. So use your common sense. Trust your colleagues’ good judgment. Don’t over-analyse, or complicate things with bureaucracy or hierarchy. It will slow down our speed.</p>
            </div>
            <div class="row no-gutters">
                @foreach($team as $t)
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="team-wrap">
                        <a href="{{$t->linkedin}}"><img src="assets/images/team/{{$t->team_pic}}" alt="{{$t->alt}}"></a>
                        <div class="team-content">
                            <h3><a href="#">{{$t->mem_name}}</a></h3>
                            <span>{{$t->position}}</span>
                            <div class="team-social">
                                <a href="{{$t->linkedin}}"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
