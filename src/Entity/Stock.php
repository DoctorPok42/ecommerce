<?php

namespace App\Entity;

use App\Repository\StockRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StockRepository::class)]
class Stock
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $article_id = null;

    #[ORM\Column]
    private ?int $stock_amount = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArticleId(): ?int
    {
        return $this->article_id;
    }

    public function setArticleId(int $article_id): static
    {
        $this->article_id = $article_id;

        return $this;
    }

    public function getStockAmount(): ?int
    {
        return $this->stock_amount;
    }

    public function setStockAmount(int $stock_amount): static
    {
        $this->stock_amount = $stock_amount;

        return $this;
    }
}
