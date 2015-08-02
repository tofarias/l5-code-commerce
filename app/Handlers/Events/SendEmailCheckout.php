<?php

namespace CodeCommerce\Handlers\Events;

use CodeCommerce\Events\CheckoutEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class SendEmailCheckout
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CheckoutEvent  $event
     * @return void
     */
    public function handle(CheckoutEvent $event)
    {
        Mail::send('emails.emailcheckout', [], function ($message) {
		    $message->from('us@example.com', 'Laravel');
		
		    $message->to('foo@example.com')->cc('bar@example.com');
		});
    }
}
