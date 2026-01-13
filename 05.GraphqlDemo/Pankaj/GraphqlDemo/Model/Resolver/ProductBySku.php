<?php
namespace Pankaj\GraphqlDemo\Model\Resolver;

use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;

class ProductBySku implements ResolverInterface
{
    protected $productRepository;

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
        try {
            $sku = $args['sku'];
            $product = $this->productRepository->get($sku);

            return [
                'id'    => (int) $product->getId(),
                'sku'   => $product->getSku(),
                'name'  => $product->getName(),
                'price' => (float) $product->getPrice(),
                'description'  =>  $product->getDescription(),
            ];
        } catch (NoSuchEntityException $e) {
            return null;
        }
    }
}
