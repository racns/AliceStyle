<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * 文字输入表单项帮手
 *
 * @category typecho
 * @package Widget
 * @copyright Copyright (c) 2008 Typecho team (http://www.typecho.org)
 * @license GNU General Public License 2.0
 * @version $Id$
 */

/**
 * 文字输入表单项帮手类
 *
 * @category typecho
 * @package Widget
 * @copyright Copyright (c) 2008 Typecho team (http://www.typecho.org)
 * @license GNU General Public License 2.0
 */
class Text extends Typecho_Widget_Helper_Form_Element
{

    public function start(){}

    public function end(){echo '</ul></div></div></div>';}


    public function __construct($name = NULL, array $options = NULL, $value = NULL, $label = NULL, $description = NULL)
    {
        /** 创建html元素,并设置class */
        //parent::__construct('ul', array('class' => 'typecho-option', 'id' => 'typecho-option-item-' . $name . '-' . self::$uniqueId));
        $this->addItem(new CustomLabel('<div class="mdui-panel" mdui-panel=""><div class="mdui-panel-item"><div class="mdui-panel-item-header">'.$label. '</div><div class="mdui-panel-item-body"><ul style="padding-left: 0px; list-style: none!important" id="typecho-option-item-'.$name.'-'.self::$uniqueId.'">'));

        $this->name = $name;
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
     * 初始化当前输入项
     *
     * @access public
     * @param string $name 表单元素名称
     * @param array $options 选择项
     * @return Typecho_Widget_Helper_Layout
     */
    public function input($name = NULL, array $options = NULL)
    {
        $this->addItem(new CustomLabel('<div class="mdui-textfield">'));
        $input = new Typecho_Widget_Helper_Layout('input', array('id' => $name . '-0-' . self::$uniqueId,
            'name' => $name, 'type' => 'text', 'class' => 'mdui-textfield-input'));
        $this->container($input);
        $this->addItem(new CustomLabel("</div>"));
        //$this->label->setAttribute('for', $name . '-0-' . self::$uniqueId);
        $this->inputs[] = $input;

        return $input;
    }

    /**
     * 设置表单项默认值
     *
     * @access protected
     * @param mixed $value 表单项默认值
     * @return void
     */
    protected function _value($value)
    {
        $this->input->setAttribute('value', htmlspecialchars($value));
    }
}
