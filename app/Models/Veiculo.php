<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    // Nome da tabela no banco de dados
    protected $table = 'veiculos';

    public $timestamps = false;  // Desativa colunas created_at e updated_at, pois não serão utilizadas nesse modelo.

    // Campos que podem ser preenchidos em massa
    protected $fillable = ['proprietario_id', 'marca', 'modelo', 'ano'];

    // Relacionamento: Um veículo pertence a um proprietário
    public function proprietario()
    {
        return $this->belongsTo(Proprietario::class);
    }

    // Relacionamento: Um veículo pode ter várias revisões
    public function revisoes()
    {
        return $this->hasMany(Revisao::class);
    }
}
