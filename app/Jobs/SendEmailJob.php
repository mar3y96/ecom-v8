<?php

namespace App\Jobs;

use App\Mail\SubscribeMails;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;



class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;
    protected $product;
    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( $email,$product)
    {
        $this->email = $email;
        $this->product = $product;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $mail = new SubscribeMails($this->email, $this->product);
        Mail::to($this->email)->send($mail);
    }
}
