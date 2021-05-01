<?php

namespace App\HTML;


class Forme{

    private $data = [];

    public function __construct($data){
        $this->data = $data;

    }

    /**
     * @param $index
     * @return $valeur char
     */
    private function getValue($index){
    
        if(is_object($this->data)){
            return $this->data->$index;

        }else{
            if(!isset($this->data[$index])){
                return null;
            }else{
                return $this->data[$index];
            }
        }
    }

    private function surrond($html, $label){

        $surrond = '<label for="'.$label.'">'.$label.'</label>';
        return '<p>'.$surrond.$html.'</p>';
    }

    public function select($name, $label, $options = []){
        
        $input = "<select name='$name'>";
        foreach($options as $k => $v){            
            $attribut = '';
            if($k == $this->getValue($name)){
                
                $attribut = ' selected';
            }
            
            $input .= "<option value='$k' $attribut>$v</option>";
        }
        $input.='</select>';

        return $input;

    }

    public function input($name, $label, $option= []){
        if(isset($option['type'])){
            $type = $option['type'];
        }else{
            $type = 'text';
        }

        if($type === 'textarea'){
            return '<textarea name="'.$name.'" placeholder="'.$label.'">'.$this->getValue($name).'</textarea>';
        }
        return '<input type="'.$type.'" placeholder="'.$label.'" name="'.$name.'" value="'.$this->getValue($name).'">';
    }

    public function radio($name,$val,$label){
        return '<input type="radio" name="'.$name.'" value="'.$val.'" id="'.$val.'"><label for="'.$val.'">'.$label.'</label>';
    }

}


?>
