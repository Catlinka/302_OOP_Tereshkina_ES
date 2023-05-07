<?php

class Vector
{
    private $x;
    private $y;
    private $z;

    public function __construct($x, $y, $z)
    {
        try {
            if (!is_numeric($x) or !is_numeric($y) or !is_numeric($z)) {
                throw new TypeError;
            }
        } catch (TypeError $e) {
            echo "Неверный тип данных";
            die();
        }

        if (is_int($x)) {
            $this->x = $x;
        } else {
            $this->x = (float) $x;
        }

        if (is_int($y)) {
            $this->y = $y;
        } else {
            $this->y = (float) $y;
        }

        if (is_int($z)) {
            $this->z = $z;
        } else {
            $this->z = (float) $z;
        }
    }

    public function __get($temp)
    {
        return $this->$temp;
    }

    public function add(Vector $vector)
    {
        return new Vector($this->x + $vector->x, $this->y + $vector->y, $this->z + $vector->z);
    }

    public function product($number)
    {
        return new Vector($this->x * $number, $this->y * $number, $this->z * $number);
    }

    public function sub(Vector $vector)
    {
        return $this->add($vector->product(-1));
    }

    public function scalarProduct(Vector $vector)
    {
        return $this->x * $vector->x + $this->y * $vector->y + $this->z * $vector->z;
    }

    public function vectorProduct(Vector $vector)
    {
        $x = $this->y * $vector->z - $this->z * $vector->y;
        $y = $this->z * $vector->x - $this->x * $vector->z;
        $z = $this->x * $vector->y - $this->y * $vector->x;

        return new Vector($x, $y, $z);
    }

    public function __toString()
    {
        return "(" . $this->x . ";" . $this->y . ";" . $this->z . ")";
    }
}

