<?php
    class SiteController extends BaseController
    {
        function index()
        {
            $this->renderView('site/index');
        }
    }