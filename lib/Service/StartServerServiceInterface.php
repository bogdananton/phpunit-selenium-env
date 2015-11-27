<?php
namespace SeleniumSetup\Service;

interface StartServerServiceInterface
{
    public function detectEnv();
    public function prepareEnv();
    public function downloadDrivers();
    public function startServer();
}