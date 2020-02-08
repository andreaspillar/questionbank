@extends('banklayouts')
@section('apps')
  <table>
    @foreach($questionset as $set)
    <tr>
      <td>{{$set->sets_name}}</td>
      <td><a href="{{route('sets.geturl',$set->id_set)}}">Link</a></td>
    </tr>
    @endforeach
  </table>
@endsection
