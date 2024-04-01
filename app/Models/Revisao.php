<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Revisao extends Model
{
    // Nome da tabela no banco de dados
    protected $table = 'revisoes';

    public $timestamps = false;  // Desativa colunas created_at e updated_at, pois não serão utilizadas nesse modelo.

    // Campos que podem ser preenchidos em massa
    protected $fillable = ['veiculo_id', 'data_revisao', 'descricao', 'valor'];

    // Relacionamento: Uma revisão pertence a um veículo
    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class);
    }
}
