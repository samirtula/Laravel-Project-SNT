@if ($errors->any())
    <div class="warning_wrapper">
        @foreach ($errors->all() as $error)
        <span class="warning">{{ $error }}. </span>
        @endforeach
    </div>
@endif

@if (session('success'))
    <div class="success_wrapper">
        <span class="success">{{session('success')}}.</span>
    </div>
@endif

@if (session('error'))
    <div class="success_wrapper">
        <span class="error_message">{{session('error')}}.</span>
    </div>
@endif
