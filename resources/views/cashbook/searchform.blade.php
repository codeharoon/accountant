@extends('admin.layout')

@section('content')
<div class="container">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Search Form</h3>
        </div>
     
          <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('addcash')}}" class="btn btn-secondary mb-3 float-right">Add New</a>
                </div>
            </div>
            <form action="{{route('searchresult')}}" method="POST">
                @csrf
                    <div class="row">
                        <div class="col-md-2"><input type="date" class="form-control" name="date" id="date" placeholder="Date"></div>
                        <div class="col-md-2"><input type="text" class="form-control" name="account" id="account" placeholder="Account"></div>
                        <div class="col-md-2"><input type="text" class="form-control" name="header" id="header" placeholder="Header"></div>
                        <div class="col-md-2"><input type="text" class="form-control" name="detail" id="detail" placeholder="Detail"></div>
                        <div class="col-md-2"><input type="text" class="form-control" name="remarks" id="remarks" placeholder="Remarks"></div>
                        <div class="col-md-1"><input type="text" class="form-control" name="golbal" id="golbal" placeholder="Global"></div>
                        <div class="col-md-1"><button type="submit" class="btn btn-primary">Search</button></div>
                    </div>      
            </form>
            <div id="show_search_result">
           @if ($accounts)
           <div class="table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Date</th>
                  <th>Account</th>
                  <th>Header</th>
                  <th>Paid</th>
                  <th>Previous Amount</th>
                  <th>Total</th>
                  <th>Detail</th>
                  <th>Remarks</th>
                  <th>Attachment</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($accounts as $item)
                <tr>
                   <td>{{$item->id}}</td>
                   <td>{{$item->date}}</td>
                   <td style="text-transform: capitalize">{{$item->account}}</td>
                   <td>{{$item->header->name}}</td>
                   <td>{{$item->paid}}</td>
                   <td>{{$item->cash}}</td>
                   <td>{{$item->total}}</td>
                   <td>{{$item->detail->name}}</td>
                   <td>{{$item->remarks}}</td>
                   <td><img width="70px" height="70px" src="{{ asset('storage/'.$item->Attachment) }}" alt=""></td>
                   <td><a href="{{route('deleterecord',$item->id)}}" class="btn btn-danger">Delete</a></td>
                 </tr> 
                @endforeach
              </tbody>
            </table>
          </div>
                
           @endif
            </div>
          </div>
        
      </div>

</div>

@endsection

@section('script_code')

@endsection