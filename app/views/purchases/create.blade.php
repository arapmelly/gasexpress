@extends('layouts.erp')
@section('content')

	
	<br><div class="row">
	<div class="col-lg-12">
  <h3>New Purchase</h3>

<hr>
</div>	
</div>

	



<div class="row">

	<div class="col-lg-5">
		
		

		 @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>        
            @endforeach
        </div>
        @endif



		<form class="form-horizontal" method="post" action="{{ URL::to('purchases')}}">



			<div class="form-group">
				<label class="control-label col-md-4">Item</label>
					<div class="col-md-5">
						<select name="item" id="item" class=" form-control">
							<option value="{{{ Input::old('item') }}}">{{{ Input::old('item') }}}</option>
							@foreach($items as $item)
							<option value="{{$item->id}}">{{$item->name." ".$item->description }}</option>
							@endforeach
						</select>
					</div>
			</div>

			

			<div class="form-group">
				<label class="col-md-4 control-label">Purchase Price</label> 
				<div class="col-md-8">
					<div class="input-group">
						<span class="input-group-addon">KES</span>
						<input type="text" class="form-control"  name="purchase_price" value="{{{ Input::old('purchase_price') }}}">
					</div>																			
				</div>
			</div>


			<div class="form-group">
				<label class="col-md-4 control-label">Selling Price</label> 
				<div class="col-md-8">
					<div class="input-group">
						<span class="input-group-addon">KES</span>
						<input type="text" class="form-control"  name="selling_price" value="{{{ Input::old('selling_price') }}}">
					</div>																			
				</div>
			</div>


			<div class="form-group">
				<label class="col-md-4 control-label">Quantity</label> 
				<div class="col-md-3"><input type="text" name="quantity" class="form-control" value="{{{ Input::old('quantity') }}}"></div>
			</div>


			<div class="form-group">
				<label class="control-label col-md-4">Type</label>
					<div class="col-md-5">
						<select name="status" id="status" class=" form-control">
							<option value="{{{ Input::old('status') }}}">{{{ Input::old('status') }}}</option>
							<option value="empty">Empty</option>
							<option value="full">Full</option>
						</select>
					</div>
			</div>


			<div class="form-group">
				<label class="control-label col-md-4">Source of funds</label>
					<div class="col-md-5">
						<select name="account" id="account" class=" form-control">
							<option value="{{{ Input::old('item') }}}">{{{ Input::old('item') }}}</option>
							@foreach($accounts as $account)
							<option value="{{$account->id}}">{{$account->name }}</option>
							@endforeach
						</select>
					</div>
			</div>


			<div class="form-actions clearfix"> <input type="submit" value="Save" class="btn btn-primary pull-right"> </div>


		</form>



	</div>	

</div>
@stop