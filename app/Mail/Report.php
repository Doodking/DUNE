<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Report extends Mailable
{
    use Queueable, SerializesModels;

    public $post;
    public $author;
    public $report;

    public function __construct($post, $author, $report)
    {
        $this->post = $post;
        $this->author = $author;
        $this->report = $report;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.orders.report')->with([
            'post' => $this->post,
            'author' => $this->author,
            'report' => $this->report,
        ]);;
    }
}
