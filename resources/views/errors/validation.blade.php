@if(Session::has('flash_success'))
<div class="card text-white bg-success" role="alert">
    <div class="card-body">
        {{ Session::get('flash_success')}}
    </div>
</div>
@endif

@if(Session::has('flash_warning'))
    <div class="card text-white bg-warning" role="alert">
        <div class="card-body">
            {!! Session::get('flash_warning') !!}
        </div>
    </div>
@endif

@if(Session::has('flash_error'))
<div class="card text-white bg-danger" role="alert">
    <div class="card-body">
        {!! Session::get('flash_error') !!}
    </div>
</div>
@endif

<!-- Display Validation Errors -->
@if($errors->any())
<div class="card text-white bg-danger" role="alert">
    <div class="card-body">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
</div>
@endif
