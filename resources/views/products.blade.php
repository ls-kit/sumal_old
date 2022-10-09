@extends('shopify-app::layouts.default')
@section('styles')
<style>
    ul {
	display: flex;
	flex-flow: row wrap;
}
    ul li {
	flex-basis: 25%;
	list-style: none;
}
</style>

@endsection

@section('content')
    <!-- You are: (shop domain name) -->
    <p>You are: {{ $shopDomain ?? Auth::user()->name }}</p>
    <ul>
        <li>Image </li>
        <li>Title</li>
        <li>Ceated At</li>
        <li>Updated At</li>
    </ul>
    @foreach($products['products'] as $key => $product)
        <ul>
            <li><img src="{{$product->image['src'] }}" height="80px" width="80px" /></li>
            <li>{{$product->title }}</li>
            <li>{{$product->created_at }}</li>
            <li>{{$product->updated_at }}</li>
        </ul>
    @endforeach



@endsection