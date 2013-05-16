<?php

class Funciones {

/**
 * Funcion de suma
 * Para arreglo de modelos
 * Suma el atributo existente en el arreglo de modelos
 * Ejemplo:
 * <pre>
 * $arreglo_modelos = array(
 *                      array('atributo'=>1),
 *                      array('atributo'=>5),
 *                      array('atributo'=>6),
 *                      );
 * Funciones::Suma($arreglo_modelos, 'atributo');
 * return: 12
 * </pre>
 * 
 * Ejemplo 2:
 * $model = Usuarios::model()->findByPk(1);
 * $model->mensajes; (Has Many) (Tabla contiene: id, mensaje, numero_de_caracteres)
 * Funciones::Suma($model->mensahes, 'numero_de_caracteres');
 * 
 * @property ActiveRecord[] $arreglo_modelos
 * @property string $atributo
 *
 * @property Proyecto[] $proyectos
 */    
    public static function Suma($arreglo_modelos, $atributo){
        $suma = 0;
        foreach($arreglo_modelos as $modelo){
            $suma += $modelo->$atributo;
        }
        return $suma;
    }
    
    
/**
 * Funcion de remover directorio recursivo
 * Ejemplo:
 * <pre>
 * Funciones::rmdir($dir);
 * return: true or false
 * </pre>
 * @property $dir = direccion del directorio
 */    
    
    public static function rmdir($dir) { 
       $files = array_diff(scandir($dir), array('.','..')); 
        foreach ($files as $file) { 
          (is_dir("$dir/$file")) ? Funciones::rmdir("$dir/$file") : unlink("$dir/$file"); 
        } 
        return rmdir($dir); 
    }     
    
}

?>
