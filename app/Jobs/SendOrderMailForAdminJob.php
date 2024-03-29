<?php

namespace App\Jobs;

use App\Entities\Contracts\AdminOrderMailEntityInterface;
use Illuminate\Bus\Queueable;
use App\Mail\SendOrderMailForAdmin;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendOrderMailForAdminJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public AdminOrderMailEntityInterface $adminMailData)
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->adminMailData->getAdminEmail())->send(new SendOrderMailForAdmin($this->adminMailData));
    }
}
