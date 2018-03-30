@extends('layouts.app')

@section('content')
<h4>DevSquad</h4>
<div id="board">
  <board id="{{$board->id}}"></board>  
</div>
@endsection
