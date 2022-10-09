@extends('shopify-app::layouts.default')

@section('content')
    <!-- You are: (shop domain name) -->
    <p>You are: {{ $shopDomain ?? Auth::user()->name }}</p>
    <div class="check-cart">
        <a href="#">
            <button class="atc">Add to cart</button>
        </a>
    </div>

    <input type="checkbox" name="test" value="{{isset($data) ? $data['status']:0 }}" {{isset($data) && $data['status'] == 1 ? 'checked':'' }} >
    <span class="slider round"></span>
@endsection

@section('scripts')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        actions.TitleBar.create(app, { title: 'Welcome' });

        $("input[name=test]").on('change',function(){
            if($(this).val() == 0){
                $(this).val(1);
            }
            else{
                $(this).val(0);
            }

            $.ajax({
                url:"{{ route('btn.toggler')}}",
                method:'post',
                data: {status:$(this).val()}
            });
        });

    </script>

@endsection
