<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class kelompok_Belajar extends Mailable
{
    use Queueable, SerializesModels;

    public $kelompok_belajar;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($kelompok_belajar)
    {
        $this->kelompok_belajar = $kelompok_belajar;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(Env('MAIL_USERNAME'))
            ->subject('KELOMPOK BELAJAR')
            ->view('kelompok_belajar.mail')
            ->with([
                'nama' => $this->kelompok_belajar
            ]);
    }
}
