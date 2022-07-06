<?php

/*
*vision 1.03
*rule_value = tabel e.g users
*item = field e.g username
*value = input value from the ui
*
*(c)2014 zedappdev
*/

class Validate
{
    private $_passed = false,
        $_errors = array(),
        $_db = null;

    //this will be called when the validation is
    public function __construct()
    {
        $this->_db = DB::getInstance();
    }

    //check method
    public function check($source, $items = array())
    {
        foreach ($items as $item => $rules) {
            foreach ($rules as $rule => $rule_value) {// test echo "{$item} {$rule} must be {$rule_value}<br>";
                //geting the values
                $value = trim($source[$item]);//test echo $value; without trim();
                $item = escape($item);
                //validating the information in the field text
                if ($rule === 'required' && empty($value)) {
                    $this->addError("{$item} is required");
                } else if (!empty($value)) {
                    switch ($rule) {

                        case 'min':
                            if (strlen($value) < $rule_value) {
                                $this->addError("{$item} must be a minimum of {$rule_value} characters.");
                            }
                            break;
                        case 'max':
                            if (strlen($value) > $rule_value) {
                                $this->addError("{$item} must be a maximum of {$rule_value} characters.");
                            }
                            break;

                        case 'matches':
                            if ($value != $source[$rule_value]) {
                                $this->addError("{$rule_value} must match {$item}");
                            }
                            break;
                        case 'unique':
                            $check = $this->_db->get($rule_value, array($item, '=', $value));

                            if ($check->count()) {
                                $this->addError("{$item} already exists.");
                            }
                            break;
                        case 'unique_phone':
                            $check = $this->_db->get($rule_value, array($item, '=', Cryptdata::encryptIt($value)));

                            $vales = Cryptdata::decryptIt(Cryptdata::encryptIt($value));
                            if ($check->count()) {
                                $this->addError("{$vales} already exists.");
                            }
                            break;

                        case 'number_only':
                            if (!is_numeric($value)) {
                                $this->addError("Invalid number format");
                            }
                            break;

                        case 'valid_email':
                            if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                                $this->addError("Invalid email");
                            }
                            break;

                    }
                }

            }

        }
        //checking for errors array if empty
        if (empty($this->_errors)) {
            $this->_passed = true;
        }
        return $this;

    }

    private function addError($error)
    {
        $this->_errors[] = $error;
    }

    public function errors()
    {
        return $this->_errors;
    }

    public function passed()
    {
        return $this->_passed;
    }
}