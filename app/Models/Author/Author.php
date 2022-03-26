<?php

declare(strict_types=1);

namespace App\Models\Author;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Author
 * @package App\Models\Author
 */

 class Author extends Model
 {
     /**
      * Criação das variaveis do autor
      *
      * @var string
      */
    protected $table = 'autores';

    /**
     * Listar dados do autor
     *
     * @var array
     */
    protected $fillable=[
        'nome',
        'sobrenome',
        'email',
        'senha',
        'sexo',
        'ativo',
        'criado_em'
    ];

    /**
     * Regra esconder senha do autor
     *
     * @var array
     */
    protected $hidden=[
        'senha'
    ];

    /**
     * Undocumented variable
     *
     * @var boolean
     */
    public $timestamps=false;

    /**
     * As regras de validação dos dados do autor
     *
     * @var array
     */
    public array $rules =[
        'nome' => 'required|min:2|max:45|alpha',
        'sobrenome' => 'required|min:2|max:60|alpha',
        'email' => 'required|email|max:100|email:rfc,dns',
        'senha' => 'required|between:6,12',
        'sexo' => 'required|alpha|max:1'
    ];

        /**
     * @return void
     */
    public function news()
    {
      return $this->hasMany(News::class);
    }
 }
