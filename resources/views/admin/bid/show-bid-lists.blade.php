@extends('admin.layouts.admin-app')
@section('title', 'View Products')
@section('content')

@if(Session::has('success'))
    <h4 style="color: red;">{{Session::get('success')}}</h4>
@endif

<div class="row">
    <div class="col-md-2">
    <h4>Select Product</h4>
        <select class="form-control" id="mySelect" onchange="myFunction()">
        <option value=1>Select Product Name</option>
                    @foreach($products as $key => $value)
                        @if($value->isSold == 0)
                        <option value="{{$value->id}}">{{$value->name}}</option>
                        @endif
                    @endforeach   
        </select>
        <button class="btn btn-success mt-2 mb-3" id="calculateBidder">Send To Highest Bidder</button>

    <button class="btn btn-primary mt-2 mb-3" id="btnReset">Reset</button>
    </div>
    <div class="col-md-9">
      <table class="table table-striped table-dark">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">User</th>
            <th scope="col">Amount</th>
            <th scope="col">Bidding Date</th>
            </tr>
        </thead>
        <tbody>
                @foreach($bid as $key => $val)
                    @if(!$val->isSold)

                       <?php $user = $val->userBid; ?>
                        @foreach($user as $ukey => $uval)
                        <tr> 
                             <td>{{$uval->pivot->id}}</td>
                             <td>{{$uval->name}}</td>
                            <td>{{$uval->pivot->amount}}</td>
                            <td>{{$uval->pivot->created_at}}</td>
                        </tr>
                        @endforeach
                    @endif
                @endforeach
        </tbody>
        </table>
   </div>
</div>

<script>
function loadData(e) {
    window.location.href = 'http://e-auct.com/admin/show-bid-lists/' + e.target.value
}
document.querySelector('#mySelect').onchange = loadData;

function resetData(e) {
    window.location.href = 'http://e-auct.com/admin/show-bid-lists/'
}
document.querySelector('#btnReset').onclick = resetData;


function calcBid(e) {
    let locArr = window.location.href.split('/');
    let len = locArr.length;
    window.location.href = 'http://e-auct.com/admin/send-item-to-highest-bidder/' + locArr[len-1]; 
}
document.querySelector('#calculateBidder').onclick = calcBid;
</script>
@endsection