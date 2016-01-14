@extends('layouts.main')
@section('content')

	
	

	



<div class="row">

	<div class="col-lg-5">
		
		

		 @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>        
            @endforeach
        </div>
        @endif


        



		<form class="form-horizontal" method="post" action="{{ URL::to('orders/payment/'.$order->id)}}">


			<div class="form-group">
				<label class="col-md-4 control-label">Customer</label> 
				<div class="col-md-8"><input type="text" name="customer" class="form-control" value="{{ $order->customer->name}}" readonly></div>
			</div>

			<div class="form-group">
				<label class="col-md-4 control-label">Order Date</label> 
				<div class="col-md-8"><input type="text" name="order_date" class="form-control" value="{{$order->date}}" readonly></div>
			</div>

			<div class="form-group">
				<label class="col-md-4 control-label">Description</label> 
				<div class="col-md-8"><input type="text" name="quantity" class="form-control" value="{{$order->item }}" readonly></div>
			</div>


			<div class="form-group">
				<label class="col-md-4 control-label">Amount Due</label> 
				<div class="col-md-8">
					<div class="input-group">
						<span class="input-group-addon">KES</span>
						<input type="text" class="form-control"  name="amount_charged" value="{{$order->amount_charged - $order->amount_paid}}" readonly>
					</div>																			
				</div>
			</div>

			<hr>

			<div class="form-group">
				<label class="col-md-4 control-label">Payment Date</label> 
				<div class="col-md-8">
					<div class="input-group date " id="datepicker"  >
                    <input class="form-control"  type="text" name="date" value="{{ date('Y-m-d')}}" >
                    
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>

                
				</div>
			</div>

			

		
			


			

			<div class="form-group">
				<label class="col-md-4 control-label">Amount Paid</label> 
				<div class="col-md-8">
					<div class="input-group">
						<span class="input-group-addon">KES</span>
						<input type="text" class="form-control"  name="amount_paid" value="{{{ Input::old('amount_paid') }}}">
					</div>																			
				</div>
			</div>


			

			<div class="form-group">
				<label class="control-label col-md-4">Payment Account</label>
					<div class="col-md-6">

						
						<select name="payment_method" id="status" class=" form-control">


							<option value="{{{ Input::old('payment_method') }}}">{{{ Input::old('payment_method') }}}</option>

							@foreach($accounts as $account)
							<option value="{{$account->id}}">{{$account->name}}</option>
							@endforeach
						
						</select>
					</div>
			</div>



			



			<div class="form-actions clearfix"> <input type="submit" value="Save" class="btn btn-primary pull-right"> </div>


		</form>



	</div>	

</div>


           
@stop