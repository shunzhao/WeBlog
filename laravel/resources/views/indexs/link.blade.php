@extends('layouts.index')
@section('title')左邻右舍 - {{ $Web->title }}@endsection
@section('keywords')左邻右舍,{{ $Web->title }}@endsection
@section('description')左邻右舍是{{ $Web->title }}友情的见证。请多多关照。@endsection
@section('content')
<h2 style="text-align: center;color: #9ACD32">左邻右舍</h2>
<div class="weui-grids">
    @foreach($data as $row)
        <a href="{{ $row->url }}" class="weui-grid">
            <div class="weui-grid__icon">
                <img src="uploads/{{ $row->logo }}" alt="{{ $row->title }}">
            </div>
            <p class="weui-grid__label">
                {{ $row->title }}
            </p>
        </a>
   @endforeach
</div>
@endsection
@section('tj'){{ $Web->tj }}@endsection