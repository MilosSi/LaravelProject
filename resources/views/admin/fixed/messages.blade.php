
    <div class="container d-flex justify-content-center">
    @if($errors->any())
            <div class="alert alert-danger text-center">
                @foreach($errors->all() as $error)
                    {{$error}}<br>
                @endforeach
            </div>
    @endif

    @if(session('success'))

            <div class="alert alert-success text-center">
                {{session('success')}}
            </div>

    @endif

    @if(session('error'))

            <div class="alert alert-danger text-center">
                {{session('error')}}
            </div>

    @endif
</div>
