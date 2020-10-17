<?php

namespace backend\widgets\custompager;

use backend\assets\CustomPagerAsset;
use Yii;
use yii\helpers\Html;
use yii\helpers\Json;
use \yii\widgets\LinkPager;

class CustomPager extends LinkPager
{
    public $custom_pager_layout = '{pageButtons} {pageSizeList}';
    private $pageSizeList = [30, 60, 90];
    public $sizeListHtmlOptions = [];
    protected $_page_size_param = 'per-page';
    public $goToPageHtmlOptions = ['placeholder' => 'Go to page'];
    protected $_page_param = 'page';

    public function init()
    {
        parent::init();

        $this->_page_size_param = $this->pagination->pageSizeParam;
        $this->_page_param = $this->pagination->pageParam;
        $currentPageSize = $this->pagination->getPageSize();

        if (!in_array($currentPageSize, $this->pageSizeList)) {
            array_unshift($this->pageSizeList, $currentPageSize);
            $this->pageSizeList = array_unique($this->pageSizeList);
            sort($this->pageSizeList, SORT_NUMERIC);
        }
    }

    public function run()
    {
        if ($this->registerLinkTags) {
            $this->registerLinkTags();
        }

        CustomPagerAsset::register($this->getView());

        $jsOptions = [
            'pageParam' => $this->_page_param,
            'pageSizeParam' => $this->_page_size_param,
            'url' => $this->pagination->createUrl($this->pagination->getPage())
        ];

        $this->getView()->registerJs("customPagerWidget.init(" . Json::encode($jsOptions) . ");");

        return preg_replace_callback("/{(\\w+)}/", function ($matches) {
            $sub_section_name = $matches[1];
            $sub_section_content = $this->renderSection($sub_section_name);

            return $sub_section_content === false ? $matches[1] : $sub_section_content;
        }, $this->custom_pager_layout);
    }

    protected function renderSection($name)
    {
        switch ($name) {
            case 'pageButtons':
                return $this->renderPageButtons();
            case 'pageSizeList':
                return $this->renderPageSizeList();
            case 'goToPage':
                return $this->renderGoToPage();
            default:
                return false;
        }
    }

    private function renderPageSizeList()
    {
        return Html::dropDownList(
            $this->_page_size_param,
            $this->pagination->getPageSize(),
            array_combine($this->pageSizeList, $this->pageSizeList),
            $this->sizeListHtmlOptions
        );
    }

    private function renderGoToPage()
    {
        $current_page = 1;
        $params = Yii::$app->getRequest()->queryParams;
        if (isset($params[$this->_page_param])) {
            $current_page = intval($params[$this->_page_param]);
            if ($current_page < 1) {
                $current_page = 1;
            } else if ($current_page > $this->pagination->getPageCount()) {
                $current_page = $this->pagination->getPageCount();
            }
        }

        return Html::textInput($this->_page_param, $current_page, $this->goToPageHtmlOptions);
    }
}
