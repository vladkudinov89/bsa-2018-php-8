<!-- Write your code here -->
@extends('layout')

@section('title')
    {{$title}}
    @endsection

@section('content')

    <table id="example1" class="table table-bordered table-striped">
        @empty($currencies)
            <thead>
            <tr>
                <th>Имя</th>
                <th>Короткое имя</th>
                <th>Логотип</th>
                <th>Цена USD</th>
            </tr>
            </thead>
            <tbody>
            <tr>
        @endempty


            @forelse($currencies as $currency)
                <td><a href="{{route('currencies.show' , $currency['id']) }}">{{$currency->title}}</a>
                </td>
                <td>{{$currency->short_name}}</td>
                <td>
                    <img src="{{$currency->logo_url}}" alt="{{$currency->title}}">
                </td>
                <td>{{$currency->price}}</td>

                <td>
                    <a href="#"><ion-icon name="create"></ion-icon></a>

                    <button onclick="return confirm('Вы уверены?')" type="submit" class="delete">
                        <a class="fa fa-remove"></a><ion-icon name="close"></ion-icon>
                    </button>

                    {{--<form class="currency-delete-form" action="{{ route('currencies.destroy',$currency->id) }}" method="POST">--}}
                        {{--{{ csrf_field() }}--}}
                        {{--{{ method_field('DELETE') }}--}}
                        {{--<a class="btn edit-button" href="{{route('currencies.edit',$currency->id)}}">Edit</a>--}}
                        {{--<button class="btn red delete-button" type="submit" >Delete</button>--}}
                    {{--</form>--}}


                </td>
        </tr>
        @empty
            <p>No currencies</p>
        @endforelse
    </table>

@endsection
