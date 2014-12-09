<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Validation\Validator;

class Farmacia extends Eloquent {

    /**
     * Definimos las validaciones
     * @var type 
     */
    protected static $rules = array(
        'nombre' => 'required|max:50|min:3',
        'slogan' => 'max:50|min:5',
        //'slug' => 'unique:farmacias,slug',
        'direccion' => 'required|min:5',
        'latitud' => 'min:-91|max:91|required|numeric|regex:/^-?\d{1,2}\.?\d+?$/',
        'longitud' => 'min:-181|max:181|required|numeric|regex:/^-?\d{1,3}\.?\d+?$/',
        'horario' => 'required|min:10',
        'destacada' => 'max:1|integer',
    );
    protected static $messages = array(
        'required' => 'El :attribute es requerido',
        'numeric' => 'El :attribute debe ser numerico',
        'max' => 'El :attribute no puede superar los :max caracteres',
        'min' => 'El :attribute debe tener como mínimo :min caracteres',
        'regex' => 'La :attribute no tiene la precisión correcta o no es una :attribute valida',
    );

    /**
     * Error message bag
     * @var Illuminate\Support\MessageBag
     */
    protected $errors;

    /**
     * Validator instance
     * @var Illuminate\Validation\Validators
     */
    protected $validator;

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'farmacias';
    protected $perPage = 10;

    public function __construct(array $attributes = array(), Validator $validator = null) {
        parent::__construct($attributes);
        $this->validator = $validator ? : \App::make('validator');
    }

    public function servicios() {
        return $this->belongsToMany('Servicio');
    }

    public function imagenes() {
        return $this->hasMany('Imagen', 'farmacia_id');
    }

    /**
     * Listen for save event
     */
    protected static function boot() {
        parent::boot();

        static::saving(function($model) {
            return $model->validate();
        });
    }

    /**
     * Validates current attributes against rules
     */
    public function validate() {
        $this->latitud = trim($this->latitud);
        $this->longitud = trim($this->longitud);
        $v = $this->validator->make($this->attributes, static::$rules, static::$messages);
        if ($v->passes()) {
            return true;
        }
        $this->setErrors($v->messages());
        return false;
    }

    /**
     * Set error message bag
     * 
     * @var Illuminate\Support\MessageBag
     */
    protected function setErrors($errors) {
        $this->errors = $errors;
    }

    /**
     * Retrieve error message bag
     */
    public function getErrors() {
        return $this->errors;
    }

    /**
     * Inverse of wasSaved
     */
    public function hasErrors() {
        return !empty($this->errors);
    }

    public function getDestacada() {
        return ($this->destacada) ? 'Si':'No';
    }

}

?>