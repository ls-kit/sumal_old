@extends('shopify-app::layouts.default')

@section('content')
    @php
        // dd(request());
    @endphp
    <a href="{{ route('public.home') }}">Home</a>
    <a href="{{ url('/tickets/create') }}">Home</a>
    <!-- You are: (shop domain name) -->
    <p>You are: {{ $shopDomain ?? Auth::user()->name }}</p>
    <div class="check-cart">
        <a href="#">
            <button class="atc">Add to cart</button>
        </a>
    </div>
    {{-- @if (auth()->user()->name != $setting->shop_id) --}}
        <button onclick="setupTheme()">Make File</button>
    {{-- @endif --}}

    <input type="checkbox" name="test" value="{{ isset($data) ? $data['status'] : 0 }}"
        {{ isset($data) && $data['status'] == 1 ? 'checked' : '' }}>
    <span class="slider round"></span>
@endsection

@section('scripts')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        actions.TitleBar.create(app, {
            title: 'Welcome'
        });

        $("input[name=test]").on('change', function() {
            if ($(this).val() == 0) {
                $(this).val(1);
            } else {
                $(this).val(0);
            }

            $.ajax({
                url: "{{ route('btn.toggler') }}",
                method: 'post',
                data: {
                    status: $(this).val()
                }
            });
        });

        function setupTheme() {
            axios.post('configure-theme')
                .then(function(response) {
                    console.log(response);
                })
                .catch(function(error) {
                    console.log(error);
                });
        }
    </script>
@endsection
