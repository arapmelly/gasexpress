@extends('layouts.erp')

@section('content')

<form action="{{{ URL::to('orders') }}}" method="POST">
<table id="members" class="table table-condensed table-bordered table-hover">	
<tbody>

<tr>

<div class="row">
    <div class="col-lg-12">
  <h4><font color = 'blue'>New Order</font></h4>

<hr>
</div>  
</div>  

    
<br/>

<div class="row">
    <div class="col-lg-12">

    
        
         @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>        
            @endforeach
        </div>
        @endif

        @if (Session::has('success'))
        <div class="alert alert-success">
                {{ Session::get('success') }}<br>        
        </div>
        @endif

         

            <div class="row">
            <div class="col-lg-4">

                 <fieldset>
                    <div class="form-group">

                    <label class="col-md-4 control-label">Order Date</label> 
                        
                        
                        <div class="col-md-8">
                    <div class="input-group date " id="datepicker"  >
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    <input class="form-control"  type="text" name="date" value="{{ date('Y-m-d')}}" >
                    
                    
                </div>

                
                </div>




                
                    </div>

                    <br/>
                    <br/>
                    <br/>
                    <div class="form-group">
                <label class="control-label col-md-4">Customer</label>
                    <div class="col-md-8">

                            
                        <select name="customer" id="customer" class=" form-control">


                            <option value="{{{ Input::old('customer') }}}">{{{ Input::old('customer') }}}</option>

                            @foreach($customers as $customer)
                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                            @endforeach
                        </select>
                    </div>
            </div>

            <br/>
                    <br/>
                    <br/>

            <div class="form-group">
                <label class="control-label col-md-4">Store Location</label>
                    <div class="col-md-8">

                            
                        <select name="location" id="location" class=" form-control">


                            <option value="{{{ Input::old('location') }}}">{{{ Input::old('location') }}}</option>

                            @foreach($locations as $location)
                            <option value="{{$location->id}}">{{$location->name}}</option>
                            @endforeach
                        </select>
                    </div>
            </div>
                </fieldset>

            </div>


        </tr>
    </table>
<br/>


