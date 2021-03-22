@if ($errors->any())
    <div class="warning_wrapper" style="margin-bottom: 50px">
        @foreach ($errors->all() as $error)
        <span class="warning">{{ $error }}. </span>
        @endforeach
    </div>
@endif

@if (session('success'))
    <div class="success_wrapper" style="margin-bottom: 50px">
        <span class="success">{{session('success')}}.</span>
    </div>
@endif

