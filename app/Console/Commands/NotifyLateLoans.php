<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Loan;
use app\Notifications\LateLoanNotification;
use Carbon\Carbon;
use App\Models\User;
use App\Notifications\LoanOverdueNotification;

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
        // Busca todos os empréstimos que ainda não foram devolvidos (return_date é NULL)
        // E cuja data do empréstimo é anterior a 7 dias atrás (ou seja, estão atrasados)
        // Também carrega o relacionamento com o usuário (com o método with('user'))
        $lateLoans = Loan::whereNull('return_date')                       // Empréstimos ainda não devolvidos
            ->where('loan_date', '<', now()->subDays(7))                  // Com mais de 7 dias
            ->with('user')                                                // Carrega o usuário relacionado
            ->get();                                                      // Executa a consulta e obtém os resultados

        // Para cada empréstimo atrasado encontrado
        foreach ($lateLoans as $loan) {
            // Notifica o usuário que fez o empréstimo
            $loan->user->notify(new LoanOverdueNotification($loan));

            // Notifica todos os administradores também
            $admins = User::where('is_admin', true)->get();

            foreach ($admins as $admin) {
                $admin->notify(new LoanOverdueNotification($loan, true)); // passando flag opcional
            }
        }
    }

}
