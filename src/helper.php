<?php

if (!function_exists("config")) {
    function config(string $key, string $default = null)
    {
        $keys = explode(".", $key);
        if (sizeof($keys))
        {
            $folderBase = sprintf(__DIR__ . "/config/%s.php", $keys[0]);
            if (file_exists($folderBase))
            {
                $keys = array_slice($keys, 1);
                $config = require($folderBase);
                foreach ($keys as $key)
                {
                    if (isset($config[$key]))
                    {
                        $config = $config[$key]; continue ;
                    }
                    return $default ;
                }
                return $config;
            }
        }
        return $default;
    }
}
