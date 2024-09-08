<?php

namespace App\Listeners;

use App\Events\ItTransferRecordCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendItTransferRecordCreatedNotification
{
    public function handle(ItTransferRecordCreated $event): void
    {
        //
    }
}
