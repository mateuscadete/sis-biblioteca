<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;

use Illuminate\Notifications\Messages\MailMessage;

// Define a classe LateLoanNotification que estende a base Notification
// Essa classe será usada para enviar e-mails informando sobre empréstimos atrasados
class LateLoanNotification extends Notification
{
    // Construtor que recebe um objeto Loan (empréstimo) e o armazena como propriedade pública
    public function __construct(public $loan) {}

    // Define por qual canal a notificação será enviada
    // No caso, apenas por e-mail
    public function via($notifiable)
    {
        return ['mail'];
    }

    // Define o conteúdo do e-mail que será enviado
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Livro não devolvido')  // Assunto do e-mail
            ->line('Você tem um livro emprestado há mais de 7 dias.') // Linha informativa
            ->line('Título: ' . $this->loan->book->title) // Mostra o título do livro emprestado
            ->action('Ver meus empréstimos', url('/emprestimos')) // Botão com link para a página de empréstimos
            ->line('Por favor, devolva o livro o quanto antes.'); // Mensagem final de lembrete
    }
}


