<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MyReport extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $report)
    {
        $this->report=$report;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $report=$this->report;
        return $this->view('mail.report',compact('report'));
    }
}
