<?php
namespace f3il\errors;

class SqlError extends \f3il\Error {
    protected $query;

    public function __construct($message,$query,$origin=null) {
        parent::__construct($message,$origin);
        $this->renderFile = __DIR__.'/html/sqlerror.html.php';
        $this->query = $query;
    }
}