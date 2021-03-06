<?php
/**
 * Created by PhpStorm.
 * User: crozet
 * Date: 28/01/2016
 * Time: 17:02
 */

namespace Plugins\Twig;


use Plugins\MaterializeForms\MaterializeForms;

class TwigMaterialize extends \Twig_Extension
{
    private static $materialForm;

    public function __construct()
    {
        self::$materialForm = new MaterializeForms('');
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'TwigMaterialize';
    }

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('material_form_start',    [$this, 'materialFormStart'],    ['is_safe' => ['html']]),
            new \Twig_SimpleFunction('material_form_end',      [$this, 'materialFormEnd'],      ['is_safe' => ['html']]),
            new \Twig_SimpleFunction('material_form_input',    [$this, 'materialFormInput'],    ['is_safe' => ['html']]),
            new \Twig_SimpleFunction('material_form_select',   [$this, 'materialFormSelect'],   ['is_safe' => ['html']]),
            new \Twig_SimpleFunction('material_form_textarea', [$this, 'materialFormTextarea'], ['is_safe' => ['html']]),
            new \Twig_SimpleFunction('material_form_submit',   [$this, 'materialFormSubmit'],   ['is_safe' => ['html']]),
            new \Twig_SimpleFunction('material_form_json',     [$this, 'materialFormJson'],     ['is_safe' => ['html']]),
            new \Twig_SimpleFunction('material_form_error',    [$this, 'materialFormError'],    ['is_safe' => ['html']]),
        ];
    }

    public function materialFormStart($id, $options) {
        self::$materialForm->setId($id);
        return self::$materialForm->start($options);
    }

    public function materialFormEnd() {
        return self::$materialForm->end();
    }

    public function materialFormJson() {
        return self::$materialForm->json();
    }

    public function materialFormError() {
        return self::$materialForm->error();
    }

    public function materialFormInput($name, $options) {
        return self::$materialForm->input($name, $options);
    }

    public function materialFormSelect($name, $options) {
        return self::$materialForm->select($name, $options);
    }

    public function materialFormTextarea($name, $options) {
        return self::$materialForm->textarea($name, $options);
    }

    public function materialFormSubmit($name, $options) {
        return self::$materialForm->submit($name, $options);
    }
}