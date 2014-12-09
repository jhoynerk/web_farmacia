<?php

class Servicio extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'servicios';

    /**
     * Definimos las validaciones
     * @var type 
     */
    protected static $rules = array(
        'nombre' => 'required|max:50|min:10',
    );
    protected static $messages = array(
        'required' => 'El :attribute es requerido',
        'numeric' => 'El :attribute debe ser numérico',
        'max' => 'El :attribute no puede superar los :max caracteres',
        'min' => 'El :attribute debe tener como mínimo :min caracteres',
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

    public function __construct(array $attributes = array(), Validator $validator = null) {
        parent::__construct($attributes);
        $this->validator = $validator ? : \App::make('validator');
    }

    public function farmacias() {
        return $this->belongsToMany('Farmacia');
    }

    public function set_nombre($string) {
        $this->nombre = $string;
    }

    public function get_nombre() {
        return $this->nombre;
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
}

?>