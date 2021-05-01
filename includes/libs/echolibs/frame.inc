<?php


//namespace Frame;


class Frame
{
    public $props;
    public $state;
    public $template;
    public $content;
    public $innerTemplates;
    public $fromPath;

    /**
     * @return mixed
     */
    public function getFromPath()
    {
        return $this->fromPath;
    }

    /**
     * @param mixed $fromPath
     * @return Frame
     */
    public function setFromPath($fromPath)
    {
        $this->fromPath = $fromPath;
        return $this;
    }



    /**
     * @return mixed
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param mixed $template
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    }


    function __construct(array $props=array()) {
        $this->props = $props;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState(array $state=array())
    {
        $this->state = $state;
    }

    /**
     * @return array
     */
    public function getProps()
    {
        return $this->props;
    }

    /**
     * @param array $props
     */
    public function setProps($props)
    {
        $this->props = $props;
    }

    public function echo(){
        $this->echoF();
    }

    public function echoF($fromPath = ''){

        $props = $this->getProps();
        $state = $this->getState();
        $content = $this->getContent();
        $innerTemplates = $this->getInnerTemplates();
        $fromPath = $this->getFromPath();
        include ($this->getTemplate());
    }

    public function export(){
        ob_start();
        $this->echoF();
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    /**
     * @return mixed
     */
    public function getInnerTemplates()
    {
        return $this->innerTemplates;
    }

    /**
     * @param mixed $innerTemplates
     */
    public function setInnerTemplates(array $innerTemplates=array())
    {
        $this->innerTemplates = $innerTemplates;
    }



    public function contains(array $content=array()){
        $this->setContent();
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }
    public function echoContent()
    {
        include($this->content);
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

}