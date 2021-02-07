
@extends('frontend.layouts.master')
@section('title','LaravelTest')
@section('content')
      <!--from for insert text-->
      <form method="POST">
        {{ csrf_field() }}
        輸入文字: <input type ="text" name="userText" >
        <input type ="reset">
        <input type = "submit" value = "→">
    </form>

     <!--from for delete single text-->
     <form  method="POST">
        {{ csrf_field() }}
        輸入ID: <input type ="number" style ="width :30px" name="delId" >
        <input type = "submit" value="刪除">
    </form>

    

    @include('backend.layouts.mySql')
    <!--form for truncate-->
    <form  method="POST">
        {{ csrf_field() }}
        <input type = "submit" value="清空" name="submit">
    </form>
@endsection
