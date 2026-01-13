# Magento 2 Shipping Logger Module

## Overview
This Magento 2 module logs shipping method calculations during checkout.
It is useful for debugging checkout flow, shipping rate issues, and performance analysis
in production environments.

## Features
- Observes shipping rate collection event
- Logs shipping method code and price
- Uses Magento 2 Event/Observer pattern
- Clean, extensible structure

## Use Case
- Debug shipping calculation issues
- Analyze shipping prices in live stores
- Understand checkout execution flow

## Technical Highlights
- Event Observer
- Custom Logger
- Dependency Injection

## Installation

php bin/magento module:enable Pankaj_ShippingLogger
php bin/magento setup:upgrade
php bin/magento cache:flush
