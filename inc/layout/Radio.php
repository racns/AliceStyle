<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * 单选框帮手
 *
 * @category typecho
 * @package Widget
 * @copyright Copyright (c) 2008 Typecho team (http://www.typecho.org)
 * @license GNU General Public License 2.0
 * @version $Id$
 */

/**
 * 单选框帮手类
 *
 * @category typecho
 * @package Widget
 * @copyright Copyright (c) 2008 Typecho team (http://www.typecho.org)
 * @license GNU General Public License 2.0
 */
class Radio extends Typecho_Widget_Helper_Form_Element
{


    public function start(){}

    public function end(){echo '</ul></div></div></div>';}



    public function __construct($name = NULL, array $options = NULL, $value = NULL, $label = NULL, $description = NULL)
    {
        /** 创建html元素,并设置class */
        //parent::__construct('ul', array('class' => 'typecho-option', 'id' => 'typecho-option-item-' . $name . '-' . self::$uniqueId));
        $this->addItem(new CustomLabel('<div class="mdui-panel" mdui-panel=""><div class="mdui-panel-item"><div class="mdui-panel-item-header">'.$label. '</div><div class="mdui-panel-item-body"><ul class="typecho-option" id="typecho-option-item-'.$name.'-'.self::$uniqueId.'">'));

        $this->name = $name;
        self::$uniqueId ++;
        self::$uniqueId ++;

        /** 运行自定义初始函数 */
        $this->init();

        /** 初始化表单标题 */
        /*if (NULL !== $label) {
            $this->label($label);
        }*/

        /** 初始化表单项 */
        $this->input = $this->input($name, $options);

        /** 初始化表单值 */
        if (NULL !== $value) {
            $this->value($value);
        }

        /** 初始化表单描述 */
        if (NULL !== $description) {
            $this->description($description);
        }
    }


    /**
     * 选择值
     *
     * @access private
     * @var array
     */
    private $_options = array();

    /**
     * 初始化当前输入项
     *
     * @access public
     * @param string $name 表单元素名称
     * @param array $options 选择项
     * @return Typecho_Widget_Helper_Layout
     */
    public function input($name = NULL, array $options = NULL)
    {
        foreach ($options as $value => $label) {
            $this->_options[$value] = new Typecho_Widget_Helper_Layout('input');
            $item = $this->multiline();
            $id = $this->name . '-' . $this->filterValue($value);
            $this->inputs[] = $this->_options[$value];

            $item->addItem(new CustomLabel('<label class="mdui-radio">'));
            $item->addItem($this->_options[$value]->setAttribute('name', $this->name)
                ->setAttribute('type', 'radio')
                ->setAttribute('value', $value)
                ->setAttribute('id', $id));

            $item->addItem(new CustomLabel('<i class="mdui-radio-icon"></i>'.$label.'</label>'));

            //$labelItem = new Typecho_Widget_Helper_Layout('label');
            //$item->addItem($labelItem->setAttribute('for', $id)->html($label));
            $this->container($item);
        }

        return current($this->_options);
    }

    /**
     * 设置表单元素值
     *
     * @access protected
     * @param mixed $value 表单元素值
     * @return void
     */
    protected function _value($value)
    {
        foreach ($this->_options as $option) {
            $option->removeAttribute('checked');
        }

        if (isset($this->_options[$value])) {
            $this->value = $value;
            $this->_options[$value]->setAttribute('checked', 'true');
            $this->input = $this->_options[$value];
        }
    }
}
