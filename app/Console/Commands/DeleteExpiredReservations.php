<?php

namespace App\Console\Commands;

use App\Models\Rooms;
use Illuminate\Console\Command;
use App\Models\Reserve;
use App\Models\Room;
use Carbon\Carbon;

class DeleteExpiredReservations extends Command
{
    protected $signature = 'reservations:cleanup';
    protected $description = 'Delete expired reservations and update room quantities';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $today = Carbon::today();
        $expiredReservations = Reserve::where('end_date', '<', $today)->get();

        foreach ($expiredReservations as $reservation) {
            $room = Rooms::find($reservation->room_id);
            if ($room) {
                $room->quantity += $reservation->room_quantity;
                $room->save();
            }
            $reservation->delete();
        }

        $this->info('Expired reservations deleted and room quantities updated.');
    }
}
