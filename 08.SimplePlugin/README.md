# Pankaj_SimplePlugin

## Module Purpose
This module demonstrates a **basic Magento 2 plugin** implementation using
`before`, `around`, and `after` methods.

## What It Does
- Applies a plugin on `Magento\Catalog\Model\Product::getName()`
- Shows the execution order of:
  - before plugin
  - around plugin
  - after plugin
- Uses a custom logger to write logs into a separate file

## Key Concepts Covered
- Magento 2 Plugin (Interceptor)
- before / around / after methods
- Dependency Injection (DI)
- Custom logger with separate log file

## Logging
- Log file: `var/log/plugin.log`
- Helps in easy debugging and understanding plugin execution

## Use Case
- Learning Magento 2 plugin basics
- Interview preparation
- Understanding method interception flow

## Compatibility
- Magento Open Source / Adobe Commerce
- Magento 2.x
