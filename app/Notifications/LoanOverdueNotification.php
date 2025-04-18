<?php
namespace App\Notifications;

use App\Models\Loan;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
class LoanOverdueNotification extends Notification
{
    // Propriedade pública que armazena o empréstimo relacionado à notificação
    public Loan $loan;

    // Define se a notificação será enviada para o administrador (true) ou para o usuário (false)
    public bool $isAdmin;

    // Construtor da notificação: recebe o empréstimo e se é para o admin
    public function __construct(Loan $loan, bool $isAdmin = false)
    {
        $this->loan = $loan;         // Armazena o empréstimo
        $this->isAdmin = $isAdmin;   // Armazena se é uma notificação para administrador
    }

    // Define o canal da notificação (neste caso, apenas e-mail)
    public function toMail($notifiable)
    {
        // Caso a notificação seja para o administrador:
        if ($this->isAdmin) {
            return (new MailMessage)
                ->subject('Alerta de Empréstimo Vencido') // Assunto do e-mail
                ->line('O empréstimo do usuário ' . $this->loan->user->name . ' está atrasado.') // Informações sobre o usuário
                ->line('Livro: ' . $this->loan->book->title); // Título do livro atrasado
        }

        // Caso seja uma notificação para o próprio usuário
        return (new MailMessage)
            ->subject('Seu Empréstimo está Vencido') // Assunto do e-mail
            ->line('O seu empréstimo do livro ' . $this->loan->book->title . ' está atrasado.') // Mensagem ao usuário
            ->action('Ver Empréstimos', url('/meus-emprestimos')); // Botão com link para a página de empréstimos do usuário
    }
}




