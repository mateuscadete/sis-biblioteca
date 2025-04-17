<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Loan;
use App\Notifications\LateLoanNotification;   

class NotifyLateLoans extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:notify-late-loans';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $lateLoans = Loan::whereNull('return_date')
            ->where('loan_date', '<', now()->subDays(7))
            ->with('user')
            ->get();

        foreach ($lateLoans as $loan) {
            $loan->user->notify(new LateLoanNotification($loan));
        }
    }
}
