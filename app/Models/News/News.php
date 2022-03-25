<?php

declare(strict_types=1);

namespace App\Models\News;

use Illuminate\Database\Eloquent\Model;

/**
 * Class News
 * @package App\Models\News
 */
class News extends Model
{
    /**
     * @var string
     */
    protected $table = 'noticias';

    /**
     * @var array
     */
    protected $fillable = [
        'autor_id',
        'titulo',
        'subtitulo',
        'descricao',
        'publicada_em',
        'slug',
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
        'autor_id' => 'required|numeric',
        'titulo' => 'required|min:20|max:100',
        'subtitulo' => 'required|min:20|max:155',
        'descricao' => 'required|min:100',
        'slug' => 'required'
    ];
}
