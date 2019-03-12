Netresearch Compatibility Extension
===================================

The target of this 'extension' is to provide forward/backward compatibility ports of functionality within Magento2.
This is aimed at extension developers to allow them to only have to maintain one development branch of their extension,
 that can be compatible with all Magento versions.
 
Example
-------

Magento 2.3 introduced the CsrfAwareActionInterface which allows controllers to receive POST requests from outside of the shop 
(e.g. for postsale activities of payment service providers). To retain functionality the extension provider would have to 
maintain two development branches of their extension, one for Magento 2.3 with the interface, and one without.

To avoid this, this extension provides an abstract controller that can be extended by controllers within third party extensions 
that need this functionality (implementing the CsrfAwareInterface). They will have to implement some abstract methods, 
however they can use one development branch for their extension.


How to use
----------

This extension has multiple versions:

- 1.* - supporting Magento 2.1.*
- 2.* - supporting Magento 2.2.*
- 3.* - supporting Magento 2.3.*
- ...

To use the features of this extension add an requirement in your extensions composer.json:
```json
{
  "require": {
    "netresearch/module-compatibility-m2": "*"
  }
}
```

Yes we recommend `*`, if you don't care or e.g. `>=2.0.0` if you want to support Magento 2.2.*.
This extension will itself require the affected Magento components (e.g. `magento/framework`) in the related versions, 
which will only allow a specific version of this extension on the merchants installation through composer.

Supported Forward/Backward compatibilities
-------------------------------------------

- CsrfAwareActionInterface (`Magento\Framework\App\CsrfAwareActionInterface`)
