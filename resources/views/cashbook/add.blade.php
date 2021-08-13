@extends('admin.layout')

@section('content')

<!-- Button trigger modal -->

<!-- header Modal -->

<div class="modal fade" id="headermodal" tabindex="-1" role="dialog" aria-labelledby="headermodalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="headermodalLabel">Add Header</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="{{route('addheader')}}" method="post">
             @csrf
             <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Header name">
            </div>
                <button type="submit" class="btn btn-primary">Save</button>
          </form>
      </div>
    </div>
  </div>
</div>

{{-- cash modal --}}

<div class="modal fade" id="cashmodal" tabindex="-1" role="dialog" aria-labelledby="headermodalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="headermodalLabel">Add Cash</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="{{route('addcash')}}" method="post">
             @csrf
             <div class="form-group">
                <label for="cash">Cash Here</label>
                <input type="text" class="form-control" id="cash" name="cash" placeholder="Enter Cash">
            </div>
            {{-- <div class="form-group">
              <label for="bankcash">Bank Cash</label>
              <input type="text" class="form-control" id="bankcash" name="bankcash" placeholder="Enter Bank Cash">
            </div> --}}

            <div class="form-group">
              <label for="name">Account</label>
              <select name="name" id="name" class="form-control" >
                <option value="0">Select</option>
                @foreach ($cash as $item)
                  <option value="{{$item->name}}">{{$item->name}}</option>
                @endforeach
              </select>
            </div>

                <button type="submit" class="btn btn-primary">Save</button>
          </form>
      </div>
    </div>
  </div>
</div>

{{-- loan modal --}}

<div class="modal fade" id="loanmodal" tabindex="-1" role="dialog" aria-labelledby="headermodalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="headermodalLabel">Add Loan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="{{route('loancash')}}" method="post">
             @csrf
             <div class="form-group">
              <label for="provider">Name</label>
              <input type="text" class="form-control" id="provider" name="provider" placeholder="Enter Name">
            </div>
             <div class="form-group">
                <label for="loan">Loan</label>
                <input type="text" class="form-control" id="loan" name="loan" placeholder="Enter Cash">
            </div>
            <div class="form-group">
              <label for="name">Account</label>
              <select name="name" id="name" class="form-control" >
                <option value="0">Select</option>
                @foreach ($cash as $item)
                  <option value="{{$item->name}}">{{$item->name}}</option>
                @endforeach
              </select>
            </div>

                <button type="submit" class="btn btn-primary">Save</button>
          </form>
      </div>
    </div>
  </div>
</div>

{{-- Detail Modal --}}

<div class="modal fade" id="detailmodal" tabindex="-1" role="dialog" aria-labelledby="headermodalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="headermodalLabel">Add Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="{{route('adddetail')}}" method="post">
             @csrf
            <div class="form-group">
                <label for="detail">Detail</label>
                <input type="text" class="form-control" id="detail" name="detail" placeholder="Enter Detail">
            </div>
              <button type="submit" class="btn btn-primary">Save</button>
          </form>
      </div>
    </div>
  </div>
</div>


{{-- Account modal --}}

<div class="modal fade" id="accountmodal" tabindex="-1" role="dialog" aria-labelledby="headermodalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="headermodalLabel">Add Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="{{route('addaccount')}}" method="post">
             @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
            </div>
            <div class="form-group">
              <label for="cash">Cash</label>
              <input type="text" class="form-control" id="cash" name="cash" placeholder="Enter Cash">
            </div>
              <button type="submit" class="btn btn-primary">Save</button>
          </form>
      </div>
    </div>
  </div>
</div>



