<?php

class OrdersController extends \BaseController {

	/**
	 * Display a listing of orders
	 *
	 * @return Response
	 */
	public function index()
	{
		$orders = DB::table("orders")
		        ->join("order_details","orders.Order_id","=","order_details.Order_id")
		        ->join("clients","orders.customer","=","clients.id")
		        ->where("clients.type","=","Customer")
		        ->get();

		return View::make('orders.index', compact('orders'));
	}

	/**
	 * Show the form for creating a new order
	 *
	 * @return Response
	 */
	public function create()
	{

		$items = Item::all();
		$customers = Client::all();
		$locations = Location::all();
		return View::make('orders.create', compact('items', 'locations', 'customers'));
	}

	/**
	 * Store a newly created order in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
	$validation = array(
	'customer' =>'required',
	'date' => 'required');

	$validator = Validator::make(Input::all(), $validation);

    if ($validator->fails())
    {
        return Redirect::to('orders/create')->withErrors($validator);
    }else
    {


    	$postorder = Input::all();
    	$data = array(
    		'customer' =>$postorder['customer'] ,
    		'date' =>$postorder['date'] ,    	
    		'total_amount' =>$postorder['total_amount'],
    		'discount' =>$postorder['discount'] ,
    		'payable_amount' =>$postorder['payable_amount'],
    		'payment' =>$postorder['payment'] ,
    		'balance' =>$postorder['balance'],	


    	 );
    	$id = DB::table('orders')->insertGetId($data);

    	for($i=0; $i < count($postorder['product_id']); $i++)
    	{
    		
            
            $data_detail = array(

    		
    		'product_id' => $postorder['product_id'][$i],
    		'item' => $postorder['item'][$i],
    		'quantity' => $postorder['quantity'][$i],
    		'price' => $postorder['price'][$i],
    		'amount_charged' => $postorder['amount_charged'][$i],
    		'Order_id'=>$id,
            
    		


    		);
    		DB::table('order_details')->insert($data_detail);

    		$date = $postorder['date'];
    		$location = Location::findOrFail($postorder['location']); 

    		foreach ($data_detail as $item) {
    			$it = Item::findOrFail($postorder['item'][$i]);
    			$quantity = $postorder['quantity'][$i];

    			Stock::removeStock($it, $location, $quantity, $date);
    		}
    	
        }

    	return Redirect::route('orders.index')->with('success','Item Successfully Added');
    }
	}

	/**
	 * Display the specified order.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$order = Order::findOrFail($id);

		return View::make('orders.show', compact('order'));
	}

	/**
	 * Show the form for editing the specified order.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$items = Item::all();
		$customers = Client::all();
		$order = Order::findOrFail($id);

		return View::make('orders.edit', compact('items', 'customers', 'order'));
	}

	/**
	 * Update the specified order in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$order = Order::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Order::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$customer = Customer::findOrFail(Input::get('customer'));

		$order->date = Input::get('date');
		$order->item = Input::get('item');
		
		$order->quantity = Input::get('quantity');
		$order->customer()->associate($customer);
		$order->amount_charged = Input::get('amount_charged') * Input::get('quantity');
		$order->delivery_address = Input::get('delivery_address');
		$order->delivered = Input::get('delivered');
		$order->cancelled = Input::get('cancelled');
		$order->updated_by = Input::get('updated_by');
		$order->update();

		return Redirect::route('orders.index');
	}

	/**
	 * Remove the specified order from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$order = Order::findOrFail($id);

		



		$order->cancelled = TRUE;
		$order->update();


		return Redirect::route('orders.index');
	}


	public function payment($id){

		$order = Order::findOrFail($id);

		$accounts = Account::all();

		return View::make('orders.payment', compact('order', 'accounts'));
	}




	public function recordpayment($id){

		$order = Order::findOrFail($id);

		$order->amount_paid = Input::get('amount_paid');
		$order->update();


		$account = Account::findOrFail(Input::get('payment_method'));

		$amount = ($account->balance + Input::get('amount_paid'));

		$account->balance = $amount;
		$account->update();


		

		return Redirect::route('orders.index');
	}




	public function invoice($id){


		$order = Order::findOrFail($id);

		$pdf = PDF::loadView('pdf.invoice', compact('order'))->setPaper('a4')->setOrientation('portrait');;
 	
		return $pdf->stream('invoice.pdf');

	}




	/*new save codec*/


 public function save()
 {

	$validation = array(
	'customer' =>'required',
	'date' => 'required', 
	'delivery_address' =>'required');

	$validator = Validator::make(Input::all(), $validation);

    if ($validator->fails())
    {
        return Redirect::to('orders/create')->withErrors($validator);
    }else
    {


    	$postorder = Input::all();
    	$data = array(
    		'customer' =>$postorder['customer'] ,
    		'date' =>$postorder['date'] ,    	
    		'total_amount' =>$postorder['total_amount'],
    		'discount' =>$postorder['discount'] ,
    		'payable_amount' =>$postorder['payable_amount'],
    		'payment' =>$postorder['payment'] ,
    		'balance' =>$postorder['balance'],	


    	 );
    	$id = DB::table('orders')->insertGetId($data);

    	for($i=0; $i < count($postorder['product_id']); $i++)
    	{
    		
            
            $data_detail = array(

    		
    		'product_id' => $postorder['product_id'][$i],
    		'item' => $postorder['item'][$i],
    		'quantity' => $postorder['quantity'][$i],
    		'price' => $postorder['price'][$i],
    		'amount_charged' => $postorder['amount_charged'][$i],
    		'Order_id'=>$id,
            
    		


    		);
    		DB::table('order_details')->insert($data_detail);
    	
        }

    	return Redirect::route('orders/create')->with('success','Item Successfully Added');
    }




 }



}
