@extends('layouts.app')

@section('content')
<div class="row">
   <div class="col-12 d-flex justify-content-center p-3">
        <div class="row">
            <h1>Agora Call</h1>
            <div class="col-12">
                <form action="{{route('submitForm')}}" id="customForm" method="POST">
                    @csrf
                    <div class="row d-flex justify-content-around" id="bottomBox">
                       
                        <input type="submit" value="Create" name="submitButton" id="create" class="p-3 m-1 btn btn-success form-control shadow col-6 d-flex">
                        <br><br>                          
                        <button type="button" class="btn btn-warning form-control shadow col-6 d-flex p-3 m-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Join
                        </button>
                    </div>
                </form>

            </div>
           
        </div>
    </div>
</div>

<!-- //Join Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Join Room</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                <form action="{{route('submitForm')}}" id="customForm" method="POST">
                    @csrf
                    <div class="row d-flex justify-content-around" id="bottomBox">
                        <label class="form-label">User Name</label>
                        <input type="text" class="form-control" name="userName">

                        <label class="form-label">Room Uuid</label>
                        <input type="text" class="form-control" name="roomUUid">

                        <input type="submit" value="Join" name="submitButton" id="join" class="btn btn-primary form-control w-25 btn-sm shadow col-6 d-flex">
                                                    
                    </div>
                </form>
      </div>
    </div>
  </div>
</div>

@endsection
