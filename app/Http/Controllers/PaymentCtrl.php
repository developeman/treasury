<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Securities;
use Redirect;
use Auth;
use App\orders;
use Paypal;
use Session;

class PaymentCtrl extends Controller {
	private $_apiContext;

    public function __construct()
    {
        $this->_apiContext = Paypal::ApiContext(
            config('services.paypal.client_id'),
            config('services.paypal.secret'));

        $this->_apiContext->setConfig(array(
            'mode' => 'sandbox',
            'service.EndPoint' => 'https://api.sandbox.paypal.com/',
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => storage_path('logs/paypal.log'),
            'log.LogLevel' => 'FINE'
        ));
       
    }
    public function getCheckout($type,$id)
	{
    
	if($type==0){
		$sec = Securities::find($id);
        if (!$sec) {
           abort(503);
        }
	}else{
        abort(503);
    }

    Session::put('ItemType', $type);
    Session::put('ItemId', $id);
	$payer = PayPal::Payer();
    $payer->setPaymentMethod('paypal');


    $amount = PayPal:: Amount();
    $amount->setCurrency('USD');
    $amount->setTotal($sec->price); // This is the simple way,
    // you can alternatively describe everything in the order separately;
    // Reference the PayPal PHP REST SDK for details.


    $redirectUrls = PayPal:: RedirectUrls();
    $redirectUrls->setReturnUrl(url('success'));
    $redirectUrls->setCancelUrl(url('cancel'));

    $item1 = PayPal::item();
    $item1->setName($sec->name)
    ->setCurrency('USD')
    ->setQuantity(1)
    ->setSku($sec->id) // Similar to `item_number` in Classic API
    ->setPrice($sec->price); 

    $itemList = PayPal::ItemList();
	$itemList->setItems(array($item1));

    $transaction = PayPal::Transaction();
    $transaction->setAmount($amount);
    $transaction->setDescription('Treasruy Project');
    $transaction->setItemList($itemList);

    $payment = PayPal::Payment();
    $payment->setIntent('sale');
    $payment->setPayer($payer);
    $payment->setRedirectUrls($redirectUrls);
    $payment->setTransactions(array($transaction));

    $response = $payment->create($this->_apiContext);
    $redirectUrl = $response->links[1]->href;

    return Redirect::to( $redirectUrl );
	}
	public function getDone(Request $request)
	{
	    $id = $request->get('paymentId');
	    $token = $request->get('token');
	    $payer_id = $request->get('PayerID');
        if($id){

        $payment = Paypal::getById($id, $this->_apiContext);
        $paymentExecution = Paypal::PaymentExecution();
        $paymentExecution->setPayerId($payer_id);
        $executePayment = $payment->execute($paymentExecution, $this->_apiContext);
        // Clear the shopping cart, write to database, send notifications, etc.

        /*orders::create()*/

           dd($executePayment->transactions->item_list->items->name); 

        // Thank the user for the purchase
        /*return view('checkout.done');*/
    }else{
        return Redirect::to(Url('/'));
    }
	}

	public function getCancel()
	{
	    // Curse and humiliate the user for cancelling this most sacred payment (yours)
	    return view('checkout.cancel');
	}

}
