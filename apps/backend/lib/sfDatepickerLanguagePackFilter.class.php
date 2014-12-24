<?php

class sfDatepickerLanguagePackFilter extends sfFilter
{
    public function execute($filterChain)
    {
        //var_dump("**sfDatepickerLanguagePackFilter<br>");
        // Nothing to do before the action
        $filterChain->execute();

        // Decorate the response with the tracker code
        $dayNamesMin = "['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']";
        $monthNamesShort = "['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']";
        if ($this->getContext()->getUser()->getCulture() == "cn") {
            $dayNamesMin = "['日', '一', '二', '三', '四', '五', '六']";
            $monthNamesShort = "['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月']";
        }
        $response = $this->getContext()->getResponse();
        $response->setContent(str_ireplace('"<dayNamesMin>"', $dayNamesMin, $response->getContent()));
        $response->setContent(str_ireplace('"<monthNamesShort>"', $monthNamesShort, $response->getContent()));
    }
}