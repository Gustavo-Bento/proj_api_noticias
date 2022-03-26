<?php

declare(strict_types=1);

namespace App\Models\ImageNews;

use Illuminate\Database\Eloquent\Model;

class ImageNews extends Model
{
    /**
     * @var string
     */
    protected $table = 'imagens_noticias';

    /**
     * @var array
     */
    protected $fillable = [
        'noticia_id',
        'imagem',
        'ativo',
        'criado_em'
    ];

    /**
     * @var boolean
     */
    public $timestamps = false;

    /**
     * @var array
     */
    public array $rules= [
        'noticia_id' => 'required|numeric',
        'imagem' => 'required',
        'descricao' => 'required|min:10|max:255'
    ];

}
