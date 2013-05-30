<?php
/**
 * Slug Helper
 * 
 * @author Leandro Baratucci
 * @package abismo
 */ 
App::uses('FormHelper', 'View/Helper');

/**
 * Slug Helper Class
 * 
 * @subpackage view.helpers
 */ 
class SlugHelper extends AppHelper{
    
/**
 * Transforma strings en strings aptas para urls amigables y SEO
 * 
 * @param string $string
 * @param string $slug
 * @return string
 */     
    function transform($string, $slug = '-') {
        $string = iconv("UTF-8", "ASCII//TRANSLIT", $string);
        $string = strtolower($string);
        if ($slug) {
        $string = preg_replace('/[^a-z0-9]/i', $slug, $string);
        $string = preg_replace('/' . $slug . '{2,}/i', $slug, $string);
        $string = trim($string, $slug);
        }
        return $string;
    }
}
