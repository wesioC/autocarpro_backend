<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proprietario extends Model
{
    // Nome da tabela no banco de dados
    protected $table = 'proprietarios';

    public $timestamps = false;  // Desativa colunas created_at e updated_at, pois não serão utilizadas nesse modelo.

    // Campos que podem ser preenchidos em massa
    protected $fillable = ['nome','sexo','cpf'];

    // Relacionamento: Um proprietário pode ter vários veículos
    public function veiculos()
    {
        return $this->hasMany(Veiculo::class);
    }
}
