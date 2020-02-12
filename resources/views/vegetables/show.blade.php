@extends('layouts.app') 

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <a href="/"><h3>Назад</h3></a>
            <a href="/cart"><h3>Корзина</h3></a>
        </div>
        <div class="d-flex flex-column justify-content-center align-items-center">
        <vegetable-card
            vegetable-id="{{ $vegetable->id }}"
            name="{{ $vegetable->name }}"
            description="{{ $vegetable->description }}"
            price="{{ $vegetable->price }}"
        ></vegetable-card>
            {{-- <div class="card" style="width: 18rem;">
                <div class="card-body">
                <h5 class="card-title">{{ $vegetable->name }}</h5>
                  <p class="card-text">{{ $vegetable->description }}</p>
                  <a href="#" class="card-link">Card link</a>
                  <a href="/cart/store" class="card-link">Добавить в корзину</a>
                </div>
              </div> --}}
        </div>
    </div>
@endsection
