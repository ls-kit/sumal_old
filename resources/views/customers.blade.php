@extends('shopify-app::layouts.default')

@section('styles')

<style>
    ul {
	display: flex;
	flex-flow: row wrap;
}
    ul li {
	flex-basis: 20%;
	list-style: none;
}
</style>

@endsection

@section('content')

    <ul>
        <li>ID</li>
        <li>Email</li>
        <li>First Name</li>
        <li>Last Name</li>
        <li>Created At</li>
    </ul>

    @foreach($customers['customers'] as $key => $customer)

    <ul>
        <li>{{$customer->id }}</li>
        <li>{{$customer->email }}</li>
        <li>{{$customer->first_name }}</li>
        <li>{{$customer->last_name }}</li>
        <li>{{$customer->created_at }}</li>
        
    </ul>

    @endforeach

@endsection





@section('scripts')

    @parent

    <script>
        actions.TitleBar.create(app, { title: 'Customers' });
    </script>

@endsection