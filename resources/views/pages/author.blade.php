@extends("cactustmp")

@section("mainContent")

    <div class="breadcrumb-area breadcrumb-bg-3 bg-gray mt-150">
        <div class="container-fluid">
            <div class="breadcrumb-content breadcrumb-content-white text-center">
                <div class="breadcrumb-title">
                    <h2>Author</h2>
                </div>
                <ul>
                    <li>
                        <a href="/">Home </a>
                    </li>
                    <li class="active"> About Us</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                    <img src="assets/images/autor.jpg" alt="team" style="width: 100%;">
            </div>
            <div class="col-md-7">
                <div class="team-details-content text-center">
                    <h2>Miloš Simić</h2>
                    <span>Web Developer</span>

                    <p>This site is done as a project for the subject of Web Programing PHP 2. Hope you liked it! For more information about me click on my linkedin profile</p>
                    <div class="team-details-social">
                        <a href="https://www.linkedin.com/in/milossimic1603/"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection
