@extends('layouts.app') 

@section('content')
    <div class="container">
        <ul class="list-group">
            @foreach($vegetables as $vegetable)
            <a
                href="/{{ $vegetable->id }}"
                class="list-group-item list-group-item-action flex-column align-items-start active mb-5"
            >
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{ $vegetable-> name}}</h5>
                    <h5>{{ $vegetable -> price}} Сом</h5>
                </div>
            </a>
            @endforeach
        </ul>
    </div>
@endsection