<div id="tablediv">
    
    <table id="tabledata" border="1">
        <thead>
            <tr>
            <th>No</th>            
            <th>Item</th>
            <th >Product ID</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Amount</th>
            <th colspan = "2">Action</th>
            </tr>
        </thead>
            
        </tr>
        <tbody>
        <tr>
            
                            
                            <td class="td">1</td> 
                            <td class="td">
                                <select name="item[]" id="pid" style="width:180px">
                                    @foreach($items as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach

                                </select>
                            </td>                          
                            <td class="td" ><input type="text" name="product_id[]" class="item" id="itemid" style="width:100px"/></td>
                            <td class="td" ><input type="text" name="quantity[]" style="width:100px" class="quantity" id="quantity" onblur="findTotal()" onkeypress="total()" onkeyup="total()"/></td>
                            <td class="td" ><input type="text" name="price[]" style="width:150px" class="price" id="price" onblur="findTotal()" onkeypress="total()" onkeyup="total()"/></td>
                            <td class="td" ><input type="text" readonly="readonly" name="amount_charged[]" style="width:200px" id="amount_charged"  class="amount_charged" value="{{{ Input::old('total') }}}"/></td>
            <td><input type="button" id="delbutton" value="Delete" onclick="deleteRow(this)"/></td>
            <td><input type="button" id="addmorebutton" value="Add Item" onclick="insRow()"/></td>
        </tr>






        </tbody>
    </table>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <br/>
<br/>




<table>

<tr>

 <div class="form-group">
                <label class="col-md-2 control-label">Total Amount</label> 
                <div class="col-md-2"><input type="text" name="total_amount" id="total_amount" class="form-control" value="{{{ Input::old('delivery_address') }}}" readonly></div>
            </div>
</tr>
<br/>


<tr>

 <div class="form-group">
                <label class="col-md-2 control-label">Discount</label> 
                <div class="col-md-2"><input type="text" name="discount" id = "discount" class="form-control" onkeyup="Discount()" onkeypress = "Discount()" value="{{{ Input::old('delivery_address') }}}"></div>
            </div>
</tr>
<br/>

<tr>

 <div class="form-group">
                <label class="col-md-2 control-label">Payable Amount</label> 
                <div class="col-md-2"><input type="text" id = "payable_amount" name="payable_amount" class="form-control" value="{{{ Input::old('delivery_address') }}}" readonly></div>
            </div>
</tr>
<br/>

<tr>

 <div class="form-group">
                <label class="col-md-2 control-label">Payment</label> 
                <div class="col-md-2"><input type="text" id="payment" name="payment" onkeyup="Balance()" onkeypress = "Balance()" class="form-control" value="{{{ Input::old('delivery_address') }}}"></div>
            </div>
</tr>
<br/>

<tr>

 <div class="form-group">
                <label class="col-md-2 control-label">Balance</label> 
                <div class="col-md-2"><input type="text" id="balance" name="balance" class="form-control" value="{{{ Input::old('delivery_address') }}}" readonly></div>
            </div>
</tr>

</table>
<br/>
<br/>


<p></p>
    <p></p>
    <p></p>


<table align="center">

    <tr>

            <td><input type="submit" id="addbutton" value="ACCEPT" class = "btn-success" style="border-radius:15px"/></td>
        </tr>
</table>

</tbody>

</table>
</form>
           
@stop





<script type="text/javascript">

function deleteRow(row)
{
    var i=row.parentNode.parentNode.rowIndex;
    document.getElementById('tabledata').deleteRow(i);
}
 
 
function insRow()
{
    console.log( 'hi');
    var x=document.getElementById('tabledata');
    var new_row = x.rows[1].cloneNode(true);
    var len = x.rows.length;
    new_row.cells[0].innerHTML = len;
 
   

    var item = new_row.cells[2].getElementsByTagName('input')[0];
    item.id += len;
    item.value = '';

    var quantity = new_row.cells[3].getElementsByTagName('input')[0];
    quantity.id += len;
    quantity.value = '';
    quantity.onkeyup = function(){new_row.cells[5].getElementsByTagName('input')[0].value = price.value * quantity.value};
    quantity.onkeypress = function(){new_row.cells[5].getElementsByTagName('input')[0].value = price.value * quantity.value};
    

    var price = new_row.cells[4].getElementsByTagName('input')[0];
    price.id += len;
    price.value = '';
    price.onkeyup = function(){new_row.cells[5].getElementsByTagName('input')[0].value = price.value * quantity.value};
    price.onkeypress = function(){new_row.cells[5].getElementsByTagName('input')[0].value = price.value * quantity.value};

    var amt = new_row.cells[5].getElementsByTagName('input')[0];
    amt.id  = 'amount_charged';
    amt.value = '';
    x.appendChild( new_row );

}


function total() {
      var itmprice = document.getElementById("price").value;
      var itmquantity = document.getElementById("quantity").value;
      var totalamt = (itmprice * itmquantity);
      document.getElementById("amount_charged").value = totalamt;
}



function findTotal(){
    var arr = document.getElementsByName('amount_charged[]');
    var tot=0;
    for(var i=0;i<arr.length;i++){
        if(parseInt(arr[i].value))
            tot += parseInt(arr[i].value);
    }
    document.getElementById('total_amount').value = tot;
}


function Discount() {
      var totamt = document.getElementById("total_amount").value;
      var itmdiscount = document.getElementById("discount").value;
      var payable_amt = (totamt - itmdiscount);      
      document.getElementById("payable_amount").value = payable_amt;
}

function Balance() {
      var itmpayableamt = document.getElementById("payable_amount").value;
      var itmpayment = document.getElementById("payment").value;
      var itmbalance = (itmpayableamt - itmpayment);      
      document.getElementById("balance").value = itmbalance;
}

</script>


