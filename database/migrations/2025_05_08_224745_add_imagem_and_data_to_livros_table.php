<?php
// database/migrations/xxxx_xx_xx_xxxxxx_add_imagem_and_data_to_livros_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImagemAndDataToLivrosTable extends Migration
{
    public function up()
    {
        Schema::table('livros', function (Blueprint $table) {
            $table->string('imagem')->nullable();  // Adiciona a coluna de imagem
            $table->date('data')->change();  // Garante que o campo `data` é do tipo `date`
        });
    }

    public function down()
    {
        Schema::table('livros', function (Blueprint $table) {
            $table->dropColumn('imagem');
            $table->string('data')->change();  // Se necessário, reverta a alteração da coluna
        });
    }
}