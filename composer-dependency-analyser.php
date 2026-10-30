<?php

declare(strict_types=1);

/*
 * ARCH-07: the harness preset (WordPress classes and functions, the tests), plus what is specific to this plugin.
 */
$configuration = require __DIR__ . '/vendor/pollora/harness/presets/composer-dependency-analyser.php';

return $configuration
    // The MCP Adapter is a WordPress plugin, not a Composer package: nothing to require. Every use sits behind
    // Environment::hasMcpAdapter(), so the plugin degrades instead of failing when the adapter is absent.
    ->ignoreUnknownClassesRegex('~^WP\\\\MCP\\\\~')
    // The plugin's constant, defined in mcp-connector.php before the autoloader runs, and the WP namespace alias.
    ->ignoreUnknownClasses(['Pollora\McpConnector\PLUGIN_FILE', 'WP']);
