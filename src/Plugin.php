<?php

namespace Phile\Plugin\ServeContentFiles;

use Phile\Event\RoutingEvent;
use Phile\Plugin\AbstractPlugin;

class Plugin extends AbstractPlugin {
    public static function getSubscribedEvents(){
        return [
            RoutingEvent::BEFORE => 'onBeforeRoute'
        ];
    }

    public function onBeforeRoute(RoutingEvent $event){
        $contentDirectory = $this->normalizePath($this->phileConfig['content_dir']);
        $requestUri = $this->normalizePath($event->getRequestUrl());

        $path = $contentDirectory . '/' . ltrim($requestUri, '/');
        if (file_exists($path) && is_file($path)){
            $event->setContentPath($path);
        }
    }

    private function normalizePath($path){
        $path = str_replace('\\', '/', $path);
        $path = rtrim($path, '/');

        $query = strpos($path, '?');
        if ($query !== false){
            $path = substr($path, 0, $query);
        }

        return $path;
    }
}
