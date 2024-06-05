<?php
namespace App\Http\Controllers;
use App\Models\CreditHistory;
use App\Models\User;
use App\Models\UserCreditHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Exception\CardException;
class PaymentController extends Controller
{
    public function showPaymentForm()
    {
        $plans = [
            ['name' => 'Basic Plan', 'price' => 999],  // price in cents
            ['name' => 'Standard Plan', 'price' => 1999],
            ['name' => 'Premium Plan', 'price' => 2999],
        ];
        return view('payment', ['plans' => $plans]);
    }
    public function processPayment(Request $request)
    {
        Stripe::setApiKey('sk_test_51P18o5D7VDcQ5LWGBtueoUtpkIFu0RvGtjdzmsjHmFUdFvbLE0yoiD85pY3KoXM8DSMU7pZolIMQnwiHPmdqXlOi00Qup6IS77');
        try {
            $charge = \Stripe\Charge::create([
                'amount' => $request->amount, // amount in cents
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => $request->plan,
            ]);
            // Payment was successful
            return redirect()->route('payment.success')->with('success', 'Payment successful!');
        } catch (CardException $e) {
            // Payment failed (e.g., card declined)
            return redirect()->route('payment.form')->with('error', $e->getMessage());
        }
    }
    public function paymentSuccess()
    {  $now = Carbon::now();
        $user_id = Auth::id();
        $expiryDate = $now->addMonth();
        $userCreditHistory = new UserCreditHistory();
        $userCreditHistory->user_id = $user_id;
        $userCreditHistory->credit_buy = 10;
        $userCreditHistory->plan_id = 1;
        $userCreditHistory->expiry_date = $expiryDate;// Assuming you want to buy 10 tokens
        $userCreditHistory->save();
        $data = UserCreditHistory::where('user_id', $user_id)->paginate(4);
        $token_buy =UserCreditHistory::where('user_id', $user_id)
            ->sum('credit_buy');
        $token_used= CreditHistory::where('user_id', $user_id)
            ->sum('token_consumed');
        $token =  $token_buy- $token_used;
        return  view('dashboard', ['data' => $data, 'token'=>$token]);
    }

}
