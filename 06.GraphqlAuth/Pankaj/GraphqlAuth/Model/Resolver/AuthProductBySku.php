<?php
namespace Pankaj\GraphqlAuth\Model\Resolver;

use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\GraphQl\Exception\GraphQlAuthorizationException;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;

class AuthProductBySku implements ResolverInterface
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository
    ) {
        $this->productRepository = $productRepository;
    }

    public function resolve(
        $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ) {

        // Check if the user is authenticated, this is extra layer of security
        //if you need only frontend customer then add additional check for that here like $context->getExtensionAttributes()->getIsCustomer()       
        if (!$context->getUserId() && !$context->getExtensionAttributes()->getIsCustomer()) {
            throw new GraphQlAuthorizationException(
                __('Customer is not authenticated.')
            );
        }

        if (empty($args['sku'])) {
            throw new GraphQlInputException(__('Product SKU is required.'));
        }

        try {
            $product = $this->productRepository->get($args['sku']);
        } catch (\Exception $e) {
            throw new GraphQlInputException(
                __('Product with SKU "%1" does not exist.', $args['sku'])
            );
        }

        return [
            'id' => (int)$product->getId(),
            'sku' => $product->getSku(),
            'name' => $product->getName(),
            'price' => (float)$product->getPrice(),
            'description' => $product->getDescription()
        ];
    }
}
