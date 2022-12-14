<?php

class Validation {

    public function empty($data): bool
    {
        if (empty($data))
            return true;
        return false;
    }
    
    public function name(string $name): string
    {
        if ($this->empty($name))
            return 'The name filed is required';

        // $name = $this->test_input($name);

        if (!preg_match("/^[a-zA-Z-' ]*$/",$name))
            return 'Only letters and whitespaces are allowed';
        else
            return '';
    }

    public function email(string $email): string
    {
        if ($this->empty($email))
            return 'the email field is required';
        
        // $email = $this->test_input($email);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            return 'Invalid email format';
        }
        else {
            return '';
        }
    }

    public function website(string $url): string
    {
        if ($this->empty($url))
            return 'the url field is required';

        // $url = $this->test_input($url);

        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $url))
            return 'Invalid url format';
        else
            return '';
    }

    public function gender(string $gender): string
    {
        if ($this->empty($gender))
            return 'The gender field is required';

        if ($gender !== 'M' && $gender !== 'F')
        {
            return 'Choose your gender';
        } 
        else {
            return '';
        }
    }

    public function password(string $password, string $confirm_password): string
    {
        if ($this->empty($password))
            return 'The password field is required';
        
        // $password  = $this->test_input($password);

        if ($password !== $confirm_password) 
            return 'Passwords do not match';

        if (strlen($password) < 8)
            return 'Password must be atleast 8 characters';

        if (!preg_match("#[0-9]+#", $password))
            return 'Password must contain a number';

        if (!preg_match("#[A-Z]+#", $password))
            return 'Password must contain an uppercase letter';

        if (!preg_match("#[a-z]+#",$password))
            return 'Password must contain a lowercase letter';
        
        return '';
    }

    public function phone_number(string $phone_number): string
    {
        if ($this->empty($phone_number))
            return 'The phone number field is required';
        
        // $phone_number = $this->test_input($phone_number);

        if (strlen($phone_number) != 10)
            return 'Must be 10 digits';

        if (!is_numeric($phone_number))
            return 'Must contain only numbers';
        
        return '';
    }

    public function test_input($input): string
    {
        if (!isset($input) || is_null($input))
            return '';
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);

        return $input;
    }

}