<div class="container">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Add New</h3>
          <div class="float-right">
            <P>Total Cash: <span id="display_total_cash">@if (!$cash->isEmpty()) {{$cash[0]->cash_here}} @endif</span></P>
            {{-- <P>Bank Cash: <span id="display_bank_cash">@if (!$cash->isEmpty()) {{$cash[0]->bank_cash}} @endif</span></P> --}}
          </div>
        </div>
        <div class="row">
            <div class="col-md-12">
              <button class="btn btn-primary float-right mt-2" style="margin-top: 1px width:50px" data-toggle="modal" data-target="#headermodal">Add Header</button>
              <button class="btn btn-primary float-right mt-2 mr-2" style="margin-top: 1px width:50px" data-toggle="modal" data-target="#cashmodal">Add Cash</button>
              <button class="btn btn-primary float-right mt-2 mr-2" style="margin-top: 1px width:50px" data-toggle="modal" data-target="#loanmodal">Add Loan</button>
              <button class="btn btn-primary float-right mt-2 mr-2" style="margin-top: 1px width:50px" data-toggle="modal" data-target="#detailmodal">Add Detail</button>
              <button class="btn btn-primary float-right mt-2 mr-2" style="margin-top: 1px width:50px" data-toggle="modal" data-target="#accountmodal">Add Account</button>
            </div>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('storecash')}}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="card-body">
            <div class="form-group">
                <label for="account">Date</label>
                <input type="date" class="form-control" id="date" name="date">
            </div>
            <div class="form-group">
              <label for="account">Account</label>
              <select name="account" id="account" class="form-control" onchange="showaccount(this.value)">
                <option value="0">Select</option>
                @foreach ($cash as $item)
                  <option value="{{$item->name}}">{{$item->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="header">Header</label>
                    <select class="form-control" name="header" id="header">
                      <option value="0">Select</option>
                      @foreach ($header as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                      @endforeach
                    </select>
            </div>
            <div class="form-group">
                <label for="header">Datail</label>

                <select class="form-control" name="datail" id="datail">
                  <option value="0">Select Detail</option>
                  @foreach ($details as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>
                  @endforeach
                </select>
              </div>
            <div class="form-group">
                <label for="paid">Paid</label>
                <input type="text" class="form-control" id="paid" name="paid" placeholder="Enter Paid" oninput="changeTotal()">
            </div>
            <div class="form-group">
                <label for="remarks">Remarks</label>
                <input type="text" class="form-control" id="remarks" name="remarks" placeholder="Enter Remarks">
            </div>
            <input type="hidden" class="form-control" id="total_cash" name="total_cash" value="@if (!$cash->isEmpty()) {{$cash[0]->cash_here}} @endif">
            <div class="form-group">
                <label for="total">Total</label>
                <input type="text" class="form-control" id="total" name="total" readonly placeholder="Total">
            </div>
            <div class="form-group">
                <img id="output" style="width:70px;height:70px"/><br><br>
                <label for="attachment">Attachment</label>
                <input type="file" class="form-control" id="attachment" name="attachment" onchange="loadFile(event)">
            </div>
          
          </div>
          <!-- /.card-body -->
    
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>

</div>


@endsection

@section('script_code')
<script>
    var loadFile = function(event) {
      var reader = new FileReader();
      reader.onload = function(){
        var output = document.getElementById('output');
        output.src = reader.result;
      };
      reader.readAsDataURL(event.target.files[0]);
    };
  </script>
  
  <script>
      function changeTotal(){
        console.log('this is me');
          const paidvalue=document.getElementById('paid').value;
          const totalcash=document.getElementById('total_cash').value;
          const total=document.getElementById('total');
          let totalvalue=totalcash-paidvalue;
          total.value=totalvalue;
      }
  </script>

  <script>
    function showaccount(value){
      const p_id=document.getElementById('display_total_cash');
      const b_cash=document.getElementById('display_bank_cash');
      const hiddeninput=document.getElementById('total_cash');
      var cures =@php echo json_encode( $cash ); @endphp;
      cures.forEach(element => {
        if(element.name.toLowerCase().includes(value.toLowerCase())){
          p_id.innerHTML=element.cash_here;
          b_cash.innerHTML=element.bank_cash;
          hiddeninput.value=element.cash_here;
        }
      });
    }
  </script>
@endsection